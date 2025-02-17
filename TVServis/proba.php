<?php
include 'config/connection.php';

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
    $listanaziva.=$l['tvnaziv']."\n";
}

if(isset($_GET['search']))
{
    $search=$_GET['search'];
    echo $search;
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="css/dropdowns.css">
</head>
<body>
    
    <form action="" method="post" id="proba">
        <input type="text" placeholder="Trazi..." name="trazi" autocomplete="off" id="trazi" onkeyup="fja()">
        
        <input type="submit" value="Pretraga" name="pretraga" id="pretraga">
        <div id="div"  style="display:none;">
            <ul id="ulista" class="dropdown-menu position-static d-grid gap-1 p-2 rounded-3 mx-0 shadow w-220px" data-bs-theme="light">

            </ul>
        </div>
        <br>
        <input type="text" name="lista" id="lista" value="<?php echo $listanaziva ?>" />
        <br><input type="hidden" name="rezultati" id="rezultati" value="<?php echo $listanaziva ?>" />
    </form>
    <script>
        var lista=document.getElementById("rezultati").value;
        lista1=lista.split("\n");

        function fja()
        {
            var trazi=document.getElementById("trazi").value;
            var reg=new RegExp(trazi,"gi");
            document.getElementById("ulista").innerHTML="";

            for(var i=0;i<lista1.length-1;i++)
            {
                if(lista1[i].match(reg)!=null)
                {
                    document.getElementById("ulista").innerHTML+="<li><a class='dropdown-item rounded-2' href='proba.php?search="+lista1[i]+"'>"+lista1[i]+"</a></li>";
                }
            }

            if(trazi!="")
            {
                document.getElementById("div").style.display="block";
                document.getElementById("div").style.position="absolute";
            }
            else
            {
                document.getElementById("div").style.display="none";
            }

        }

    </script>
</body>
</html>