<?php
$success    = $this->session->flashdata('success');
$error      = $this->session->flashdata('error');
$warning    = $this->session->flashdata('warning');

if ($success) {
    $alert_status    = 'alert-success';
    $status          = 'Success!';
    $message         = $success;
    $icon            = 'icon fa fa-check';
}

if ($error) {
    $alert_status    = 'alert-danger';
    $status          = 'Error!';
    $message         = $error;
    $icon            = 'icon fa fa-ban';
}

if ($warning) {
    $alert_status    = 'alert-warning';
    $status          = 'Warning!';
    $message         = $warning;
    $icon            = 'icon fa fa-warning';
}
?>

<?php if ($success || $error || $warning) : ?>
    <div class="row">
        <div class="col-md-12">
            <div class="alert <?= $alert_status ?> alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong style="font-size: 17px;"><i class="<?= $icon ?>"></i><?= $status ?></strong> <?= $message ?>.
                </h4>
            </div>
        </div>
    </div>
<?php endif ?>