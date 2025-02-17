<?php include 'php/header.php'?>

<?php

  $poslao=false;
  if(isset($_POST['salji']))
  {
      unset($_POST['salji']);

      $ime=$_POST['ime'];
      $email=$_POST['email'];
      $phone=$_POST['phone'];
      $message=$_POST['message'];

      $sql="insert into kontakt(ime,email,phone,message) values(?,?,?,?)";

      $stmt=$mysqli->prepare($sql);

      $stmt->bind_param("ssss",$ime,$email,$phone,$message);

      $stmt->execute();

      unset($_POST['ime']);
      unset($_POST['email']);
      unset($_POST['phone']);
      unset($_POST['message']);

      $poslao=true;

  }

?>

<!--Pocetak kontakt-->
<br /><br />
<div class="container">
  <section class="kontakt">
    <div class="row">
      <div class="col-md-6">
        <h2 style="font-weight: 700">Kontaktirajte nas!</h2>
        <br />
        <p class="kontaktp">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            width="30"
            height="30"
            fill="currentColor"
            class="bi bi-house"
            viewBox="0 0 16 16"
          >
            <path
              d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5ZM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5 5 5Z"
            />
          </svg>
          &nbsp &nbsp Beograd
        </p>
        <p class="kontaktp">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            width="30"
            height="30"
            fill="currentColor"
            class="bi bi-telephone"
            viewBox="0 0 16 16"
          >
            <path
              d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"
            />
          </svg>
          &nbsp &nbsp Telefon:060/123456
        </p>
        <p class="kontaktp">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            width="30"
            height="30"
            fill="currentColor"
            class="bi bi-envelope"
            viewBox="0 0 16 16"
          >
            <path
              d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"
            />
          </svg>
          &nbsp &nbsp tvservisavala@gmail.com
        </p>
      </div>
      <?php if($user){ ?>
      <div class="col-md-6">
        <h2 style="font-weight: 700">Zakazi servis!</h2>
        <?php
          if($poslao)
          {
        ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Success!</strong> Uspesno ste poslali poruku.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php } ?>
        <!--Pocetak forme-->
        <form method="post" action="">
          <br />
          <div class="input-group mb-3">
            <!--Input za ime-->
            <span class="input-group-text"
              ><svg
                xmlns="http://www.w3.org/2000/svg"
                width="25"
                height="25"
                fill="currentColor"
                class="bi bi-person"
                viewBox="0 0 16 16"
              >
                <path
                  d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z"
                />
              </svg>
            </span>
            <div class="form-floating">
              <input
                type="text"
                class="form-control"
                name="ime"
                id="ime"
                placeholder="Name"
                required
              />
              <label for="ime">Name</label>
            </div>
          </div>
          <div class="input-group mb-3">
            <!--Input za email-->
            <span class="input-group-text"
              ><svg
                xmlns="http://www.w3.org/2000/svg"
                width="25"
                height="25"
                fill="currentColor"
                class="bi bi-envelope"
                viewBox="0 0 16 16"
              >
                <path
                  d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"
                />
              </svg>
            </span>
            <div class="form-floating">
              <input
                type="text"
                class="form-control"
                name="email"
                id="email"
                placeholder="Email"
                required
              />
              <label for="email">Email</label>
            </div>
          </div>
          <!--Input za phone-->
          <div class="input-group mb-3">
            <span class="input-group-text"
              ><svg
                xmlns="http://www.w3.org/2000/svg"
                width="25"
                height="25"
                fill="currentColor"
                class="bi bi-telephone"
                viewBox="0 0 16 16"
              >
                <path
                  d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"
                />
              </svg>
            </span>
            <div class="form-floating">
              <input
                type="text"
                class="form-control"
                name="phone"
                id="phone"
                placeholder="Phone number"
                required
              />
              <label for="phone">Phone number</label>
            </div>
          </div>
          <!--Input za message-->
          <div class="input-group mb-3">
            <span class="input-group-text"
              ><svg
                xmlns="http://www.w3.org/2000/svg"
                width="25"
                height="25"
                fill="currentColor"
                class="bi bi-pencil"
                viewBox="0 0 16 16"
              >
                <path
                  d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"
                />
              </svg>
            </span>

            <textarea
              name="message"
              id="message"
              cols="40"
              rows="5"
              class="form-control"
              placeholder="Message"
              required
            ></textarea>
            <label for="message"></label>
          </div>
          <br />
          <input type="submit" name="salji" class="dugme" value="SLANJE"/>
        </form>
        <!--Kraj forme-->
      </div>
      <?php }?>
    </div>
  </section>
</div>
<!--Kraj kontakt-->

   
<?php include 'php/footer.php'?>
    
