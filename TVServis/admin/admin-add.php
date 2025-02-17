<?php include 'partials/menu.php';?>


<?php 
  if($_SESSION['role']!=="ADMINISTRATOR")
  {
    header("Location:index.php");
  }
?>

<?php 

if(isset($_POST['dodaj']))
{
    unset($_POST['dodaj']);

    $imeprezime=$_POST['imeprezime'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    $email=$_POST['email'];
    $telefon=$_POST['telefon'];
    $adresa=$_POST['adresa'];
    $role=$_POST['role'];

    $sql="select * from korisnik where username='$username'";

    $result=$mysqli->query($sql);

    if($result->num_rows!=0)
    {
        $_SESSION['message']="Greska.Username $username je zauzet.Probajte ponovo.";
        $_SESSION['tip']=false;

        unset($_POST['imeprezime']);
        unset($_POST['username']);
        unset($_POST['password']);
        unset($_POST['role']);
        unset($_POST['email']);
        unset($_POST['telefon']);
        unset($_POST['adresa']);
    }
    else
    {
      $sql1="insert into korisnik(imeprezime,username,password,email,adresa,telefon,role) values(?,?,?,?,?,?,?)";

      $stmt=$mysqli->prepare($sql1);

      $stmt->bind_param("sssssss",$imeprezime,$username,sha1($password),$email,$adresa,$telefon,$role);

      $stmt->execute();

      unset($_POST['imeprezime']);
      unset($_POST['username']);
      unset($_POST['password']);
      unset($_POST['role']);
      unset($_POST['email']);
      unset($_POST['telefon']);
      unset($_POST['adresa']);


      $_SESSION['message']="Korisnik je uspesno dodat.";
      $_SESSION['tip']=true;
    }

    header("Location: admin.php");
    
}

?>


<!--Pocetak admin strane-->
<div class="main-content">
  <div class="wrapper">
    <header>
      <h1>Dodaj korisnika</h1>
    </header>
    <br /><br />

    <form method="post" action="">
      <table class="tbl-30">
        <tr>
          <td><label for="imeprezime">Ime i prezime:</label></td>
          <td>
            <input
              type="text"
              name="imeprezime"
              id="imeprezime"
              placeholder="Unesite ime i prezime"
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
              placeholder="Unesite username"
              required
            />
          </td>
        </tr>
        <tr>
          <td><label for="password">Sifra:</label></td>
          <td>
            <input
              type="password"
              name="password"
              id="password"
              placeholder="Unesite password"
              required
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
              placeholder="Unesite email"
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
              placeholder="Unesite telefon"
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
              placeholder="Unesite adresa"
              required
            />
          </td>
        </tr>
        <tr>
            <td><label for="role">Rola:</label></td>
            <td>
                <select name="role" id="role" required>
                    <option value="">--SELEKTUJ ROLU--</option>
                    <option value="MODERATOR">MODERATOR</option>
                    <option value="USER">USER</option>
                </select>
            </td>
        </tr>
      </table>
      <br />

      <input
        type="submit"
        value="Dodaj korisnika"
        name="dodaj"
        class="btn btn-success"
      />
    </form>
  </div>
</div>

<?php include 'partials/footer.php';?>
