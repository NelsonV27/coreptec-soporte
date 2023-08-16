<?php
    require_once("../config/conexion.php");
    require_once("../models/Requerimiento.php");
    $requerimiento = new Requerimiento();

    switch($_GET["op"]){

        case "guardaryeditar":
            if(empty($_POST["req_id"])){       
                $requerimiento->insert_requerimiento($_POST["req_nom"]); // por aqui esta pasando     
            }
            else {
                $requerimiento->update_requerimiento($_POST["req_id"],$_POST["req_nom"]);
            }
            break;

        case "listar":
            $datos=$requerimiento->get_requerimiento();
            $data= Array();
            foreach($datos as $row){
                $sub_array = array();
                $sub_array[] = $row["req_nom"];
                $sub_array[] = '<button type="button" onClick="editar('.$row["req_id"].');"  id="'.$row["req_id"].'" class="btn btn-inline btn-warning btn-sm ladda-button"><i class="fa fa-edit"></i></button>';
                $sub_array[] = '<button type="button" onClick="eliminar('.$row["req_id"].');"  id="'.$row["req_id"].'" class="btn btn-inline btn-danger btn-sm ladda-button"><i class="fa fa-trash"></i></button>';
                $data[] = $sub_array;
            }

            $results = array(
                "sEcho"=>1,
                "iTotalRecords"=>count($data),
                "iTotalDisplayRecords"=>count($data),
                "aaData"=>$data);
            echo json_encode($results);
            break;

        case "eliminar":
            $requerimiento->delete_requerimiento($_POST["req_id"]);
            break;

        case "mostrar";
            $datos=$requerimiento->get_requerimiento_x_id($_POST["req_id"]);  
            if(is_array($datos)==true and count($datos)>0){
                foreach($datos as $row)
                {
                    $output["req_id"] = $row["req_id"];
                    $output["req_nom"] = $row["req_nom"];
                }
                echo json_encode($output);
            }
            break;
        
        /*case "combo":
            $datos = $categoria->get_categoria();
            $html="";
            $html.="<option label='Seleccionar'></option>";
            if(is_array($datos)==true and count($datos)>0){
                foreach($datos as $row)
                {
                    $html.= "<option value='".$row['cat_id']."'>".$row['cat_nom']."</option>";
                }
                echo $html;
            }
        break;*/

        case "combo":
            $datos = $requerimiento->get_requerimiento();
            $html="";
            $html.="<option label='Seleccionar'></option>";
            if(is_array($datos)==true and count($datos)>0){
                foreach($datos as $row)
                {
                    $html.= "<option value='".$row['req_id']."'>".$row['req_nom']."</option>";
                }
                echo $html;
            }
        break;
    }
?>