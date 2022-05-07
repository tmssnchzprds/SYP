<!DOCTYPE html>
<html lang="es">
<head>
  <?php
        require_once "assets/inc/meta.inc";
  ?>
    <meta name="description" content="Tienda Virtual de Informatica">
  <title>Lista de Series y/o Peliculas</title>
  <?php
        require_once "assets/inc/stylesheet.inc";
  ?>
</head>
<body>
  <div class="content-wrapper">
    <!-- serie -->  
  <?php
        require_once "assets/inc/nav.inc";
  ?>
    <div class="wrapper light-wrapper">
      <div class="container inner pt-60">
               <div id="success" class="post box bg-pastel-green shadow" style="display:none; text-align: center; font-weight: bold; margin: 40px 0px; padding: 20px;"></div>
                <div id="failure" class="post box bg-pastel-red shadow" style="display:none; text-align: center; font-weight: bold; margin: 40px 0px; padding: 20px;"></div>
                 <div id="ajax">             
            <?php
                require_once "view/ajax.seropel.php";
          ?>
                </div>
 <?php
                require_once "assets/inc/modal.inc";
          ?>
    </div>
      <!-- /.container -->
    </div>
    <!-- /.wrapper -->
    <?php
          require_once "assets/inc/footer.inc";
    ?>
  </div>
  <!-- /.content-wrapper -->
   <script type="text/javascript">
  function paginacion(ope,idCat,tipo,pagina) {
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
        if (tipo!=0){
        var seropel = "&tipo=" + tipo;
    } else {
        var seropel = "";
    }
    idCategoria = 
    xmlhttp.open("GET", "index.php?mod=Ajax&ope=" + ope + categoria + seropel + "&pagina=" + pagina, true);
    xmlhttp.send();
  }
</script>
 <script type="text/javascript">
         <?php
      if (isset($success) && isset($msg)) {?>
  showMessage(<?=$success?>,'<?=$msg?>');
      <?php
      }
      ?>
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
  </script>
  <?php
        require_once "assets/inc/script.inc";
  ?>
</body>
</html>