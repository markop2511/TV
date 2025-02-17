<?php include 'php/header.php'?>

<?php

$sql="select * from daljinski";

$result=$mysqli->query($sql);

$lista=array();

while($row=$result->fetch_assoc())
{
    $lista[]=$row;
}

$listanaziva="";

foreach($lista as $l)
{
    $listanaziva.=$l['daljnaziv']."+";
}

$url=substr($_SERVER['SCRIPT_NAME'],strrpos($_SERVER['SCRIPT_NAME'],"/")+1);

echo "<input type='hidden' name='rezultati' id='rezultati' value=\"$listanaziva\"/>";
echo "<input type='hidden' name='url' id='url' value='$url'/>";

if(isset($_POST['pretraga']))
{
    unset($_POST['pretraga']);
    $trazi=$_POST['trazi'];

    $sql="select * from daljinski where daljnaziv like '%$trazi%'";

    unset($_POST['trazi']);

}
else if(isset($_GET['search']))
{
    $search=$_GET['search'];
    $trazi=$lista[$search]['daljnaziv'];

    $sql="select * from daljinski where daljnaziv like \"$trazi\"";

    unset($_GET['search']);
    
}

?>

<br><br>

<div class="container">
  <section>
    <h2 style="font-weight: 700">Prodaja daljinskih upravljaca</h2>
    <?php

        $result=$mysqli->query($sql);

        $broj=$result->num_rows;

        if($broj==0)
        {
            echo "<p style='color:red;font-weight:bold;'>Nema daljinskih na lageru!!!</p>";
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
                <a href="daljinski.php?id=<?php echo $row['id'] ?>">
                    <div class="pro-imgage">
                    <img
                        src="images/daljinski/<?php echo $row['slika'] ?>"
                        alt="<?php echo $row['daljnaziv'] ?>"
                        class="img-responsive"
                    />
                    </div>
                </a>
                <div class="product-desc text-center">
                    <h3 class="text-center">
                    <a href="daljinski.php?id=<?php echo $row['id'] ?>"><?php echo $row['daljnaziv'] ?></a>
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
                <a href="daljinski.php?id=<?php echo $lista[$brojac]['id'] ?>">
                    <div class="pro-imgage">
                    <img
                        src="images/daljinski/<?php echo $lista[$brojac]['slika'] ?>"
                        alt="<?php echo $lista[$brojac]['daljnaziv'] ?>"
                        class="img-responsive"
                    />
                    </div>
                </a>
                <div class="product-desc text-center">
                    <h3 class="text-center">
                    <a href="daljinski.php?id=<?php echo $lista[$brojac]['id'] ?>"><?php echo $lista[$brojac]['daljnaziv'] ?></a>
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
