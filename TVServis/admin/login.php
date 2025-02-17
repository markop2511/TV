<?php include '../config/connection.php';?>

<?php
    if(isset($_POST['login']))
    {
        unset($_POST['login']);
        $username=$_POST['username'];
        $password=sha1($_POST['password']);
        $_SESSION['user']=false;

        $sql="select * from korisnik where username='$username'";

        $result=$mysqli->query($sql);

        $row=$result->fetch_assoc();

        if($result->num_rows!=0)
        {
            $_SESSION['ime']=$username;
            $sql1="select * from korisnik where username='$username' and password='$password'";

            $result1=$mysqli->query($sql1);
            if($result1->num_rows!=0)
            {
                unset($_POST['username']);
                unset($_POST['password']);
                unset($_SESSION['ime']);
                unset($_SESSION['message']);
                $_SESSION['user']=true;
                $_SESSION['username']=$username;
                $_SESSION['role']=$row['role'];
                header("Location:../index.php");
            }
            else
            {
                unset($_POST['password']);
                $_SESSION['message']="Greska.Pogresna sifra.Probajte ponovo.";
                header('Location:login.php');
            }

        }
        else
        {
            unset($_POST['username']);
            unset($_POST['password']);
            unset($_SESSION['ime']);
            $_SESSION['message']="Greska.Nepostojeci username.Probajte ponovo.";
            header('Location:login.php');
        }
        
    }

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login- Admin panel</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="../css/admin.css" />
  </head>
  <body class="telo2">
    <form class="login" method="post" action="">
      <h1>Login</h1>
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
          <label for="username" class="form-label">Username:</label>
          <input
            type="text"
            class="form-control"
            id="username"
            name="username"
            value="<?php if(isset($_SESSION['ime'])){ echo $_SESSION['ime']; } ?>"
          />
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password:</label>
          <input
            type="password"
            class="form-control"
            id="password"
            name="password"
          />
        </div>
        <input
          type="submit"
          name="login"
          class="btn btn-primary"
          value="Uloguj se"
        />
        <div class="mb-3">
        <br>
          Nemas nalog?<br>
          <a href="register.php">Registruj se!</a>
        </div>
      </div>
    </form>
  </body>
</html>


