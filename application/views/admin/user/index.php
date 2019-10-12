<!DOCTYPE html>
<html>
<?php $this->load->view('admin/layouts/head', ['title' => 'Operator']); ?>

<body>
    <?php $this->load->view('admin/layouts/navigation'); ?>
    <?php $this->load->view('admin/layouts/sidebar'); ?>

    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Operator</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-1">
                                <a href="<?= base_url('admin/user/create'); ?>" class="btn btn-warning btn-block">
                                    <i class="fa fa-plus" style="margin-right: 8px"></i>Tambah
                                </a>
                            </div>
                            <div class="col-md-4 col-md-offset-7">
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
                                <th width="80">ID</th>
                                <th>Nama Operator</th>
                                <th width="100">No. Telepon</th>
                                <th width="100">Email</th>
                                <th width="100">Username</th>
                                <th width="250"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data as $index => $value) : ?>
                                <tr>
                                    <td>
                                        <?= $value->id_admin ?>
                                    </td>
                                    <td>
                                        <?= $value->nama ?>
                                    </td>
                                    <td>
                                        <?= $value->nmr_telp ?>
                                    </td>
                                    <td>
                                        <?= $value->email ?>
                                    </td>
                                    <td>
                                        <?= $value->usname ?>
                                    </td>
                                    <td>
                                        <a href="<?= base_url('admin/user/edit/' . $value->id_admin); ?>" class="btn btn-primary btn-xs"><i class="fa fa-edit" style="margin-right: 4px"></i>Edit</a>
                                        <a href="<?= base_url('admin/user/delete/' . $value->id_admin); ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')" class="btn btn-danger btn-xs"><i class="fa fa-remove" style="margin-right: 4px"></i>Hapus</a>
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