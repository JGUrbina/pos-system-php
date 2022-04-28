<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Control Panel

            <small>Clients</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <!-- <li><a href="#">Examples</a></li> -->
            <li class="active">Clients</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">

            <div class="box-header with-border">
                <button class="btn btn-primary" data-toggle="modal" data-target="#modalAddClient">Add Client</button>
            </div>

            <div class="box-body">
                <?php
                    /**======================================
                     *             Table
                     * ======================================**/ 
                    include "views/components/clients/table.php";
                ?>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
</div>

<?php
    /**======================================
     *             Modal Add Client
     * ======================================**/ 
    include "views/components/clients/modalAddClient.php";

    /**======================================
     *             Modal Edit Client
     * ======================================**/ 
   include "views/components/clients/modalEditClient.php";

?>