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
                                        <li class="active"><a href="../SalaReunion/">Sala de Reuniones</a></li>
                                        <li class="active">Nueva Reserva</li>
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
                                        <label class="form-label semibold" for="reuni_titulo">Título de la reunión</label>
                                        <input type="text" class="form-control" id="reuni_titulo" name="reuni_titulo" placeholder="Ingrese un título para la reunión">
                                    </fieldset>
                                </div>
                                <div class="col-lg-3">
                                    <fieldset class="form-group">
                                        <label class="form-label semibold" for="fecha_inicio">Fecha Inicial</label>
                                        <input type="datetime-local" class="form-control" id="fecha_inicio" name="fecha_inicio" placeholder="Ingrese la fecha y hora">
                                    </fieldset>
                                </div>

                                <div class="col-lg-3">
                                    <fieldset class="form-group">
                                        <label class="form-label semibold" for="fecha_final">Fecha Final</label>
                                        <input type="datetime-local" class="form-control" id="fecha_final" name="fecha_final" placeholder="Ingrese la fecha y hora" disabled>
                                    </fieldset>
                                </div>

                                <div class="col-lg-4">
                                    <fieldset class="form-group">
                                        <label class="form-label semibold" for="dept_id">Departamento</label>
                                        <select id="dept_id" name="dept_id" class="form-control">
                                        </select>
                                    </fieldset>
                                </div>

                                <div class="col-lg-4">
                                    <fieldset class="form-group">
                                        <label class="form-label semibold" for="ciu_id">Ciudad</label>
                                        <select id="ciu_id" name="ciu_id" class="form-control">
                                        </select>
                                    </fieldset>
                                </div>

                                <div class="col-lg-4">
                                    <fieldset class="form-group">
                                        <label class="form-label semibold" for="est_reuni">Estado</label>
                                        <select id="est_reuni" name="est_reuni" class="form-control">
                                            <option value="">Seleccionar</option>
                                            <option>Ocupado</option>
                                            <option>Libre</option>
                                        </select>
                                    </fieldset>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="reuni_coment">Comentarios:</label>
                                        <textarea id="reuni_coment" name="reuni_coment" class="form-control" rows="6"></textarea>
                                    </div>
                                </div>

                                <!-- <div class="col-lg-12">
                                    <fieldset class="form-group">
                                        <label class="form-label semibold" for="obser_reunion">Obervación -> maximo 9.000 palabras</label>
                                        <div class="summernote-theme-1">
                                            <textarea id="obser_reunion" name="obser_reunion" class="summernote" name="name"></textarea>
                                        </div>
                                    </fieldset>
                                </div>-->
                                <div class="col-lg-12">
                                    <button type="submit" name="action" value="add" class="btn btn-rounded btn-inline btn-primary">Guardar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </body>
        <?php require_once("../MainJs/js.php"); ?>
        <script type="text/javascript" src="salareunion.js"></script>
        <script>
            function init() {
                $("#reunion_form").on("submit", function(e) {
                    guardaryeditar(e);
                });
            }
            document.addEventListener("DOMContentLoaded", function() {


                $.post("../../controllers/ciudad.php?op=combo", function(data, status) {
                    $('#ciu_id').html(data);
                    //console.log(data);
                });
                $.post("../../controllers/departamento.php?op=combo", function(data, status) {
                    $('#dept_id').html(data);
                    //console.log(data);
                });
                const fechaInicioInput = document.getElementById("fecha_inicio");
                const fechaFinInput = document.getElementById("fecha_final");
                fechaInicioInput.addEventListener("change", function() {
                    fechaFinInput.value = "";
                    if (fechaInicioInput.value !== "") {
                        fechaFinInput.disabled = false;
                    } else {
                        fechaFinInput.disabled = true;
                    }
                });
                fechaFinInput.addEventListener("change", function() {
                    if (fechaFinInput.value <= fechaInicioInput.value) {
                        swal("¡Advertencia!", "La fecha y hora final debe ser mayor a la fecha y hora inicial.", "warning");
                        fechaFinInput.value = "";
                    }
                });

            });

            function guardaryeditar(e) {
                e.preventDefault();
                var formData = new FormData($("#reunion_form")[0]);
                if ($('#reuni_coment').summernote('isEmpty') || $('#reuni_titulo').val() == '' || $('#fecha_inicio').val() == 0 || $('#fecha_final').val() == 0 || $('#dept_id').val() == 0 || $('#ciu_id').val() == 0 || $('#est_reuni').val() == 0) {
                    swal("Advertencia!", "Campos Vacios", "warning");
                } else {
                    $.ajax({
                        url: "../../controllers/reuniones.php?op=insert",
                        type: "POST",
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function(data) {
                            console.log(data);
                            swal("Reunión Creada", "", "success");
                        }
                    });
                }
            }
            init();
        </script>

        </html>
    <?php
    } else {
        header("Location:" . Conectar::ruta() . "index.php");
    }
    ?>