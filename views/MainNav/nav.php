<?php
/* TODO: Rol 1 es de Usuario */
if ($_SESSION["rol_id"] == 1) {
?>
    <nav class="side-menu">
        <ul class="side-menu-list">
            <li class="blue-dirty">
                <a href="..\Home\">
                    <span class="glyphicon glyphicon-th"></span>
                    <span class="lbl">Inicio</span>
                </a>
            </li>

            <li class="blue-dirty">
                <a href="..\NuevoTicket\">
                    <span class="glyphicon glyphicon-th"></span>
                    <span class="lbl">Nuevo Ticket</span>
                </a>
            </li>

            <li class="blue-dirty">
                <a href="..\ConsultarTicket\">
                    <span class="glyphicon glyphicon-th"></span>
                    <span class="lbl">Consultar Ticket</span>
                </a>
            </li>
            <li class="blue-dirty">
                <a href="..\SalaReunion\">
                    <span class="glyphicon glyphicon-th"></span>
                    <span class="lbl">Sala de Reuniones</span>
                </a>
            </li>
        </ul>
    </nav>
<?php
} else {
?>
    <nav class="side-menu">
        <ul class="side-menu-list">
            <li class="blue-dirty">
                <a href="..\Home\">
                    <span class="glyphicon glyphicon-th"></span>
                    <span class="lbl">Inicio</span>
                </a>
            </li>

            <li class="blue-dirty">
                <a href="..\NuevoTicket\">
                    <span class="glyphicon glyphicon-th"></span>
                    <span class="lbl">Nuevo Ticket</span>
                </a>
            </li>

            <li class="blue-dirty">
                <a href="..\MntUsuario\">
                    <span class="glyphicon glyphicon-th"></span>
                    <span class="lbl">Mant. Usuario</span>
                </a>
            </li>

            <li class="blue-dirty">
                <a href="..\MntRequerimiento\">
                    <span class="glyphicon glyphicon-th"></span>
                    <span class="lbl">Mant. Requerimiento</span>
                </a>
            </li>

            <li class="blue-dirty">
                <a href="..\MntOpcion\">
                    <span class="glyphicon glyphicon-th"></span>
                    <span class="lbl">Mant. Opciones</span>
                </a>
            </li>

            <li class="blue-dirty">
                <a href="..\MntPrioridad\">
                    <span class="glyphicon glyphicon-th"></span>
                    <span class="lbl">Mant. Prioridad</span>
                </a>
            </li>

            <li class="blue-dirty">
                <a href="..\MntCategoria\">
                    <span class="glyphicon glyphicon-th"></span>
                    <span class="lbl">Mant. Categoria</span>
                </a>
            </li>

            <!--<li class="blue-dirty">
                        <a href="..\MntSubCategoria\">
                            <span class="glyphicon glyphicon-th"></span>
                            <span class="lbl">Mant. Sub Categoria</span>
                        </a>
                    </li>-->

            <li class="blue-dirty">
                <a href="..\ConsultarTicket\">
                    <span class="glyphicon glyphicon-th"></span>
                    <span class="lbl">Consultar Ticket</span>
                </a>
            </li>
            <li class="blue-dirty">
                <a href="..\SalaReunion\">
                    <span class="glyphicon glyphicon-th"></span>
                    <span class="lbl">Sala de Reuniones</span>
                </a>
            </li>
            <li class="blue-dirty">
                <a href="..\MntCiudad\">
                    <span class="glyphicon glyphicon-th"></span>
                    <span class="lbl">Mnt Ciudad</span>
                </a>
            </li>
            <li class="blue-dirty">
                <a href="..\MntDepartamento\">
                    <span class="glyphicon glyphicon-th"></span>
                    <span class="lbl">Mnt Departamento</span>
                </a>
            </li>
        </ul>
    </nav>
<?php
}
?>