<?php include 'partials/menu.php';?>



<!--Pocetak televizor strane-->
<div class="main-content">
  <div class="wrapper">
    <header>
      <h1>Televizor</h1>
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
    <a href="televizor-add.php" class="btn btn-primary">Dodaj televizor</a>
    <br /><br />

    <?php 
        $sql="select * from televizor";

        $result=$mysqli->query($sql);

        if($result->num_rows==0)
        {
            echo "<p style='color:red;font-weight:bold;'>Ne postoji televizor u bazi!!!</p>";
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
            <th>Polovan</th>
            <th>Komande</th>
        </thead>
        <tbody>
            <?php
                while($row=$result->fetch_assoc())
                {
            ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['tvnaziv']; ?></td>
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
                            echo "<img src='../images/televizori/".$row['slika']."' alt='Slika televizora' width='100' height='100'>"; 
                        }
                    ?>
                </td>
                <td>
                    <?php 
                        if($row['polovan']==1)
                            {echo "Da";}
                        else
                            {echo "Ne";} 
                    ?>
                </td>
                <td>
                    <a href="televizor-update.php?id=<?php echo $row['id'] ?>" class="btn btn-success">Azuriraj televizor</a>
                    <a href="televizor-delete.php?id=<?php echo $row['id'] ?>" class="btn btn-danger">Obrisi televizor</a>
                </td>
            </tr>
        <?php } ?>
      </tbody>
    </table>

    <?php } ?>

    </div>
</div>
<!--Kraj televizor strane-->


<?php include 'partials/footer.php';?>