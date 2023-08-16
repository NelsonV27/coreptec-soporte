<?php
    require_once("../config/conexion.php");
    require_once("../models/Opcion.php");
    $requerimiento = new Opcion();

    switch($_GET["op"]){

        case "guardaryeditar":
            if(empty($_POST["opci_id"])){       
                $requerimiento->insert_requerimiento($_POST["cat_id"],$_POST["opci_nom"]);  // por aqui esta pasando     
            }
            else {
                $requerimiento->update_requerimiento($_POST["opci_id"],$_POST["cat_id"],$_POST["opci_nom"]);
            }
            break;

        case "listar":
            $datos=$requerimiento->get_requerimiento_all();
            $data= Array();
            foreach($datos as $row){
                $sub_array = array();
                $sub_array[] = $row["cat_nom"];
                $sub_array[] = $row["opci_nom"];
                $sub_array[] = '<button type="button" onClick="editar('.$row["opci_id"].');"  id="'.$row["opci_id"].'" class="btn btn-inline btn-warning btn-sm ladda-button"><i class="fa fa-edit"></i></button>';
                $sub_array[] = '<button type="button" onClick="eliminar('.$row["opci_id"].');"  id="'.$row["opci_id"].'" class="btn btn-inline btn-danger btn-sm ladda-button"><i class="fa fa-trash"></i></button>';
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
            $requerimiento->delete_requerimiento($_POST["opci_id"]);
            break;

        case "mostrar";
            $datos=$requerimiento->get_requerimiento_x_id($_POST["opci_id"]);  
            if(is_array($datos)==true and count($datos)>0){
                foreach($datos as $row)
                {
                    $output["opci_id"] = $row["opci_id"];
                    $output["opci_nom"] = $row["opci_nom"];
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
            $datos = $requerimiento->get_requerimiento_x_tick_titulo($_POST["cat_id"]);
            $html="";
            $html.="<option label='Seleccionar'></option>";
            if(is_array($datos)==true and count($datos)>0){
                foreach($datos as $row)
                {
                    $html.= "<option value='".$row['opci_id']."'>".$row['opci_nom']."</option>";
                }
                echo $html;
            }
        break;
    }
?>