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

  public function editProduct(){

    $item = "id";
    $value = $this->id_product;
    
    $response = ProductsController::productsShowCtr($item, $value);

    echo json_encode($response);

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