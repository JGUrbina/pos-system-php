<div class="back"></div>
<div class="login-box">
    <div class="login-logo">
        <img src="views/assets/img/template/Mandingazo.png" alt="login-logo" class="img-responsive"
            style="padding:30px 20px 0 20px;" />
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Sign in</p>

        <form method="post">
            <div class="form-group has-feedback">
                <input type="text" class="form-control" placeholder="User" name="username" required>
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" placeholder="Password" name="password" required>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat ">Sign In</button>
                </div>
                <!-- /.col -->
            </div>

            <?php 
          
                $login = new UsersController();

                $login -> userLoginCtr();
            ?>
        </form>

    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->