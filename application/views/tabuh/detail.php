<!DOCTYPE html>
<html>
<?php $this->load->view('layouts/head', ['title' => $data->nama_tabuh]); ?>

<body>
    <?php $this->load->view('layouts/navigation'); ?>

    <div class="container py-5">
        <div class="row">
            <div class="col-3">
                <img src="<?= $data->gambar ? base_url('uploads/' . $data->gambar) : base_url('assets/images/placeholder.png') ?>" class="card-img-top" alt="...">
            </div>
            <div class="col-9">
                <h1 class="mb-3"><?= $data->nama_tabuh ?></h1>
                <p><?= $data->deskripsi ?></p>
            </div>
        </div>
        <hr />
        <?= $data->konten; ?>
    </div>
    <?php $this->load->view('layouts/footer'); ?>
</body>

</ html>