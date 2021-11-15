<?php 

    class loginModel extends sql
    {
        private $intIdUsuario;
        private $strUsuario;
        private $strPassword;
        private $strToken;

        public function __construct()
        {
            parent::__construct();
        }

        public function loginUser(string $user, string $pass)
        {
            $this->strUser = $user;
            $this->strPass = $pass;
            $sql = "SELECT Code,U_Estado FROM [@VP_DST4] WHERE Code = '$this->strUser' AND U_contrasena = '$this->strPass' AND U_Estado != 0 ";
            $request = $this->select($sql);
            return $request;
        }

        public function sessionLogin(int $iduser){
			$this->intIdUser = $iduser;
			//BUSCAR ROLE 
			$sql = "SELECT Code, DocEntry, CreateDate, U_Nombres, U_Apellidos, U_LicMoto, U_LicCarro, U_Estado 
					FROM [@VP_DST4]
					WHERE Code = $this->intIdUser";
			$request = $this->select($sql);
			$_SESSION['userData'] = $request;
			return $request;
		}
    }