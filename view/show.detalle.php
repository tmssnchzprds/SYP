
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
        <style>

            .botones input[type="radio"] {
                display: none !important;
            }

            .botones label {
                color: grey;
            }

            .clasificado {
                direction: rtl;
                unicode-bidi: bidi-override;
            }

            .botones label:hover,
            label:hover ~ label {
                color: orange !important;
            }

            .botones input[type="radio"]:checked ~ label {
                color: orange !important;
            }
        </style>
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
                        <div id="success" class="post box bg-pastel-green shadow" style="display:none; text-align: center; font-weight: bold; margin: 40px 0px; padding: 20px;"><button type="button" class="close" onclick="hideMessage()">
                                <span class="fa fa-2x fa-close" style="padding: 0px; color: red;" aria-hidden="true"></span>
                                <span class="sr-only">Cerrar</span>
                            </button></div>
                        <div id="failure" class="post box bg-pastel-red shadow" style="display:none; text-align: center; font-weight: bold; margin: 40px 0px; padding: 20px;"><button type="button" class="close" onclick="hideMessage()">
                                <span class="fa fa-2x fa-close" style="padding: 0px; color: red;" aria-hidden="true"></span>
                                <span class="sr-only">Cerrar</span>
                            </button></div>
                        <div class="post">
                            <div class="box bg-white shadow">
                                <div class="meta row meta-footer d-flex mb-0">
                                    <div class="col"><?= $detalle->getTipo() == 1 ? "Serie" : "Pelicula"; ?></div>
                                    <div class="col"> <?= $detalle->getCategoria(); ?> </div>
                                    <?php
                                    if (isset($_SESSION["usuario"])) {
                                        ?>
                                        <div class="col">
                                            <form class="comment-form needs-validation botones" id="clasificacion" action="index.php" method="POST" role="form" style="display: block;">
                                                <input name="mod" type="hidden" value="Puntuacion">
                                                <input name="ope" type="hidden" value="<?= $puntuacion == false ? "insert" : "update" ?>">
                                                <input name="idUsu" type="hidden" value="<?= $_SESSION["usuario"]->idUsu ?>">
                                                <input name="idSeropel" type="hidden" value="<?= $detalle->getIdSeropel(); ?>">
                                                <input name="season" type="hidden" value="<?= $puntuacion == false ? "0" : $puntuacion->getSeason() ?>">
                                                <input name="episode" type="hidden" value="<?= $puntuacion == false ? "0" : $puntuacion->getEpisode() ?>">
                                                <input name="idEst" type="hidden" value="<?= $puntuacion == false ? "0" : $puntuacion->getIdEst() ?>">
                                                <input name="idScore" type="hidden" value="<?= $puntuacion == false ? "" : $puntuacion->getIdScore() ?>">
                                                <p class="clasificado">
                                                    <?php
                                                    for ($j = 5; $j >= 1; --$j) {
                                                        ?>
                                                        <input id="radio<?= $j ?>" type="radio" name="score" value="<?= $j ?>" <?= $puntuacion == false ? "" : ($puntuacion->getScore() == $j ? "selected" : "") ?> onchange="actualizar('clasificacion')">
                                                        <label for="radio<?= $j ?>"><i class="fa fa-2x fa-star" style="padding: 0px; <?= $puntuacion == false ? "" : ($puntuacion->getScore() >= $j ? "color: orange;" : "") ?>"></i></label>
                                                        <?php
                                                    }
                                                    ?>
                                                </p>

                                            </form>
                                        </div>
                                            <?php
                                        } else {
                                            ?>
                                            <div class="col">
                                                <?php
                                                for ($j = 1; $j <= 5; ++$j) {
                                                    if ($j > $detalle->getValoracion()) {
                                                        ?>
                                                        <i class="fa fa-2x fa-star" style="padding: 0px;"></i>
                                                        <?php
                                                    } else {
                                                        ?>
                                                        <i class="fa fa-2x fa-star" style="padding: 0px; color: orange;"></i>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                            </div>
                                                <?php
                                            }
                                            ?>
                                        <?php
                                        if (isset($_SESSION["usuario"])) {
                                            ?>
                                            <div class="col">
                                                <form class="comment-form needs-validation botones" id="estado" action="index.php" method="POST" role="form" style="display: block;">
                                                    <input name="mod" type="hidden" value="Puntuacion">
                                                    <input name="ope" type="hidden" value="<?= $puntuacion == false ? "insert" : "update" ?>">
                                                    <input name="idUsu" type="hidden" value="<?= $_SESSION["usuario"]->idUsu ?>">
                                                    <input name="idSeropel" type="hidden" value="<?= $detalle->getIdSeropel(); ?>">
                                                    <input name="season" type="hidden" value="<?= $puntuacion == false ? "0" : $puntuacion->getSeason() ?>">
                                                    <input name="episode" type="hidden" value="<?= $puntuacion == false ? "0" : $puntuacion->getEpisode() ?>">
                                                    <input name="score" type="hidden" value="<?= $puntuacion == false ? "0" : $puntuacion->getScore() ?>">
                                                    <input name="idScore" type="hidden" value="<?= $puntuacion == false ? "" : $puntuacion->getIdScore() ?>">
                                                    <p class="clasificado">
                                                        <input id="radio9" type="radio" name="idEst" value="3" <?= $puntuacion == false ? "" : ($puntuacion->getIdEst() == 3 ? "selected" : ""); ?> onchange="actualizar('estado')">
                                                        <label for="radio9" title="Visto" ><i class="fa fa-2x fa-check-circle-o" style="padding: 0px; <?= $puntuacion == false ? "" : ($puntuacion->getIdEst() == 3 ? "color: orange;" : ""); ?>"></i></label>
                                                        <input id="radio8" type="radio" name="idEst" value="2" <?= $puntuacion == false ? "" : ($puntuacion->getIdEst() == 2 ? "selected" : ""); ?> onchange="actualizar('estado')">
                                                        <label for="radio8" title="Siguiendo"><i class="fa fa-2x fa-eye" style="padding: 0px; <?= $puntuacion == false ? "" : ($puntuacion->getIdEst() == 2 ? "color: orange;" : ""); ?>"></i></label>
                                                        <input id="radio7" type="radio" name="idEst" value="1" <?= $puntuacion == false ? "" : ($puntuacion->getIdEst() == 1 ? "selected" : ""); ?> onchange="actualizar('estado')">
                                                        <label for="radio7" title="Pendiente"><i class="fa fa-2x fa-clock-o" style="padding: 0px; <?= $puntuacion == false ? "" : ($puntuacion->getIdEst() == 1 ? "color: orange;" : ""); ?>"></i></label>
                                                        <?php if ($puntuacion != false) { ?>
                                                            <input id="radio6" type="radio" name="idEst" value="0" <?= $puntuacion == false ? "" : ($puntuacion->getIdEst() == 0 ? "selected" : ""); ?> onchange="actualizar('estado')">
                                                            <label for="radio6" title="Desmarcar"><i class="fa fa-2x fa-close" style="padding: 0px; <?= $puntuacion == false ? "" : ($puntuacion->getIdEst() == 0 ? "color: orange;" : ""); ?>"></i></label>
                                                        <?php } ?>
                                                    </p>
                                                </form>
                                            </div>
                                        <?php } ?>
                                    <?php
                                    if (isset($_SESSION["usuario"])) {
                                        ?>
                                        <div class="col">
                                            <?php
                                            if ($_SESSION["usuario"]->type == 2 || $_SESSION["usuario"]->type == 0) {
                                                ?>
                                            <a class="dropdown-item" style="padding: 0px;" href="#" title="Modificar Serie" onclick="modal('modificarseropel',<?php echo $detalle->getIdSeropel(); ?>, 0)"><i class="fa fa-3x fa-edit" style="padding: 0px; color: orange;"></i></a>
                                            <?php } ?>
                                        </div>
                                    <?php } ?>
                                    <?php
                                    if (isset($_SESSION["usuario"])) {
                                        ?>
                                        <div class="col">
                                            <?php
                                            if ($_SESSION["usuario"]->type == 2 || $_SESSION["usuario"]->type == 0) {
                                                ?>
                                            <a class="dropdown-item" style="padding: 0px;" href="#" title="Eliminar Serie" onclick="modal('eliminarseropel',<?php echo $detalle->getIdSeropel(); ?>, 0)"><i class="fa fa-3x fa-trash" style="padding: 0px; color: orange;"></i></a>
                                            <?php } ?>
                                        </div>
                                    <?php } ?>
                                </div>                                    
                                    <hr />
                                    <div class="row" style="width:100%">
                                        <figure class=" align-content-center col-6 mb-30 overlay overlay1 rounded"><img  style="    width: 430px;    aspect-ratio: auto 430 / 613;    height: 613px" src="<?= $detalle->getCover(); ?>">
                                        </figure>
                                        <div class="col-6">
                                            <h2 class="post-title"><?= $detalle->getTitle(); ?></h2>
                                            <div class="post-content">
                                                <p><?= $detalle->getDescription(); ?></p>
                                            </div>
                                            <!-- /.post-content -->
                                        </div>
                                    </div>
                                </div>
                                <?php if ($detalle->getTipo() == 1) { ?>
                                    <div class="post">
                                        <div class="box bg-white shadow">
                                            <table style="width: 100%">
                                                <tr>
                                                    <td colspan="3" style="width:100%">
                                                        <h2 class="post-title">Capítulos</h2>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-0"  title="Filtrar Comentarios" onclick="comentarios(<?= $detalle->getIdSeropel(); ?>, 0, 0)">
                                                            <i class="fa fa-2x fa-comments" style="padding: 0px; color: orange;"></i>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <?php
                                                $e = 0;
                                                foreach ($episodio as $item) {
                                                    $e++;
                                                    ?>
                                                    <tr>
                                                        <td colspan="4" style=" width:100%;">
                                                            <hr/>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width:50%;" onclick="sethidden(<?= $item->getSeason(); ?>)"><div class="meta meta-footer d-flex mb-0"><span id="span_<?= $item->getSeason(); ?>" class="fa fa-2x fa-arrow-circle-o-down" style="padding:8px; color: orange;"></span> Temporada <?= $item->getSeason(); ?></div></td>
                                                        <td style="width:25%;">
                                                            <?php
                                                            if (isset($_SESSION["usuario"])) {
                                                                $puntuacions = Puntuacion::getPuntuacions($detalle->getIdSeropel(), $_SESSION["usuario"]->idUsu, $item->getSeason());
                                                                ?>
                                                                <form class="comment-form needs-validation botones" id="clasificacions<?= $item->getSeason(); ?>" action="index.php" method="POST" role="form" style="display: block;">
                                                                    <input name="mod" type="hidden" value="Puntuacion">
                                                                    <input name="ope" type="hidden" value="<?= $puntuacions == false ? "insert" : "update" ?>">
                                                                    <input name="idUsu" type="hidden" value="<?= $_SESSION["usuario"]->idUsu ?>">
                                                                    <input name="idSeropel" type="hidden" value="<?= $detalle->getIdSeropel(); ?>">
                                                                    <input name="season" type="hidden" value="<?= $puntuacions == false ? $item->getSeason() : $puntuacions->getSeason() ?>">
                                                                    <input name="episode" type="hidden" value="<?= $puntuacions == false ? "0" : $puntuacions->getEpisode() ?>">
                                                                    <input name="idEst" type="hidden" value="<?= $puntuacions == false ? "0" : $puntuacions->getIdEst() ?>">
                                                                    <input name="idScore" type="hidden" value="<?= $puntuacions == false ? "" : $puntuacions->getIdScore() ?>">
                                                                    <p class="clasificado">
                                                                        <?php
                                                                        for ($j = 5; $j >= 1; --$j) {
                                                                            ?>
                                                                            <input id="radio<?= $j ?>s<?= $item->getSeason(); ?>" type="radio" name="score" value="<?= $j ?>" <?= $puntuacions == false ? "" : ($puntuacions->getScore() == $j ? "selected" : "") ?> onchange="actualizar('clasificacions<?= $item->getSeason(); ?>')">
                                                                            <label for="radio<?= $j ?>s<?= $item->getSeason(); ?>"><i class="fa fa-2x fa-star" style="padding: 0px; <?= $puntuacions == false ? "" : ($puntuacions->getScore() >= $j ? "color: orange;" : "") ?>"></i></label>
                                                                            <?php
                                                                        }
                                                                        ?>
                                                                    </p>

                                                                </form>
                                                            <?php } ?>
                                                        </td><td  style="width:10%;">
                                                            <?php
                                                            if (isset($_SESSION["usuario"])) {
                                                                ?>
                                                                <form class="comment-form needs-validation botones" id="estados<?= $item->getSeason(); ?>" action="index.php" method="POST" role="form" style="display: block;">
                                                                    <input name="mod" type="hidden" value="Puntuacion">
                                                                    <input name="ope" type="hidden" value="<?= $puntuacions == false ? "insert" : "update" ?>">
                                                                    <input name="idUsu" type="hidden" value="<?= $_SESSION["usuario"]->idUsu ?>">
                                                                    <input name="idSeropel" type="hidden" value="<?= $detalle->getIdSeropel(); ?>">
                                                                    <input name="season" type="hidden" value="<?= $puntuacions == false ? $item->getSeason() : $puntuacions->getSeason() ?>">
                                                                    <input name="episode" type="hidden" value="<?= $puntuacions == false ? "0" : $puntuacions->getEpisode() ?>">
                                                                    <input name="score" type="hidden" value="<?= $puntuacions == false ? "0" : $puntuacions->getScore() ?>">
                                                                    <input name="idScore" type="hidden" value="<?= $puntuacions == false ? "" : $puntuacions->getIdScore() ?>">
                                                                    <p class="clasificado">
                                                                        <input id="radio7s<?= $item->getSeason(); ?>" type="radio" name="idEst" value="4" <?= $puntuacions == false ? "" : ($puntuacions->getIdEst() == 4 ? "selected" : ""); ?> onchange="actualizar('estados<?= $item->getSeason(); ?>')">
                                                                        <label for="radio7s<?= $item->getSeason(); ?>" title="Visto" ><i class="fa fa-2x fa-check" style="padding: 0px; <?= $puntuacions == false ? "" : ($puntuacions->getIdEst() == 4 ? "color: orange;" : ""); ?>"></i></label>
                                                                        <?php if ($puntuacions != false) { ?>
                                                                            <input id="radio6s<?= $item->getSeason(); ?>" type="radio" name="idEst" value="0" <?= $puntuacions == false ? "" : ($puntuacions->getIdEst() == 0 ? "selected" : ""); ?> onchange="actualizar('estados<?= $item->getSeason(); ?>')">
                                                                            <label for="radio6s<?= $item->getSeason(); ?>" title="No Visto"><i class="fa fa-2x fa-close" style="padding: 0px; <?= $puntuacions == false ? "" : ($puntuacions->getIdEst() == 0 ? "color: orange;" : ""); ?>"></i></label>
                                                                        <?php } ?>
                                                                    </p>
                                                                </form>
                                                            <?php } ?>
                                                        </td>
                                                        <td style="width:5%;">
                                                            <div title="Filtrar Comentarios"  onclick="comentarios(<?= $detalle->getIdSeropel(); ?>,<?= $item->getSeason(); ?>, 0)">
                                                                <i class="fa fa-2x fa-comment" style="padding: 0px; color: orange;"></i>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr><td colspan="4" style="width:100%;">
                                                            <table id="temporada_<?= $item->getSeason(); ?>" style="display:none; width:100%;">
                                                                <?php
                                                                for ($i = 1; $i <= $item->getEpisode(); $i++) {
                                                                    ?>
                                                                    <tr>
                                                                        <td colspan="4" style="width:100%;">
                                                                            <hr style="padding: 0;margin: 0;" />
                                                                        </td><td></td>
                                                                    </tr>
                                                                    <tr><td style="width:60%;"><div class="meta meta-footer d-flex mb-0">&nbsp;&nbsp;&nbsp;&nbsp; Episodio <?= $i; ?></div></td>
                                                                        <td style="width:25%;">
                                                                            <?php
                                                                            if (isset($_SESSION["usuario"])) {
                                                                                $puntuacione = Puntuacion::getPuntuacione($detalle->getIdSeropel(), $_SESSION["usuario"]->idUsu, $item->getSeason(), $i);
                                                                                ?>
                                                                                <form class="comment-form needs-validation botones" id="clasificacions<?= $item->getSeason(); ?>e<?= $i ?>" action="index.php" method="POST" role="form" style="display: block;">
                                                                                    <input name="mod" type="hidden" value="Puntuacion">
                                                                                    <input name="ope" type="hidden" value="<?= $puntuacione == false ? "insert" : "update" ?>">
                                                                                    <input name="idUsu" type="hidden" value="<?= $_SESSION["usuario"]->idUsu ?>">
                                                                                    <input name="idSeropel" type="hidden" value="<?= $detalle->getIdSeropel(); ?>">
                                                                                    <input name="season" type="hidden" value="<?= $puntuacione == false ? $item->getSeason() : $puntuacione->getSeason() ?>">
                                                                                    <input name="episode" type="hidden" value="<?= $puntuacione == false ? $i : $puntuacione->getEpisode() ?>">
                                                                                    <input name="idEst" type="hidden" value="<?= $puntuacione == false ? "0" : $puntuacione->getIdEst() ?>">
                                                                                    <input name="idScore" type="hidden" value="<?= $puntuacione == false ? "" : $puntuacione->getIdScore() ?>">
                                                                                    <p class="clasificado">
                                                                                        <?php
                                                                                        for ($j = 5; $j >= 1; --$j) {
                                                                                            ?>
                                                                                            <input id="radio<?= $j ?>s<?= $item->getSeason(); ?>e<?= $i ?>" type="radio" name="score" value="<?= $j ?>" <?= $puntuacione == false ? "" : ($puntuacione->getScore() == $j ? "selected" : "") ?> onchange="actualizar('clasificacions<?= $item->getSeason(); ?>e<?= $i ?>')">
                                                                                            <label for="radio<?= $j ?>s<?= $item->getSeason(); ?>e<?= $i ?>"><i class="fa  fa-star" style="padding: 0px; <?= $puntuacione == false ? "" : ($puntuacione->getScore() >= $j ? "color: orange;" : "") ?>"></i></label>
                                                                                            <?php
                                                                                        }
                                                                                        ?>
                                                                                    </p>

                                                                                </form>
                                                                            <?php } ?>
                                                                        </td>
                                                                        <td style="width:10%;">
                                                                            <?php
                                                                            if (isset($_SESSION["usuario"])) {
                                                                                ?>
                                                                                <form class="comment-form needs-validation botones" id="estados<?= $item->getSeason(); ?>e<?= $i ?>" action="index.php" method="POST" role="form" style="display: block;">
                                                                                    <input name="mod" type="hidden" value="Puntuacion">
                                                                                    <input name="ope" type="hidden" value="<?= $puntuacione == false ? "insert" : "update" ?>">
                                                                                    <input name="idUsu" type="hidden" value="<?= $_SESSION["usuario"]->idUsu ?>">
                                                                                    <input name="idSeropel" type="hidden" value="<?= $detalle->getIdSeropel(); ?>">
                                                                                    <input name="season" type="hidden" value="<?= $puntuacione == false ? $item->getSeason() : $puntuacione->getSeason() ?>">
                                                                                    <input name="episode" type="hidden" value="<?= $puntuacione == false ? $i : $puntuacione->getEpisode() ?>">
                                                                                    <input name="score" type="hidden" value="<?= $puntuacione == false ? "0" : $puntuacione->getScore() ?>">
                                                                                    <input name="idScore" type="hidden" value="<?= $puntuacione == false ? "" : $puntuacione->getIdScore() ?>">
                                                                                    <p class="clasificado">
                                                                                        <input id="radio7s<?= $item->getSeason(); ?>e<?= $i ?>" type="radio" name="idEst" value="4" <?= $puntuacione == false ? "" : ($puntuacione->getIdEst() == 4 ? "selected" : ""); ?> onchange="actualizar('estados<?= $item->getSeason(); ?>e<?= $i ?>')">
                                                                                        <label for="radio7s<?= $item->getSeason(); ?>e<?= $i ?>" title="Visto" ><i class="fa  fa-check" style="padding: 0px; <?= $puntuacione == false ? "" : ($puntuacione->getIdEst() == 4 ? "color: orange;" : ""); ?>"></i></label>
                                                                                        <?php if ($puntuacione != false) { ?>
                                                                                            <input id="radio6s<?= $item->getSeason(); ?>e<?= $i ?>" type="radio" name="idEst" value="0" <?= $puntuacione == false ? "" : ($puntuacione->getIdEst() == 0 ? "selected" : ""); ?> onchange="actualizar('estados<?= $item->getSeason(); ?>e<?= $i ?>')">
                                                                                            <label for="radio6s<?= $item->getSeason(); ?>e<?= $i ?>" title="No Visto"><i class="fa  fa-close" style="padding: 0px;  <?= $puntuacione == false ? "" : ($puntuacione->getIdEst() == 0 ? "color: orange;" : ""); ?>"></i></label>
                                                                                        <?php } ?>
                                                                                    </p>
                                                                                </form>
                                                                            <?php } ?>
                                                                        </td>
                                                                        <td style="width:5%;">
                                                                            <div title="Filtrar Comentarios" onclick="comentarios(<?= $detalle->getIdSeropel(); ?>,<?= $item->getSeason(); ?>,<?= $i; ?>)">
                                                                                <i class="fa fa-comment" style="padding: 0px; color: orange;"></i>
                                                                            </div>
                                                                        </td><td></td></tr>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                                if (isset($_SESSION["usuario"])) {
                                                    if ($_SESSION["usuario"]->type == 2 || $_SESSION["usuario"]->type == 0) {
                                                        ?>
                                                        <tr>
                                                            <td colspan="4" style=" width:100%;">
                                                                <hr/>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width:50%;"><div class="meta meta-footer d-flex mb-0">Eliminar Ultima Temporada</div></td>
                                                            <td colspan="3" style="width:50%;">
                                                                <a class="align-content-end dropdown-item" title="Eliminar Temporada" href="#" onclick="modal('eliminarepi',<?php echo $detalle->getIdSeropel(); ?>,<?= $e ?>)"><i class="fa fa-4x fa-trash" style="padding: 0px; color: orange;"></i></a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="4" style=" width:100%;">
                                                                <hr/>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width:50%;"><div class="meta meta-footer d-flex mb-0">Añadir Temporada <?= $e + 1; ?></div></td>
                                                            <td colspan="3" style="width:50%;">
                                                                <form class="comment-form needs-validation botones" id="añadirepisodio" action="index.php" method="POST" role="form" style="display: block;">
                                                                    <div class="row">
                                                                        <input name="mod" type="hidden" value="Episodio">
                                                                        <input name="ope" type="hidden" value="insert">
                                                                        <input name="idSeropel" type="hidden" value="<?= $detalle->getIdSeropel(); ?>">
                                                                        <input name="season" type="hidden" value="<?= $e + 1 ?>">
                                                                        <div class="col-md-4">
                                                                            <label for="episode"><i class="fa fa-asterisk" style="padding: 0px; color: red;"></i>Nº de Episodios:</label>
                                                                        </div><div class="col-md-6">
                                                                            <input name="episode" type="number" id="episode" class="form-control" min="1" step="1" pattern="^[0-9]+" required>
                                                                            <div class="valid-feedback">
                                                                                <i class="fa fa-2x fa-check" style="padding: 0px; color: green;"></i>
                                                                            </div>
                                                                            <div class="invalid-feedback">
                                                                                <i class="fa fa-2x fa-close" style="padding: 0px; color: red;"></i>Debe introducir un valor
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-2" title="Añadir Temporada">
                                                                            <i class="fa fa-3x fa-plus-circle" onclick="actualizar('añadirepisodio')" style="padding: 0px; color: orange;"></i>
                                                                        </div></div>
                                                                </form>
                                                            </td>
                                                        </tr>
                                                    <?php }
                                                }
                                                ?>
                                            </table>
                                        </div>
                                        <!-- /.box -->
                                    </div>
                                    <?php } ?>
                                <div id="ajaxcom">
                                    <?php
                                    require_once "view/ajax.comentario.php";
                                    ?>
                                </div>
                                <div id="ajaxmodal">
                                    <?php
                                    require_once "view/modal.login.php";
                                    ?>
                                </div>
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

                <?php
                require_once "assets/inc/script.inc";
                ?>
                <script type="text/javascript">
<?php if (isset($success) && isset($msg)) { ?>
                        showMessage(<?php echo $success; ?>, '<?php echo $msg; ?>');
    <?php
}
?>
                </script>
                </body>
                </html>