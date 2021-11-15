<?php 

    class login extends controller
    {
        public function __construct()
        {
            session_start();
            if (isset($_SESSION['login'])) {
                header('Location: '.base_url().'/dashboard');
            }
            parent::__construct();
        }

        public function login()
        {
            $data['page_tag'] = "Login - Vadimar";
            $data['page_title'] = "Login";
            $data['page_name'] = "login";
            $data['page_function_js'] = "function_login.js";
            $this->view->getView($this, "login", $data);
        }

        public function loginUser(){
			//dep($_POST);
			if($_POST){
				if(empty($_POST['txtEmail']) || empty($_POST['txtPassword'])){
					$arrResponse = array('status' => false, 'msg' => 'Error de datos' );
				}else{
					$strUser  =  strtolower(strClean($_POST['txtEmail']));
					$strPass = $_POST['txtPassword'];
					$requestUser = $this->model->loginUser($strUser, $strPass);
					if(empty($requestUser)){
						$arrResponse = array('status' => false, 'msg' => 'El usuario o la contraseña es incorrecto.' ); 
					}else{
						$arrData = $requestUser;
						if($arrData['U_Estado'] == 1){
							$_SESSION['idUser'] = $arrData['Code'];
							$_SESSION['login'] = true;

							$arrData = $this->model->sessionLogin($_SESSION['idUser']);
							sessionUser($_SESSION['idUser']);							
							$arrResponse = array('status' => true, 'msg' => 'ok');
						}else{
							$arrResponse = array('status' => false, 'msg' => 'Usuario inactivo.');
						}
					}
				}
				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
			}
			die();
		}
    }