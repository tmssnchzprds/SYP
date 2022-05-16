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
         <?php
      if (isset($success) && isset($msg)) {?>
  showMessage(<?=$success?>,'<?=$msg?>');
      <?php
      }
      ?>
 </script> 
 <?php
        require_once "assets/inc/script.inc";
  ?>
</body>
</html>