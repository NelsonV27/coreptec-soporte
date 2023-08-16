<?php
    class Requerimiento extends Conectar{

        //  obtener todas las categorias = SELECT 
        public function get_requerimiento(){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM tm_requerimiento WHERE est=1;";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        /* TODO:Insert */
        public function insert_requerimiento($req_nom){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="INSERT INTO tm_requerimiento (req_id, req_nom, est) VALUES (NULL,?,'1');";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $req_nom);
            $sql->execute(); //por aqui esta pasando
            return $resultado=$sql->fetchAll();
        }

        /* TODO:Update */
        public function update_requerimiento($req_id,$req_nom){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="UPDATE tm_requerimiento set
                req_nom = ?
                WHERE
                req_id = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $req_nom);
            $sql->bindValue(2, $req_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        /* TODO:Delete */
        public function delete_requerimiento($req_id){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="UPDATE tm_requerimiento SET
                est = 0
                WHERE 
                req_id = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $req_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        /* TODO:Registro x id */
        public function get_requerimiento_x_id($req_id){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM tm_requerimiento WHERE req_id = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $req_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        //  obtener todas las categorias = SELECT 
        public function get_requerimiento_x_tick_titulo($req_id){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM tm_requerimiento WHERE req_id=? AND est=1;";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $req_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

    }
?>