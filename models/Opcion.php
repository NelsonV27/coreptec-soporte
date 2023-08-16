<?php
    class Opcion extends Conectar{

        //  obtener todas las categorias = SELECT 
        public function get_requerimiento($cat_id){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM tm_opcion WHERE cat_id=? AND est=1;";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $cat_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function get_requerimiento_all(){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT 
            tm_opcion.opci_id,
            tm_opcion.cat_id,
            tm_opcion.opci_nom,
            tm_categoria.cat_nom
            FROM tm_opcion INNER JOIN
            tm_categoria on tm_opcion.cat_id = tm_categoria.cat_id
            WHERE tm_opcion.est=1";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        /* TODO:Insert */
        public function insert_requerimiento($cat_id,$opci_nom){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="INSERT INTO tm_opcion (opci_id,cat_id,opci_nom,est) VALUES (NULL,?,?,'1');";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $cat_id);
            $sql->bindValue(2, $opci_nom);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        /* TODO:Update */
        public function update_requerimiento($opci_id,$cat_id,$opci_nom){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="UPDATE tm_opcion set
                cat_id = ?,
                opci_nom = ?
                WHERE
                opci_id = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $cat_id);
            $sql->bindValue(2, $opci_nom);
            $sql->bindValue(3, $opci_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        /* TODO:Delete */
        public function delete_requerimiento($opci_id){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="UPDATE tm_opcion SET
                est = 0
                WHERE 
                opci_id = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $opci_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        /* TODO:Registro x id */
        public function get_requerimiento_x_id($opci_id){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM tm_opcion WHERE opci_id = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $opci_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        //  obtener todas las categorias = SELECT 
        public function get_requerimiento_x_tick_titulo($opci_id){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM tm_opcion WHERE opci_id=? AND est=1;";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $opci_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }
    }
?>