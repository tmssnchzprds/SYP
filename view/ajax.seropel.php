<?php
define("PAGINACION", 4);
$ope = isset($_GET["ope"]) ? $_GET["ope"] : "listaTotal";
$buscar = isset($_GET["buscar"]) ? $_GET["buscar"] : "";
$idCat = isset($_GET["idCat"]) ? $_GET["idCat"] : 0;
$tipo = isset($_GET["tipo"]) ? $_GET["tipo"] : 0;
for ($i = 0; $i < count($seropel); ++$i)
    $paginit[$i] = 1;
$paginaActual = isset($_GET["pagina"]) ? $_GET["pagina"] : implode("-", $paginit);
$arrayActual = explode("-", $paginaActual);
$cantseropel = [];
for ($i = 0; $i < count($seropel), $i < count($arrayActual); ++$i) {
    $cantseropel[$i] = count($seropel[$i]);
    $seropelPagina[$i] = array_splice($seropel[$i], ($arrayActual[$i] - 1) * PAGINACION, PAGINACION);
    $esPrimera[$i] = ($arrayActual[$i] - 1) * PAGINACION;
    $esUltima[$i] = ceil($cantseropel[$i] / PAGINACION) == $arrayActual[$i] || ceil($cantseropel[$i] / PAGINACION) == 0;
}
?>
<div id="cargarseropel">
    <div id="success" class="post box bg-pastel-green shadow" style="display:none; text-align: center; font-weight: bold; margin: 40px 0px; padding: 20px;"><button type="button" class="close"  onclick="hideMessage()">
            <span class="fa fa-2x fa-close" style="padding: 0px; color: red;" aria-hidden="true"></span>
            <span class="sr-only">Cerrar</span>
        </button></div>
    <div id="failure" class="post box bg-pastel-red shadow" style="display:none; text-align: center; font-weight: bold; margin: 40px 0px; padding: 20px;"><button type="button" class="close"  onclick="hideMessage()">
            <span class="fa fa-2x fa-close" style="padding: 0px; color: red;" aria-hidden="true"></span>
            <span class="sr-only">Cerrar</span>
        </button></div>
    <?php
    for ($i = 0; $i < count($seropelPagina); ++$i) {
        $arrayActualAux = $arrayActual;
        ?>
        <div class=" box shadow" style=" font-weight: bold; padding: 20px; width: 100%">
            <div class="row align-items-center">
                <h1 class="col-11"><?= isset($caption[$i]) ? $caption[$i] : ""; ?></h1>
                <?php
                if (isset($_SESSION["usuario"])) {
                    if ($_SESSION["usuario"]->type == 2 || $_SESSION["usuario"]->type == 0) {
                        ?>
                <a class="col-1 dropdown-item" title="Añadir Serie" href="#" onclick="modal('modificarseropel', 0, 0)"><i class="fa fa-4x fa-plus-circle" style="padding: 0px; color: orange;"></i></a>
        <?php }
    } ?>
            </div>
            <div class="row align-items-center">
                <?php
                $arrayActualAux[$i] = $arrayActualAux[$i] - 1;
                if (0 != $esPrimera[$i]) {
                    ?>
                <div class="col-md-0" title="Anterior" onclick="paginacion('<?= $ope; ?>', '<?= $buscar; ?>',<?= $idCat; ?>,<?= $tipo; ?>, '<?= implode("-", $arrayActualAux); ?>')">
                        <i class="fa fa-4x fa-angle-left" style="padding: 0px; color: orange;"></i>
                    </div>
                    <?php
                }
                foreach ($seropelPagina[$i] as $item) {
                    ?>
                    <div class="col mx-auto">
                        <div class="card" style="width: 220px;">
                            <a class="list-link" href="index.php?mod=Seropel&ope=detalle&idSeropel=<?= $item->getIdSeropel(); ?>">
                                <figure class="card-img-top main mb-30 overlay overlay1 rounded"><img  style="    width: 100%;    aspect-ratio: auto 430 / 613;    height: 50%" src="<?= $item->getCover(); ?>">
                                </figure>
                                <div class="card-body bg-white shadow">
                                    <h6 class="card-title" style="height: 60px"><?= $item->getTitle(); ?></h6>
                                    <!-- /.post-content -->
                                    <hr style="margin: 0px; padding: 0px;"/>
                                    <div class="meta meta-footer d-flex mb-0">
                                        <div class="row">
                                            <?php
                                            for ($j = 1; $j <= 5; ++$j) {
                                                if ($j > $item->getValoracion()) {
                                                    ?>
                                                    <div class="col-2"><i class="fa fa-2x fa-star" style="padding: 0px;"></i></div>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <div class="col-2"><i class="fa fa-2x fa-star" style="padding: 0px; color: orange;"></i></div>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div></a>
                            <!-- /.box -->
                        </div>
                    </div>
                    <?php
                }
                $arrayActualAux[$i] = $arrayActualAux[$i] + 2;
                if (!$esUltima[$i]) {
                    ?>
                <div class="col-md-0" title="Siguiente" onclick="paginacion('<?= $ope; ?>', '<?= $buscar; ?>',<?= $idCat; ?>,<?= $tipo; ?>, '<?= implode("-", $arrayActualAux); ?>')">
                        <i class="fa fa-4x fa-angle-right" style="padding: 0px; color: orange;"></i>
                    </div>
        <?php
    }
    ?>
            </div>
        </div>
    <?php
}
?>
</div>