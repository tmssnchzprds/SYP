
<!DOCTYPE html>
<html lang="es">
<head>
  <?php
        require_once "assets/inc/meta.inc";
  ?>
    <meta name="description" content="Tienda Virtual de Informatica">
  <title>Crear / Modificar Serie o Pelicula</title>
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
        <div class="row">
          <div class="col-md-8">
            <div class="blog grid grid-view boxed boxed-classic-view">
                <div id="success" class="post box bg-success shadow" style="display:none; text-align: center; font-weight: bold;"></div>
                <div id="failure" class="post box bg-warning shadow" style="display:none; text-align: center; font-weight: bold;"></div>
              <div class="post">
                <div class="box bg-white shadow">
                     <div class="space20"></div>
            <form class="comment-form" id="login-form" action="index.php" method="POST" role="form" style="display: block;">
              <input id="mod" name="mod" type="hidden" value="Seropel">
              <input id="ope" name="ope" type="hidden" value="<?=$seropel==""?"insert":"update"?>">
              <input id="idSeropel" name="idSeropel" type="hidden" value="<?=$seropel==""?"":$seropel->getIdSeropel();?>">
                <div class="form-group">
                    <label for="title" style="width: 24%">Título:</label>
                    <input type="text" class="form-control" style="width: 75%" name="title" id="title" placeholder="Nombre de la Serie o Pelicula" value="<?=$seropel==""?"":$seropel->getTitle();?>">
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
                   <?php
                   foreach($categoria as $item){
                   ?>
                      <option value="<?=$item->getIdCat();?>" <?=$item->getIdCat()==($seropel==""?0:$seropel->getIdCat())?"selected":"";?>><?=$item->getName();?></option>
                    <?php
                   }
                   ?>
                    <option value="2">cat2</option>
                    <option value="3">cat3</option>
                </select>
                </div>
                <div class="form-group">
                    <label for="description" style="width: 24%">Descripción:</label>
                <textarea name="description" class="form-control" style="width: 75%" id="description" rows="5"  placeholder="Escribe aquí la descripción ..."><?=$seropel==""?"":$seropel->getDescription();?></textarea>
                </div>
                <div class="form-group">
                    <label for="url" style="width: 24%">URL de la Caratula:</label>
                    <input type="url" class="form-control" name="cover" style="width: 75%" id="cover" placeholder="http://www.webcaratula.com/ruta/imagencaratula.jpg" value="<?=$seropel==""?"":$seropel->getCover();?>">
                </div>
              <div class="form-group">
                  <label for="date" style="width: 24%">Fecha:</label>
                    <input type="date" class="form-control" style="width: 75%" name="date" id="date" value="<?=$seropel==""?"":$seropel->getDate();?>">
                </div>
                <button type="submit" class="btn" style="width: 99%"><?=$seropel==""?"Añadir":"Modificar"?></button>          
            </form>
                </div>
              </div>
              <!-- /.post -->
            </div>
            <!-- /.blog -->
          </div>
          <!--/column -->
          <?php
                require_once "assets/inc/sidebar.inc";
          ?>
        </div>
        <!--/.row -->
      </div>
      <!-- /.container -->
    </div>
    <!-- /.wrapper -->
    <?php
          require_once "assets/inc/footer.inc";
    ?>
  </div>
  <!-- /.content-wrapper -->
  <?php
        require_once "assets/inc/script.inc";
  ?>
</body>
</html>