<?php
require_once("../config/conexion.php");
require_once("../models/Reuniones.php");
$reunion = new Reuniones();
switch ($_GET["op"]) {
    case "insert":
        $datos = $reunion->insert_reunion($_POST["usu_id"], $_POST['ciu_id'], $_POST['dept_id'], $_POST['reuni_titulo'], $_POST['fecha_inicio'], $_POST['fecha_final'], $_POST['est_reuni'], $_POST['reuni_coment']);
        echo json_encode($datos);
        break;
    case "listar":
        $datos = $reunion->listar_reuniones();
        $data = array();
        foreach ($datos as $row) {
            $sub_array = array();
            $sub_array[] = $row["reuni_id"]; // el id del ticket = tm_ticket
            $sub_array[] = $row["usuario"]; //el titulo del requerimiento = tm_ticktitulo
            $sub_array[] = $row["ciu_nom"];
            $sub_array[] = $row["dept_nom"]; //el nombre de la categoria = tm_categoria
            $sub_array[] = $row["reuni_titulo"];
            $sub_array[] = $row["fecha_inicio"];
            $sub_array[] = $row["fecha_final"];
            $sub_array[] = $row["est_reuni"];
            $sub_array[] = $row["reuni_coment"];
            $sub_array[] = $row["reuni_obser"];
            $data[] = $sub_array;
        }

        $results = array(
            "sEcho" => 1,
            "iTotalRecords" => count($data),
            "iTotalDisplayRecords" => count($data),
            "aaData" => $data
        );
        echo json_encode($results);
        break;
}
