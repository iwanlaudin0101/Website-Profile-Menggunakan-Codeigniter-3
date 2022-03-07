<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <?= form_open($form_action, ['method' => 'POST']) ?>
                <?= isset($input->id) ? form_hidden('id', $input->id) : '' ?>
                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Kategori</label>
                        <input type="text" name="title" class="form-control" id="title" placeholder="Enter name kategori" value="<?= $input->title ?>">
                        <?= form_error('title') ?>
                    </div>
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-send"></i> Simpan</button>
                </div>
                <?= form_close() ?>
            </div>
        </div>
    </div>
</section>