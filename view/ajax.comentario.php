 <?php
 $temporada=1;
 $episodes=[];
foreach($episodio as $item){
    $episodes[$temporada]=$item->getEpisode();
    $temporada++;
}
?>
                    <div id="cargarcom">
                <div class="post">
                    <table style="width: 100%">
                        <tr>
                              <td style="width:100%">
                                  <h1><?=$comentarios_title;?></h1>
                              </td>
                              <td>
                                  <?php if (isset($_SESSION["usuario"])) { ?>
                                  <a href='#' onclick='modal("modificarcom",<?php echo $_GET["idSeropel"]?>,0)'>
                                    <i class="fa fa-4x fa-plus-circle" style="padding: 0px; color: orange;"></i>
                                  </a>
                                  <?php } ?>
                              </td>
                        </tr>
                    </table>
            <?php
                foreach($comentarios as $blug){
              ?>
                <div class="box bg-white shadow">
                    <table style="width: 100%">
                        <tr>
                              <td style="width:100%">
                                  <h2 class="post-title"><?=$blug->getUsuario();?></h2>
                              </td>
                              <td>
                                  <?php if (isset($_SESSION["usuario"])) { 
                                      if ($_SESSION["usuario"]->idUsu==$blug->getIdUsu()||$_SESSION["usuario"]->type==3||$_SESSION["usuario"]->type==0) {?>
                                  <a href='#' onclick='modal("modificarcom",<?php echo $blug->getIdSeropel();?>,<?php echo $blug->getIdCom();?>)'>
                                    <i class="fa fa-2x fa-commenting" style="padding: 0px; color: orange;"></i>
                                  </a>
                                  <a data-toggle="modal" href="#" onclick="modal('eliminarcom',<?php echo $blug->getIdSeropel();?>,<?php echo $blug->getIdCom();?>)">
                                    <i class="fa fa-2x fa-trash" style="padding: 0px; color: orange;"></i>
                                  </a>
                                      <?php } } ?>
                              </td>
                        </tr>
                    </table>
                  <p class="post"><?=$blug->getCommentary();?></p>
                </div>
                <!-- /.box -->
              <?php
                }
              ?>
                </div>
            </div>
