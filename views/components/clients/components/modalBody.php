<div class="modal-body">
    <div class="box-body">
        <div class="form-group">
            <div class="input-group">
                <label for="name-client" class="input-group-addon">
                    <i class="fa fa-user"></i>
                </label>

                <input type="text" class="form-control input-lg" name="name-client" placeholder="name" id="name-client"
                    required />
            </div>
        </div>

        <!-- Email -->
        <div class="form-group">
            <div class="input-group">
                <label for="email" class="input-group-addon">
                    <i class="fa fa-envelope"></i>
                </label>

                <input type="email" class="form-control input-lg" name="email" placeholder="Email" id="email"
                    autocomplete="off" />
            </div>
        </div>

        <!-- Telephone -->
        <div class="form-group">
            <div class="input-group">
                <label for="telephone" class="input-group-addon">
                    <i class="fa fa-mobile"></i>
                </label>

                <input type="text" class="form-control input-lg" name="telephone" placeholder="Telephone" id="telephone"
                    autocomplete="off" data-inputmask="'mask': '(999) 999-9999'" data-mask />

            </div>
        </div>

        <!-- Direction -->
        <div class="form-group">
            <div class="input-group">
                <label for="direction" class="input-group-addon">
                    <i class="fa fa-home"></i>
                </label>

                <input type="text" class="form-control input-lg" name="direction" placeholder="Direction" id="direction"
                    autocomplete="off" required />
            </div>
        </div>

        <!-- Birthday -->
        <div class="form-group">
            <div class="input-group">
                <label for="birthday" class="input-group-addon">
                    <i class="fa fa-birthday-cake"></i>
                </label>


                <input type="text" class="form-control input-lg" name="birthday" placeholder="Birthday" id="birthday"
                    autocomplete="off" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask />

            </div>
        </div>



    </div>
</div>