<div class="modal-body">
    <div class="box-body">
        <!-- Name -->
        <div class="form-group">
            <div class="input-group">
                <label for="name" class="input-group-addon">
                    <i class="fa fa-user"></i>
                </label>

                <input type="text" class="form-control input-lg" name="name" placeholder="name" id="name" required />
            </div>
        </div>

        <!-- UserName -->
        <div class="form-group">
            <div class="input-group">
                <label for="username" class="input-group-addon">
                    <i class="fa fa-key"></i>
                </label>

                <input type="text" class="form-control input-lg" name="username" placeholder="User Name"
                    id="new-username" autocomplete="off" required />
            </div>
        </div>

        <!-- Password -->
        <div class="form-group">
            <div class="input-group">
                <label for="password" class="input-group-addon">
                    <i class="fa fa-lock"></i>
                </label>

                <input type="password" class="form-control input-lg" name="password" placeholder="password"
                    id="password" autocomplete="off" required />

            </div>
        </div>

        <!-- Rol -->
        <div class="form-group">
            <div class="input-group">
                <label for="rol" class="input-group-addon">
                    <i class="fa fa-users"></i>
                </label>

                <select class="form-control input-lg" name="rol" id="rol">
                    <option value="">Select rol</option>
                    <option value="admin">Admin</option>
                    <option value="seller">Seller</option>
                </select>
            </div>
        </div>

        <!-- upload img -->
        <div class="form-group">
            <label for="perfil_img" class="panel">Upload Img</label>
            <input type="file" name="perfil_img" class="perfil_img">
            <p class="help-block">Max size 3 MB</p>

            <img src="views/assets/img/users/default/anonymous.png" class="img-thumbnail preview" width="100px"
                alt="perfil image" />
        </div>



    </div>
</div>