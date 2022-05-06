<?php
require_once '../controller/products.controller.php';
require_once '../model/products.model.php';


class ProductsAjax {
    public $id_category;
     /**======================================
    *             Search Category
    * ======================================**/
    function createProductCode () {
         $item = 'id_category';
        $value = $this -> id_category;
       
       
        $products = ProductsController::productsShowCtr($item, $value);

        echo json_encode($products);
    }


    public $id_product;
    public $getAllProducts;
    public $name_product;
  public function editProduct(){

    if($this->getAllProducts == 'ok') {
        $item = null;
        $value = null;
        
        $response = ProductsController::productsShowCtr($item, $value);

        echo json_encode($response);
    } else if($this->name_product != ''){
        $item = "name";
        $value = $this->name_product;
    
        $response = ProductsController::productsShowCtr($item, $value);

        echo json_encode($response);
    }
    else {
        $item = "id";
        $value = $this->id_product;
    
        $response = ProductsController::productsShowCtr($item, $value);

        echo json_encode($response);
    }

  }


   /**======================================
    *             Delete Product
    * ======================================**/
    public $delete_id;
    public $delete_img;
    function deleteProductAjax() {
         
        $id = $this->delete_id;
        $img = $this->delete_img;
        $response = ProductsController::productDeleteCtr($id, $img);
        
        return $response;
        
    }
}

if(isset($_POST['id_category'])) {
     
    $codeProduct = new ProductsAjax();
    $codeProduct -> id_category = $_POST['id_category'];
    $codeProduct -> createProductCode();

}



if(isset($_POST['id_product'])) {
     
    $codeProduct = new ProductsAjax();
    $codeProduct -> id_product = $_POST['id_product'];
    $codeProduct ->editProduct();

}

/**======================================
 *            Delete product
 * ======================================**/
if(isset($_POST['delete_id'])) {
     
     $validate = new ProductsAjax();
     $validate -> delete_id = $_POST['delete_id'];
     $validate -> delete_img = $_POST['img_product'];
     $response = $validate -> deleteProductAjax();

     echo $response;
     
 }

/**======================================
 *           GET All Products
 * ======================================**/
 if(isset($_POST['getAllProducts'])) {
    $getAllProducts = new ProductsAjax();
     $getAllProducts -> getAllProducts = $_POST['getAllProducts'];

     $response = $getAllProducts -> editProduct();

     echo $response;
 }
/**======================================
 *           GET  Product por name
 * ======================================**/
 if(isset($_POST['name_product'])) {
     
    $codeProduct = new ProductsAjax();
    $codeProduct -> name_product = $_POST['name_product'];
    $codeProduct ->editProduct();

}