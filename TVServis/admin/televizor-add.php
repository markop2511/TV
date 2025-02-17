<?php include 'partials/menu.php';?>


<?php 

if(isset($_POST['dodaj']))
{
    unset($_POST['dodaj']);

    $imeslike=$_FILES['slika']['name'];
    $filename="Naziv_Televizora_".rand(1000,9999).".".pathinfo($imeslike,PATHINFO_EXTENSION);
    $tempname=$_FILES['slika']['tmp_name'];
    $folder="../images/televizori/".$filename;

    if(move_uploaded_file($tempname,$folder))
    {
        $naziv=$_POST['naziv'];
        $cena=$_POST['cena'];
        $opis=$_POST['opis'];
        $polovan=$_POST['polovan'];

        $sql="insert into televizor(tvnaziv,cena,opis,slika,polovan) values(?,?,?,?,?)";

        $stmt=$mysqli->prepare($sql);

        $stmt->bind_param("sdssi",$naziv,$cena,$opis,$filename,$polovan);

        $stmt->execute();

        unset($_POST['naziv']);
        unset($_POST['cena']);
        unset($_POST['opis']);
        unset($_FILES['slika']);
        unset($_POST['polovan']);


        $_SESSION['message']="Televizor je uspesno dodat.";
        $_SESSION['tip']=true;
    }
    else
    {
        $_SESSION['message']="Greska.Slika nije ucitana.";
        $_SESSION['tip']=false;
    }
    header("Location: televizor.php");
    
}

?>

<div class="main-content">
  <div class="wrapper">
    <header>
      <h1>Dodavanje televizora</h1>
    </header>
    <br /><br />

    <form method="post" action="" enctype="multipart/form-data">
      <table class="tbl-30">
        <tr>
          <td><label for="naziv">Naziv:</label></td>
          <td>
            <input
              type="text"
              name="naziv"
              id="naziv"
              placeholder="Unesite naziv televizora"
              required
            />
          </td>
        </tr>
        <tr>
          <td><label for="cena">Cena:</label></td>
          <td>
            <input
              type="number"
              name="cena"
              id="cena"
              placeholder="Unesite cenu"
              required
            />
          </td>
        </tr>
        <tr>
          <td><label for="opis">Opis:</label></td>
          <td>
            <textarea
              name="opis"
              id="opis"
              cols="35"
              rows="6"
              placeholder="Opis televizora"
            ></textarea>
          </td>
        </tr>
        <tr>
          <td><label for="slika">Selektuj sliku:</label></td>
          <td>
            <input type="file" name="slika" id="slika" required />
          </td>
        </tr>
        <tr>
          <td><label for="polovan">Polovan:</label></td>
          <td>
            <input
              type="radio"
              name="polovan"
              id="polovan"
              value="1"
              checked
            />Da <input type="radio" name="polovan" id="polovan" value="0" />Ne
          </td>
        </tr>
      </table>
      <br />

      <input
        type="submit"
        value="Dodaj televizor"
        name="dodaj"
        class="btn btn-success"
      />
    </form>
  </div>
</div>

<?php include 'partials/footer.php';?>
