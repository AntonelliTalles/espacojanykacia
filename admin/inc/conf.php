<?php

require_once 'classes/FileLoad.class.php';
/*

 * CMS SiteAdmin

 * Copyright (c) 2012-2013 Arco Informática (http://arcoinformatica.com.br)

 * 

 * @version: 3.0.1 (22/01/2013)

 */





//$MySQLi = new mysqli('localhost', 'oabserra_banco', '1t@81r@', 'oabserra_banco');
$MySQLi = new mysqli('localhost', 'root', '', 'oabserra_banco');





  if (mysqli_connect_errno()) {

	  die('Não foi possível conectar-se ao banco de dados: ' . mysqli_connect_error());

	  exit();

  }

$load = new FileLoad;

$load->version = '1.32';
  

$MySQLi->set_charset('utf8');



require_once 'info.php';

require_once 'functions.php';

require_once 'SiteAdmin.class.php';

require_once 'SiteAdminURL.class.php';

$SiteAdmin = new SiteAdmin();