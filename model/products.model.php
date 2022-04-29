<?php
   
require_once("conexion.php");

    class ProductsModel {
        /**======================================
         *             Show users
         * ======================================**/ 
        static function MdlShowProducts($table, $item, $value) {

            if($item != null) {
                $stmt = Conexion::connect()->prepare("SELECT * FROM $table WHERE $item = :$item ORDER BY id DESC");

                $stmt -> bindParam(':'.$item, $value, PDO::PARAM_STR);
                
                
                $stmt -> execute();

                return $stmt -> fetch(PDO::FETCH_ASSOC);
            } else {
                $stmt = Conexion::connect()->prepare("SELECT * FROM $table ORDER BY id DESC");

                $stmt -> execute();

                return $stmt -> fetchAll();
            }
            
            $stmt -> close();

            $stmt = null;
        }

        /**======================================
         *             User Register
         * ======================================**/ 
        static function MdlRegisterProduct($table, $data) {
            $stmt = Conexion::connect()->prepare("INSERT INTO $table(name, code, sku, description, id_category, stock, purchase_price, sale_price, porcentaje, image, sales, have_porsentaje) VALUES (:name, :code, :sku, :description, :id_category, :stock, :purchase_price, :sale_price, :porcentaje, :image, :sales, :have_porsentaje)");

            
		$stmt->bindParam(":name", $data["name"], PDO::PARAM_STR);
		$stmt->bindParam(":code", $data["code"], PDO::PARAM_STR);
        $stmt->bindParam(":sku", $data["sku"], PDO::PARAM_STR);
		$stmt->bindParam(":description", $data["description"], PDO::PARAM_STR);
		$stmt->bindParam(":id_category", $data["id_category"], PDO::PARAM_STR);
		$stmt->bindParam(":stock", $data["stock"], PDO::PARAM_STR);
		$stmt->bindParam(":purchase_price", $data["purchase_price"], PDO::PARAM_STR);
		$stmt->bindParam(":sale_price", $data["sale_price"], PDO::PARAM_STR);
        $stmt->bindParam(":porcentaje", $data["porcentaje"], PDO::PARAM_STR);
		$stmt->bindParam(":image", $data["image"], PDO::PARAM_STR);
        $stmt->bindParam(":sales", $data["sales"], PDO::PARAM_STR);
        $stmt->bindParam(":have_porsentaje", $data["have_porsentaje"], PDO::PARAM_STR);
		

		if($stmt->execute()){

			return "OK";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

            $stmt -> bindParam(':name', $data['name'], PDO::PARAM_STR);
           

            if($stmt->execute()) {return 'OK';}
            return 'ERROR';

            $stmt -> close();
            $stmt = null;
        }


        /**======================================
         *             User update
         * ======================================**/ 

          static function MdlUpdateProduct($table, $data) {

            //$stmt = Conexion::connect()->prepare("UPDATE $table SET id = :id WHERE id = :id");
            $stmt = Conexion::connect()->prepare("UPDATE $table SET name = :name, code = :code, sku = :sku, description = :description, id_category = :id_category, stock = :stock, purchase_price = :purchase_price, sale_price = :sale_price, porcentaje = :porcentaje, image = :image, sales = :sales, have_porsentaje = :have_porsentaje WHERE id = :id");

            
            $stmt -> bindParam(':id', $data['id'], PDO::PARAM_STR);
             $stmt->bindParam(":name", $data["name"], PDO::PARAM_STR);
		     $stmt->bindParam(":code", $data["code"], PDO::PARAM_STR);
             $stmt->bindParam(":sku", $data["sku"], PDO::PARAM_STR);
		     $stmt->bindParam(":description", $data["description"], PDO::PARAM_STR);
		     $stmt->bindParam(":id_category", $data["id_category"], PDO::PARAM_STR);
		     $stmt->bindParam(":stock", $data["stock"], PDO::PARAM_STR);
		     $stmt->bindParam(":purchase_price", $data["purchase_price"], PDO::PARAM_STR);
		     $stmt->bindParam(":sale_price", $data["sale_price"], PDO::PARAM_STR);
             $stmt->bindParam(":porcentaje", $data["porcentaje"], PDO::PARAM_STR);
		     $stmt->bindParam(":image", $data["image"], PDO::PARAM_STR);
             $stmt->bindParam(":sales", $data["sales"], PDO::PARAM_STR);
            $stmt->bindParam(":have_porsentaje", $data["have_porsentaje"], PDO::PARAM_STR);

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

        static function MdlDeleteProduct($table, $item) {
            $stmt = Conexion::connect()->prepare("DELETE FROM $table WHERE id = :id");

            $stmt -> bindParam(":id", $item, PDO::PARAM_STR);
            
            if($stmt->execute()) { return 'OK';}
            return 'ERROR';

            $stmt -> close();
            $stmt = null;
        }
    }