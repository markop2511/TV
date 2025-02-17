<?php include 'partials/menu.php';?>


<?php

    if(isset($_GET['id']))
    {
        if(isset($_POST['promeni']))
        {
            unset($_POST['promeni']);

            $trenutna=$_POST['trenutna'];
            $nova=$_POST['nova'];
            $ponovi=$_POST['ponovi'];
            $id=$_GET['id'];

            $sql="select * from korisnik where password='".sha1($trenutna)."' and id=$id";

            $result=$mysqli->query($sql);

            if($result->num_rows==0)
            {
                $_SESSION['message']="Niste pravilno uneli trenutnu sifru. Probajte opet.";
                $_SESSION['tip']=false;
                header("Location:admin.php");
            }
            else
            {
                if($nova===$ponovi&&$nova!==$trenutna)
                {
                    $sql="update korisnik set password =? where id =?";

                    $stmt=$mysqli->prepare($sql);

                    $stmt->bind_param("si",sha1($nova),$id);

                    $stmt->execute();

                    unset($_POST['trenutna']);
                    unset($_POST['nova']);
                    unset($_POST['ponovi']);

                    $_SESSION['message']="Uspesno promenjena sifra.";
                    $_SESSION['tip']=true;
                    header("Location:admin.php");

                }
                else
                {
                    $_SESSION['message']="Sifre se ne poklapaju ili je trenutna ista kao i nova.";
                    $_SESSION['tip']=false;
                    header("Location:admin.php");
                }
            }

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
      <h1>Promena sifre</h1>
    </header>
    <br /><br />

    <form method="post" action="">
      <table class="tbl-30">
        <tr>
          <td><label for="trenutna">Trenutna sifra:</label></td>
          <td>
            <input
              type="password"
              name="trenutna"
              id="trenutna"
              placeholder="Trenutna sifra"
              required
            />
          </td>
        </tr>
        <tr>
          <td><label for="nova">Nova sifra:</label></td>
          <td>
            <input
              type="password"
              name="nova"
              id="nova"
              placeholder="Nova sifra"
              required
            />
          </td>
        </tr>
        <tr>
          <td><label for="ponovi">Ponovi sifru:</label></td>
          <td>
            <input
              type="password"
              name="ponovi"
              id="ponovi"
              placeholder="Ponovi sifru"
              required
            />
          </td>
        </tr>
      </table>
      <br />

      <input
        type="submit"
        value="Promeni sifru"
        name="promeni"
        class="btn btn-success"
      />
    </form>
    </div>
</div>

<?php include 'partials/footer.php';?>
