<?php include '../config/connection.php';?>
<?php include 'login-check.php';?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin panel</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="../css/admin.css" />
  </head>
  <body class="telo">
      <ul class="nav justify-content-center menu">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="index.php">Pocetna</a>
        </li>
        <?php if($_SESSION['role']==="ADMINISTRATOR"){?>
        <li class="nav-item">
          <a class="nav-link"  href="admin.php">Korisnik</a>
        </li>
        <?php }?>
        <li class="nav-item">
          <a class="nav-link" href="televizor.php">Televizor</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="daljinski.php">Daljinski</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="porudzbina.php">Porudzbina</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="kontakt.php">Kontakt</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../index.php">Prodavnica</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php">Odloguj se</a>
        </li>
      </ul>
    </nav>
    <!-- Kraj menija -->