<?php 
#session_cache_limiter('private_no_expire');
error_reporting(E_ERROR | E_PARSE);
include 'config/connection.php';

$user=$_SESSION['user'];


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>TV Servis Avala</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="css/mojstil.css" />
  </head>
  <body>
    <!-- Pocetak headera -->
    <br />
    <div class="container">
      <header class="row">
        <div class="col-md-8">
          <h1>
            <a href="index.php"
              ><img src="images/logo1.png" alt="Logo kompanije" /></a
            ><small>TVServis AVALA</small>
          </h1>
        </div>
        <div class="col-md-4" style="text-align: right">
          <br /><br />
          <p>
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="16"
              height="16"
              fill="currentColor"
              class="bi bi-telephone-fill"
              viewBox="0 0 16 16"
            >
              <path
                fill-rule="evenodd"
                d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"
              />
            </svg>
            &nbsp Telefon:060/123456 &nbsp &nbsp
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="16"
              height="16"
              fill="currentColor"
              class="bi bi-envelope-fill"
              viewBox="0 0 16 16"
            >
              <path
                d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757Zm3.436-.586L16 11.801V4.697l-5.803 3.546Z"
              />
            </svg>
            &nbsp tvservisavala@gmail.com
          </p>
        </div>
      </header>
    </div>
    <!-- Kraj headera -->

    <!-- Pocetak navbara -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary sticky-top">
      <div class="container">
        &nbsp &nbsp &nbsp
        <a class="navbar-brand" href="index.php">Pocetna</a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        &nbsp &nbsp &nbsp
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0 justify-content-center">
            <li class="nav-item dropdown">
              <a
                class="nav-link dropdown-toggle"
                href="servis.php"
                role="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
                Servis
              </a>
              <ul class="dropdown-menu">
                <li>
                  <a class="dropdown-item" href="serviscrt.php"
                    >Servis CRT televizora</a
                  >
                </li>
                <li>
                  <a class="dropdown-item" href="servisled.php"
                    >Servis LED televizora</a
                  >
                </li>
                <li>
                  <a class="dropdown-item" href="servislcd.php"
                    >Popravka LCD televizora i ekrana</a
                  >
                </li>
              </ul>
            </li>
            &nbsp &nbsp &nbsp
            <li class="nav-item dropdown">
              <a
                class="nav-link dropdown-toggle"
                href="prodaja.php"
                role="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
                Prodaja uredjaja
              </a>
              <ul class="dropdown-menu">
                <li>
                  <a class="dropdown-item" href="prodajanovih.php"
                    >Prodaja novih uredjaja</a
                  >
                </li>

                <li>
                  <a class="dropdown-item" href="prodajapolovnih.php"
                    >Prodaja polovnih uredjaja</a
                  >
                </li>

                <li>
                  <a class="dropdown-item" href="prodajadaljinskih.php"
                    >Prodaja daljinskih upravljaca</a
                  >
                </li>
              </ul>
            </li>
            &nbsp &nbsp &nbsp
            <li class="nav-item">
              <a class="nav-link" href="onama.php">O nama</a>
            </li>
            &nbsp &nbsp &nbsp
            <li class="nav-item">
              <a class="nav-link" href="kontakt.php">Kontakt</a>
            </li>
          </ul>
          <?php 
            
            $url=substr($_SERVER['SCRIPT_NAME'],strrpos($_SERVER['SCRIPT_NAME'],"/")+1);
            
            
            if($url==="prodajadaljinskih.php"||$url==="prodajanovih.php"||$url==="prodajapolovnih.php")
            {
          
          ?>
          <form class="d-flex" role="search" action="" method="post">
            <input
              class="form-control me-2"
              type="text"
              placeholder="Trazi..."
              aria-label="Search"
              name="trazi"
              id="trazi"
              onkeyup="fja()"
              autocomplete="off"
            />
            <input class="btn btn-success" type="submit" value="Pretraga" name="pretraga"/>
            <div id="div"  style="display:none; margin-top:40px; width:11%">
              <ul id="ulista" class="dropdown-menu position-static d-grid gap-1 p-2 rounded-3 mx-0 shadow w-220px" data-bs-theme="light">
                
              </ul>
            </div>
          </form>
          <?php }elseif($user) {
            if($_SESSION['role']==="ADMINISTRATOR"||$_SESSION['role']==='MODERATOR'){
          ?>
             <ul class="navbar-nav justify-content-right menu">
              <li class="nav-item">
                <a class="nav-link" href="admin/index.php">Admin panel</a>
              </li>
          <?php } ?>
            <ul class="navbar-nav justify-content-right menu">
              <li class="nav-item">
                <a class="nav-link" href="admin/logout.php">Log out</a>
              </li>
          </ul>
          <?php }else{?>
            <ul class="navbar-nav justify-content-right menu">
              <li class="nav-item">
                <a class="nav-link" href="admin/login.php">Log in</a>
              </li>
          </ul>
          <?php }?>
        </div>
      </div>
    </nav>
    <!-- Kraj navbara -->
  </body>
</html>
