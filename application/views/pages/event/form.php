<section class="content">
    <div class="row">
        <div class="col-md-12">
            <!-- SELECT2 EXAMPLE -->
            <?= form_open_multipart($form_action, ['method' => 'POST']) ?>
            <?= isset($input->id) ? form_hidden('id', $input->id) : '' ?>
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
                                <label>Organizer</label>
                                <input type="text" class="form-control" name="organizer" id="organizer" placeholder="Enter your organizer" value="<?= $input->organizer ?>">
                                <?= form_error('organizer') ?>
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