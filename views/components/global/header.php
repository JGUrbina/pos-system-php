<header class="main-header">

    <!--=============================
                    Logo
    =============================--->

    <a href="dashboard" class="logo">
        <!-- Logo mini -->
        <span class="logo-mini">
            <img src="views/assets/img/template/Salchipapa.png" class="img-responsive"
                style="height: 50px; padding: 0 0 0 7.5px;" />
        </span>

        <!-- Logo normal -->
        <span class="logo-lg">
            <img src="views/assets/img/template/Mandingazo.png" class="img-responsive"
                style="padding: 0 0; height: 50px;" />
        </span>
    </a>

    <!--=============================
            navigation bar
    =============================--->

    <nav class="navbar navbar-static-top" rol="navigation">
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>

        <!--=============================
            navbar custom menu
    =============================--->

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- Notifications: style can be found in dropdown.less -->
                <li class="dropdown notifications-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-bell-o"></i>
                        <span class="label label-warning">10</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">You have 10 notifications</li>
                        <li>
                            <!-- inner menu: contains the actual data -->
                            <ul class="menu">
                                <li>
                                    <a href="#">
                                        <i class="fa fa-users text-aqua"></i> 5 new members joined today
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="footer"><a href="#">View all</a></li>
                    </ul>
                </li>
                <!-- Tasks: style can be found in dropdown.less -->
                <li class="dropdown tasks-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-flag-o"></i>
                        <span class="label label-danger">9</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">You have 9 tasks</li>
                        <li>
                            <!-- inner menu: contains the actual data -->
                            <ul class="menu">
                                <li>
                                    <!-- Task item -->
                                    <a href="#">
                                        <h3>
                                            Design some buttons
                                            <small class="pull-right">20%</small>
                                        </h3>
                                        <div class="progress xs">
                                            <div class="progress-bar progress-bar-aqua" style="width: 20%"
                                                role="progressbar" aria-valuenow="20" aria-valuemin="0"
                                                aria-valuemax="100">
                                                <span class="sr-only">20% Complete</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <!-- end task item -->
                            </ul>
                        </li>
                        <li class="footer">
                            <a href="#">View all tasks</a>
                        </li>
                    </ul>
                </li>
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <?php 
                        //  if($_SESSION['perfil_img'] != '') {
                        //         echo '<img src="'. $_SESSION['perfil_img'] .'" class="user-image" alt="User Image">';
                                
                        //         return;
                        //     } 

                        if($_SESSION['perfil_img'] != '') {
                            echo '<img src="'.$_SESSION['perfil_img'].'" class="user-image" alt="User Image">';
                            
                        } else {
                            echo '<img src="views/assets/img/users/default/anonymous.png" class="user-image" alt="User Image">';
                        }
                            
                        ?>

                        <span class="hidden-xs"><?php echo $_SESSION['name'];?></span>
                    </a>


                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <?php 
                                if($_SESSION['perfil_img'] != '') {
                                    echo '<img src="'. $_SESSION['perfil_img'] .'" class="img-circle" alt="User Image">';
                                    
                                   
                                } else {
                                    echo '<img src="views/assets/img/users/default/anonymous.png" class="img-circle" alt="User Image">';
                                }
                                
                            ?>
                            <!-- <img src="views/assets/img/users/default/anonymous.png" class="img-circle" alt="User Image"> -->

                            <p>
                                <?php 
                                    echo $_SESSION['rol']. ' - ' .$_SESSION['name'];
                                ?>
                                <small>Member since Jan. 2022</small>
                            </p>
                        </li>
                        <!-- Menu Body -->

                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="#" class="btn btn-default btn-flat">Profile</a>
                            </div>
                            <div class="pull-right">
                                <a href="logout" class="btn btn-default btn-flat">Sign out</a>
                            </div>
                        </li>
                    </ul>
                </li>

            </ul>
        </div>
    </nav>



</header>