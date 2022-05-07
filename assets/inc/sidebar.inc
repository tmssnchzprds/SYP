          <aside class="col-md-4 sidebar">
              <?php if (isset($_SESSION["usuario"])) { ?>
                <div class="sidebox widget">
                    <h3 class="widget-title">Bienvenido <?=$_SESSION["usuario"]->name?></h3>
              <div class="clearfix"></div></div>
                <?php } ?>
            <div class="sidebox widget">
              <h3 class="widget-title">Categorias</h3>
              <ul class="unordered-list">
                   <?php
                   foreach($categoria as $item){
                   ?>
                <li><a href="index.php?mod=Seropel&ope=categoria&idCat=<?=$item->getIdCat();?>"><?=$item->getName();?></a></li>
                   <?php
                   }
                   ?>
              </ul>
            </div>
            <!-- /.widget -->
            <div class="sidebox widget">
              <h3 class="widget-title">Sobre el Autor</h3>
              <p>Este proyecto ha sido realizado por Tómas Sánchez Paredes</p>
              <div class="clearfix"></div>
            </div>
            <!-- /.widget -->
          </aside>
          <!-- /column .sidebar -->