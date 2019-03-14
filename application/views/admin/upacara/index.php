<!DOCTYPE html>
<html>
<?php $this->load->view('admin/layouts/head', ['title' => 'Upacara']); ?>

<body>
    <?php $this->load->view('admin/layouts/navigation'); ?>
    <?php $this->load->view('admin/layouts/sidebar'); ?>

    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    <?= $yadnya->nama_yadnya ?>
                </h1>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-2">
                                <a href="<?= base_url('upacara/create?yadnya=' . $yadnya->id_yadnya); ?>" class="btn btn-warning">
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
                                <th>Nama</th>
                                <th width="150">Tingkatan Upacara</th>
                                <th width="250"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data as $index => $value) : ?>
                            <tr>
                                <td>
                                    <?= $value->id_upacara ?>
                                </td>
                                <td>
                                    <?= $value->nama_upacara ?>
                                </td>
                                <td>
                                    <?= ucfirst($value->tingkatan_upacara ?: '-') ?>
                                </td>
                                <td>
                                    <a href="<?= base_url('upacara/edit/' . $value->id_upacara); ?>" class="btn btn-primary btn-xs"><i class="fa fa-edit" style="margin-right: 4px"></i>Edit</a>
                                    <a href="<?= base_url('upacara/delete/' . $value->id_upacara); ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')" class="btn btn-danger btn-xs"><i class="fa fa-remove" style="margin-right: 4px"></i>Hapus</a>
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