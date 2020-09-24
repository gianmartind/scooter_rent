<?php
    require_once "controller/services/mysqlDB.php";
    require_once "controller/services/view.php";
    require_once "controller/services/filehandler.php";
    require_once "model/user.php";
    require_once "model/scooter.php";
?>

<?php
    class AdminController{
        protected $db;
        protected $id;

        public function __construct(){
            $this->db = new MySQLDB("localhost","root","","scooterrent");
            session_start();
            $this->id = $_SESSION['id'];
        }

        public function view_admin(){
            $scooterlist = $this->getAllScooter();
            $userlist = $this->getAllUser();
            $role = "admin";
            if($_SESSION['user'] != "Admin"){
                header('Location: index');
            }
            else{
                return View::createView('adminpage.php',
                [   
                    "id" => $this->id,
                    "role"=> $role,
                    "scooterlist"=> $scooterlist,
                    "userlist"=> $userlist
                ]);
            }  
        }

        public function getAllScooter(){
            $query = "SELECT * FROM Scooter";
            $query_result = $this->db->executeSelectQuery($query);
            $result = [];
            foreach ($query_result as $key => $value) {
                $result[] = new Scooter($value['ScooterID'], $value['Warna'], $value['Harga'], "");
            }
            return $result;
        }

        public function addNewScooter(){
            $ScooterID = $_POST['sID'];
            $Warna = $_POST['swarna'];
            $Harga = $_POST['sharga'];
            date_default_timezone_set("Asia/Bangkok");
            $date = date("Y-m-d H:i:s");
            $query = "INSERT INTO scooter VALUES('$ScooterID', '$Warna', '$Harga')";
            $this->db->executeNonSelectQuery($query);
            $this->db->executeNonSelectQuery("INSERT INTO recent VALUES('', 'Add New Scooter', '$ScooterID', '$date')");
            FileHandler::upload($ScooterID);
        }

        public function deleteScooter(){
            $id = $_GET['ScooterID'];
            date_default_timezone_set("Asia/Bangkok");
            $date = date("Y-m-d H:i:s");
            $query  = "DELETE FROM scooter WHERE ScooterID = $id";
            $this->db->executeNonSelectQuery($query);
            $this->db->executeNonSelectQuery("INSERT INTO recent VALUES('', 'Delete Scooter', '$id', '$date')");
        }

        public function updateScooter(){
            $id = $_POST['textID'];
            $warna = $_POST['Nswarna'];
            $harga = $_POST['Nsharga'];
            if(isset($warna) && $warna != ''){
                $this->db->executeNonSelectQuery("UPDATE scooter SET Warna = '$warna' WHERE ScooterID = $id");
            }
            if(isset($harga) && $harga != ''){
                $this->db->executeNonSelectQuery("UPDATE scooter SET Harga = $harga WHERE ScooterID = $id");
            }
            if(isset($_FILES['file'])){
                FileHandler::upload($id);
            }
        }

        public function addNewUser(){
            $UserID = $_POST['uID'];
            $Password = $_POST['upassword'];
            $Type = $_POST['utype'];
            date_default_timezone_set("Asia/Bangkok");
            $date = date("Y-m-d H:i:s");
            $query = "INSERT INTO user VALUES('$UserID', '$Password', '$Type')";
            $this->db->executeNonSelectQuery($query);
            $this->db->executeNonSelectQuery("INSERT INTO recent VALUES('', 'Add New User', '$UserID', '$date')");
        }

        public function deleteUser(){
            $id = $_GET['UserID'];
            $query  = "DELETE FROM user WHERE UserID = $id";
            date_default_timezone_set("Asia/Bangkok");
            $date = date("Y-m-d H:i:s");
            $this->db->executeNonSelectQuery($query);
            $this->db->executeNonSelectQuery("INSERT INTO recent VALUES('', 'Delete User', '$id', '$date')");
        }

        public function updateUser(){
            $id = $_POST['textID'];
            $pass = $_POST['Nupass'];
            $type = $_POST['Nutype'];
            if(isset($pass) && $pass != ''){
                $this->db->executeNonSelectQuery("UPDATE user SET Password = '$pass' WHERE UserID = $id");
            }
            if(isset($type) && $type != ''){
                $this->db->executeNonSelectQuery("UPDATE user SET Type = '$type' WHERE UserID = $id");
            }
        }

        public function getAllUser(){
            $query = "SELECT * FROM User";
            $query_result = $this->db->executeSelectQuery($query);
            $result = [];
            foreach ($query_result as $key => $value) {
                $result[] = new User($value['UserID'], $value['Password'], $value['Type']);
            }
            return $result;
        }
    }
?>