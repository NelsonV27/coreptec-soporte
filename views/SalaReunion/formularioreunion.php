    <?php
    require_once("../../config/conexion.php");
    if (isset($_SESSION["usu_id"])) {
    ?>
        <!DOCTYPE html>
        <html>
        <?php require_once("../MainHead/head.php"); ?>
        <title>Reservar Reunión</title>
        </head>

        <body class="with-side-menu">

            <?php require_once("../MainHeader/header.php"); ?>

            <div class="mobile-menu-left-overlay"></div>

            <?php require_once("../MainNav/nav.php"); ?>

            <!-- Contenido -->
            <div class="page-content">
                <div class="container-fluid">

                    <header class="section-header">
                        <div class="tbl">
                            <div class="tbl-row">
                                <div class="tbl-cell">
                                    <h3>Reservar Reunión</h3>
                                    <ol class="breadcrumb breadcrumb-simple">
                                        <li><a href="#">Home</a></li>
                                        <li class="active">Nuevo Reserva</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </header>

                    <div class="box-typical box-typical-padding">
                        <p>
                            Desde esta ventana podra reservar la Sala Reuniones.
                        </p>

                        <h5 class="m-t-lg with-border">Ingresar Información</h5>

                        <div class="row">
                            <form method="post" id="reunion_form">

                                <input type="hidden" id="usu_id" name="usu_id" value="<?php echo $_SESSION["usu_id"] ?>">

                                <div class="col-lg-6">
                                    <fieldset class="form-group">
                                        <label class="form-label semibold" for="tick_titulo">Fecha Inicial</label>
                                        <input type="text" class="form-control" id="fecha_inicio" name="fecha_inicio" placeholder="Ingrese la fecha y hora">
                                    </fieldset>
                                </div>

                                <div class="col-lg-6">
                                    <fieldset class="form-group">
                                        <label class="form-label semibold" for="exampleInput">Fecha Final</label>
                                        <select id="fecha_final" name="fecha_final" class="form-control">

                                        </select>
                                    </fieldset>
                                </div>

                                <div class="col-lg-6">
                                    <fieldset class="form-group">
                                        <label class="form-label semibold" for="exampleInput">Ciudad</label>
                                        <select id="ciudad_reunion" name="ciudad_reunion" class="form-control">

                                        </select>
                                    </fieldset>
                                </div>

                                <div class="col-lg-6">
                                    <fieldset class="form-group">
                                        <label class="form-label semibold" for="exampleInput">Estado</label>
                                        <select id="est_reunion" name="est_reunion" class="form-control">

                                        </select>
                                    </fieldset>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="comment">Comentarios:</label>
                                        <textarea id="coment_reunion" name="coment_reunion" class="form-control" rows="6" id="comentarios"></textarea>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <fieldset class="form-group">
                                        <label class="form-label semibold" for="obser_reunion">Obervación -> maximo 9.000 palabras</label>
                                        <div class="summernote-theme-1">
                                            <textarea id="obser_reunion" name="obser_reunion" class="summernote" name="name"></textarea>
                                        </div>
                                    </fieldset>
                                </div>
                                <div class="col-lg-12">
                                    <button type="submit" name="action" value="add" class="btn btn-rounded btn-inline btn-primary">Guardar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Contenido -->

            <?php require_once("../MainJs/js.php"); ?>

            <script type="text/javascript" src="salareunion.js"></script>
            <script type="text/javascript" src="../notificacion.js"></script>

        </body>

        </html>
    <?php
    } else {
        header("Location:" . Conectar::ruta() . "index.php");
    }
    ?>