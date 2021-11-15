<?php 
	
	class controller{
		public function __construct()
		{
			$this->view = new view();
			$this->loadModel();
		}

		public function loadModel()
		{
			//HomeModel.php
			$model = get_class($this)."Model";
			$routClass = "model/".$model.".php";
			if(file_exists($routClass)){
				require_once($routClass);
				$this->model = new $model();
			}
		}
	}