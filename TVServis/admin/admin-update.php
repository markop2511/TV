<?php include 'partials/menu.php';?>

<?php 
  if($_SESSION['role']!=="ADMINISTRATOR")
  {
    header("Location:index.php");
  }
?>

<?php

    if(isset($_GET['id']))
    {
        if(isset($_POST['azuriraj']))
        {
            unset($_POST['azuriraj']);
            $imeprezime=$_POST['imeprezime'];
            $username=$_POST['username'];
            $role=$_POST['role'];
            $email=$_POST['email'];
            $telefon=$_POST['telefon'];
            $adresa=$_POST['adresa'];
            $username1=$_POST['username1'];
            $id=$_GET['id'];

            $sql="select * from korisnik where username='$username'";

            $result=$mysqli->query($sql);

            if($result->num_rows!=0&&$username!=$username1)
            {
                $_SESSION['message']="Greska.Username $username je zauzet.Probajte ponovo.";
                $_SESSION['tip']=false;

                unset($_POST['imeprezime']);
                unset($_POST['username']);
                unset($_POST['email']);
                unset($_POST['telefon']);
                unset($_POST['adresa']);
                unset($_POST['role']);
            }
            else
            {
                $sql1="update korisnik set imeprezime=?,username=?,email=?,telefon=?,adresa=?,role=? where id=?";

                $stmt=$mysqli->prepare($sql1);
                $stmt->bind_param("ssssssi",$imeprezime,$username,$email,$telefon,$adresa,$role,$id);

                $stmt->execute();

                unset($_POST['imeprezime']);
                unset($_POST['username']);
                unset($_POST['email']);
                unset($_POST['telefon']);
                unset($_POST['adresa']);
                unset($_POST['role']);

                $_SESSION['message']="Korisnik je uspesno azuriran.";
                $_SESSION['tip']=true;
            }

            header("Location: admin.php");

        }
    }
    else
    {
        header("Location:admin.php");
    }
?>


<div class="main-content">
  <div class="wrapper">
        <header>
        <h1>Azuriranje korisnika</h1>
        </header>
        <br /><br />

        <?php
            $id=$_GET['id'];

            $sql="select * from korisnik where id=$id";

            $result=$mysqli->query($sql);

            if($result->num_rows==0)
            {
                $_SESSION['message']="Ne postoji korisnik sa datim id-om.";
                $_SESSION['tip']=false;
                header("Location:admin.php");
            }
            else
            {
                $row=$result->fetch_assoc();
            

        ?>
        <form method="post" action="">
        <table class="tbl-30">
            <tr>
                <td><label for="imeprezime">Ime i prezime:</label></td>
                <td>
                    <input
                    type="text"
                    name="imeprezime"
                    id="imeprezime"
                    value="<?php echo $row['imeprezime'] ?>"
                    required
                    />
                </td>
            </tr>
            <tr>
            <td><label for="username">Username:</label></td>
                <td>
                    <input
                    type="text"
                    name="username"
                    id="username"
                    value="<?php echo $row['username'] ?>"
                    required
                    />
                    <input
                    type="hidden"
                    name="username1"
                    id="username1"
                    value="<?php echo $row['username'] ?>"
                    />
                </td>
            </tr>
            <tr>
            <td><label for="email">Email:</label></td>
                <td>
                    <input
                    type="text"
                    name="email"
                    id="email"
                    value="<?php echo $row['email'] ?>"
                    required
                    />
                </td>
            </tr>
            <tr>
            <td><label for="telefon">Telefon:</label></td>
                <td>
                    <input
                    type="text"
                    name="telefon"
                    id="telefon"
                    value="<?php echo $row['telefon'] ?>"
                    required
                    />
                </td>
            </tr>
            <tr>
            <td><label for="adresa">Adresa:</label></td>
                <td>
                    <input
                    type="text"
                    name="adresa"
                    id="adresa"
                    value="<?php echo $row['adresa'] ?>"
                    required
                    />
                </td>
            </tr>
            <tr>
                <td><label for="role">Rola:</label></td>
                <td>
                    <select name="role" id="role" required>
                        <option value="">--SELEKTUJ ROLU--</option>
                        <option value="MODERATOR" <?php if($row['role']=="MODERATOR"){ echo "selected";} ?>>MODERATOR</option>
                        <option value="USER" <?php if($row['role']=="USER"){ echo "selected";} ?>>USER</option>
                    </select>
                </td>
            </tr>
      </table>
      <?php } ?>
      <br />

      <input
        type="submit"
        value="Azuriraj korisnika"
        name="azuriraj"
        class="btn btn-success"
      />
    </form>
    </div>
</div>


<?php include 'partials/footer.php';?>