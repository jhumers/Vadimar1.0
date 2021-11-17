<?php

    const BASE_URL = "http://localhost/vadimar/vadimar";
	/*const BASE_URL = "http://192.168.10.37/vadimar/vadimar";*/

    //Zona horaria
	date_default_timezone_set('America/Lima');

    //Datos de conexión a Base de Datos
	const DB_HOST = "SERVERSAP";
	const DB_NAME = "zDistribucion";
	const DB_USER = "Sandro";
	const DB_PASSWORD = "Alpaja.1";
	const DB_CHARSET = "utf8";

    //Deliminadores decimal y millar Ej. 24,1989.00
    const SPD = ".";
    const SPM = ",";

    //Simbolo de moneda
	const SMONEY = "S/";

    //Datos envio de correo
	const NAME_SENDER = "Vadimar";
	const EMAIL_SENDER = "informes@vadimarperu.com";
	const NAME_COMPANY = "VADIMAR";
	const WEB_COMPANY = "http://www.vadimarperu.com/";