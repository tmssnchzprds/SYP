  function paginacion(ope,buscador,idCat,tipo,pagina) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
	document.getElementById("cargar").parentNode.removeChild(document.getElementById("cargar"));
        document.getElementById("ajax").innerHTML =this.responseText;
      }
    };
    if (idCat!=0){
        var categoria = "&idCat=" + idCat;
    } else {
        var categoria = "";
    }
    if (buscar!=""){
        var buscar = "&buscar=" + buscador;
    } else {
        var buscar = "";
    }
        if (tipo!=0){
        var seropel = "&tipo=" + tipo;
    } else {
        var seropel = "";
    }
    xmlhttp.open("GET", "index.php?mod=Ajax&ope=" + ope + buscar + categoria + seropel + "&pagina=" + pagina, true);
    xmlhttp.send();
  }
  function showMessage(success,msg){
      if (success==0){
            document.getElementById("success").textContent = msg;
             document.getElementById("success").style.display ="block";
               setTimeout(function(){
                    document.getElementById("success").style.display = "none";
                },5000);
         }else{
             document.getElementById("failure").textContent = msg;
             document.getElementById("failure").style.display = "block";
             setTimeout(function(){
                    document.getElementById("failure").style.display = "none";
                },5000);
         }
     }