<?php include 'php/header.php'?>

<?php

    $id=$_GET['id'];

    $sql="select * from daljinski where id=$id";

    $result=$mysqli->query($sql); 
    
    $row=$result->fetch_assoc(); 

    $kupio=false;

    if($_SESSION['username']!="")
    {   
        if(isset($_POST['kupi']))
        {
            unset($_POST['kupi']);
            $imeprezime=$_POST['imeprezime'];
            $adresa=$_POST['adresa'];
            $telefon=$_POST['telefon'];
            $email=$_POST['email'];
            $status="Poruceno";

            $sql1="insert into porudzbina(imeprezime,telefon,email,adresa,nazivuredj,cena,status) values(?,?,?,?,?,?,?)";

            $stmt=$mysqli->prepare($sql1);

            $stmt->bind_param("sssssds",$imeprezime,$telefon,$email,$adresa,$row['daljnaziv'],$row['cena'],$status);

            $stmt->execute();

            unset($_POST['imeprezime']);
            unset($_POST['adresa']);
            unset($_POST['telefon']);
            unset($_POST['email']);

            $kupio=true;

        }
    
    }
?>

<br /><br />

<div class="container">
  <section>
    <h2 style="font-weight: 700">Prodaja daljinskih uredjaja</h2>

    <br>
    <h3><?php echo $row['daljnaziv'] ?></h3>

    <div class="row">
        <div class="col-md-4">
            <img src="images/daljinski/<?php echo $row['slika'] ?>" alt="<?php echo $row['daljnaziv'] ?>" width='300' height='auto'>
            <br><br>
            <strong style="font-size:26px;">CENA:<?php echo $row['cena'] ?> DIN RSD</strong>
        </div>
        <div class="col-md-8">
            <?php
                if($row['opis']!="")
                {
                    echo "<p class='opis' style='font-size:20px;'> Opis:</p>";
                    echo "<p class='opis' style='font-size:20px;'>".$row['opis']."</p>";
                }
                else
                {
                    echo "<p class='opis' style='font-size:20px;'>".$row['daljnaziv']."</p>";
                }
                
            ?>
        </div>
    </div>
    <?php 
        $username=$_SESSION['username'];

        if($username!="")
        {
            $sql1="select * from korisnik where username='$username'";

            $result1=$mysqli->query($sql1); 
            
            $row1=$result1->fetch_assoc(); 
        
    
    ?>
    <hr>
    <br>
    <h3>Kupovina</h3>
    <br>
    <?php
        if($kupio)
        {
    ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Uspesna kupovina.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php }?>
    <form action="" method="post">
        <div class="mb-3">
            <label for="imeprezime" class="form-label">Ime i prezime</label>
            <input type="text" class="form-control" id="imeprezime" name="imeprezime" value="<?php echo $row1['imeprezime'] ?>" placeholder="Npr. Marko Pavlovic" required>
        </div>
        <div class="mb-3">
            <label for="telefon" class="form-label">Telefon</label>
            <input type="text" class="form-control" id="telefon" name="telefon" value="<?php echo $row1['telefon'] ?>" placeholder="Npr. 06xxxxxxx(x)" required>
        </div>
        <div class="mb-3">
            <label for="adresa" class="form-label">Adresa</label>
            <input type="text" class="form-control" id="adresa" name="adresa" value="<?php echo $row1['adresa'] ?>" placeholder="Npr. Savski Nasip 7" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo $row1['email'] ?>" placeholder="Npr. mail@gmail.com" required>
        </div>
        <br>
        <input type="submit" class="btn btn-success btn-lg" name="kupi" value="KUPI"/>
    </form>
    <?php }?>
    <br><br><br><br><br>
    
  </section>
</div>

<?php include 'php/footer.php'?>
