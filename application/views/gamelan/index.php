<!DOCTYPE html>
<html>
<?php $this->load->view('layouts/head', ['title' => 'Gamelan']); ?>

<body>
    <?php $this->load->view('layouts/navigation'); ?>

    <div class="container pt-5">
        <h1 class="text-center mb-5">Gamelan</h1>
        <?php if (count($data) === 0) : ?>
            <div class="text-center">
                <img src="<?= base_url('assets/images/empty.svg'); ?>" width="480" />
                <h5 class="my-5 text-muted">Tidak ada data gamelan.</h5>
            </div>
        <?php endif; ?>
        <?php foreach ($data as $key => $value) : ?>
            <div class="card shadow rounded-lg mb-5">
                <div class="row">
                    <div class="col-lg-3">
                        <img src="<?= $value->gambar ? base_url('uploads/' . $value->gambar) : base_url('assets/images/placeholder.png') ?>" class="card-img-top" alt="<?= $value->nama_gamelan ?>">
                    </div>
                    <div class="card-body col-lg-9 pl-0">
                        <h4><a href="<?= base_url('gamelan/show/' . $value->id_gamelan) ?>" class="card-link stretched-link"><?= $value->nama_gamelan ?></a></h4>
                        <div class="row">
                            <div class="col-lg-3">
                                <i class="fa fa-file mr-1"></i>
                                <small>Golongan <?= ucfirst($value->golongan) ?></small>
                            </div>
                        </div>
                        <p><?= strlen($value->deskripsi) > 250 ? substr($value->deskripsi, 0, 250) . '...' : $value->deskripsi ?></p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        <div class="text-center">
            <?= $pagination; ?>
        </div>
    </div>
    <?php $this->load->view('layouts/footer'); ?>
</body>

</html>