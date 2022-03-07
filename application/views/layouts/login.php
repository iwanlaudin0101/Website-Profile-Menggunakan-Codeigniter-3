<?php $this->load->view('layouts/_header') ?>

<body class="hold-transition loginPage">
    <div class="login-box">

        <?php $this->load->view('layouts/_alert') ?>
        <div class="login-logo">
            <a href="<?= base_url('login')?>" ><b>IWAN</b>La Udin</a>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            <?= form_open($form_action, ['method' => 'POST']) ?>
            <div class="form-group has-feedback">
                <input type="email" name="email" class="form-control" value="<?= $input->email ?>" placeholder="Enter your email">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                <?= form_error('email') ?>
            </div>
            <div class="form-group has-feedback">
                <input type="password" name="password" class="form-control" placeholder="Enter your Password" autocomplete="off">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                <?= form_error('password') ?>
            </div>
            <div class="row">
                <div class="col-xs-8"></div>
                <div class="col-xs-4">
                    <button type="submit" name="login" class="btn btn-primary btn-block btn-flat">Sign In</button>
                </div>
            </div>
            <?= form_close() ?>
        </div>
    </div>

</body>
<!-- jQuery 3 -->
<script src="<?= base_url() ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?= base_url() ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

</html>