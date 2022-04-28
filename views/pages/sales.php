<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Control Panel

            <small>Sales</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <!-- <li><a href="#">Examples</a></li> -->
            <li class="active">Sales</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <a href="create-sale">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#modalAddSale">Add
                        Sale</button>
                </a>
            </div>
            <div class="box-body">
                <?php
                    /**======================================
                     *             Table
                     * ======================================**/ 
                    include "views/components/sales/table.php";
                ?>

            </div>
            <!-- /.box-body -->

        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
</div>