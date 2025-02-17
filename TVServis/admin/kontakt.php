<?php include 'partials/menu.php';?>

<!--Pocetak kontakt strane-->
<div class="main-content">
    <div class="wrapper">
        <header>
            <h1>Kontakt</h1>
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
            $sql="select * from kontakt";

            $result=$mysqli->query($sql);

            if($result->num_rows==0)
            {
                echo "<p style='color:red;font-weight:bold;'>Ne postoji ni jedan kontakt u bazi!!!</p>";
            }
            else
            {
    
        ?>

        <table class="tbl-full">
            <thead>
                <th>ID</th>
                <th>Ime</th>
                <th>Telefon</th>
                <th>Email</th>
                <th>Poruka</th>
                <th>Komande</th>
            </thead>
            <tbody>
                <?php
                    while($row=$result->fetch_assoc())
                    {
                ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['ime']; ?></td>
                    <td><?php echo $row['phone']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['message']; ?></td>
                    <td>
                        <a href="kontakt-info.php?id=<?php echo $row['id'] ?>" class="btn btn-info">Kontakt informacije</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>

    <?php } ?>

    </div>
</div>
<!--Kraj kontakt strane-->


<?php include 'partials/footer.php';?>