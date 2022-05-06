<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Control Panel

            <small>Create Sale</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <!-- <li><a href="#">Examples</a></li> -->
            <li class="active">Create Sale</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">


        <div class="row">
            <!-- FORM -->
            <div class="col-lg-5 col-xs-12">
                <div class="box box-success">

                    <div class="box-header with-border"></div>
                    <form method="post" class="form-sales">
                        <div class="box-body">

                            <div class="box">

                                <!-- Seller -->
                                <div class="form-group">
                                    <div class="input-group">
                                        <label for="seller" class="input-group-addon">
                                            <i class="fa fa-user"></i>
                                        </label>
                                        <input type="text" class="form-control" name="seller"
                                            value="<?php echo $_SESSION['name']?>" id="seller" readonly />
                                        <input type="hidden" name="id-seller" value="<?php echo $_SESSION['id']?>"
                                            id="id-seller" readonly />
                                    </div>
                                </div>
                                <!-- Code -->
                                <?php
                                    $item = null;
                                    $value = null;

                                    $sales = SalesController::showSalesCtr($item, $value);

                                    if(!$sales) {
                                        echo '
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <label for="code" class="input-group-addon">
                                                        <i class="fa fa-barcode"></i>
                                                    </label>
                                                    <input type="text" class="form-control" name="code" value="1001" id="code"
                                                        readonly />
                                                </div>
                                            </div>
                                        ';
                                    } else {
                                        $code = $sales[count($sales) - 1]['code'] + 1;
                                        echo '
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <label for="code" class="input-group-addon">
                                                        <i class="fa fa-barcode"></i>
                                                    </label>
                                                    <input type="text" class="form-control" name="code" value="'.$code.'" id="code"
                                                        readonly />
                                                </div>
                                            </div>
                                        ';

                                    }
                                    
                                ?>

                                <!-- Client -->
                                <div class="form-group">
                                    <div class="input-group">
                                        <label for="client" class="input-group-addon">
                                            <i class="fa fa-users"></i>
                                        </label>
                                        <select class="form-control" name="client" id="client">
                                            <option value="">Select Client</option>
                                            <option value="juan villegas">Juan Villegas</option>
                                        </select>

                                        <span for="client" class="input-group-addon">
                                            <button type="button" clas="btn btn-default btn-xs" data-toggle="modal"
                                                data-target="#modalAddClient" data-dismiss="modal">
                                                Add Client
                                            </button>
                                        </span>
                                    </div>
                                </div>

                                <!-- Product 1 -->

                                <div class="form-group row new-product">

                                </div>

                                <!-- Product 2 -->

                                <!-- <div class="form-group row newProduct">

                                    <div class="col-xs-6" style="padding-right:0;">

                                        <div class="input-group">
                                            <span class="input-group-addon" style="padding-bottom: 0; padding-top: 0;">
                                                <button type="button" class="btn btn-danger btn-xs">
                                                    <i class="fa fa-times"></i>
                                                </button>
                                            </span>

                                            <input type="text" class="form-control" name="addProduct"
                                                placeholder="Add Product" id="addProduct" required />
                                        </div>

                                    </div>

                                    <div class="col-xs-3" style="padding-right:0;">
                                        <div class="input-group">
                                            <label for="price" class="input-group-addon">
                                                <i class="fa fa-sort-amount-asc"></i>
                                            </label>

                                            <input type="number" class="form-control" name="quantity" placeholder="0"
                                                id="quantity" required min="1" />
                                        </div>

                                    </div>

                                    <div class="col-xs-3">
                                        <div class="input-group">
                                            <input type="number" class="form-control" name="price" placeholder="0"
                                                id="price" required min="1" readonly />
                                            <label for="price" class="input-group-addon">
                                                <i class="fa fa-dollar"></i>
                                            </label>

                                        </div>

                                    </div>

                                </div> -->


                                <!-- Product 3 -->

                                <!-- <div class="form-group row newProduct">

                                    <div class="col-xs-6" style="padding-right:0;">

                                        <div class="input-group">
                                            <span class="input-group-addon" style="padding-bottom: 0; padding-top: 0;">
                                                <button type="button" class="btn btn-danger btn-xs">
                                                    <i class="fa fa-times"></i>
                                                </button>
                                            </span>

                                            <input type="text" class="form-control" name="addProduct"
                                                placeholder="Add Product" id="addProduct" required />
                                        </div>

                                    </div>

                                    <div class="col-xs-3" style="padding-right:0;">
                                        <div class="input-group">
                                            <label for="price" class="input-group-addon">
                                                <i class="fa fa-sort-amount-asc"></i>
                                            </label>

                                            <input type="number" class="form-control" name="quantity" placeholder="0"
                                                id="quantity" required min="1" />
                                        </div>

                                    </div>

                                    <div class="col-xs-3">
                                        <div class="input-group">
                                            <input type="number" class="form-control" name="price" placeholder="0"
                                                id="price" required min="1" readonly />
                                            <label for="price" class="input-group-addon">
                                                <i class="fa fa-dollar"></i>
                                            </label>

                                        </div>

                                    </div>

                                </div> -->



                                <!-- Button for add product -->
                                <button type="button" class="btn btn-default  hidden-lg btn-addProduct">
                                    Add Product
                                </button>

                                <hr />

                                <!-- Tax and Total -->
                                <div class="row">

                                    <div class="col-xs-8 pull-right">
                                        <table class="table">
                                            <thead>
                                                <th>Tax</th>
                                                <th>Total</th>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td style="width: 50%;">
                                                        <div class="input-group">
                                                            <input type="number" class="form-control input-lg" min="0"
                                                                name="porcentaje" placeholder="0" id="porcentaje-venta"
                                                                autocomplete="off" required />
                                                            <input type="hidden" name="tax" id="tax" />
                                                            <input type="hidden" name="net" id="net" />
                                                            <label for="porcentaje" class="input-group-addon">
                                                                <i class="fa fa-percent"></i>
                                                            </label>
                                                        </div>
                                                    </td>

                                                    <td style="width: 50%;">
                                                        <div class="input-group">
                                                            <input type="text" class="form-control input-lg"
                                                                name="total" total placeholder="0" id="total"
                                                                autocomplete="off" required readonly />
                                                            <label for="total" class="input-group-addon">
                                                                <i class="fa fa-dollar"></i>
                                                            </label>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>

                                <hr />

                                <!-- Payment Method -->
                                <div class="row">
                                    <div class="col-xs-6 hidden select_payment_method">
                                        <div class="form-group">

                                            <div class="input-group">
                                                <label for="client" class="input-group-addon">
                                                    <i class="fa fa-money"></i>
                                                </label>
                                                <select class="form-control" name="payment_method" id="payment_method">
                                                    <option value="">Select Payment Method</option>
                                                    <option value="CC">Credit Card</option>
                                                    <option value="DC">Debit Card</option>
                                                    <option value="cash">Cash</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="box-payment-method"></div>
                                </div>

                                <hr />

                            </div>



                        </div>

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary  pull-right">
                                Save
                            </button>
                        </div>
                    </form>

                </div>

            </div>

            <!-- Table Products -->
            <div class="col-lg-7 hidden-md hidden-sm hidden-xs">
                <div class="box box-warning">
                    <div class="box-header with-border"></div>
                    <div class="box-body">

                        <?php 
                            include "views/components/sales/table-products.php"
                        ?>
                    </div>
                </div>
            </div>

        </div>

    </section>
</div>

<?php 
     /**======================================
     *             Modal Add Client
     * ======================================**/ 
    include "views/components/clients/modalAddClient.php";
?>