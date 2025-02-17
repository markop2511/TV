<?php

include '../config/connection.php';

$_SESSION['user']=false;

$mysqli->close();

session_destroy();
 
header("Location:../index.php");

?>