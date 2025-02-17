<?php include 'partials/menu.php';?>

<?php 
  if($_SESSION['role']!=="ADMINISTRATOR")
  {
    header("Location:index.php");
  }
?>

<!--Pocetak admin strane-->
<div class="main-content">
  <div class="wrapper">
    <header>
      <h1>Korisnik strana</h1>
    </header>
    <br />
    <?php
        if(isset($_SESSION['message']))
        {
            if(isset($_SESSION['tip']))
            {
                $tip=$_SESSION['tip'];
                $message=$_SESSION['message'];
                if($tip)
                {
                    echo "<div style='color: #2ed573;'>$message</div>";
                }
                else
                {
                    echo "<div style='color:red;'>$message</div>";
                }
                unset($_SESSION['message']);
                unset($_SESSION['tip']);
            }
        }
    ?>
    <br />
    <a href="admin-add.php" class="btn btn-primary">Dodaj korisnika</a>
    <br /><br />

    <?php 
        $sql="select * from korisnik where role!='ADMINISTRATOR'";

        $result=$mysqli->query($sql);

        if($result->num_rows==0)
        {
            echo "<p style='color:red;font-weight:bold;'>Ne postoji korisnik u bazi!!!</p>";
        }
        else
        {
    
    ?>
    <table class="tbl-full">
      <thead>
        <th>ID</th>
        <th>Radnik</th>
        <th>Username</th>
        <th>Email</th>
        <th>Telefon</th>
        <th>Adresa</th>
        <th>Rola</th>
        <th>Komande</th>
      </thead>
      <tbody>
        <?php
            while($row=$result->fetch_assoc())
            {
        ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['imeprezime']; ?></td>
            <td><?php echo $row['username']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['telefon']; ?></td>
            <td><?php echo $row['adresa']; ?></td>
            <td><?php echo $row['role']; ?></td>
            <td>
                <a href="password-change.php?id=<?php echo $row['id'] ?>" class="btn btn-primary">Promeni sifru</a>
                <a href="admin-update.php?id=<?php echo $row['id'] ?>" class="btn btn-success">Azuriraj korisnika</a>
                <a href="admin-delete.php?id=<?php echo $row['id'] ?>" class="btn btn-danger">Obrisi korisnika</a>
            </td>
        </tr>
        <?php } ?>
      </tbody>
    </table>

    <?php } ?>
  </div>
</div>
<!--Kraj admin strane-->

<?php include 'partials/footer.php';?>
