<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <?php 
                    if($_SESSION['perfil_img'] != '') {
                        echo '<img src="'. $_SESSION['perfil_img'] .'" class="img-circle" alt="User Image">';
                                    
                        
                    } else {
                        echo '<img src="views/assets/img/users/default/anonymous.png" class="img-circle" alt="User Image">';
                    }
                    
                ?>
                <!-- <img src="views/assets/img/users/default/anonymous.png" class="img-circle" alt="User Image"> -->
            </div>
            <div class="pull-left info">
                <p><?php echo $_SESSION['name'];?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> <?php echo $_SESSION['rol'];?></a>
            </div>
        </div>

        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">

            <li class="header">MAIN NAVIGATION</li>
            <!-- Home -->
            <li>
                <a href="dashboard">
                    <i class="fa fa-home"></i> <span>Home</span>
                    <!-- <span class="pull-right-container">
                        <small class="label pull-right bg-green">Hot</small>
                    </span> -->
                </a>
            </li>

            <!-- Users -->
            <li>
                <a href="users">
                    <i class="fa fa-user"></i> <span>Users</span>
                    <!-- <span class="pull-right-container">
                        <small class="label pull-right bg-green">Hot</small>
                    </span> -->
                </a>
            </li>

            <!-- Categories -->
            <li>
                <a href="categories">
                    <i class="fa fa-th"></i> <span>Categories</span>
                    <!-- <span class="pull-right-container">
                        <small class="label pull-right bg-green">Hot</small>
                    </span> -->
                </a>
            </li>

            <!-- Products -->
            <li>
                <a href="products">
                    <i class="fa fa-product-hunt"></i> <span>Products</span>
                    <!-- <span class="pull-right-container">
                        <small class="label pull-right bg-green">Hot</small>
                    </span> -->
                </a>
            </li>

            <!-- Clients -->
            <li>
                <a href="clients">
                    <i class="fa fa-users"></i> <span>Clients</span>
                    <!-- <span class="pull-right-container">
                        <small class="label pull-right bg-green">Hot</small>
                    </span> -->
                </a>
            </li>

            <!-- Clients -->
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-list"></i>
                    <span>Sales</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="sales"><i class="fa fa-circle-o"></i> Manage Sales</a></li>
                    <li><a href="create-sale"><i class="fa fa-circle-o"></i> Create Sale</a></li>
                    <li><a href="sales-report"><i class="fa fa-circle-o"></i> Sales Report</a></li>
                </ul>
            </li>
        </ul>

    </section>
    <!-- /.sidebar -->
</aside>