<?php
   
require_once("conexion.php");

    class CategoriesModel {
        /**======================================
         *             Show users
         * ======================================**/ 
        static function MdlShowCategories($table, $item, $value) {

            if($item != null) {
                $stmt = Conexion::connect()->prepare("SELECT * FROM $table WHERE $item = :$item");

                $stmt -> bindParam(':'.$item, $value, PDO::PARAM_STR);
                
                
                $stmt -> execute();

                return $stmt -> fetch(PDO::FETCH_ASSOC);
            } else {
                $stmt = Conexion::connect()->prepare("SELECT * FROM $table");

                $stmt -> execute();

                return $stmt -> fetchAll();
            }
            
            $stmt -> close();

            $stmt = null;
        }

        /**======================================
         *             User Register
         * ======================================**/ 
        static function MdlRegisterCategory($table, $data) {
            $stmt = Conexion::connect()->prepare("INSERT INTO $table(name) VALUES (:name)");

            $stmt -> bindParam(':name', $data['name'], PDO::PARAM_STR);
           

            if($stmt->execute()) {return 'OK';}
            return 'ERROR';

            $stmt -> close();
            $stmt = null;
        }


        /**======================================
         *             User update
         * ======================================**/ 

          static function MdlUpdateCategory($table, $data) {

            $stmt = Conexion::connect()->prepare("UPDATE $table SET name = :name WHERE id = :id");

            $stmt -> bindParam(':name', $data['name'], PDO::PARAM_STR);
            $stmt -> bindParam(':id', $data['id'], PDO::PARAM_STR);

            if($stmt->execute()) {return 'OK';}
            return 'ERROR';

            $stmt -> close();
            $stmt = null;
        }

        /**======================================
         *             User update
         * ======================================**/ 

          static function MdlUpdatedUser($table, $item1, $value1, $item2, $value2) {


            $stmt = Conexion::connect()->prepare("UPDATE $table SET $item1 = :$item1 WHERE $item2 = :$item2");

            $stmt -> bindParam(":".$item1, $value1, PDO::PARAM_STR);
            $stmt -> bindParam(":".$item2, $value2, PDO::PARAM_STR);
            
            if($stmt->execute()) {return 'OK';}
            return 'ERROR';

            $stmt -> close();
            $stmt = null;
        }

        static function MdlDeleteCategory($table, $item) {
            $stmt = Conexion::connect()->prepare("DELETE FROM $table WHERE id = :id");

            $stmt -> bindParam(":id", $item, PDO::PARAM_STR);
            
            if($stmt->execute()) { return 'OK';}
            return 'ERROR';

            $stmt -> close();
            $stmt = null;
        }
    }