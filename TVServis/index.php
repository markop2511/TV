<?php include 'php/header.php'?>

<!-- Pocetak sectiona -->

<section>
  <div
    id="carouselExampleCaptions"
    class="carousel slide"
    data-bs-ride="carousel"
    data-bs-interval="3000"
  >
    <div class="carousel-indicators">
      <button
        type="button"
        data-bs-target="#carouselExampleCaptions"
        data-bs-slide-to="0"
        class="active"
        aria-current="true"
        aria-label="Slide 1"
      ></button>
      <button
        type="button"
        data-bs-target="#carouselExampleCaptions"
        data-bs-slide-to="1"
        aria-label="Slide 2"
      ></button>
      <button
        type="button"
        data-bs-target="#carouselExampleCaptions"
        data-bs-slide-to="2"
        aria-label="Slide 3"
      ></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img
          src="images/carousel/carousel-slika1.png"
          class="d-block w-100"
          alt="Servis lcd,led,crt televizora"
        />
        <div class="carousel-caption d-none d-md-block">
          <h2 class="carousel-h2">SERVIS CRT,LED I LCD TV</h2>
          <p>
            <a class="btn btn-light" href="servis.php">SAZNAJ VISE</a>
          </p>
        </div>
      </div>
      <div class="carousel-item">
        <img
          src="images/carousel/carousel-slika2.jpg"
          class="d-block w-100"
          alt="Prodaja novih i polovnih uredjaja"
        />
        <div class="carousel-caption d-none d-md-block">
          <h2 class="carousel-h2">PRODAJA NOVIH I POLOVNIH TV</h2>
          <p>
            <a class="btn btn-light" href="prodaja.php">SAZNAJ VISE</a>
          </p>
        </div>
      </div>
      <div class="carousel-item">
        <img
          src="images/carousel/carousel-slika3.png"
          class="d-block w-100"
          alt="Prodaja daljinskih upravljaca"
        />
        <div class="carousel-caption d-none d-md-block">
          <h2 class="carousel-h2">PRODAJA DALJINSKIH UPRAVLJACA</h2>
          <p>
            <a class="btn btn-light" href="prodajadaljinskih.php">SAZNAJ VISE</a>
          </p>
        </div>
      </div>
    </div>
    <button
      class="carousel-control-prev"
      type="button"
      data-bs-target="#carouselExampleCaptions"
      data-bs-slide="prev"
    >
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button
      class="carousel-control-next"
      type="button"
      data-bs-target="#carouselExampleCaptions"
      data-bs-slide="next"
    >
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
</section>

<!-- Kraj sectiona -->

<!-- Pocetak article -->
<br /><br /><br>
    <div class="container">
      <article>
        <div class="row">
          <!--Prvi red-->
          <h3 class="col-lg-4" style="text-align: center">
            <a href="serviscrt.php" class="naslov">Servis CRT TV</a>
            <a href="serviscrt.php"
              ><img
                class="proizvod"
                src="images/proizvodi/servis-crt.png"
                alt="Servis crt televizora"
            /></a>
          </h3>
          <h3 class="col-lg-4" style="text-align: center">
            <a href="servislcd.php" class="naslov">Servis LCD TV</a>
            <a href="servislcd.php"
              ><img
                class="proizvod"
                src="images/proizvodi/servis-lcd.png"
                alt="Servis lcd televizora"
            /></a>
          </h3>
          <h3 class="col-lg-4" style="text-align: center">
            <a href="servisled.php" class="naslov">Servis LED TV</a>
            <a href="servisled.php"
              ><img
                class="proizvod"
                src="images/proizvodi/servis-led.png"
                alt="Servis led televizora"
            /></a>
          </h3>
        </div>
        <!--Kraj prvog reda-->
        <br /><br />
        <div class="row">
          <!--Drugi red-->
          <h3 class="col-lg-4" style="text-align: center">
            <a href="prodajanovih.php" class="naslov">Prodaja novih TV</a>
            <a href="prodajanovih.php"
              ><img
                class="proizvod"
                src="images/proizvodi/prodaja-novih.png"
                alt="Prodaja novih televizora"
            /></a>
          </h3>
          <h3 class="col-lg-4" style="text-align: center">
            <a href="prodajapolovnih.php" class="naslov">Prodaja polovnih TV</a>
            <a href="prodajapolovnih.php"
              ><img
                class="proizvod"
                src="images/proizvodi/prodaja-polovnih.png"
                alt="Prodaja polovnih televizora"
            /></a>
          </h3>
          <h3 class="col-lg-4" style="text-align: center">
            <a href="prodajadaljinskih.php" class="naslov">Prodaja daljinskih upravljaca</a>
            <a href="prodajadaljinskih.php"
              ><img
                class="proizvod"
                src="images/proizvodi/prodaja-daljinskih.png"
                alt="Prodaja daljinskih upravljaca"
            /></a>
          </h3>
        </div>
        <!--Kraj drugog reda-->
      </article>
    </div>
    <br /><br /><br><br>

    <!-- Kraj article -->

<?php include 'php/footer.php'?>
    
