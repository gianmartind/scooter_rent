<?php
    require_once "controller/services/mysqlDB.php";
    require_once "controller/services/view.php";
    require_once "controller/services/subview.php";
    require_once "model/scooter.php";
    require_once "model/recent.php";
    require_once "model/user.php";
    require_once "model/transaction.php";
?>
<?php
    class ManagerController{
        protected $db;
        protected $id;

        protected $sum = 0;

        public function __construct(){
            $this->db = new MySQLDB("localhost","root","","scooterrent");
            session_start();
            $this->id = $_SESSION['id'];
        }

        public function view_manager(){
            $scooter_query = "SELECT ScooterID FROM scooter";
            $count = count($this->db->executeSelectQuery("SELECT ScooterID FROM scooter"));
            $role = "manager";
            $recent = $this->getRecent();
            if($_SESSION['user'] != "Manager"){
                header('Location: index');
            }
            else{
                return View::createView("managerpage.php",[
                    "role" => $role,
                    "id" => $this->id,
                    "recent" => $recent,
                    "count" => $count,
                ]);
            }
        }

        public function getRecent(){
            $query = "SELECT * FROM recent ORDER BY Time DESC LIMIT 5";
            $query_result = $this->db->executeSelectQuery($query);
            $result = [];
            foreach ($query_result as $key => $value) {
                $result[] = new Recent($value['RecentID'], $value['Berita'], $value['BeritaID'], $value['Time']);
            }
            return $result;
        }

        public function showScooter(){
            if(isset($_GET['id']) && $_GET['id'] != ""){
                $ScooterID = $_GET['id'];
                $query = "SELECT ScooterID, Warna, Harga, count(TransactionID) as Jumlah FROM scooter LEFT OUTER JOIN transaksi ON scooter.ScooterID = transaksi.ScooterID_fk 
                          WHERE ScooterID = $ScooterID
                          GROUP BY ScooterID";
                $result = $this->db->executeSelectQuery($query);
                echo SubView::createView("scooterview.php",[
                    "id" => $result[0]['ScooterID'],
                    "warna" => $result[0]['Warna'],
                    "harga" => $result[0]['Harga'],
                    "jumlah" => $result[0]['Jumlah']
                ]);
            }
            else{
                echo "";
            }
        }

        public function showStats(){
            if(isset($_GET['stats']) && $_GET['stats'] != ""){
                if($_GET['stats'] == "scooter"){
                    $query = "SELECT ScooterID, Warna, Harga, count(TransactionID) as Jumlah FROM scooter INNER JOIN transaksi ON scooter.ScooterID = transaksi.ScooterID_fk 
                              WHERE MONTH(RentTime) = MONTH(CURRENT_DATE()) AND YEAR(RentTime) = YEAR(CURRENT_DATE())
                              GROUP BY ScooterID 
                              ORDER BY Jumlah DESC 
                              LIMIT 5";
                    $result = $this->db->executeSelectQuery($query);
                    $col1 = "ScooterID";
                    $col2 = "Warna";
                    $col3 = "Harga";
                    echo SubView::createView("statsview.php",[
                        "result" => $result,
                        "col1" => $col1,
                        "col2" => $col2,
                        "col3" => $col3
                    ]);
                }
                else if($_GET['stats'] == "penyewa"){
                    $query = "SELECT Nama, NoKTP, NamaKel, count(TransactionID) as Jumlah FROM penyewa INNER JOIN transaksi ON penyewa.NoKTP = transaksi.NoKTP_fk
                              INNER JOIN kelurahan ON penyewa.idKelurahan_fk = kelurahan.idKelurahan
                              WHERE MONTH(RentTime) = MONTH(CURRENT_DATE()) AND YEAR(RentTime) = YEAR(CURRENT_DATE()) 
                              GROUP BY NoKTP 
                              ORDER BY Jumlah DESC 
                              LIMIT 5";
                    $result = $this->db->executeSelectQuery($query);
                    $col1 = "Nama";
                    $col2 = "NoKTP";
                    $col3 = "NamaKel";
                    echo SubView::createView("statsview.php",[
                        "result" => $result,
                        "col1" => $col1,
                        "col2" => $col2,
                        "col3" => $col3
                    ]);
                }
                else if($_GET['stats'] == "kelurahan"){
                    $query = "SELECT idKelurahan, NamaKel, NamaKec, count(TransactionID) as Jumlah FROM penyewa INNER JOIN kelurahan ON penyewa.idKelurahan_fk = kelurahan.idKelurahan 
                              INNER JOIN Kecamatan ON kecamatan.idKecamatan = kelurahan.idKecamatan_fk
                              INNER JOIN transaksi ON penyewa.NoKTP = transaksi.NoKTP_fk 
                              WHERE MONTH(RentTime) = MONTH(CURRENT_DATE()) AND YEAR(RentTime) = YEAR(CURRENT_DATE())
                              GROUP BY idKelurahan 
                              ORDER BY Jumlah DESC 
                              LIMIT 5";
                    $result = $this->db->executeSelectQuery($query);
                    $col1 = "idKelurahan";
                    $col2 = "NamaKel";
                    $col3 = "NamaKec";
                    echo SubView::createView("statsview.php",[
                        "result" => $result,
                        "col1" => $col1,
                        "col2" => $col2,
                        "col3" => $col3
                    ]);          
                }
            }
        }

        public function showTransaction(){
            $result = $this->getTransaction('','','','');
            echo SubView::createView("transactionlist.php",[
                "result" => $result,
                "sum" => $this->sum
            ]);
        }

        public function filterTransaction(){
            $month = $_GET['month'];
            $nama = $_GET['nama'];
            $kelurahan = $_GET['kelurahan'];
            $scooterID = $_GET['id'];
            $result = $this->getTransaction($month, $nama, $kelurahan, $scooterID);
            echo SubView::createView("transactiontable.php",[
                "result" => $result,
                "sum" => $this->sum
            ]);
        }

        public function getTransaction($month, $nama, $kelurahan, $scooterID){
            $query = "SELECT * FROM penyewa INNER JOIN transaksi ON penyewa.NoKTP = transaksi.NoKTP_fk INNER JOIN kelurahan ON penyewa.idKelurahan_fk = kelurahan.idKelurahan WHERE ReturnTime != '' AND YEAR(RentTime) = YEAR(CURRENT_DATE())";
            if(isset($month) && $month != ''){
                $query .= " AND MONTH(RentTime) = $month";
            }
            if(isset($nama) && $nama != ''){
                $nama = $this->db->escapeString($nama);
                $query .= " AND Nama LIKE '%$nama%'";
            }
            if(isset($kelurahan) && $kelurahan != ''){
                $kelurahan = $this->db->escapeString($kelurahan);
                $query .= " AND NamaKel LIKE '%$kelurahan%'";
            }

            if(isset($scooterID) && $scooterID != ''){
                $query .= " AND ScooterID_fk = $scooterID";
            }
            $query .= " ORDER BY RentTime DESC";
            $querySum = "SELECT (sum(InitialPrice) + sum(AdditionalPrice)) as sumAll FROM ($query) as temp";
            $this->sum = $this->db->executeSelectQuery($querySum)[0]['sumAll'];
            $query_result = $this->db->executeSelectQuery($query);
            $result = [];
            foreach ($query_result as $key => $value) {
                $result[] = new Transaction($value['TransactionID'], $value['UserID_fk'], $value['ScooterID_fk'], $value['NoKTP'], $value['Nama'], $value['NamaKel'], $value['RentTime'], 
                                            $value['InitialPrice'], $value['ReturnTime'], $value['AdditionalPrice']);
            }
            return $result;
        }
    }
?>