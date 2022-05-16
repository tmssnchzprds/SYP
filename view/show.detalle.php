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
            <div class="blog grid grid-view boxed boxed-classic-view">
                <div id="success" class="post box bg-success shadow" style="display:none; text-align: center; font-weight: bold;"></div>
                <div id="failure" class="post box bg-warning shadow" style="display:none; text-align: center; font-weight: bold;"></div>
              <div class="post">
                <div class="box bg-white shadow">
                    <div class="row" style="width:100%">
                            <?php
                            $col="";
        if (isset($_SESSION["usuario"])) { 
            if ($_SESSION["usuario"]->type==2||$_SESSION["usuario"]->type==0) {
                $col="-10";?>
                        <div class="col-1"><a class="dropdown-item" data-toggle="modal"  href="#modificar"><i class="fa fa-4x fa-edit" style="padding: 0px; color: orange;"></i></a></div>
<?php } } ?>
            <figure class=" align-content-center col<?=$col?> mb-30 overlay overlay1 rounded"><img  style="    width: 430px;    aspect-ratio: auto 430 / 613;    height: 613px" src="<?=$detalle->getCover();?>">
                      </figure>
                    <?php
        if (isset($_SESSION["usuario"])) { 
            if ($_SESSION["usuario"]->type==2||$_SESSION["usuario"]->type==0) { ?>
                        <div class="col-1"><a class="align-content-end dropdown-item" data-toggle="modal"  href="#eliminar"><i class="fa fa-4x fa-trash" style="padding: 0px; color: orange;"></i></a></div>
<?php } } ?>
                    </div>
                  <h2 class="post-title"><?=$detalle->getTitle();?></h2>
                  <div class="post-content">
                    <p><?=$detalle->getDescription();?></p>
                  </div>
                  <!-- /.post-content -->
                  <hr />
                  <div class="meta meta-footer d-flex mb-0">
                      <span style="width: 25%"><?=$detalle->getTipo()==1?"Serie":"";?></span>
                      <span style="width: 30%"> <?=$detalle->getCategoria();?> </span>
                      <div style="width: 25%;">
                                            <div class="row">
                                                <?php
                                                for ($j = 1; $j <= 5; ++$j){
                                                    if ($j>$detalle->getValoracion()) {
                                                ?>
                                                <i class="col fa fa-2x fa-star" aria-hidden="true" style="padding: 0px;"></i>
                                                    <?php
                                                    } else {
                                                    ?>
                                                <i class="col fa fa-2x fa-star" aria-hidden="true" style="padding: 0px; color: orange;"></i>
                                                <?php
                                                    }
                                                }
                                               if (isset($_SESSION["usuario"])) { 
                                                ?>
                                                <div class="col"><i class="fa fa-2x fa-clock-o" style="padding: 0px; color: orange;"></i>
                                                <i class="fa fa-2x fa-eye" style="padding: 0px; color: orange;"></i>
                                                <i class="fa fa-2x fa-check-circle-o" style="padding: 0px; color: orange;"></i></div>
                                                <?php } ?>
                                            </div>
                                        </div>
                   </div>
                </div>
              </div>
                                <div class="post">
                <div class="box bg-white shadow">
                    <table style="width: 100%">
                        <tr>
                              <td style="width:100%">
                                  <h2 class="post-title">Capítulos</h2>
                              </td>
                              <td>
                                  <div class="col-md-0"  onclick="paginacion(<?=$detalle->getIdSeropel();?>,0,0)">
                                    <i class="fa fa-2x fa-comment" style="padding: 0px; color: orange;"></i>
                                  </div>
                              </td>
                          </tr>
              <?php
              $temporada=0;
                foreach($episodio as $item){
              ?>
                          <tr>
                              <td colspan="2" style=" width:100%;">
                                 <hr/>
                              </td>
                          </tr>
                          <tr>
                              <td style="width:100%;" onclick="sethidden(<?=$item->getSeason();?>)"><div class="meta meta-footer d-flex mb-0"><span id="span_<?=$item->getSeason();?>" class="fa fa-2x fa-arrow-circle-o-down" style="padding:8px; color: orange;"></span> Temporada <?=$item->getSeason();?></div></td>
                              <td>
                                  <div class="col-md-0"  onclick="paginacion(<?=$detalle->getIdSeropel();?>,<?=$item->getSeason();?>,0)">
                                    <i class="fa fa-2x fa-comment" style="padding: 0px; color: orange;"></i>
                                  </div>
                               </td>
                          </tr>
                          <tr><td colspan="2">
                      <table id="temporada_<?=$item->getSeason();?>" style="display:none; width:100%;">

                 <?php
                        for($i=1;$i<=$item->getEpisode();$i++){
                 ?>
                          <tr>
                              <td style="width:100%;">
                                 <hr style="padding: 0;margin: 0;" />
                              </td><td></td>
                          </tr>
                          <tr><td style="width:100%;"><div class="meta meta-footer d-flex mb-0">&nbsp;&nbsp;&nbsp;&nbsp; Episodio <?=$i;?></div></td>
                              <td>
                                  <div class="col-md-0"  onclick="paginacion(<?=$detalle->getIdSeropel();?>,<?=$item->getSeason();?>,<?=$i;?>)">
                                     <i class="fa fa-comment" style="padding: 0px; color: orange;"></i>
                                  </div>
                              </td></tr>
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
                <div id="ajax">             
            <?php
                require_once "view/ajax.comentario.php";
          ?>
                </div>
                 <?php
                require_once "assets/inc/modal.inc";
          ?>
              <!-- /.post -->
            </div>
            <!-- /.blog -->
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
  function comentarios(idSeropel,season,episode) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
	document.getElementById("cargar").parentNode.removeChild(document.getElementById("cargar"));
        document.getElementById("ajax").innerHTML =this.responseText;
      }
    };
    if (idSeropel!=0){
        var seropel = "&idSeropel=" + idSeropel;
    } else {
        var seropel = "";
    }
    if (season!=0){
        var temporada = "&season=" + season;
    } else {
        var temporada = "";
    }
    if (episode!=0){
        var episodio = "&episode=" + episode;
    } else {
        var episodio = "";
    }
    xmlhttp.open("GET", "index.php?mod=Ajax&ope=com" + seropel + temporada + episodio, true);
    xmlhttp.send();
  }
</script>
    <script language="javascript">
        function sethidden(temporada){
             document.getElementById('temporada_' + temporada).style.display = document.getElementById('temporada_' + temporada).style.display == "none"?"block":"none";
             document.getElementById('span_' + temporada).className = document.getElementById('span_' + temporada).className == "fa fa-2x fa-arrow-circle-o-down"?"fa fa-2x fa-arrow-circle-o-up":"fa fa-2x fa-arrow-circle-o-down";
            }
    </script>
  <?php
        require_once "assets/inc/script.inc";
  ?>
</body>
</html>