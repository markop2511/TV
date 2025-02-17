<?php

include 'partials/menu.php';

    if(isset($_GET['id']))
    {
        $id=$_GET['id'];
        $sql="delete from televizor where id=?";
        $sql1="select slika from televizor where id=$id";

        $result=$mysqli->query($sql1);

        $row=$result->fetch_assoc();

        $filename=$row['slika'];

        $stmt=$mysqli->prepare($sql);

        $stmt->bind_param("i",$id);

        $stmt->execute();

        unlink("../images/televizori/".$filename);

        $_SESSION['message']="Televizor je uspesno obrisan.";
        $_SESSION['tip']=true;
    }
    
    header("Location: televizor.php");

?>