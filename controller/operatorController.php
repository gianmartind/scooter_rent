<?php
    require_once "controller/services/mysqlDB.php";
    require_once "controller/services/view.php";
    require_once "controller/services/subview.php";
    require_once "model/scooter.php";
?>
<?php
    class OperatorController{
        protected $db;
        protected $id;

        public function __construct(){
            $this->db = new MySQLDB("localhost","root","","scooterrent");
            session_start();
            $this->id = $_SESSION['id'];
        }

        public function view_operator(){
            //Get filter
            $sort = "ScooterID";
            $hargaMin = 0;
            $hargaMax = 100000;
            $warna = "";
            if(isset($_GET['min']) && $_GET['min'] != ''){
                $hargaMin = $_GET['min'];
            }
            if(isset($_GET['max']) && $_GET['max'] != ''){
                $hargaMax = $_GET['max'];
            }
            if(isset($_GET['warna'])){
                $warna = $_GET['warna'];
            }
            if(isset($_GET['sort']) && $_GET['sort'] != ''){
                $sort = $_GET['sort'];
            }
            //----------
            //Pagination
            $start = 0;
            if(isset($_GET['start'])){
                $start = $_GET['start'];
            }
            //----------
            $show = 10;
            //To calculate total entries
            $temp = $this->getAllScooter($hargaMin, $hargaMax, $warna, 0, 1999999999, "ScooterID");
            $pageCount = ceil(count($temp)/$show);      
            //--------------------------
            $scooterlist = $this->getAllScooter($hargaMin, $hargaMax, $warna, $start, $show, $sort);
            $role = "operator";
            if($_SESSION['user'] != "Operator"){
                header('Location: index');
            }
            else{
                return View::createView('operatorpage.php',
                [
                    "role"=> $role,
                    "id" => $this->id,
                    "scooterlist"=> $scooterlist,
                    "hargaMin" => $hargaMin,
                    "hargaMax" => $hargaMax,
                    "warna" => $warna,
                    "pageCount" => $pageCount,
                    "sort" => $sort
                ]);
            }
            
        }

        public function view_rent(){
            $ScooterID = $_GET['ScooterID'];
            $result = $this->db->executeSelectQuery("SELECT * FROM Scooter WHERE ScooterID = $ScooterID");
            $list = $this->db->executeSelectQuery("SELECT * FROM penyewa");
            $role = "rent";
            return View::createView('rentpage.php',[
                "id" => $this->id,
                "role" => $role,
                "result" => $result[0],
                "list" => $list
            ]);
        }
        
        public function rent_confirm(){
            $idOp = $_POST['idOp'];
            $ScooterID = $_POST['id'];
            $harga = $_POST['harga'];
            $noktp = $_POST['noktp'];
            $nama = $_POST['nama'];
            $idkel = $_POST['kelurahan'];
            date_default_timezone_set("Asia/Bangkok");
            $rentTime = date('Y-m-d H:i:s');
            $this->db->executeNonSelectQuery("INSERT INTO penyewa VALUES ($noktp, '$nama', $idkel)");

            return SubView::createView('rentconfirm.php',[
                "idOp" => $idOp,
                "ScooterID" => $ScooterID,
                "hargaAwal" => $harga,
                "noktp" => $noktp,
                "nama" => $nama,
                "idKel" => $idkel,
                "rentTime" => $rentTime
            ]);
        }

        public function scooterRent(){
            $idOp = $_POST['idOp'];
            $ScooterID = $_POST['ScooterID'];
            $harga = $_POST['hargaAwal'];
            $noktp = $_POST['noktp'];
            $nama = $_POST['nama'];
            $rentTime = $_POST['rentTime'];
            $idTime = strtotime($rentTime);
            $query = "INSERT INTO transaksi VALUES($idTime , $idOp, $ScooterID, $noktp, '$rentTime', $harga, '', '')";
            $this->db->executeNonSelectQuery($query);
        }

        public function view_return(){
            $ScooterID = $_GET['ScooterID'];
            date_default_timezone_set("Asia/Bangkok");
            $returnTime = date('Y-m-d H:i:s');
            $queryResult = "SELECT * FROM transaksi INNER JOIN penyewa ON transaksi.NoKTP_fk = penyewa.NoKTP 
                            INNER JOIN kelurahan ON penyewa.idKelurahan_fk = kelurahan.idKelurahan
                            WHERE ScooterID_fk = $ScooterID AND ReturnTime = ''";
            $result = $this->db->executeSelectQuery($queryResult);
            //function to find hours difference
            $date1 = new DateTime($returnTime);
            $date2 = new DateTime($result[0]['RentTime']);
            $diff = $date1->diff($date2); 
            $hours = $diff->h;
            //--------------------------------
            $additionalPrice = 0;
            if(ceil($hours > 1)){
                $additionalPrice = (ceil($hours) - 1) * $result[0]['InitialPrice'];
            }    
            return SubView::createView('returnconfirm.php',[
                "idOp" => $result[0]['UserID_fk'],
                "ScooterID" => $result[0]['ScooterID_fk'],
                "noktp" => $result[0]['NoKTP_fk'],
                "nama" => $result[0]['Nama'],
                "kel" => $result[0]['NamaKel'],
                "rentTime" => $result[0]['RentTime'],
                "hargaAwal" => $result[0]['InitialPrice'],
                "returnTime" => $returnTime,
                "hargaTambahan" => $additionalPrice
            ]);
        }

        public function scooterReturn(){
            $ScooterID = $_POST['ScooterID'];
            $returnTime = $_POST['returnTime'];
            $additionalPrice = $_POST['hargaTambahan'];
            $query = "UPDATE transaksi SET ReturnTime = '$returnTime', AdditionalPrice = $additionalPrice WHERE ScooterID_fk = $ScooterID AND ReturnTime = ''";
            $this->db->executeNonSelectQuery($query);
            
        }

        public function getAllScooter($hargaMin, $hargaMax, $warna, $start, $show, $sort){
            $query = "SELECT * FROM scooter LEFT OUTER JOIN (SELECT * FROM transaksi WHERE ReturnTime = '') as rentTemp ON scooter.ScooterID = rentTemp.ScooterID_fk";
            $query .= " WHERE Harga > $hargaMin AND Harga < $hargaMax AND Warna LIKE '%$warna%'";
            $query .= " ORDER BY $sort";
            $query .= " LIMIT $start,$show";
            
            $query_result = $this->db->executeSelectQuery($query);
            $result = [];
            foreach ($query_result as $key => $value) {
                $result[] = new Scooter($value['ScooterID'], $value['Warna'], $value['Harga'], $value['RentTime']);
            }
            return $result;
        }
    }
?>