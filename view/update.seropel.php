
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="../assets/img/favicon.png">
  <title>Actualizar Serie</title>
  <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../assets/css/plugins.css">
  <link rel="stylesheet" type="text/css" href="../assets/revolution/css/settings.css">
  <link rel="stylesheet" type="text/css" href="../assets/revolution/css/layers.css">
  <link rel="stylesheet" type="text/css" href="../assets/revolution/css/navigation.css">
  <link rel="stylesheet" type="text/css" href="../assets/fonts/icons.css">
  <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
  <link rel="stylesheet" type="text/css" href="../assets/css/color/lavender.css">
</head>
<body>
  <div class="content-wrapper">
      aserie
  <?php
        require_once "../assets/inc/nav.inc";
  ?>
    <div class="wrapper light-wrapper">
      <div class="container inner pt-60">
        <div class="row">
          <div class="col-md-8">
            <div class="blog grid grid-view boxed boxed-classic-view">
            <div class="space20"></div>
            <form class="comment-form" id="login-form" action="index.php" method="POST" role="form" style="display: block;">
              <input id="mod" name="mod" type="hidden" value="Seropel">
              <input id="ope" name="ope" type="hidden" value="update">
              <input id="idser" name="idSeropel" type="hidden" value="<?= $idser ?>">
                <div class="form-group">
                    <label for="title" style="width: 24%">Título:</label>
                    <input type="text" class="form-control" style="width: 75%" name="title" id="title" placeholder="Nombre de la Serie o Pelicula" value="<?= $name ?>">
                </div>
                <div class="form-group">
                    <label for="tipo" style="width: 24%">Tipo:</label>
                  <select id="tipo" name="tipo" style="width: 75%">
                    <option value="1">Serie</option>
                    <option value="2">Película</option>
                </select>
                </div>
               <div class="form-group">
                  <label for="idCat" style="width: 24%">Categoría:</label>
                  <select id="idCat" name="idCat" style="width: 75%">
                    <option value="1">cat1</option>
                    <option value="2">cat2</option>
                    <option value="3">cat3</option>
                </select>
                </div>
                <div class="form-group">
                    <label for="description" style="width: 24%">Descripción:</label>
                <textarea name="description" class="form-control" style="width: 75%" id="description" rows="5"  placeholder="Escribe aquí la descripción ..."><?= $description ?></textarea>
                </div>
                <div class="form-group">
                    <label for="url" style="width: 24%">URL de la Caratula:</label>
                    <input type="url" class="form-control" name="cover" style="width: 75%" id="cover" placeholder="URL de la Caratula" value="<?= $cover ?>">
                </div>
              <div class="form-group">
                  <label for="date" style="width: 24%">Fecha:</label>
                    <input type="date" class="form-control" style="width: 75%" name="date" id="date" value="<?= $category ?>">
                </div>
                <button type="submit" class="btn" style="width: 99%">Añadir</button>          
            </form>
              <!-- /.post -->
            </div>
            <!-- /.blog -->

          </div>
                    
          <!--/column -->
          <?php
                require_once "../assets/inc/sidebar.inc";
          ?>
        </div>
        <!--/.row -->
      </div>
      <!-- /.container -->
    </div>
    <!-- /.wrapper -->
    <?php
          require_once "../assets/inc/footer.inc";
    ?>
  </div>
  <!-- /.content-wrapper -->
  <?php
        require_once "../assets/inc/script.inc";
  ?>
</body>
</html>