<div id="modalAddProduct" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" method="post" enctype="multipart/form-data">
                <!-- Modal Header-->

                <div class="modal-header" style="background-color: #3c8dbc; color: white;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add Product</h4>
                </div>


                <!-- Modal Body-->
                <?php 

                    include 'components/modalBody.php';

                  require_once 'controller/products.controller.php';

                 $productRegister = new ProductsController();
                 $productRegister -> productRegisterCtr();

                ?>
                <!-- Modal Footer-->
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary submit">Save</button>
                </div>
            </form>
        </div>

    </div>
</div>