<table class="table table-bordered table-striped dt-responsive" id="table-product">
    <thead>
        <tr class="text-center">
            <th style="width: 10px;">#</th>
            <th>Image</th>
            <th>Name</th>
            <th>Code</th>
            <th>Sku</th>
            <th>Description</th>
            <th>Category</th>
            <th>Stock</th>
            <th>Purchase price</th>
            <th>Sale price</th>

            <th>actions</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            $item = null;
            $value = null;
            $products = ProductsController::productsShowCtr($item, $value);
            

            foreach ($products as $product) {
                echo '
                        <tr>
                            <td>'.$product['id'].'</td>
                            <td>'.$product['image'].'</td>
                            <td>'.$product['name'].'</td>
                            <td>'.$product['code'].'</td>
                            <td>'.$product['sku'].'</td>
                            <td>'.$product['description'].'</td>
                            <td>'.$product['id_category'].'</td>
                            <td>'.$product['stock'].'</td>
                            <td>'.$product['purchase_price'].'</td>
                            <td>'.$product['sale_price'].'</td>
                            
                            <td>
                            <div class="btn btn-group" style="width: 100px;"><button class="btn btn-warning btn-xs btn-edit-product" data-toggle="modal" data-target="#modalEditProduct" id-product="'.$product["id"].'"><i class="fa fa-pencil"></i></button><button class="btn btn-danger btn-xs delete-product" id-product="'.$product["id"].'" img-product="'.$product["image"].'"><i class="fa fa-times" ></i></button></di>
                               
                            </td>
                        </tr>
                    ';
        }
         ?>
    </tbody>

</table>