<?php include '../config/connection.php';?>

<?php 

if(isset($_POST['register']))
{
    unset($_POST['register']);

    $imeprezime=$_POST['imeprezime'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    $email=$_POST['email'];
    $telefon=$_POST['telefon'];
    $adresa=$_POST['adresa'];
    $role="USER";
    $_SESSION['user']=false;

    $sql="select * from korisnik where username='$username'";

    $result=$mysqli->query($sql);

    if($result->num_rows!=0)
    {
        $_SESSION['message']="Greska.Username $username je zauzet.Probajte ponovo.";
        $_SESSION['tip']=false;

        unset($_POST['imeprezime']);
        unset($_POST['username']);
        unset($_POST['password']);
        unset($_POST['email']);
        unset($_POST['telefon']);
        unset($_POST['adresa']);


        header("Location: register.php");
    }
    else
    {
      $sql1="insert into korisnik(imeprezime,username,password,email,telefon,adresa,role) values(?,?,?,?,?,?,?)";

      $stmt=$mysqli->prepare($sql1);

      $stmt->bind_param("sssssss",$imeprezime,$username,sha1($password),$email,$telefon,$adresa,$role);

      $stmt->execute();

      unset($_POST['imeprezime']);
      unset($_POST['username']);
      unset($_POST['password']);
      unset($_POST['email']);
      unset($_POST['telefon']);
      unset($_POST['adresa']);

      $_SESSION['user']=true;
      $_SESSION['username']=$username;
      $_SESSION['role']=$role;

      header("Location: ../index.php");
    }

    
    
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Register</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="../css/admin.css" />
  </head>
  <body class="telo3">
    <br><br><br>
    <form class="login" method="post" action="">
      <h1>Register</h1>
      <br>
      <?php
        if(isset($_SESSION['message']))
        {
            $message=$_SESSION['message'];
            echo "<div style='color:red;'>$message</div>";
        }
      ?>
      <br>
      <div class="forma">
        <div class="mb-3">
            <label for="imeprezime" class="form-label">Ime i prezime:</label>
            <input
                type="text"
                class="form-control"
                id="imeprezime"
                name="imeprezime"
                required
            />
            </div>
        <div class="mb-3">
          <label for="username" class="form-label">Username:</label>
          <input
            type="text"
            class="form-control"
            id="username"
            name="username"
            required
          />
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password:</label>
          <input
            type="password"
            class="form-control"
            id="password"
            name="password"
            required
          />
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Email:</label>
          <input
            type="text"
            class="form-control"
            id="email"
            name="email"
            required
          />
        </div>
        <div class="mb-3">
          <label for="telefon" class="form-label">Telefon:</label>
          <input
            type="text"
            class="form-control"
            id="telefon"
            name="telefon"
            required
          />
        </div>
        <div class="mb-3">
          <label for="adresa" class="form-label">Adresa:</label>
          <input
            type="text"
            class="form-control"
            id="adresa"
            name="adresa"
            required
          />
        </div>
        <br>
        <input
          type="submit"
          name="register"
          class="btn btn-primary"
          value="Registruj se"
        />
      </div>
    </form>
  </body>
</html>


