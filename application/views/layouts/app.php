<?php $this->load->view('layouts/_header') ?>
<?php $this->load->view('layouts/_topbar') ?>
<?php $this->load->view('layouts/_menu') ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?= $title; ?>
        </h1>
        <!-- <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol> -->
    </section>

    <!-- Main content -->
    <?php $this->load->view($page); ?>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php $this->load->view('layouts/_footer'); ?>