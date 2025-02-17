<?php include 'partials/menu.php';?>

<?php

    if(isset($_GET['id']))
    {
        if(isset($_POST['azuriraj']))
        {
            unset($_POST['azuriraj']);
            $imeslike=$_FILES['nova']['name'];
            $filename=$_POST['trenutna'];
            if($imeslike!="")
            {
                unlink("../images/daljinski/".$filename);
                $filename="Naziv_Daljinskog_".rand(1000,9999).".".pathinfo($imeslike,PATHINFO_EXTENSION);
                $tempname=$_FILES['nova']['tmp_name'];
                $folder="../images/daljinski/".$filename;
                move_uploaded_file($tempname,$folder);
            }

            $naziv=$_POST['naziv'];
            $cena=$_POST['cena'];
            $opis=$_POST['opis'];
            $id=$_GET['id'];

            $sql="update daljinski set daljnaziv=?,cena=?,opis=?,slika=? where id=?";

            $stmt=$mysqli->prepare($sql);
            $stmt->bind_param("sdssi",$naziv,$cena,$opis,$filename,$id);

            $stmt->execute();

            unset($_POST['naziv']);
            unset($_POST['cena']);
            unset($_POST['opis']);
            unset($_FILES['nova']);

            $_SESSION['message']="Daljinski je uspesno azuriran.";
            $_SESSION['tip']=true;

            header("Location: daljinski.php");
        }
    }
    else
    {
        header("Location:daljinski.php");
    }
?>


<div class="main-content">
  <div class="wrapper">
        <header>
        <h1>Azuriranje daljinskog</h1>
        </header>
        <br /><br />

        <?php
            $id=$_GET['id'];

            $sql="select daljnaziv,cena,opis,slika from daljinski where id=$id";

            $result=$mysqli->query($sql);

            if($result->num_rows==0)
            {
                $_SESSION['message']="Ne postoji daljinski sa datim id-om.";
                $_SESSION['tip']=false;
                header("Location:daljinski.php");
            }
            else
            {
                $row=$result->fetch_assoc();
                

        ?>

        <form method="post" action="" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td><label for="naziv">Naziv:</label></td>
                    <td>
                        <input type="text" name="naziv" id="naziv" value="<?php echo $row['daljnaziv']; ?>" required />
                    </td>
                </tr>
                <tr>
                    <td><label for="cena">Cena:</label></td>
                    <td>
                        <input type="number" name="cena" id="cena" value="<?php echo $row['cena']; ?>" required />
                    </td>
                </tr>
                <tr>
                    <td><label for="opis">Opis:</label></td>
                    <td>
                        <textarea name="opis" id="opis" cols="35" rows="6"><?php echo $row['opis']; ?></textarea>
                    </td>
                </tr>
                <tr>
                    <td><label for="trenutna">Trenutna slika:</label></td>
                    <td>
                            <?php
                                if($row['slika']=="")
                                {
                                    echo "<div style='color:red;'>Slika nije dostupna.</div>";
                                }
                                else
                                {
                                    echo "<img src='../images/daljinski/".$row['slika']."' alt='Slika daljinskog' width='100' height='100'>";
                                    echo "<input type='hidden' value='".$row['slika']."' id='trenutna' name='trenutna'/>"; 
                                }
                            ?>
                    </td>
                </tr>
                <tr>
                    <td><label for="nova">Nova slika:</label></td>
                    <td>
                        <input type="file" name="nova" id="nova" />
                    </td>
                </tr>
            </table>
            <?php } ?>
            <br />

            <input
                type="submit"
                value="Azuriraj daljinski"
                name="azuriraj"
                class="btn btn-success"
            />
        </form>

    </div>
</div>

<?php include 'partials/footer.php';?>