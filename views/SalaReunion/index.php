<?php
require_once("../../config/conexion.php");
if (isset($_SESSION["usu_id"])) {
?>
	<!DOCTYPE html>
	<html>
	<?php require_once("../MainHead/head.php"); ?>
	<title>Sala de Reuniones</title>
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
								<h3>Sala de Reuniones -> En Desarrollo</h3>
								<ol class="breadcrumb breadcrumb-simple">
									<li><a href="#">Home</a></li>
									<li class="active">Sala de Reuniones</li>
								</ol>
							</div>
						</div>
					</div>
				</header>

				<div class="box-typical box-typical-padding">

					<div class="row" id="viewuser">
						<div class="col-lg-3">
							<fieldset class="form-group">
								<a class="btn btn-rounded btn-primary btn-block" id="reunion_form" href="nuevareserva.php"><i class="font-icon-plus"></i> Nueva Reservar</a>
							</fieldset>
						</div>
						<div class="col-lg-3">
							<fieldset class="form-group">
								<a class="btn btn-rounded btn-primary btn-block" id="reunion_form" href="calendario.php"><i class="font-icon-calend"></i> Calendario</a>
							</fieldset>
						</div>
						<!--<div class="col-lg-3">
							<fieldset class="form-group">
								<label class="form-label" for="cat_id">Categoria</label>
								<select class="select2" id="cat_id" name="cat_id" data-placeholder="Seleccionar">
									<option label="Seleccionar"></option>

								</select>
							</fieldset>
						</div>-->

						<!--<div class="col-lg-2">
						<fieldset class="form-group">
							<label class="form-label" for="prio_id">Prioridad</label>
							<select class="select2" id="prio_id" name="prio_id" data-placeholder="Seleccionar">
								<option label="Seleccionar"></option>

							</select>
						</fieldset>
					</div>-->

						<!--<div class="col-lg-2">
							<fieldset class="form-group">
								<label class="form-label" for="btnfiltrar">&nbsp;</label>
								<button type="submit" class="btn btn-rounded btn-primary btn-block" id="btnfiltrar">Filtrar</button>
							</fieldset>
						</div>-->

						<!--<div class="col-lg-2">
							<fieldset class="form-group">
								<label class="form-label" for="btntodo">&nbsp;</label>
								<button class="btn btn-rounded btn-primary btn-block" id="btntodo">Gye/Quit</button>
							</fieldset>
						</div>-->
					</div>

					<div class="box-typical box-typical-padding" id="table">
						<table id="ticket_data" class="table table-bordered table-striped table-vcenter js-dataTable-full">
							<thead>
								<tr>
									<th style="width: 5%;">Nro.Reservacion</th>
									<th style="width: 5%;">Usuario</th>
									<th class="d-none d-sm-table-cell" style="width: 5%;">Ciudad</th>
									<th class="d-none d-sm-table-cell" style="width: 5%;">Departamento</th>
									<th class="d-none d-sm-table-cell" style="width: 5%;">Titulo</th>
									<th class="d-none d-sm-table-cell" style="width: 5%;">Fecha Inicio</th>
									<th class="d-none d-sm-table-cell" style="width: 10%;">Fecha Final</th>
									<th class="d-none d-sm-table-cell" style="width: 10%;">Estado</th>
									<th class="d-none d-sm-table-cell" style="width: 10%;">Comentario</th>
									<th class="d-none d-sm-table-cell" style="width: 10%;">Observacion</th>
									<!--<th class="d-none d-sm-table-cell" style="width: 10%;">Soporte</th>-->
									<!--<th class="text-center" style="width: 5%;"></th>-->
								</tr>
							</thead>
							<tbody>
							</tbody>
						</table>
					</div>

				</div>

			</div>
		</div>
		<?php require_once("../MainJs/js.php"); ?>
		<script type="text/javascript" src="salareunion.js"></script>
	</body>

	</html>
<?php
} else {
	header("Location:" . Conectar::ruta() . "index.php");
}
?>