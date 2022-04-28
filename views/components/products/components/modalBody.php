<div class="modal-body">
    <div class="box-body">
        <div class="form-group">
            <div class="input-group">
                <label for="name-product" class="input-group-addon">
                    <i class="fa fa-product-hunt"></i>
                </label>

                <input type="text" class="form-control input-lg" name="name-product" placeholder="name"
                    id="name-product" required />
            </div>
        </div>

        <!-- Sku -->
        <div class="form-group">
            <div class="input-group">
                <label for="sku" class="input-group-addon">
                    <i class="fa fa-barcode"></i>
                </label>

                <input type="text" class="form-control input-lg" name="sku" placeholder="sku" id="sku"
                    autocomplete="off" />
            </div>
        </div>

        <!-- Description -->
        <div class="form-group">
            <div class="input-group">
                <label for="description" class="input-group-addon">
                    <i class="fa fa-file-text"></i>
                </label>

                <input type="text" class="form-control input-lg" name="description" placeholder="Description"
                    id="description" autocomplete="off" required />

            </div>
        </div>

        <!-- Category -->
        <div class="form-group">
            <div class="input-group">
                <label for="category" class="input-group-addon">
                    <i class="fa fa-th"></i>
                </label>

                <select class="form-control input-lg" name="category" id="categoryProduct">
                    <option value="">Select Category</option>
                    <?php
                            //require_once '../controller/categories.controller.php';

                            $item = null;
                            $value = null;
                            $categories = CategoriesController::categoriesShowCtr($item, $value);
                         
                            foreach ($categories as $category) {
                                var_dump($category);

                                echo '<option value="'.$category['id'].'">'.$category['name'].'</option>';
                            }
               
                            
                    ?>

                </select>
            </div>
        </div>

        <!-- Code -->
        <div class="form-group">
            <div class="input-group">
                <label for="code" class="input-group-addon">
                    <i class="fa fa-code"></i>
                </label>

                <input type="text" class="form-control input-lg" name="code" placeholder="code" id="code"
                    autocomplete="off" readonly />
            </div>
        </div>

        <!-- Stock -->
        <div class="form-group">
            <div class="input-group">
                <label for="stock" class="input-group-addon">
                    <i class="fa fa-check"></i>
                </label>

                <input type="number" class="form-control input-lg" min="0" name="stock" placeholder="Stock" id="stock"
                    autocomplete="off" required />

            </div>
        </div>


        <div class="form-group row">
            <!-- Purchase Price -->


            <div class="col-xs-12 col-sm-6 form-group">
                <div class="input-group">
                    <label for="purchase_price" class="input-group-addon">
                        <i class="fa fa-dollar"></i>
                    </label>

                    <input type="number" class="form-control input-lg" min="0" name="purchase_price"
                        placeholder="Purchase Price" id="purchase_price" autocomplete="off" required step="any" />
                </div>
            </div>

            <!-- Sale Price -->

            <div class="col-xs-12  col-sm-6 form-group">
                <div class="input-group">
                    <label for="sale_price" class="input-group-addon">
                        <i class="fa fa-dollar"></i>
                    </label>

                    <input type="number" class="form-control input-lg" min="0" name="sale_price"
                        placeholder="Sale Price" id="sale_price" autocomplete="off" required step="any" />
                </div>
                <br />
                <div class="col-xs-6" style="padding-right: 0;">
                    <!-- Checkbox porcentaje -->
                    <div class="form-group">
                        <label>
                            <input type="checkbox" class="minimal porcentajeCheck" id="porcentajeCheck"
                                name="porcentajeCheck" />
                            Ùtilizar Porcentaje
                        </label>
                    </div>
                </div>
                <!-- Input porcentaje -->
                <div class="col-xs-6" style="padding: 0; display: none;" id="inputPorcentaje">
                    <div class="input-group">
                        <input type="number" class="form-control input-lg" min="0" name="porcentaje" placeholder="0"
                            id="porcentaje" autocomplete="off" />
                        <label for="porcentaje" class="input-group-addon">
                            <i class="fa fa-percent"></i>
                        </label>
                    </div>
                </div>
            </div>

            <!-- upload img -->
            <div class="form-group">
                <label for="product_img" class="panel">Upload Img</label>
                <input type="file" name="product_img" class="product_img">
                <p class="help-block">Max size 3 MB</p>

                <img src="views/assets/img/products/default/anonymous.png" class="img-thumbnail preview" width="100px"
                    alt="product image" />
            </div>

        </div>
    </div>
</div>