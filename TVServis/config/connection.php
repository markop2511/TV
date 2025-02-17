<?php

session_start();

define('SITEURL','http://localhost/TVServis');
define('LOCALHOST','localhost');
define('DB_USERNAME','root');
define('DB_PASSWORD', '');
define('DB_NAME', 'tvservis');


$mysqli=new mysqli(LOCALHOST,DB_USERNAME,DB_PASSWORD,DB_NAME) or die();

?>