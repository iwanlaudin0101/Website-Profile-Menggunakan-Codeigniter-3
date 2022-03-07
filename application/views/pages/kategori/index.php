<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <?php $this->load->view('layouts/_alert') ?>
            <div class="box box-primary">
                <div class="box-header with-border">
                    <a class="btn btn-success btn-flat" href="<?= base_url("category/add") ?>"><span class="fa fa-plus"></span> Add</a>
                </div>
                <div class="box-body">
                    <table id="table" class="table table-striped" style="font-size:13px;">
                        <thead class="bg-primary">
                            <tr>
                                <th>No</th>
                                <th>Kategori</th>
                                <th style="text-align:right;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 0;
                            foreach ($category as $row) : $no++; ?>
                                <tr>
                                    <td><?= $no; ?></td>
                                    <td><?= $row->title; ?></td>
                                    <td style="text-align:right;">
                                        <?= form_open(base_url("category/delete/$row->id"), ['method' => 'POST']) ?>
                                        <?= form_hidden($row->id) ?>
                                        <a class="btn btn-sm btn-default" href="<?= base_url("category/edit/$row->id") ?>"><span class="text-primary fa fa-pencil"></span></a>
                                        <button class="btn btn-sm btn-default" type="submit" onclick="return confirm('Apakah yakin ingin menghapus?')">
                                            <span class="text-danger fa fa-trash"></span>
                                        </button>
                                        <?= form_close() ?>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
</section>