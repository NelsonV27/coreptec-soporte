<?php
class Reuniones extends Conectar
{
    /* TODO: insertar nuevo ticket */
    public function insert_reunion($usu_id, $ciu_id, $dept_id, $reuni_titulo, $fecha_inicio, $fecha_final, $est_reuni, $reuni_coment)
    {
        try {
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "INSERT INTO tm_reunion (usu_id, ciu_id, dept_id, reuni_titulo, fecha_inicio, fecha_final, est_reuni, reuni_coment, reuni_obser) VALUES (?, ?, ?, ?, ?, ?, ?, ?, '');";
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1, $usu_id);
            $sql->bindValue(2, $ciu_id);
            $sql->bindValue(3, $dept_id);
            $sql->bindValue(4, $reuni_titulo);
            $sql->bindValue(5, $fecha_inicio);
            $sql->bindValue(6, $fecha_final);
            $sql->bindValue(7, $est_reuni);
            $sql->bindValue(8, $reuni_coment);
            $sql->execute();
            $sql1 = "select last_insert_id() as 'reuni_id';";
            $sql1 = $conectar->prepare($sql1);
            $sql1->execute();
            return $resultado = $sql1->fetchAll(pdo::FETCH_ASSOC);
        } catch (\Throwable $th) {
            return $th;
        }
    }
    public function listar_reuniones()
    {
        try {
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "SELECT r.`reuni_id`, r.`reuni_titulo`, r.`fecha_inicio`, r.`fecha_final`, r.`est_reuni`, r.`reuni_coment`, r.`reuni_obser`, c.`ciu_nom`, d.`dept_nom`, CONCAT(u.`usu_nom`, ' ', u.`usu_ape`) AS `usuario` FROM `tm_reunion` AS r JOIN `tm_ciudad` AS c ON r.`ciu_id` = c.`ciu_id` JOIN `tm_departamento` AS d ON r.`dept_id` = d.`dept_id` JOIN `tm_usuario` AS u ON r.`usu_id` = u.`usu_id`;";
            $sql = $conectar->prepare($sql);
            $sql->execute();
            return $resultado = $sql->fetchAll(pdo::FETCH_ASSOC);
        } catch (\Throwable $th) {
            return $th;
        }
    }
}
