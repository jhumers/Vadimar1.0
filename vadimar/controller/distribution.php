<?php 

	class distribution extends controller{
		public function __construct()
		{
			parent::__construct();
			session_start();
			session_regenerate_id(true);
			if(empty($_SESSION['login']))
			{
				header('Location: '.base_url().'/login');
			}
			/*getPermisos(1);*/
		}

		public function distribution()
		{
			$data['page_id'] = 4;
			$data['page_tag'] = "Distribution";
			$data['page_title'] = "Distribution - Tienda Virtual";
			$data['page_name'] = "distribution";
			$data['page_description'] = "description page description";
			$data['page_function_js'] = "function_distribution.js";
			$this->view->getView($this,"distribution",$data);
		}

		public function searchDriver(){

			//dep($_POST); 
			if($_POST){
				$strDriver = $_POST['driverTerm'];
				$requestDriver = $this->model->searchDriverTerm($strDriver);
				$arrResponse = array();

				foreach($requestDriver as $driver){
					$arrResponse[] = array(
						"id" => $driver["VP_Licence"],
						"name" => $driver["VP_Driver"]
					);
				}

				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
				die();
			}else{
				$requestDriver = $this->model->searchDriver();
				$arrResponse = array();

				foreach($requestDriver as $driver){
					$arrResponse[] = array(
						"id" => $driver["VP_Licence"],
						"name" => $driver["VP_Driver"]
					);
				}
				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
				die();
			}

		}

		public function searchTransport(){

			//dep($_POST);
			if($_POST){
				$strTransport = $_POST['transTerm'];
				$requestTransport = $this->model->searchTransportTerm($strTransport);
				$arrResponse = array();

				foreach($requestTransport as $transport){
					$arrResponse[] = array(
						"id" => $transport["U_BPP_VEPL"],
						"name" => $transport["VP_CAR"]
					);
				}
				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
				die();
			}else{
				$requestTransport = $this->model->searchTransport();
				$arrResponse = array();

				foreach($requestTransport as $transport){
					$arrResponse[] = array(
						"id" => $transport["U_BPP_VEPL"],
						"name" => $transport["VP_CAR"]
					);
				}
				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
				die();
			}
		}

		public function searchPerson(){

			//dep($_POST);
			if($_POST){
				$strPerson = $_POST['persTerm'];
				$requestPerson = $this->model->searchPersonTerm($strPerson);
				$arrResponse = array();

				foreach($requestPerson as $person){
					$arrResponse[] = array(
						"id" => $person["Code"],
						"name" => $person["VP_Name"]
					);
				}
				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
				die();
			}else{
				$requestPerson = $this->model->searchPerson();
				$arrResponse = array();

				foreach($requestPerson as $person){
					$arrResponse[] = array(
						"id" => $person["Code"],
						"name" => $person["VP_Name"]
					);
				}
				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
				die();
			}
		}

		public function searchBusiness(){

			//dep($_POST);
			if($_POST){
				$strBusiness = $_POST['busiTerm'];
				$requestBusiness = $this->model->searchBusinessTerm($strBusiness);
				$arrResponse = array();

				foreach($requestBusiness as $business){
					$arrResponse[] = array(
						"id" => $business["CardCode"],
						"name" => $business["VP_CCName"],
						"desc" => $business["CardFName"]
					);
				}
				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
				die();
			}else{
				$requestBusiness = $this->model->searchBusiness();
				$arrResponse = array();

				foreach($requestBusiness as $business){
					$arrResponse[] = array(
						"id" => $business["CardCode"],
						"name" => $business["VP_CCName"],
						"desc" => $business["CardFName"]
					);
				}
				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
				die();
			}
		}

		public function searchRoute(){

			//dep($_POST);
			if($_POST){
				$strDate= $_POST['dateTerm'];
				$strLicDriver = $_POST['licdrivTerm'];
				$strPlaTransport = $_POST['platransTerm'];
				$requestBusiness = $this->model->searchRouteTerm($strDate, $strLicDriver, $strPlaTransport);
				$arrResponse = array();

				foreach($requestBusiness as $business){
					$arrResponse[] = array(
						"id" => $business["U_NumRuta"],
						"name" => $business["U_Estado"]
					);
				}
				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
				die();
			}else{
				echo 'nada';
			}
		}

		public function searchAddress(){
			//dep($_POST); 
			if($_POST){
				if(count($_POST) == 2){
					$strAddress = $_POST['addrTerm'];
					$strCodBuss = $_POST['codbussTerm'];
					$requestAddress = $this->model->searchAddressTerm($strCodBuss, $strAddress);
					$arrResponse = array();

					foreach($requestAddress as $address){
						$arrResponse[] = array(
							"id" => $address["VPCCADDR"],
							"name" => $address["VP_ADDR"],
							"desc" => $address["VP_DISTR"]
						);
					}
					echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
					die();
				}else{
					$strCodBuss = $_POST['codbussTerm'];
					$requestAddress = $this->model->searchAddress($strCodBuss);
					$arrResponse = array();

					foreach($requestAddress as $address){
						$arrResponse[] = array(
							"id" => $address["VPCCADDR"],
							"name" => $address["VP_ADDR"],
							"desc" => $address["VP_DISTR"]
						);
					}
					echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
					die();
				}
			}else{
				"data required";
			}

		}

		public function searchDistrict(){

			//dep($_POST);
			if($_POST){
				$strDistrict = $_POST['distTerm'];
				$requestDistrict = $this->model->searchDistrictTerm($strDistrict);
				$arrResponse = array();

				foreach($requestDistrict as $district){
					$arrResponse[] = array(
						"id" => $district["Name"],
					);
				}
				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
				die();
			}else{
				$requestDistrict = $this->model->searchDistrict();
				$arrResponse = array();

				foreach($requestDistrict as $district){
					$arrResponse[] = array(
						"id" => $district["Name"],
					);
				}
				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
				die();
			}
		}
	}