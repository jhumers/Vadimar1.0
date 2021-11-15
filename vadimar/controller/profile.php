<?php 

	class profile extends controller{
		public function __construct(){
			parent::__construct();
            session_start();
            session_regenerate_id(true);
            if(empty($_SESSION['login']))
			{
				header('Location: '.base_url().'/login');
			}
			/*getPermisos(2);*/
		}

		public function profile(){
			$data['page_id'] = 3;
			$data['page_tag'] = "Profile";
			$data['page_title'] = "Perfil";
			$data['page_name'] = "profile";
			$data['page_content'] = "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et, quis. Perspiciatis repellat perferendis accusamus, ea natus id omnis, ratione alias quo dolore tempore dicta cum aliquid corrupti enim deserunt voluptas.";
			$data['page_function_js'] = "function_profile.js";
			$this->view->getView($this,"profile",$data);
		}
	}