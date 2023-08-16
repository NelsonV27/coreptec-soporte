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
                                <h3>Calendario de reuniones</h3>
                                <ol class="breadcrumb breadcrumb-simple">
                                    <li><a href="#">Home</a></li>
                                    <li class="active"><a href="../SalaReunion/">Sala de Reuniones</a></li>
                                    <li class="active">Calendario</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </header>
                <div class="container">
                    <div id='calendario'></div>
                </div>
            </div>
        </div>
        <script src='../../public/js/lib/fullcalendar/fullcalendar.min.js'></script>
        <script src="../../public/js/lib/fullcalendar/locales/es.js"></script>
        <?php require_once("../MainJs/js.php"); ?>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var calendarEl = document.getElementById('calendario');
                var calendar = new FullCalendar.Calendar(calendarEl, {
                    locale: 'es',
                    navLinks: true,
                    themeSystem: 'bootstrap5',
                    initialView: 'dayGridMonth',
                    firstDay: 1,
                    buttonText: {
                        today: 'Hoy',
                        month: 'Meses',
                        week: 'Semanas',
                        day: 'Días',
                        year: 'Años',
                        list: 'Lista'
                    },
                    allDayText: 'Todo el día',
                    showMoreText: 'más',
                    dayPopoverText: 'Ver más',
                    headerToolbar: {
                        right: 'multiMonthYear,dayGridMonth,timeGridWeek,timeGridDay',
                        center: 'title',
                        left: 'prev,today,next'
                    },
                    eventClick: function(info) {
                        calendar.changeView('timeGridDay', info.event.start);
                    },
                });
                $.ajax({
                    url: '../../controllers/reuniones.php?op=listar',
                    type: 'POST',
                    dataType: 'json',
                    success: function(response) {
                        console.log(response);
                        response.aaData.forEach(element => {
                            console.log(element);
                            var nuevoEvento = {
                                title: element[4],
                                start: element[5],
                                color: "#198754",
                                end: element[6],

                            };
                            calendar.addEvent(nuevoEvento);
                        });
                    },
                    error: function(xhr, status, error) {
                        alert('Ha ocurrido un error al guardar el evento.' + error.message);
                    }
                });
                calendar.render();
            });
        </script>
        <!-- Contenido -->
        <!--<?php require_once("modalasignar.php"); ?>-->
        <?php require_once("formularioreunion.php"); ?>
        <script type="text/javascript" src="salareunion.js"></script>
        <?php require_once("../MainJs/js.php"); ?>
    </body>

    </html>
<?php
} else {
    header("Location:" . Conectar::ruta() . "index.php");
}
?>