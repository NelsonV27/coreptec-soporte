<?php
    class Categoria extends Conectar{

        //  obtener todas las categorias = SELECT 
        public function get_categoria($req_id){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM tm_categoria WHERE req_id=? AND est=1;";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $req_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function get_categoria_all(){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT 
            tm_categoria.cat_id,
            tm_categoria.req_id,
            tm_categoria.cat_nom,
            tm_requerimiento.req_nom
            FROM tm_categoria INNER JOIN
            tm_requerimiento on tm_categoria.req_id = tm_requerimiento.req_id
            WHERE tm_categoria.est=1";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        /* TODO:Insert */
        public function insert_categoria($req_id,$cat_nom){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="INSERT INTO tm_categoria (cat_id,req_id,cat_nom,est) VALUES (NULL,?,?,'1');";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $req_id);
            $sql->bindValue(2, $cat_nom);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        /* TODO:Update */
        public function update_categoria($cat_id,$req_id,$cat_nom){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="UPDATE tm_categoria set
                req_id = ?
                cat_nom = ?
                WHERE
                cat_id = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $cat_id);
            $sql->bindValue(2, $req_id);
            $sql->bindValue(3, $cat_nom);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        /* TODO:Delete */
        public function delete_categoria($cat_id){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="UPDATE tm_categoria SET
                est = 0
                WHERE 
                cat_id = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $cat_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        /* TODO:Registro x id */
        public function get_categoria_x_id($cat_id){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM tm_categoria WHERE cat_id = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $cat_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        //  obtener todas las categorias = SELECT 
        public function get_categoria_x_tick_titulo($req_id){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM tm_categoria WHERE req_id=? AND est=1;";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $req_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

    }
?>