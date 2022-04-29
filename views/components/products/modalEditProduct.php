<div id="modalEditProduct" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">

            <form role="form" method="post" enctype="multipart/form-data">

                <div class="modal-header" style="background-color: #f39c12; color: white;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Edit Product</h4>
                </div>
                <!-- Modal Body-->
                <?php 

                    include 'components/modalBody-edit.php';

                    
                    require_once 'controller/products.controller.php';

                    $product_update = new ProductsController();
                    $product_update -> productUpdateCtr();
                ?>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-primary" data-dismiss="modal">Save</button> -->
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>

    </div>
</div>