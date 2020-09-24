<?php
    require_once "controller/services/subview.php";
    require_once "controller/services/mysqlDB.php";
?>
<?php
    class IndexController{
        protected $db;

        public function __construct(){
            $this->db = new MySQLDB("localhost","root","","scooterrent");
        }

        public function view_index(){
            session_start();
            if(isset($_SESSION['user'])){
                if($_SESSION['user'] == "Admin"){
                    header('Location: admin');
                }
                else if($_SESSION['user'] == "Operator"){
                    header('Location: operator');
                }
                else if($_SESSION['user'] == "Manager"){
                    header('Location: manager');
                }
            }
            else{
                echo SubView::createView("index.php",[]);
            }
        }

        public function inputCheck(){
            if($_GET['id'] == '' || $_GET['password'] == ''){
                echo "<span style='color: red'>Insert ID and Password</span>";
            }
            else{
                $UserID = $_GET['id'];
                $Password = $_GET['password'];
                $result = $this->db->executeSelectQuery("SELECT * FROM user WHERE UserID = '$UserID' AND Password = '$Password'");
                if(isset($result[0]['UserID']) && $result[0]['UserID'] != ''){
                    echo "<span style='color: green'>Account found!</span>";
                }
                else{
                    echo "<span style='color:red'>Incorrect ID or Password!</span>";
                }
            } 
        }

        public function login(){
            $UserID = $_POST['id'];
            $Password = $_POST['password'];
            $result = $this->db->executeSelectQuery("SELECT * FROM user WHERE UserID = '$UserID' AND Password = '$Password'");
            if(isset($result[0]['UserID']) && $result[0]['UserID'] != ''){
                session_start();
                $_SESSION['user'] = $result[0]['Type'];
                $_SESSION['id'] = $result[0]['UserID'];
            }
        }

        public function logout(){
            session_start();
            unset($_SESSION['user']);
            unset($_SESSION['id']);
        }
    }
?>