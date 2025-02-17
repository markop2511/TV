<?php include 'partials/menu.php';?>

<!--Pocetak porudzbina strane-->
<div class="main-content">
    <div class="wrapper">
        <header>
            <h1>Porudzbina</h1>
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
        <br /><br />

        <?php 
            $sql="select * from porudzbina";

            $result=$mysqli->query($sql);

            if($result->num_rows==0)
            {
                echo "<p style='color:red;font-weight:bold;'>Ne postoji ni jedna porudzbina u bazi!!!</p>";
            }
            else
            {
    
        ?>

        <table class="tbl-full">
            <thead>
                <th>ID</th>
                <th>Kupac</th>
                <th>Telefon</th>
                <th>Email</th>
                <th>Adresa</th>
                <th>Uredjaj</th>
                <th>Cena</th>
                <th>Vreme</th>
                <th>Status</th>
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
                    <td><?php echo $row['telefon']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['adresa']; ?></td>
                    <td><?php echo $row['nazivuredj']; ?></td>
                    <td><?php echo $row['cena']; ?></td>
                    <td><?php echo $row['vreme']; ?></td>
                    <td>
                        <?php
                            $status=$row['status'];
                            if($status=="Dostavlja se")
                            {
                                echo "<div style='color:purple;'>$status</div>";
                            }
                            elseif($status=="Dostavljeno")
                            {
                                echo "<div style='color:orange;'>$status</div>";
                            }
                            elseif($status=="Otkazano")
                            {
                                echo "<div style='color:red;'>$status</div>";
                            }
                            else
                            {
                                echo "<div>$status</div>";
                            }
                        ?>
                    </td>
                    <td>
                        <a href="porudzbina-update.php?id=<?php echo $row['id'] ?>" class="btn btn-success">Azuriraj porudzbinu</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>

    <?php } ?>

    </div>
</div>
<!--Kraj porudzbina strane-->


<?php include 'partials/footer.php';?>