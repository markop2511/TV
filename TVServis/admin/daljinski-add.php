<?php include 'partials/menu.php';?>

<?php 

if(isset($_POST['dodaj']))
{
    unset($_POST['dodaj']);

    $imeslike=$_FILES['slika']['name'];
    $filename="Naziv_Daljinskog_".rand(1000,9999).".".pathinfo($imeslike,PATHINFO_EXTENSION);
    $tempname=$_FILES['slika']['tmp_name'];
    $folder="../images/daljinski/".$filename;

    if(move_uploaded_file($tempname,$folder))
    {
        $naziv=$_POST['naziv'];
        $cena=$_POST['cena'];
        $opis=$_POST['opis'];

        $sql="insert into daljinski(daljnaziv,cena,opis,slika) values(?,?,?,?)";

        $stmt=$mysqli->prepare($sql);

        $stmt->bind_param("sdss",$naziv,$cena,$opis,$filename);

        $stmt->execute();

        unset($_POST['naziv']);
        unset($_POST['cena']);
        unset($_POST['opis']);
        unset($_FILES['slika']);


        $_SESSION['message']="Daljinski je uspesno dodat.";
        $_SESSION['tip']=true;
    }
    else
    {
        $_SESSION['message']="Greska.Slika nije ucitana.";
        $_SESSION['tip']=false;
    }
    header("Location: daljinski.php");
    
}

?>


<div class="main-content">
  <div class="wrapper">
    <header>
      <h1>Dodavanje daljinskog</h1>
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
              placeholder="Unesite naziv daljinskog"
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
              placeholder="Opis daljinskog"
            ></textarea>
          </td>
        </tr>
        <tr>
          <td><label for="slika">Selektuj sliku:</label></td>
          <td>
            <input type="file" name="slika" id="slika" required />
          </td>
        </tr>
      </table>
      <br />

      <input
        type="submit"
        value="Dodaj daljinski"
        name="dodaj"
        class="btn btn-success"
      />
    </form>


    </div>
</div>


<?php include 'partials/footer.php';?>