<!DOCTYPE html>
<html>
<?php $this->load->view('layouts/head', ['title' => $yadnya->nama_yadnya]); ?>

<body>
    <?php $this->load->view('layouts/navigation'); ?>

    <div class="container pt-5">
        <h1 class="text-center mb-5"><?= $yadnya->nama_yadnya ?></h1>
        <div class="row">
            <?php foreach ($data as $key => $value) : ?>
            <div class="col-3">
                <div class="card">
                    <img src="<?= $value->gambar ? base_url('uploads/' . $value->gambar) : base_url('assets/images/placeholder.png') ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <strong><?= $value->nama_upacara ?></strong>
                        <p><?= $value->deskripsi ?></p>
                        <a href="<?= base_url('upacara/show/' . $value->id_upacara) ?>" class="card-link stretched-link">Lihat</a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
    <?php $this->load->view('layouts/footer'); ?>
</body>

</html> 