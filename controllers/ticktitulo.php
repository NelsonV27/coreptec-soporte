<?php
    require_once("../config/conexion.php");
    require_once("../models/TickTitulo.php");
    $titulo = new TickTitulo();

    switch ($_GET["op"]) {
        case "combo":
            $datos = $titulo->get_titulo_ticket();
            $html="";
            $html.="<option label='Seleccionar'></option>";
            if(is_array($datos)==true and count($datos)>0){
                foreach($datos as $row)
                {
                    $html.= "<option value='".$row['tick_idtitu']."'>".$row['tick_titulo']."</option>";
                }
                echo $html;
            }
            break;
    }
