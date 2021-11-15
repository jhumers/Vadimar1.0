<?php 

    class routeModel extends sql
    {
        private $strDate;
        private $strLicDriver;

        public function __construct()
        {
            parent::__construct();
        }

        public function searchRoute($strDate, $strLicDriver)
        {
            $this->strDate = $strDate;
            $this->strLicDriver = $strLicDriver;
            $sql = "DECLARE @ROUTE INTEGER
                    IF((SELECT ISNULL(MIN(U_NumRuta),0) FROM [@VP_DST1] where convert(varchar(10),U_Fecha,23) = '".$this->strDate."' AND U_licencia = '".$this->strLicDriver."' AND U_Estado <> 'F' AND U_Fecha IS NOT NULL) != 0)
                        BEGIN
                            SET @ROUTE = (select ISNULL(min(U_NumRuta),0) from [@VP_DST1] where convert(varchar(10),U_Fecha,23) = '".$this->strDate."' AND U_licencia = '".$this->strLicDriver."' AND U_Estado <> 'F' AND U_Fecha IS NOT NULL) 
                        END
	                SELECT DocEntry,LineId,U_NumRuta,U_Orden,U_PesoPorDoc, U_RazSocial, U_NombComerc, U_DirEntrega,U_Distrito FROM [@VP_DST1] where convert(varchar(10),U_Fecha,23) = '".$this->strDate."' AND U_licencia = '".$this->strLicDriver."' AND U_NumRuta = @ROUTE AND U_Estado <> 'F' AND U_Fecha IS NOT NULL ORDER BY U_Orden";
            $request = $this->select_all($sql);
            return $request;
        }

        public function updateorderRoute($strLineId, $strDocEnt, $strOrder)
        {
            $this->strLineId = $strLineId;
            $this->strDocEnt = $strDocEnt;
            $this->strOrder = $strOrder;
            $sql = "UPDATE [@VP_DST1] SET U_Orden = ? WHERE LineId = $this->strLineId AND DocEntry = $this->strDocEnt";
            $arrData = array($this->strOrder);
            $this->update($sql,$arrData);
        }
        /*
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
					);*/
   

    }




    
	
		
	
