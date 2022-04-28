<div class="modal-body">
    <div class="box-body">
        <div class="form-group">
            <div class="input-group">
                <label for="edit-name-product" class="input-group-addon">
                    <i class="fa fa-product-hunt"></i>
                </label>

                <input type="text" class="form-control input-lg" name="edit-name-product" placeholder="name"
                    id="edit-name-product" required />
            </div>
        </div>

        <!-- Sku -->
        <div class="form-group">
            <div class="input-group">
                <label for="edit-sku" class="input-group-addon">
                    <i class="fa fa-barcode"></i>
                </label>

                <input type="text" class="form-control input-lg" name="edit-sku" placeholder="sku" id="edit-sku"
                    autocomplete="off" />
            </div>
        </div>

        <!-- Description -->
        <div class="form-group">
            <div class="input-group">
                <label for="edit-description" class="input-group-addon">
                    <i class="fa fa-file-text"></i>
                </label>

                <input type="text" class="form-control input-lg" name="edit-description" placeholder="Description"
                    id="edit-description" autocomplete="off" required />

            </div>
        </div>

        <!-- Category -->
        <div class="form-group">
            <div class="input-group">
                <label for="edit-category" class="input-group-addon">
                    <i class="fa fa-th"></i>
                </label>

                <select class="form-control input-lg" name="edit-category" id="edit-category">
                    <option id="p" value=""></option>
                </select>
            </div>
        </div>

        <!-- Code -->
        <div class="form-group">
            <div class="input-group">
                <label for="edit-code" class="input-group-addon">
                    <i class="fa fa-edit-code"></i>
                </label>

                <input type="text" class="form-control input-lg" name="edit-code" placeholder="code" id="edit-code"
                    autocomplete="off" readonly />
            </div>
        </div>

        <!-- Stock -->
        <div class="form-group">
            <div class="input-group">
                <label for="edit-stock" class="input-group-addon">
                    <i class="fa fa-check"></i>
                </label>

                <input type="number" class="form-control input-lg" min="0" name="edit-stock" placeholder="Stock"
                    id="edit-stock" autocomplete="off" required />

            </div>
        </div>


        <div class="form-group row">
            <!-- Purchase Price -->
            <div class="col-xs-6">
                <div class="input-group">
                    <label for="edit-purchase_price" class="input-group-addon">
                        <i class="fa fa-dollar"></i>
                    </label>

                    <input type="number" class="form-control input-lg" min="0" name="edit-purchase_price"
                        placeholder="Purchase Price" id="edit-purchase_price" autocomplete="off" required />
                </div>
            </div>
            <!-- Sale Price -->
            <div class="col-xs-6">
                <div class="input-group">
                    <label for="edit-sale_price" class="input-group-addon">
                        <i class="fa fa-dollar"></i>
                    </label>

                    <input type="number" class="form-control input-lg" min="0" name="edit-sale_price"
                        placeholder="Sale Price" id="edit-sale_price" autocomplete="off" required />
                </div>
                <br />
                <div class="col-xs-6" style="padding-right: 0;">
                    <!-- Checkbox porcentaje -->
                    <div class="form-group">
                        <label>
                            <input type="checkbox" class="minimal porcentaje" id="edit-porcentajeCheck"
                                name="edit-porcentajeCheck" />
                            Ùtilizar Porcentaje
                        </label>
                    </div>
                </div>
                <!-- Input porcentaje -->
                <div class="col-xs-6 edit-inputPorcentaje" style="padding: 0;" id="edit-inputPorcentaje">
                    <div class="input-group">
                        <input type="number" class="form-control input-lg" min="0" name="edit-porcentaje"
                            placeholder="0" id="edit-porcentaje" autocomplete="off" required />
                        <label for="edit-porcentaje" class="input-group-addon">
                            <i class="fa fa-percent"></i>
                        </label>
                    </div>
                </div>
            </div>

            <!-- upload img -->
            <div class="form-group">
                <label for="edit-product_img" class="panel">Upload Img</label>
                <input type="file" name="edit-product_img" class="edit-product_img">
                <p class="help-block">Max size 3 MB</p>

                <img src="views/assets/img/products/default/anonymous.png" class="img-thumbnail edit-preview"
                    width="100px" alt="product image" />
                <input type="hidden" id="actual_product_img" name="actual_product_img" />
                <input type="hidden" id="edit-sales" name="edit-sales" />
                <input type="hidden" id="edit-id" name="edit-id" />
                <input type="hidden" id="edit-checked" name="edit-checked" />
            </div>

        </div>
    </div>
</div>