<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"><?= $title; ?></h3>
                </div>
                <?= form_open_multipart($form_action, ['method' => 'POST']) ?>
                <?= isset($input->id) ? form_hidden('id', $input->id) : '' ?>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" name="username" class="form-control" value="<?= $input->username ?>" placeholder="Masukan nama anda">
                                <?= form_error('username') ?>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" value="<?= $input->email ?>" placeholder="Masukan email anda">
                                <?= form_error('email') ?>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Masukan password">
                                <?php if (isset($input->id)) : ?>
                                    <p class="help-block">Biarkan kosong jika tidak diubah</p>
                                <?php endif; ?>
                                <?= form_error('password') ?>
                            </div>
                            <div class="form-group">
                                <label>Gambar</label>
                                <input type="file" name="image">

                                <p class="help-block">Max-size 1MB</p>
                                <?php if ($this->session->flashdata('image_error')) : ?>
                                    <small class="form-text text-danger"><?= $this->session->flashdata('image_error') ?></small>
                                <?php endif ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>User Akses</label>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="role" value="admin" <?= $input->role == 'admin' ? 'checked' : '' ?>>
                                        Admin
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="role" value="editor" <?= $input->role == 'editor' ? 'checked' : '' ?>>
                                        Editor
                                    </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>User Aktif</label>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="is_active" value="1" <?= $input->is_active == 1 ? 'checked' : '' ?>>
                                        Aktif
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="is_active" value="0" <?= $input->is_active == 0 ? 'checked' : '' ?>>
                                        Non Aktif
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <?= form_close() ?>
            </div>
        </div>
    </div>
</section>