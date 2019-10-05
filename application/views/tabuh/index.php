<!DOCTYPE html>
<html>
<?php $this->load->view('layouts/head', ['title' => 'Tabuh']); ?>

<body>
    <?php $this->load->view('layouts/navigation'); ?>

    <div class="container pt-5">
        <h1 class="text-center mb-5">Tabuh</h1>
        <?php if (count($data) === 0) : ?>
            <div class="text-center">
                <img src="<?= base_url('assets/images/empty.svg'); ?>" width="480" />
                <h5 class="my-5 text-muted">Tidak ada data tabuh.</h5>
            </div>
        <?php endif; ?>
        <?php foreach ($data as $key => $value) : ?>
            <div class="card shadow rounded-lg mb-5">
                <div class="row">
                    <div class="col-lg-3">
                        <img src="<?= $value->gambar ? base_url('uploads/' . $value->gambar) : base_url('assets/images/placeholder.png') ?>" class="card-img-top" alt="<?= $value->nama_tabuh ?>">
                    </div>
                    <div class="card-body col-lg-9 pl-0">
                        <h4><a href="<?= base_url('tabuh/show/' . $value->id_tabuh) ?>" class="card-link stretched-link"><?= $value->nama_tabuh ?></a></h4>
                        <p><?= strlen($value->deskripsi) > 250 ? substr($value->deskripsi, 0, 250) . '...' : $value->deskripsi ?></p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <?php $this->load->view('layouts/footer'); ?>
</body>

</html>