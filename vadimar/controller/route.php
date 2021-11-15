<?php 

	class route extends controller{
		public function __construct(){
			parent::__construct();
            session_start();
            if(empty($_SESSION['login']))
			{
				header('Location: '.base_url().'/login');
			}
			/*getPermisos(2);*/
		}

		public function route(){
			$data['page_id'] = 9;
			$data['page_tag'] = "Route";
			$data['page_title'] = "Ruta";
			$data['page_name'] = "route";
            $data['page_description'] = "description page description";
			$data['page_content'] = "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et, quis. Perspiciatis repellat perferendis accusamus, ea natus id omnis, ratione alias quo dolore tempore dicta cum aliquid corrupti enim deserunt voluptas.";
			$data['page_function_js'] = "function_route.js";
			$this->view->getView($this,"route",$data);
		}

        public function searchRoute(){
            //dep($_POST);
			if($_POST){
				$strDate = $_POST['dateTerm'];
				$strLicDriver = $_POST['licTerm'];
				$requestRoute = $this->model->searchRoute($strDate, $strLicDriver);
				$arrResponse = array();

				foreach($requestRoute as $route){
					$arrResponse[] = array(
						"id" => $route["DocEntry"],
						"lineid" => $route["LineId"],
						"numroute" => $route["U_NumRuta"],
						"order" => $route["U_Orden"],
						"peso" => $route["U_PesoPorDoc"],
						"razsocial" => $route["U_RazSocial"],
						"nomcom" => $route["U_NombComerc"],
						"dirent" => $route["U_DirEntrega"],
						"dist" => $route["U_Distrito"]
					);
				}
				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
				die();
			}else{
				
			}
        }

		public function updateorderRoute(){
			if($_POST){
				if(empty($_POST['lineid'] || empty($_POST['docentry'] || empty($_POST['orderset'])))){

				}else{
					$strLineId = intval($_POST['lineid']);
					$strDocEnt = intval($_POST['docentry']);
					$strOrder = intval($_POST['orderset']);

					$this->model->updateorderRoute($strLineId, $strDocEnt, $strOrder);
					echo 'update correcto';
				}
			}
			die();
		}
	}