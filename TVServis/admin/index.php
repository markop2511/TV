<?php include 'partials/menu.php';?>


<!-- Pocetak dashboarda -->
<div class="main-content">
    <div class="wrapper">
      <header>
        <h1>DASHBOARD</h1>
      </header>
      <div class="col-4 text-center">
          <?php 
              $sql="select count(*) as total
              from televizor";

              $result=$mysqli->query($sql);
              $data=$result->fetch_assoc();
          ?>
          <strong class="podaci"><?php echo $data['total'] ?></strong>
          <br><br>
        Televizora
      </div>
      <div class="col-4 text-center">
        <?php 
              $sql="select count(*) as total
              from daljinski";

              $result=$mysqli->query($sql);
              $data=$result->fetch_assoc();
          ?>
        <strong class="podaci"><?php echo $data['total'] ?></strong>
        <br><br>
        Daljinskih
      </div>
      <div class="col-4 text-center">
          <?php 
              $sql="select count(*) as total
              from porudzbina";

              $result=$mysqli->query($sql);
              $data=$result->fetch_assoc();
          ?>
          <strong class="podaci"><?php echo $data['total'] ?></strong>
          <br><br>
        Porudzbina
      </div>
      <div class="col-4 text-center">
        <?php 
              $sql="select sum(cena) as prihod
                    from porudzbina p 
                    where p.status='Dostavljeno'";

              $result=$mysqli->query($sql);
              $data=$result->fetch_assoc();
          ?>
          <strong class="podaci"><?php echo $data['prihod'] ?> DIN</strong>
          <br><br>
        Prihod
      </div>
      <div class="clearfix"></div>
    </div>
</div>

    <!-- Kraj dashboarda -->



<?php include 'partials/footer.php';?>
  
