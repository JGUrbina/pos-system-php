<?php
    session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link rel="icon" type="image/x-icon" href="views/assets/img/template/Salchipapa.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Pos Inventory System</title>

    <!--=============================
      PLUGINS DE CSS
 =============================--->

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="views/assets/bower_components/bootstrap/dist/css/bootstrap.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="views/assets/bower_components/font-awesome/css/font-awesome.min.css">

    <!-- Ionicons -->
    <link rel="stylesheet" href="views/assets/bower_components/Ionicons/css/ionicons.min.css">

    <!-- Theme style -->
    <link rel="stylesheet" href="views/assets/dist/css/AdminLTE.css">

    <!-- AdminLTE Skins -->
    <link rel="stylesheet" href="views/assets/dist/css/skins/_all-skins.min.css">

    <!-- Google Font -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    <!-- DataTables -->
    <link rel="stylesheet" href="views/assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="views/assets/bower_components/datatables.net-bs/css/responsive.bootstrap.min.css">

    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="views/assets/plugins/iCheck/all.css">

    <!--=============================
      PLUGINS DE JAVASCRIPT
 =============================--->

    <!-- jQuery 3 -->
    <script src="views/assets/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap 3.3.7 -->
    <script src="views/assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- SlimScroll -->
    <script src="views/assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>

    <!-- FastClick -->
    <script src="views/assets/bower_components/fastclick/lib/fastclick.js"></script>

    <!-- AdminLTE App -->
    <script src="views/assets/dist/js/adminlte.min.js"></script>

    <!-- DataTables -->
    <script src="views/assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="views/assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="views/assets/bower_components/datatables.net-bs/js/dataTables.responsive.min.js"></script>
    <script src="views/assets/bower_components/datatables.net-bs/js/responsive.bootstrap.min.js"></script>

    <!-- SweetAlert2 -->
    <script src="views/assets/plugins/sweetalert2/sweetalert2.all.min.js"></script>

    <!-- AdminLTE for demo purposes -->
    <!--  <script src="views/assets/dist/js/demo.js"></script> -->

    <!-- iCheck 1.0.1 -->
    <script src="views/assets/plugins/iCheck/icheck.min.js"></script>

    <!-- InputMask -->
    <script src="views/assets/plugins/input-mask/jquery.inputmask.js"></script>
    <script src="views/assets/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
    <script src="views/assets/plugins/input-mask/jquery.inputmask.extensions.js"></script>

    <!-- jQueryNumber -->
    <script src="views/assets/plugins/jqueryNumber/jqueryNumber.min.js"></script>

</head>

<body class="hold-transition skin-blue sidebar-collapse sidebar-mini login-page">
    <!-- Site wrapper -->


    <?php 
    
        /**======================================
         *             Constants
         * ======================================**/ 
        include 'utils/constants.php';
    
         if(isset($_SESSION['log-in']) && $_SESSION['log-in'] === 'OK') {
             
            echo '<div class="wrapper">';
                

                /**======================================
                 *             Header
                 * ======================================**/
                include "components/global/header.php";

                /**======================================
                *             Sidebar Menu
                * ======================================**/
               include "components/global/sidebar-menu.php";

                /**======================================
                *             Contents
                * ======================================**/

                
                if(isset($_GET["ruta"])) { 

                    isset($white_list_pages[$_GET["ruta"]]) ? 
                    include "pages/".$_GET["ruta"].".php" :
                    include "pages/404.php";
                    
                } else {

                    include "pages/dashboard.php";
                    
                }
                
                /**======================================
                *             Footer
                * ======================================**/
                include "components/global/footer.php";
            echo '</div>';
         } else {
            include "pages/login.php";
         }
            
        ?>


    <!-- ./wrapper -->

    <script src="views/assets/js/template.js"></script>
    <script src="views/assets/js/users.js"></script>
    <script src="views/assets/js/categories.js"></script>
    <script src="views/assets/js/products.js"></script>
    <script src="views/assets/js/clients.js"></script>
    <script src="views/assets/js/sales.js"></script>
</body>

</html>