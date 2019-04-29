<!DOCTYPE html>
<html>
<?php $this->load->view('layouts/head', ['title' => $data->nama_tari]); ?>

<body>
    <?php $this->load->view('layouts/navigation'); ?>

    <div class="container py-5">
        <div class="row">
            <div class="col-3">
                <img src="<?= $data->gambar ? base_url('uploads/' . $data->gambar) : base_url('assets/images/placeholder.png') ?>" class="card-img-top" alt="...">
            </div>
            <div class="col-9">
                <h1 class="mb-3"><?= $data->nama_tari ?></h1>
                <table width="100%" class="mb-3">
                    <tr>
                        <td width="150"><strong>Jumlah Penari</strong></td>
                        <td><?= $data->jml_penari; ?> orang</td>
                    </tr>
                    <tr>
                        <td width="150"><strong>Fungsi Tari</strong></td>
                        <td><?= $data->fungsi_tari; ?></td>
                    </tr>
                </table>
                <p><?= $data->deskripsi ?></p>
            </div>
        </div>
        <hr />
        <?= $data->konten; ?>
    </div>
    <?php $this->load->view('layouts/footer'); ?>
</body>

</ html>