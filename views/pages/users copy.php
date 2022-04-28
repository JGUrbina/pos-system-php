<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Control Panel

            <small>Users</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <!-- <li><a href="#">Examples</a></li> -->
            <li class="active">Users</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">

            <div class="box-header with-border">
                <button class="btn btn-primary" data-toggle="modal" data-target="#modalAddUser">Add User</button>
            </div>

            <div class="box-body">
                <?php
                    /**======================================
                     *             Table
                     * ======================================**/ 
                    require "controller/users.controller.php";
                    include "views/components/users/table.php";
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
     *             Modal Add User
     * ======================================**/ 
    include "views/components/users/modalAddUser.php";

    /**======================================
     *             Modal Edit User
     * ======================================**/ 
    include "views/components/users/modalEditUser.php";
?>