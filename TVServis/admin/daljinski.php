<?php include 'partials/menu.php';?>


<!--Pocetak daljinski strane-->
<div class="main-content">
  <div class="wrapper">
    <header>
      <h1>Daljinski</h1>
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
    <a href="daljinski-add.php" class="btn btn-primary">Dodaj daljinski</a>
    <br /><br />

    <?php 
        $sql="select * from daljinski";

        $result=$mysqli->query($sql);

        if($result->num_rows==0)
        {
            echo "<p style='color:red;font-weight:bold;'>Ne postoji daljinski u bazi!!!</p>";
        }
        else
        {
    
    ?>

    <table class="tbl-full">
            <thead>
                <th>ID</th>
                <th>Naziv</th>
                <th>Cena</th>
                <th>Opis</th>
                <th>Slika</th>
                <th>Komande</th>
            </thead>
            <tbody>
            <?php
                while($row=$result->fetch_assoc())
                {
            ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['daljnaziv']; ?></td>
                <td><?php echo $row['cena']; ?></td>
                <td><?php echo $row['opis']; ?></td>
                <td>
                    <?php
                        if($row['slika']=="")
                        {
                            echo "<div style='color:red;'>Slika nije dodata.</div>";
                        }
                        else
                        {
                            echo "<img src='../images/daljinski/".$row['slika']."' alt='Slika daljinskog' width='100' height='100'>"; 
                        }
                    ?>
                </td>
                <td>
                    <a href="daljinski-update.php?id=<?php echo $row['id'] ?>" class="btn btn-success">Azuriraj daljinski</a>
                    <a href="daljinski-delete.php?id=<?php echo $row['id'] ?>" class="btn btn-danger">Obrisi daljinski</a>
                </td>
            </tr>
        <?php } ?>
      </tbody>
    </table>

    <?php } ?>

    </div>
</div>
<!--Kraj daljinski strane-->

<?php include 'partials/footer.php';?>