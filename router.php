<?php
	$url = $_SERVER['REDIRECT_URL'];
	$baseURL = '/SCOOTERRENT';

	if ($_SERVER["REQUEST_METHOD"] == "GET") {
		switch ($url) {
			case $baseURL."/index":
				require_once "controller/indexController.php";
				$userCtrl = new IndexController();
				$userCtrl->view_index();
			break;
			case $baseURL."/index/logout":
				require_once "controller/indexController.php";
				$userCtrl = new IndexController();
				$userCtrl->logout();
				header('Location: ../index');
			break;
			case strpos($url, $baseURL."/index/check"):
				require_once "controller/indexController.php";
				$userCtrl = new IndexController();
				$userCtrl->inputCheck();
			break;
			case $baseURL."/admin":
				require_once "controller/adminController.php";
				$userCtrl = new AdminController();
				echo $userCtrl->view_admin();
			break;
			case strpos($url,$baseURL.'/DeleteScooter'):
				require_once "controller/adminController.php";
				$userCtrl = new AdminController();
				$userCtrl->deleteScooter();
				header('Location: admin');
			break;
			case strpos($url,$baseURL.'/DeleteUser'):
				require_once "controller/adminController.php";
				$userCtrl = new AdminController();
				$userCtrl->deleteUser();
				header('Location: admin');
			break;
			case strpos($url, $baseURL."/operator"):
				require_once "controller/operatorController.php";
				$userCtrl = new OperatorController();
				echo $userCtrl->view_operator();
			break;
			case strpos($url, $baseURL."/rent"):
				require_once "controller/operatorController.php";
				$userCtrl = new OperatorController();
				echo $userCtrl->view_rent();
			break;
			case strpos($url, $baseURL."/return"):
				require_once "controller/operatorController.php";
				$userCtrl = new OperatorController();
				echo $userCtrl->view_return();
			break;
			case $baseURL."/manager":
				require_once "controller/managerController.php";
				$userCtrl = new ManagerController();
				echo $userCtrl->view_manager();
			break;
			case strpos($url, $baseURL."/showScooter"):
				require_once "controller/managerController.php";
				$userCtrl = new ManagerController();
				$userCtrl->showScooter();
			break;
			case strpos($url, $baseURL."/showStats"):
				require_once "controller/managerController.php";
				$userCtrl = new ManagerController();
				$userCtrl->showStats();
			break;
			case strpos($url, $baseURL."/transactionList"):
				require_once "controller/managerController.php";
				$userCtrl = new ManagerController();
				$userCtrl->showTransaction();
			break;
			case strpos($url, $baseURL."/showFiltered"):
				require_once "controller/managerController.php";
				$userCtrl = new ManagerController();
				$userCtrl->filterTransaction();
			break;
			default:
				echo '404 Not Found';
			break;
		}
	}else if($_SERVER["REQUEST_METHOD"] == "POST"){
		switch ($url) {
			case $baseURL."/login":
				require_once "controller/indexController.php";
				$userCtrl = new indexController();
				$userCtrl->login();
				header('Location: index');
			break;
			case $baseURL."/admin/addScooter":
				require_once "controller/adminController.php";
				$userCtrl = new AdminController();
				echo $userCtrl->addNewScooter();
				header('Location: ../admin');
			break;
			case $baseURL."/admin/addUser":
				require_once "controller/adminController.php";
				$userCtrl = new AdminController();
				echo $userCtrl->addNewUser();
				header('Location: ../admin');
			break;
			case $baseURL."/admin/updateScooter":
				require_once "controller/adminController.php";
				$userCtrl = new AdminController();
				echo $userCtrl->updateScooter();
				header('Location: ../admin');
			break;
			case $baseURL."/admin/updateUser":
				require_once "controller/adminController.php";
				$userCtrl = new AdminController();
				echo $userCtrl->updateUser();
				header('Location: ../admin');
			break;
			case $baseURL."/rentConfirm":
				require_once "controller/operatorController.php";
				$userCtrl = new OperatorController();
				echo $userCtrl->rent_confirm();
			break;
			case $baseURL."/scooterRent":
				require_once "controller/operatorController.php";
				$userCtrl = new OperatorController();
				echo $userCtrl->scooterRent();
				header('Location: operator');
			break;
			case $baseURL."/scooterReturn":
				require_once "controller/operatorController.php";
				$userCtrl = new OperatorController();
				echo $userCtrl->scooterReturn();
				header('Location: operator');
			break;
			default:
				echo '404 Not Found';
				break;
		}
	}
		
?>