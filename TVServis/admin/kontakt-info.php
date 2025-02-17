<?php include 'partials/menu.php';?>

<?php

    $id=$_GET['id'];
    if(!isset($id))
    {
        header("Location:kontakt.php");
    }
?>

<div class="main-content">
  <div class="wrapper">
        <header>
        <h1>Kontakt informacije</h1>
        </header>
        <br /><br />

        <?php
            
            $sql="select * from kontakt where id=$id";

            $result=$mysqli->query($sql);

            if($result->num_rows==0)
            {
                $_SESSION['message']="Ne postoji kontakt sa datim id-om.";
                $_SESSION['tip']=false;
                header("Location:kontakt.php");
            }
            else
            {
                $row=$result->fetch_assoc();
                

        ?>

        <form>
            <table class="tbl-30">
                <tr>
                    <td><label for="ime">Ime:</label></td>
                    <td>
                        <strong id="ime"><?php echo $row['ime'] ?></strong>
                    </td>
                </tr>
                <tr>
                    <td><label for="telefon">Telefon:</label></td>
                    <td>
                        <strong id="telefon"><?php echo $row['phone'] ?></strong>
                    </td>
                </tr>
                <tr>
                    <td><label for="email">Email:</label></td>
                    <td>
                        <strong id="email"><?php echo $row['email']?></strong>
                    </td>
                </tr>
                <tr>
                    <td><label for="poruka">Poruka:</label></td>
                    <td>
                        <textarea disabled id="poruka" cols="35" rows="6"><?php echo $row['message']?></textarea>
                    </td>
                </tr>
            </table>
            <?php } ?>
            <br />
        </form>

    </div>
</div>

<?php include 'partials/footer.php';?>