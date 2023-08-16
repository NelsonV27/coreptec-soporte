<?php
    session_start();

    class Conectar{
        protected $dbh;

        protected function Conexion(){
            try{
                // La cadena de conexion de manera Local
                $conectar = $this->dbh = new PDO("mysql:local=localhost;port=3306;dbname=coreptec_soporte","root","");
                return $conectar;
            } catch (Exception $e){
                print "¡Error BD!:" . $e->getMessage() . "<br/>";
                die();
            }
        }

        public function set_names(){
            return $this->dbh->query("SET NAMES 'utf8'");
        }

        public static function ruta(){
            //LOCAL = MI IP SE CONVIRTIO COMO LOCAL MEDIANTE LA RED COREPTEC WIFI
            return "http://localhost/coreptec_soporte/";
            //Producción = sistema terminado y publicado
            
        }
    }

?>