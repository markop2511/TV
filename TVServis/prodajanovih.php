<?php include 'php/header.php'?>


<?php

$sql="select * from televizor where polovan=0";

$result=$mysqli->query($sql);

$lista=array();

while($row=$result->fetch_assoc())
{
    $lista[]=$row;
}

$listanaziva="";

foreach($lista as $l)
{
    $listanaziva.=$l['tvnaziv']."+";
}

$url=substr($_SERVER['SCRIPT_NAME'],strrpos($_SERVER['SCRIPT_NAME'],"/")+1);

echo "<input type='hidden' name='rezultati' id='rezultati' value=\"$listanaziva\"/>";
echo "<input type='hidden' name='url' id='url' value='$url'/>";

if(isset($_POST['pretraga']))
{
    unset($_POST['pretraga']);
    $trazi=$_POST['trazi'];

    $sql="select * from televizor where polovan=0 and tvnaziv like '%$trazi%'";

    unset($_POST['trazi']);

}
else if(isset($_GET['search']))
{
    $search=$_GET['search'];
    $trazi=$lista[$search]['tvnaziv'];

    $sql="select * from televizor where polovan=0 and tvnaziv like \"$trazi\"";

    unset($_GET['search']);
    
}

?>

<br><br>

<div class="container">
  <section>
    <h2 style="font-weight: 700">Prodaja novih televizora</h2>
    <?php

        $sql="select * from televizor where polovan=0";

        $result=$mysqli->query($sql);

        $broj=$result->num_rows;

        if($broj==0)
        {
            echo "<p style='color:red;font-weight:bold;'>Nema televizora na lageru!!!</p>";
        }
        else
        {
            if($broj<4)
            {


    ?>
    <br><br>
    <div class="row">
         <?php
            while($row=$result->fetch_assoc())
            {
         ?>
            <div class="col-md-3">
                <div class="products-box">
                <a href="televizor.php?id=<?php echo $row['id'] ?>">
                    <div class="pro-imgage">
                    <img
                        src="images/televizori/<?php echo $row['slika'] ?>"
                        alt="<?php echo $row['tvnaziv'] ?>"
                        class="img-responsive"
                    />
                    </div>
                </a>
                <div class="product-desc text-center">
                    <h3 class="text-center">
                    <a href="televizor.php?id=<?php echo $row['id'] ?>"><?php echo $row['tvnaziv'] ?></a>
                    </h3>
                </div>
                </div>
        </div>
      <?php } ?>        
    </div>
    <?php }else 
        {
            $brojac=0;
            $lista=array();
            while($row=$result->fetch_assoc())
            {   
                $lista[]=$row;
            }    
    ?>
    <br><br>
    <div class="row">
         <?php
            for(;$brojac<$broj;$brojac++)
            {
                
         ?>
            <div class="col-md-3">
                <div class="products-box">
                <a href="televizor.php?id=<?php echo $lista[$brojac]['id'] ?>">
                    <div class="pro-imgage">
                    <img
                        src="images/televizori/<?php echo $lista[$brojac]['slika'] ?>"
                        alt="<?php echo $lista[$brojac]['tvnaziv'] ?>"
                        class="img-responsive"
                    />
                    </div>
                </a>
                <div class="product-desc text-center">
                    <h3 class="text-center">
                    <a href="televizor.php?id=<?php echo $lista[$brojac]['id'] ?>"><?php echo $lista[$brojac]['tvnaziv'] ?></a>
                    </h3>
                </div>
                </div>
        </div>
        <br><br><br>
        <?php } ?>
    </div>
    <br><br><br><br>
    <?php }} ?>
        
  </section>
</div>

<?php include 'php/footer.php'?>
