
<!DOCTYPE html>
<html lang="en">
<head>
  <?php
        require_once "assets/inc/meta.inc";
  ?>
    <meta name="description" content="Tienda Virtual de Informatica">
  <title>Lista de Serie</title>
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
            <?php
                foreach($datos as $item){
            ?>
              <div class="post">
                <div class="box bg-white shadow">
                  <figure class="main mb-30 overlay overlay1 rounded"><img src="<?=$item->getCover();?>">
                  </figure>
                  <div class="meta mb-10"><span class="category"><?=$item->getCategory();?></span></div>
                  <h2 class="post-title"><?=$item->getName();?></h2>
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
                }
            ?>
              <!-- /.post -->
            </div>

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