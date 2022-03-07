<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <?php $this->load->view('layouts/_alert') ?>
            <div class="box box-primary">
                <div class="box-header with-border">
                    <a class="btn btn-success btn-flat" href="<?= base_url("portofolio/add") ?>"><span class="fa fa-plus"></span> Add</a>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="table" class="table table-striped" style="font-size:13px;">
                        <thead class="bg-primary">
                            <tr>
                                <th>No</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Description</th>
                                <th>Date</th>
                                <th style="text-align:right;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 0;
                            foreach ($content as $row) : $no++; ?>
                                <tr>
                                    <td><?= $no; ?></td>
                                    <td><?= $row->title; ?></td>
                                    <td><?= $row->category_title; ?></td>
                                    <td><?= $row->description; ?></td>
                                    <td><?= date_format(new DateTime($row->date), 'F j, Y'); ?></td>
                                    <td style="text-align:right;">
                                        <?= form_open(base_url("portofolio/delete/$row->slug"), ['method' => 'POST']) ?>
                                        <?= form_hidden($row->slug) ?>
                                        <a class="btn btn-sm btn-default" href="<?= base_url("portofolio/edit/$row->slug") ?>"><span class="text-primary fa fa-pencil"></span></a>
                                        <?php if ($user->role === 'admin') : ?>
                                            <button class="btn btn-sm btn-default" type="submit" onclick="return confirm('Apakah yakin ingin menghapus?')">
                                                <span class="text-danger fa fa-trash"></span>
                                            </button>
                                        <?php endif; ?>
                                        <?= form_close() ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
</section>