<div class="modal-body">
    <div class="box-body">
        <!-- Name -->
        <div class="form-group">
            <div class="input-group">
                <label for="name" class="input-group-addon">
                    <i class="fa fa-user"></i>
                </label>

                <input type="text" class="form-control input-lg" name="edit_name" placeholder="name" id="edit_name"
                    required />
            </div>
        </div>

        <!-- UserName -->
        <div class="form-group">
            <div class="input-group">
                <label for="username" class="input-group-addon">
                    <i class="fa fa-key"></i>
                </label>

                <input type="text" class="form-control input-lg" name="edit_username" placeholder="User Name"
                    id="edit_username" readonly />
            </div>
        </div>

        <!-- Password -->
        <div class="form-group">
            <div class="input-group">
                <label for="password" class="input-group-addon">
                    <i class="fa fa-lock"></i>
                </label>

                <input type="password" class="form-control input-lg" name="edit_password" placeholder="password"
                    id="edit_password" />
                <input type="hidden" class="form-control input-lg" name="actual_password" id="actual_password"
                    required />
            </div>
        </div>

        <!-- Rol -->
        <div class="form-group">
            <div class="input-group">
                <label for="rol" class="input-group-addon">
                    <i class="fa fa-users"></i>
                </label>

                <select class="form-control input-lg" name="edit_rol">
                    <option value="" id="edit_rol">Select rol</option>
                    <option value="admin">Admin</option>
                    <option value="seller">Seller</option>
                </select>
            </div>
        </div>

        <!-- upload img -->
        <div class="form-group">
            <label for="perfil_img" class="panel">Upload Img</label>
            <input type="file" name="edit_perfil_img" class="perfil_img" id="edit_perfil_img">
            <p class="help-block">Max size 3 MB</p>

            <img src="views/assets/img/users/default/anonymous.png" class="img-thumbnail preview preview-edit"
                width="100px" alt="perfil image" />
            <input type="hidden" id="actual_perfil_img" name="actual_perfil_img" />
        </div>



    </div>
</div>