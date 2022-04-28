<?php
   
require_once("conexion.php");

    class UsersModel {
        /**======================================
         *             Show users
         * ======================================**/ 
        static function MdlShowUsers($table, $item, $value) {

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
        static function MdlRegisterUser($table, $data) {
            $stmt = Conexion::connect()->prepare("INSERT INTO $table(name, username, password, rol, perfil_img) VALUES (:name, :username, :password, :rol, :perfil_img)");

            $stmt -> bindParam(':name', $data['name'], PDO::PARAM_STR);
            $stmt -> bindParam(':username', $data['username'], PDO::PARAM_STR);
            $stmt -> bindParam(':password', $data['password'], PDO::PARAM_STR);
            $stmt -> bindParam(':rol', $data['rol'], PDO::PARAM_STR);
            $stmt -> bindParam(':perfil_img', $data['perfil_img'], PDO::PARAM_STR);

            if($stmt->execute()) {return 'OK';}
            return 'ERROR';

            $stmt -> close();
            $stmt = null;
        }


        /**======================================
         *             User update
         * ======================================**/ 

          static function MdlUpdateUser($table, $data) {
            $stmt = Conexion::connect()->prepare("UPDATE $table SET name = :name, password = :password, rol = :rol, perfil_img = :perfil_img WHERE username = :username");

            $stmt -> bindParam(':name', $data['name'], PDO::PARAM_STR);
            $stmt -> bindParam(':username', $data['username'], PDO::PARAM_STR);
            $stmt -> bindParam(':password', $data['password'], PDO::PARAM_STR);
            $stmt -> bindParam(':rol', $data['rol'], PDO::PARAM_STR);
            $stmt -> bindParam(':perfil_img', $data['perfil_img'], PDO::PARAM_STR);

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

        static function MdlDeleteUser($table, $item) {
            $stmt = Conexion::connect()->prepare("DELETE FROM $table WHERE id = :id");

            $stmt -> bindParam(":id", $item, PDO::PARAM_STR);

            if($stmt->execute()) {return 'OK';}
            return 'ERROR';

            $stmt -> close();
            $stmt = null;
        }
    }