<?php 

	class dashboard extends controller{
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

		public function dashboard()
		{
			$data['page_id'] = 2;
			$data['page_tag'] = "Dashboard";
			$data['page_title'] = "Dashboard - Tienda Virtual";
			$data['page_name'] = "dashboard";
			$data['page_description'] = "dashboard site analytych";
			$data['page_function_js'] = "function_dashboard.js";
			$this->view->getView($this,"dashboard",$data);
		}

	}