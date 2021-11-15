<?php 

	class gestor extends controller{
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

		public function gestor()
		{
			$data['page_id'] = 4;
			$data['page_tag'] = "Gestor";
			$data['page_title'] = "gestor - Tienda Virtual";
			$data['page_name'] = "gestor";
			$data['page_description'] = "gestor site analytych";
			$data['page_function_js'] = "function_gestor.js";
			$this->view->getView($this,"gestor",$data);
		}

	}