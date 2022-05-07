
<!DOCTYPE html>
<html lang="es">
<head>
  <?php
        require_once "assets/inc/meta.inc";
  ?>
    <meta name="description" content="Tienda Virtual de Informatica">
  <title>Detalle de Serie o Pelicula</title>
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
                      <figure class="main mb-30 overlay overlay1 rounded"><img  style="    width: 430px;    aspect-ratio: auto 430 / 613;    height: 613px" src="<?=$detalle->getCover();?>">
                      </figure>
                  <h2 class="post-title"><?=$detalle->getTitle();?></h2>
                  <div class="post-content">
                    <p><?=$detalle->getDescription();?></p>
                  </div>
                  <!-- /.post-content -->
                  <hr />
                  <div class="meta meta-footer d-flex mb-0">
                      <span style="width: 25%"><?=$detalle->getTipo()==1?"Serie":"";?></span>
                      <span style="width: 30%"> <?=$detalle->getCategoria();?> </span>
                      <div class="stars-outer" style="width: 25%;">
                                            <div class="stars-inner row">
                                                <?php
                                                for ($j = 1; $j <= 5; ++$j){
                                                    if ($j<=$detalle->getValoracion()) {
                                                ?>
                                                <i class="col fa fa-2x fa-star" aria-hidden="true" style="padding: 0px; color: orange;"></i>
                                                    <?php
                                                    } else {
                                                    ?>
                                                <i class="col fa fa-2x fa-star" aria-hidden="true" style="padding: 0px;"></i>
                                                <?php
                                                    }
                                                }
                                                ?>
                                            </div>
                                        </div>
                   </div>
                </div>
              </div>
                <div class="post">
                    <div class="box bg-white shadow">
                      <button class="btn"  data-toggle="modal" data-target="#modificar" style="width: 49%">Modificar</button>
                      <button class="btn"  data-toggle="modal" data-target="#eliminar" style="width: 49%">Eliminar</button>
                    </div>
                </div>
                                <div class="post">
                <div class="box bg-white shadow">
                    <table style="width: 100%">
                        <tr>
                              <td>
                                  <h2 class="post-title">Capítulos</h2>
                              </td>
                          </tr>
              <?php
              $temporada=0;
                foreach($episodio as $item){
              ?>
                          <tr>
                              <td style=" width:100%;">
                                 <hr/>
                              </td>
                          </tr>
                          <tr>
                              <td style="width:100%;" onclick="sethidden(<?=$item->getSeason();?>)"><div class="meta meta-footer d-flex mb-0"><span id="span_<?=$item->getSeason();?>" class="fa fa-2x fa-arrow-circle-o-down" style="padding:8px;"></span> Temporada <?=$item->getSeason();?></div></td>
                          </tr>
                          <tr><td>
                      <table id="temporada_<?=$item->getSeason();?>" style="display:none; width:100%;">

                 <?php
                        for($i=1;$i<=$item->getEpisode();$i++){
                 ?>
                          <tr>
                              <td style="width:100%;">
                                 <hr style="padding: 0;margin: 0;" />
                              </td><td></td>
                          </tr>
                          <tr><td style="width:100%;">&nbsp;&nbsp;&nbsp;&nbsp; Episodio <?=$i;?></td><td></td></tr>
                <?php
                }
                ?>
                      </table>
                          </td>
                      </tr>
             <?php
             $temporada++;
                }
              ?>
                    </table>
                </div>
                <!-- /.box -->
              </div>
                <div class="post">
                    <div class="box bg-white shadow">
                      <button class="btn"  data-toggle="modal" data-target="#modificar" style="width: 99%">Modificar</button>
                      <button class="btn"  data-toggle="modal" data-target="#eliminar"style="width: 99%">Eliminar</button>
                    </div>
                </div>                
                <div class="post">
            <?php
                foreach($comentario as $blug){
              ?>
                <div class="box bg-white shadow">
                  <h2 class="post-title"><?=$blug->getUsuario();?></h2>
                  <h3 class="post-title"><?=$blug->getCommentary();?></h3>
                </div>
                <!-- /.box -->
              <?php
                }
              ?>
                </div>
                 <?php
                require_once "assets/inc/modal.inc";
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
    <script language="javascript">
        function sethidden(temporada){
             document.getElementById('temporada_' + temporada).style.display = document.getElementById('temporada_' + temporada).style.display == "none"?"block":"none";
             document.getElementById('span_' + temporada).className = document.getElementById('span_' + temporada).className == "fa fa-arrow-circle-o-down"?"fa fa-arrow-circle-o-up":"fa fa-arrow-circle-o-down";
            }
    </script>
  <?php
        require_once "assets/inc/script.inc";
  ?>
</body>
</html>