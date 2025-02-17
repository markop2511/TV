var lista=document.getElementById("rezultati").value;
lista1=lista.split("+");
var url=document.getElementById("url").value;


function fja()
{
    var trazi=document.getElementById("trazi").value;
    var reg=new RegExp(trazi,"gi");
    document.getElementById("ulista").innerHTML="";

    for(var i=0;i<lista1.length-1;i++)
    {
        if(lista1[i].match(reg)!=null)
        {
            document.getElementById("ulista").innerHTML+="<li><a class='dropdown-item rounded-2' href='"+url+"?search="+i+"'>"+lista1[i]+"</a></li>";
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

