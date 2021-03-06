<!DOCTYPE html>
<html>
<?php $this->load->view('admin/layouts/head', ['title' => 'Mantram']); ?>

<body>
    <?php $this->load->view('admin/layouts/navigation'); ?>
    <?php $this->load->view('admin/layouts/sidebar'); ?>

    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Mantram</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-2">
                                <a href="<?= base_url('admin/mantram/create'); ?>" class="btn btn-warning btn-block">
                                    <i class="fa fa-plus" style="margin-right: 8px"></i>Tambah
                                </a>
                            </div>
                            <div class="col-md-4 col-md-offset-6">
                                <form class="form" action="<?= current_url() ?>">
                                    <div class="row">
                                        <div class="col-lg-8" style="padding-right: 0px;">
                                            <input type="text" class="form-control" value="<?= $this->input->get('q') ?>" style="height: inherit" placeholder="Pencarian..." name="q">
                                        </div>
                                        <div class="col-lg-4">
                                            <button type="submit" class="btn btn-success btn-block"><i class="fa fa-search" style="margin-right: 8px"></i>Cari</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-10 text-right"></div>
                        </div>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th width="80">No.</th>
                                <th>Nama Mantram</th>
                                <th width="150">Kategori</th>
                                <th width="250"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data as $index => $value) : ?>
                                <tr>
                                    <td>
                                        <?= $index + (((($this->input->get('page') ?: 1) - 1) * 10) + 1) ?>
                                    </td>
                                    <td>
                                        <a href="<?= base_url('admin/mantram/show/' . $value->id_mantram) ?>"><?= $value->nama_mantram ?></a>
                                    </td>
                                    <td>
                                        <?= ucfirst($value->kategori ?: '-') ?>
                                    </td>
                                    <td>
                                        <a href="<?= base_url('admin/mantram/edit/' . $value->id_mantram); ?>" class="btn btn-primary btn-xs"><i class="fa fa-edit" style="margin-right: 4px"></i>Edit</a>
                                        <a href="<?= base_url('admin/mantram/delete/' . $value->id_mantram); ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')" class="btn btn-danger btn-xs"><i class="fa fa-remove" style="margin-right: 4px"></i>Hapus</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div class="text-center">
                    <?= $pagination; ?>
                </div>
            </div>
        </div>
    </div>

    <?php $this->load->view('admin/layouts/footer'); ?>
</body>

</html>