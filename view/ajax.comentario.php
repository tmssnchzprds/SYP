            <div id="cargar">
                <div class="post">
                    <h1>Comentarios</h1>
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
            </div>