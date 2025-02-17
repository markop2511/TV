<?php


  if($_SESSION['role']!=="ADMINISTRATOR")
  {
    header("Location:index.php");
  }


include 'partials/menu.php';

    if(isset($_GET['id']))
    {
        $id=$_GET['id'];
        $sql="delete from korisnik where id=?";

        $stmt=$mysqli->prepare($sql);

        $stmt->bind_param("i",$id);

        $stmt->execute();

        $_SESSION['message']="Korisnik je uspesno obrisan.";
        $_SESSION['tip']=true;
    }
    
    header("Location: admin.php");

?>