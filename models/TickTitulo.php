<?php
    class TickTitulo extends Conectar{
        //llenar combo de requerimiento
        public function get_titulo_ticket(){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM tm_ticktitulo WHERE est=1;";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }
    }
?>