<?php 

    class distributionModel extends sql
    {
        private $intIdDriver;
        private $strDriver;

        public function __construct()
        {
            parent::__construct();
        }

        public function searchDriver()
        {
            $sql = "SELECT VP_Licence, U_Nombres + ' ' + U_Apellidos AS VP_Driver FROM (SELECT U_LicMoto AS VP_Licence, U_Nombres, U_Apellidos FROM [@VP_DST4]
            WHERE U_LicMoto IS NOT NULL AND U_Estado = 1 UNION SELECT U_LicCarro AS VP_Licence, U_Nombres, U_Apellidos FROM [@VP_DST4] WHERE U_LicCarro IS NOT NULL AND U_Estado = 1) ST";
            $request = $this->select_all($sql);
            return $request;
        }

        public function searchDriverTerm($strDriver)
        {
            $this->strDriver = $strDriver;
            $sql = "SELECT VP_Licence, U_Nombres + ' ' + U_Apellidos AS VP_Driver FROM (SELECT U_LicMoto AS VP_Licence, U_Nombres, U_Apellidos FROM [@VP_DST4]
            WHERE U_LicMoto IS NOT NULL AND U_Estado = 1 UNION SELECT U_LicCarro AS VP_Licence, U_Nombres, U_Apellidos FROM [@VP_DST4] WHERE U_LicCarro IS NOT NULL AND U_Estado = 1) ST
            WHERE VP_Licence + ' - ' + U_Nombres + ' ' + U_Apellidos LIKE '%".$this->strDriver."%'";
            $request = $this->select_all($sql);
            return $request;
        }

        public function searchTransport()
        {
            $sql = "SELECT U_BPP_VEPL, U_BPP_VEMA + ' - ' + U_BPP_VEMO + ' - ' + U_vp_Tipo AS VP_CAR FROM [@BPP_VEHICU] WHERE U_VP_Activo = 'Y' ORDER BY U_BPP_VEPL";
            $request = $this->select_all($sql);
            return $request;
        }

        public function searchTransportTerm($strTransport)
        {
            $this->strTransport = $strTransport;
            $sql = "SELECT U_BPP_VEPL, U_BPP_VEPL + ' - ' + U_BPP_VEMA + ' - ' + U_BPP_VEMO + ' - ' + U_vp_Tipo AS VP_CAR FROM [@BPP_VEHICU] WHERE U_BPP_VEPL + ' - ' + U_BPP_VEMA + ' - ' + U_BPP_VEMO + ' - ' + U_vp_Tipo LIKE '%".$this->strTransport."%' AND U_VP_Activo = 'Y' ORDER BY VP_CAR";
            $request = $this->select_all($sql);
            return $request;
        }

        public function searchPerson()
        {
            $sql = "SELECT Code, U_Nombres + ' ' + U_Apellidos AS VP_Name FROM [@VP_DST4] WHERE U_Estado = 1 ORDER BY VP_Name";
            $request = $this->select_all($sql);
            return $request;
        }

        public function searchPersonTerm($strPerson)
        {
            $this->strPerson = $strPerson;
            $sql = "SELECT Code, U_Nombres + ' ' + U_Apellidos AS VP_Name FROM [@VP_DST4] WHERE U_Nombres + ' ' + U_Apellidos LIKE '%".$this->strPerson."%' AND U_Estado = 1 ORDER BY VP_Name";
            $request = $this->select_all($sql);
            return $request;
        }

        public function searchBusiness()
        {
            $sql = "SELECT CardCode,CardName, CardName AS VP_CCName, CardFName FROM [OCRD] WHERE CardType = 'C' ORDER BY VP_CCName";
            $request = $this->select_all($sql);
            return $request;
        }

        public function searchBusinessTerm($strBusiness)
        {
            $this->strBusiness = $strBusiness;
            $sql = "SELECT CardCode,CardName,  CardName AS VP_CCName, CardFName FROM [OCRD] WHERE CardCode + ' - ' + CardName LIKE '%".$this->strBusiness."%' AND CardType = 'C' ORDER BY VP_CCName";
            $request = $this->select_all($sql);
            return $request;
        }

        public function searchRouteTerm($strDate, $strLicDriver, $strPlaTransport)
        {
            $this->strDate = $strDate;
            $this->strLicDriver = $strLicDriver;
            $this->strPlaTransport = $strPlaTransport;
            $sql = "SELECT U_NumRuta,U_Estado FROM [@VP_DST0] T0 INNER JOIN [@VP_DST2] T2 ON T0.[DocEntry]=T2.[DocEntry] WHERE U_licencia = '".$this->strLicDriver."' AND CONVERT(VARCHAR(10), U_FechaDespacho,23) = '".$this->strDate."' AND U_Placa = '".$this->strPlaTransport."'";
            $request = $this->select_all($sql);
            return $request;
        }

        public function searchAddress($strCodBuss)
        {
            $this->strCodBuss = $strCodBuss;
            $sql = "SELECT T1.[Address] AS VPCCADDR, T1.[Street] AS VP_ADDR, T1.[County] AS VP_DISTR FROM [OCRD] T0 INNER JOIN [CRD1] T1 ON T0.[CardCode] = T1.[CardCode] WHERE T0.[CardCode] = '".$this->strCodBuss."' AND T1.[AdresType] = 'S' ORDER BY VP_DISTR";
            $request = $this->select_all($sql);
            return $request;
        }

        public function searchAddressTerm($strCodBuss, $strAddress)
        {
            $this->strCodBuss = $strCodBuss;
            $this->strAddress = $strAddress;
            $sql = "SELECT T1.[Address] AS VPCCADDR, T1.[Street] AS VP_ADDR, T1.[County] AS VP_DISTR FROM [OCRD] T0 INNER JOIN [CRD1] T1 ON T0.[CardCode] = T1.[CardCode] WHERE T1.[Address] + ' ' + Street LIKE '%".$this->strAddress."%' AND T0.[CardCode] = '".$this->strCodBuss."' AND T1.[AdresType]='S'";
            $request = $this->select_all($sql);
            return $request;
        }

        public function searchDistrict()
        {
            $sql = "SELECT T0.Name FROM [@VK_DISTRI] T0 INNER JOIN [@VK_PROV] T1 ON T0.U_C_Provincia = T1.Code WHERE T1.Name = 'LIMA' ORDER BY T0.Name";
            $request = $this->select_all($sql);
            return $request;
        }

        public function searchDistrictTerm($strDistrict)
        {
            $this->strDistrict = $strDistrict;
            $sql = "SELECT T0.Name FROM [@VK_DISTRI] T0 INNER JOIN [@VK_PROV] T1 ON T0.U_C_Provincia = T1.Code WHERE T0.Name LIKE '%".$this->strDistrict."%' AND T1.Name = 'LIMA' ORDER BY T0.Name";
            $request = $this->select_all($sql);
            return $request;
        }
    }