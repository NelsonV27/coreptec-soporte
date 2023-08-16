<?php
    class Departamento extends Conectar{

        //  obtener todas las categorias = SELECT 
        public function get_requerimiento(){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM tm_departamento WHERE est=1;";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        /* TODO:Insert */
        public function insert_requerimiento($ciu_nom){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="INSERT INTO tm_departamento (dept_id, dept_nom, est) VALUES (NULL,?,'1');";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $ciu_nom);
            $sql->execute(); //por aqui esta pasando
            return $resultado=$sql->fetchAll();
        }

        /* TODO:Update */
        public function update_requerimiento($ciu_id,$ciu_nom){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="UPDATE tm_departamento set
                dept_nom = ?
                WHERE
                dept_id = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $ciu_nom);
            $sql->bindValue(2, $ciu_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        /* TODO:Delete */
        public function delete_requerimiento($ciu_id){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="UPDATE tm_departamento SET
                est = 0
                WHERE 
                dept_id = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $ciu_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        /* TODO:Registro x id */
        public function get_requerimiento_x_id($ciu_id){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM tm_departamento WHERE dept_id = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $ciu_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        //  obtener todas las categorias = SELECT 
        public function get_requerimiento_x_tick_titulo($ciu_id){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM tm_departamento WHERE dept_id=? AND est=1;";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $ciu_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

    }
?>