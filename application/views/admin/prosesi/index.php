<!DOCTYPE html>
<html>
<?php $this->load->view('admin/layouts/head', ['title' => 'Prosesi Upacara']); ?>

<body>
    <?php $this->load->view('admin/layouts/navigation'); ?>
    <?php $this->load->view('admin/layouts/sidebar'); ?>

    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Prosesi Upacara</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-2">
                                <a href="<?= base_url('admin/prosesi/create'); ?>" class="btn btn-warning">
                                    <i class="fa fa-plus" style="margin-right: 8px"></i>Tambah
                                </a>
                            </div>
                            <div class="col-md-10 text-right"></div>
                        </div>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th width="80">ID</th>
                                <th>Deskripsi</th>
                                <th>Yadnya</th>
                                <th width="250"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data as $index => $value) : ?>
                                <tr>
                                    <td>
                                        <?= $value->id_prosesi_upacara ?>
                                    </td>
                                    <td>
                                        <a href="<?= base_url('admin/prosesi/detail/' . $value->id_prosesi_upacara) ?>"><?= $value->prosesi_upacara ?></a>
                                    </td>
                                    <td>
                                        <?= $value->nama_yadnya ?>
                                    </td>
                                    <td>
                                        <a href="<?= base_url('admin/prosesi/edit/' . $value->id_prosesi_upacara); ?>" class="btn btn-primary btn-xs"><i class="fa fa-edit" style="margin-right: 4px"></i>Edit</a>
                                        <a href="<?= base_url('admin/prosesi/delete/' . $value->id_prosesi_upacara); ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')" class="btn btn-danger btn-xs"><i class="fa fa-remove" style="margin-right: 4px"></i>Hapus</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <?php $this->load->view('admin/layouts/footer'); ?>
</body>

</html>