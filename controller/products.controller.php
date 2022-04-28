<?php




class ProductsController {


    /**======================================
    *             User Register
    * ======================================**/

    static public function productRegisterCtr() {
        include 'utils/constants.php';
        include 'utils/extents_functions.php';
        
        if(isset($_POST['name-product']))
           {
            
        
            
            if(!preg_match($RegExNumber , $_POST['stock'])) { echo  $anyNumbers;return; }
            if(!preg_match($RegExNumber , $_POST['purchase_price'])) { echo  $anyNumbers;return; }
            if(!preg_match($RegExNumber, $_POST['sale_price'])) { echo  $anyNumbers;return; }

             /**
            * Save img
            */
            $img = $_FILES['product_img'];
            $img_directory = 'views/assets/img/products/default/anonymous.png';
          
           if($img['tmp_name']) {

               $new_width = 500;
               $new_height = 500;

               $directory = 'views/assets/img/products/'.str_replace(" ", "", $_POST['name-product']).'-'.$_POST['code'];

               $img_directory = imgSave($img, '', $new_width, $new_height, $directory);
           }

            $name = $_POST['name-product'];
            $code = $_POST['code'];
            $sku = $_POST['sku'];
            $description = $_POST['description'];
            $category = $_POST['category'];
            $stock = $_POST['stock'];
            $purchase_price = $_POST['purchase_price'];
            $sale_price = $_POST['sale_price'];
            $porcentaje =  $_POST['porcentaje'];
            
            $product_data = Array(
                                'name' => $name,
                                'code' => $code,
                                'sku' => $sku,
                                'description' => $description,
                                'id_category' => $category,
                                'stock' => $stock,
                                'purchase_price' => $purchase_price,
                                'sale_price' => $sale_price,
                                'porcentaje' => $porcentaje,
                                'image' => $img_directory,
                                'sales' => '0'
                                
                              );

                             
            $table = 'products';

            $response = productsModel::MdlRegisterProduct($table, $product_data);

           
            
            if($response === 'OK') { echo $product_register_success;  return;}
        } 
    }

  



    /**======================================
    *            Users Show
    * ======================================**/

    static public function productsShowCtr($item, $value) {

        $table = 'products';
       
        $response = ProductsModel::MdlShowProducts($table, $item, $value);
         
        return $response;
        
       
    }

    /*=============================================
	        EDIT PRODUCT
	=============================================*/

	static public function productUpdateCtr(){

        include 'utils/constants.php';
        
        
		if(isset($_POST["edit-description"])){

            // if(!preg_match($RegExNumber , $_POST['stock'])) { echo  $anyNumbers;return; }
            // if(!preg_match($RegExNumber , $_POST['purchase_price'])) { echo  $anyNumbers;return; }
            // if(!preg_match($RegExNumber, $_POST['sale_price'])) { echo  $anyNumbers;return; }

			

		   		/*=============================================
				VALIDAR IMAGEN
				=============================================*/
            $img = $_FILES['edit-product_img'];
            $img_directory = $_POST['actual_product_img'];
                
            if($img['tmp_name'] && !empty($img['tmp_name'])) {

                $new_width = 500;
                $new_height = 500;

                $directory = 'views/assets/img/products/'.str_replace(" ", "", $_POST['name-product']).'-'.$_POST['code'];


                $img_directory = imgSave($img, '', $new_width, $new_height, $directory);
            }
			   	
            $id = $_POST['edit-id'];
			$name = $_POST['edit-name-product'];
            $code = $_POST['edit-code'];
            $sku = $_POST['edit-sku'];
            $description = $_POST['edit-description'];
            $category = $_POST['edit-category'];
            $stock = $_POST['edit-stock'];
            $purchase_price = $_POST['edit-purchase_price'];
            $sale_price = $_POST['edit-sale_price'];
            $porcentaje =  $_POST['edit-porcentaje'];
            $sales = $_POST['edit-sales'];
            $have_porsentaje = $_POST["edit-checked"];
            
            $product_data = Array(
                                'id' => $id,
                                'name' => $name,
                                'code' => $code,
                                'sku' => $sku,
                                'description' => $description,
                                'id_category' => $category,
                                'stock' => $stock,
                                'purchase_price' => $purchase_price,
                                'sale_price' => $sale_price,
                                'porcentaje' => $porcentaje,
                                'image' => $img_directory,
                                'sales' => $sales,
                                'have_porsentaje' => $have_porsentaje
                              );

            

            $table = 'products';

           $response = productsModel::MdlUpdateProduct($table, $product_data);

            var_dump($_POST["edit-checked"]);
            
           //if($response === 'OK') { echo $product_edit_success; return;} 


			
		}

	}

    /**======================================
    *            User delete
    * ======================================**/

    static public function productDeleteCtr($item) {
        
        $table = 'products';
        
         
       
        $response = ProductsModel::MdlDeleteProduct($table, $item);

        

        if($response == 'OK') {
            
            return $response;
        } else {
            return 'false';
        }
        
    }

}