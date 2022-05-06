<?php
require_once '../controller/categories.controller.php';
require_once '../controller/products.controller.php';

require_once '../model/categories.model.php';
require_once '../model/products.model.php';

class TableProduct {
    function showProduct() {
        $item = null;
        $value = null;
       
       
        $products = ProductsController::productsShowCtr($item, $value);
        //echo'{ "data":'. json_encode($products) 

        $dataJson = '{ "data":[';  
                for($i = 0; $i < count($products); $i++) {
                    //Categoría del producto
                    $item = 'id';
                    $value = $products[$i]['id_category'];
                    $category = CategoriesController::categoriesShowCtr($item, $value);

                    //Imagen del producto
                     $image = "<img src='". $products[$i]['image'] ."' width='30px'/>";

                     if($products[$i]['stock'] == 0) {
                         $buttom =  "<div class='btn btn-group'><button class='btn btn-default btn-xs recover-product' id-product='".$products[$i]['id']."' >Add</button></div>";
                     } else {
                         $buttom =  "<div class='btn btn-group'><button class='btn btn-primary btn-xs add-product recover-product' id-product='".$products[$i]['id']."' >Add</button></div>";
                     }
                     //Botones del producto 
                   
                     //$buttoms = "<div class='btn btn-group' style='width: 100px;'><button class='btn btn-warning btn-xs btn-edit-product' data-toggle='modal' data-target='#modalEditProduct' id-product='".$products[$i]['id']."'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btn-xs delete-product' id-product='".$products[$i]['id']."' img-product='".$products[$i]['image']."'><i class='fa fa-times' ></i></button></di>";
                    
                     // Stock
                     if($products[$i]['stock'] <= 10) {

                        $stock = "<button class='btn btn-danger btn-xs'>".$products[$i]['stock']."</button>";

                     } else if($products[$i]['stock'] > 10 && $products[$i]['stock'] < 15) {

                        $stock = "<button class='btn btn-warning btn-xs'>".$products[$i]['stock']."</button>";

                     } else {

                         $stock = "<button class='btn btn-success btn-xs'>".$products[$i]['stock']."</button>";

                     }

                     $dataJson .= '[
                        "'.($i + 1).'",
                        "'.$image.'",
                        "'.$products[$i]['name'].'",
                        "'.$products[$i]['sku'].'",
                        "'.$products[$i]['description'].'",

                        "'.$stock.'",
                        "'.$products[$i]['sale_price'].'",
                        "'. $buttom .'"
                    ],';
                }
        $dataJson = substr($dataJson, 0, -1);
        $dataJson .= ']}';

        echo $dataJson;
        
       
    }
}

$table = new TableProduct();
$table -> showProduct();