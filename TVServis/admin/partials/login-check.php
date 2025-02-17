<?php

$user=$_SESSION['user'];
$role=$_SESSION['role'];

if(!$user)
{
    unset($_SESSION['ime']);
    $_SESSION['message']="Greska.Niste ulogovani.";
    header("Location:login.php");

}

if($role!=="ADMINISTRATOR"&&$role!=="MODERATOR")
{
    unset($_SESSION['ime']);
    header("Location:../index.php");
}


?>