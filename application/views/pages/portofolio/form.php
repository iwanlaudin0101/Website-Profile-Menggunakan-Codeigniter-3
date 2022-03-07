<section class="content">
    <div class="row">
        <div class="col-md-12">
            <!-- SELECT2 EXAMPLE -->
            <?= form_open_multipart($form_action, ['method' => 'POST']) ?>
            <?= isset($input->slug) ? form_hidden('slug', $input->slug) : '' ?>
            <div class="box box-primary">
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" class="form-control" name="title" id="title" onkeyup="createSlug()" autofocus='true' placeholder="Enter your title" value="<?= $input->title ?>">
                                <?= form_error('title') ?>
                            </div>
                            <div class="form-group">
                                <label>Slug</label>
                                <input type="text" class="form-control" name="slug" id="slug" placeholder="Enter your slug" value="<?= $input->slug ?>">
                                <?= form_error('slug') ?>
                            </div>

                            <div class="form-group">
                                <label>Link</label>
                                <input type="text" class="form-control" name="link" id="link" placeholder="Enter your link" value="<?= $input->link ?>">
                                <?= form_error('link') ?>
                            </div>
                            
                            <div class="form-group">
                                <label>Description</label>
                                <div class="col-md">
                                    <textarea class='form-control' name="description" id="description" rows="10" placeholder="Enter your description"><?= $input->description ?></textarea>
                                <?= form_error('description') ?>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="col-sm-8">
                                    <button type="submit" class="btn btn-primary btn-flat pull-left"><span class="fa fa-send"></span> Publish</button>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            
                            <div class="form-group">
                                <label>Category</label>
                                <?php if (empty($input->slug)) : ?>
                                    <select class="form-control select2" name="id_category" style="width: 100%;">
                                        <option value="">-Pilih-</option>
                                        <?php foreach ($category as $c) : ?>
                                            <option value="<?= $c->id; ?>"><?= $c->title; ?></option>
                                        <?php endforeach; ?>
                                    </select>

                                <?php else : ?>
                                    <select class="form-control select2" name="id_category" style="width: 100%;">
                                        <option value="">-Pilih-</option>
                                        <?php foreach ($category as $c) : ?>
                                            <?php if ($input->id_category == $c->id) : ?>
                                                <option value="<?= $c->id; ?>" selected><?= $c->title; ?></option>
                                            <?php else : ?>
                                                <option value="<?= $c->id; ?>"><?= $c->title; ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </select>
                                <?php endif; ?>
                                <?= form_error('id_category') ?>
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
                    </div>
                </div>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</section>