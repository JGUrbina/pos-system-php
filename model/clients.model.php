<?php
   
require_once("conexion.php");

    class ClientsModel {
        /**======================================
         *             Show Clients
         * ======================================**/ 
        static function MdlShowClients($table, $item, $value) {

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
         *             Client Register
         * ======================================**/ 
        static function MdlRegisterClient($table, $data) {
            $stmt = Conexion::connect()->prepare("INSERT INTO $table(name, email, document, telephone, direction, birthday, sales) VALUES (:name, :email, :document, :telephone, :direction, :birthday, :sales)");

            $stmt -> bindParam(':name', $data['name'], PDO::PARAM_STR);
            $stmt -> bindParam(':email', $data['email'], PDO::PARAM_STR);
            $stmt -> bindParam(':document', $data['document'], PDO::PARAM_STR);
            $stmt -> bindParam(':telephone', $data['telephone'], PDO::PARAM_STR);
            $stmt -> bindParam(':direction', $data['direction'], PDO::PARAM_STR);
            $stmt -> bindParam(':birthday', $data['birthday'], PDO::PARAM_STR);
            $stmt -> bindParam(':sales', $data['sales'], PDO::PARAM_INT);

            if($stmt->execute()) {return 'OK';}
            return 'ERROR';

            $stmt -> close();
            $stmt = null;
        }


        /**======================================
         *             Client update
         * ======================================**/ 

          static function MdlUpdateClient($table, $data) {

            $stmt = Conexion::connect()->prepare("UPDATE $table SET name = :name, email = :email, document = :document, telephone = :telephone, direction = :direction, birthday = :birthday, sales = :sales  WHERE id = :id");

            $stmt -> bindParam(':name', $data['name'], PDO::PARAM_STR);
            $stmt -> bindParam(':email', $data['email'], PDO::PARAM_STR);
            $stmt -> bindParam(':document', $data['document'], PDO::PARAM_STR);
            $stmt -> bindParam(':telephone', $data['telephone'], PDO::PARAM_STR);
            $stmt -> bindParam(':direction', $data['direction'], PDO::PARAM_STR);
            $stmt -> bindParam(':birthday', $data['birthday'], PDO::PARAM_STR);
            $stmt -> bindParam(':sales', $data['sales'], PDO::PARAM_INT);
            $stmt -> bindParam(':id', $data['id'], PDO::PARAM_STR);

            if($stmt->execute()) {return 'OK';}
            return 'ERROR';

            $stmt -> close();
            $stmt = null;
        }

        /**======================================
         *             Client update
         * ======================================**/ 

          static function MdlUpdatedClient($table, $item1, $value1, $item2, $value2) {


            $stmt = Conexion::connect()->prepare("UPDATE $table SET $item1 = :$item1 WHERE $item2 = :$item2");

            $stmt -> bindParam(":".$item1, $value1, PDO::PARAM_STR);
            $stmt -> bindParam(":".$item2, $value2, PDO::PARAM_STR);
            
            if($stmt->execute()) {return 'OK';}
            return 'ERROR';

            $stmt -> close();
            $stmt = null;
        }

        static function MdlDeleteClient($table, $item) {
            $stmt = Conexion::connect()->prepare("DELETE FROM $table WHERE id = :id");

            $stmt -> bindParam(":id", $item, PDO::PARAM_STR);
            
            if($stmt->execute()) { return 'OK';}
            return 'ERROR';

            $stmt -> close();
            $stmt = null;
        }
    }