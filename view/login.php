
<!DOCTYPE html>
<html lang="en">
<head>
  <?php
        require_once "assets/inc/meta.inc";
  ?>
    <meta name="description" content="Tienda Virtual de Informatica">
  <title>Inicio de Sesión</title>
  <?php
        require_once "assets/inc/stylesheet.inc";
  ?>
</head>
<body>
  <div class="content-wrapper">
    <!-- sesion -->  
  <?php
        require_once "assets/inc/nav.inc";
  ?>
    <div class="wrapper light-wrapper">
      <div class="container inner pt-60">
        <div class="row">
          <div class="col-md-8">
            <div class="blog grid grid-view boxed boxed-classic-view">
            <div class="space20"></div>
            <form class="comment-form" id="login-form" action="index.php" method="POST" role="form" style="display: block;">
                <input id="mod" name="mod" type="hidden" value="user">
                <input id="ope" name="ope" type="hidden" value="sigin">
                <div class="form-group">
                    <input type="text" class="form-control" name="email" id="email" placeholder="Email">
                </div>
                <div class="form-group">
                    <input type="password" name="password" id="password" class="form-control" placeholder="Contraseña">
                </div>
                <button type="submit" class="btn">Iniciar Sesión</button>
            </form>
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