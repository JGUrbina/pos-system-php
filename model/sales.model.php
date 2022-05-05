<?php
    require_once("conexion.php");
    class SalesModel {
        /**======================================
        *             Show Sales
        * ======================================**/
        static public function MdlShowSales($table, $item, $value) {
            if($item != null) {
                $stmt = Conexion::connect()->prepare("SELECT * FROM $table WHERE $item = :$item ORDER BY date_create DESC");

                $stmt -> bindParam(':'.$item, $value, PDO::PARAM_STR);
                
                
                $stmt -> execute();

                return $stmt -> fetch(PDO::FETCH_ASSOC);
            } else {
                $stmt = Conexion::connect()->prepare("SELECT * FROM $table ORDER BY date_create DESC");

                $stmt -> execute();

                return $stmt -> fetchAll();
            }
            
            $stmt -> close();

            $stmt = null;
        }
    }