<?php include 'partials/menu.php';?>

<?php

    if(isset($_GET['id']))
    {
        if(isset($_POST['azuriraj']))
        {
            unset($_POST['azuriraj']);

            $status=$_POST['status'];
            $imeprezime=$_POST['imeprezime'];
            $telefon=$_POST['telefon'];
            $email=$_POST['email'];
            $adresa=$_POST['adresa'];
            $id=$_GET['id'];

            $sql="update porudzbina set status=?,imeprezime=?,telefon=?,email=?,adresa=? where id=?";

            $stmt=$mysqli->prepare($sql);
            $stmt->bind_param("sssssi",$status,$imeprezime,$telefon,$email,$adresa,$id);

            $stmt->execute();

            unset($_POST['status']);
            unset($_POST['imeprezime']);
            unset($_POST['telefon']);
            unset($_POST['email']);
            unset($_POST['adresa']);
            

            $_SESSION['message']="Porudzbina je uspesno azurirana.";
            $_SESSION['tip']=true;

            header("Location: porudzbina.php");
        }
    }
    else
    {
        header("Location:porudzbina.php");
    }
?>

<div class="main-content">
  <div class="wrapper">
        <header>
        <h1>Azuriranje porudzbine</h1>
        </header>
        <br /><br />

        <?php
            $id=$_GET['id'];

            $sql="select nazivuredj,cena,status,imeprezime,telefon,email,adresa from porudzbina where id=$id";

            $result=$mysqli->query($sql);

            if($result->num_rows==0)
            {
                $_SESSION['message']="Ne postoji porudzbina sa datim id-om.";
                $_SESSION['tip']=false;
                header("Location:porudzbina.php");
            }
            else
            {
                $row=$result->fetch_assoc();
                

        ?>

        <form method="post" action="">
            <table class="tbl-30">
                <tr>
                    <td><label for="naziv">Naziv:</label></td>
                    <td>
                        <strong id="naziv"><?php echo $row['nazivuredj'] ?></strong>
                    </td>
                </tr>
                <tr>
                    <td><label for="cena">Cena:</label></td>
                    <td>
                        <strong id="cena"><?php echo $row['cena']." DIN" ?></strong>
                    </td>
                </tr>
                <tr>
                    <td><label for="status">Status:</label></td>
                    <td>
                        <select name="status" id="status">
                            <option value="Poruceno" <?php if($row['status']=="Poruceno"){ echo "selected";} ?>>Poruceno</option>
                            <option value="Dostavlja se" <?php if($row['status']=="Dostavlja se"){ echo "selected";} ?>>Dostavlja se</option>
                            <option value="Dostavljeno" <?php if($row['status']=="Dostavljeno"){ echo "selected";} ?>>Dostavljeno</option>
                            <option value="Otkazano" <?php if($row['status']=="Otkazano"){ echo "selected";} ?>>Otkazano</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label for="imeprezime">Kupac:</label></td>
                    <td>
                        <input type="text" name="imeprezime" id="imeprezime" value="<?php echo $row['imeprezime'] ?>" required />
                    </td>
                </tr>
                <tr>
                    <td><label for="telefon">Telefon:</label></td>
                    <td>
                        <input type="text" name="telefon" id="telefon" value="<?php echo $row['telefon'] ?>" required />
                    </td>
                </tr>
                <tr>
                    <td><label for="email">Email:</label></td>
                    <td>
                        <input type="text" name="email" id="email" value="<?php echo $row['email'] ?>" required />
                    </td>
                </tr>
                <tr>
                    <td><label for="adresa">Adresa:</label></td>
                    <td>
                        <input type="text" name="adresa" id="adresa" value="<?php echo $row['adresa'] ?>" required />
                    </td>
                </tr>
            </table>
            <?php } ?>
            <br />

            <input
                type="submit"
                value="Azuriraj porudzbinu"
                name="azuriraj"
                class="btn btn-success"
            />
        </form>

    </div>
</div>

<?php include 'partials/footer.php';?>