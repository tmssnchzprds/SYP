
<!DOCTYPE html>
<html lang="en">
<head>
  <?php
        require_once "assets/inc/meta.inc";
  ?>
    <meta name="description" content="Tienda Virtual de Informatica">
  <title>Lista de Pelicula</title>
  <?php
        require_once "assets/inc/stylesheet.inc";
  ?>
</head>
<body>
  <div class="content-wrapper">
    <!-- pelicula -->  
  <?php
        require_once "assets/inc/nav.inc";
  ?>
    <div class="wrapper light-wrapper">
      <div class="container inner pt-60">
        <div class="row">
          <div class="col-md-8">
            <div class="blog grid grid-view boxed boxed-classic-view">
            <?php
                foreach($datos as $item){
            ?>
              <div class="post">
                <div class="box bg-white shadow">
                  <figure class="main mb-30 overlay overlay1 rounded"><img width="260px" height="370px" src="<?=$item->getCover();?>">
                  </figure>
                  <h2 class="post-title"><?=$item->getTitle();?></h2>
                  <div class="post-content">
                    <p><?=$item->getDescription();?></p>
                  </div>
                  <!-- /.post-content -->
                  <hr />
                  <div class="meta meta-footer d-flex justify-content-between mb-0"><span class="date"> Numero de Capitulos: <?=$item->getEpisode();?></span></div>
                </div>
                <!-- /.box -->
              </div>

              <?php
                foreach($valor as $blug){
              ?>
                <div class="post">
                <div class="box bg-white shadow">
                  <h2 class="post-title"><?=$blug->getCommentary();?></h2>
                </div>
                <!-- /.box -->
              </div>
              <?php
                }
              ?>
              
              <form class="comment-form" id="login-form" action="index.php" method="POST" role="form" style="display: block;">
              <input id="mod" name="mod" type="hidden" value="comenpelicula">
              <input id="ope" name="ope" type="hidden" value="create">
              <input id="idpel" name="idpel" type="hidden" value="<?=$item->getIdpel();?>">
              <input id="idUsu" name="idUsu" type="hidden" value="<?php echo $_SESSION['idUsu'];?>">
              <div class="form-group">
                <textarea name="commentary" class="form-control" id="commentary" rows="5"  placeholder="Escribe aquí un comentario ..."></textarea>
              </div>
                <button type="submit" class="btn">Añadir</button>
              </form>
            <?php
                }
            ?>
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