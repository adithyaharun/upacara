<!DOCTYPE html>
<html>
<?php $this->load->view('layouts/head', ['title' => 'Tari']); ?>

<body>
    <?php $this->load->view('layouts/navigation'); ?>

    <div class="container pt-5">
        <h1 class="text-center mb-5">Tari</h1>
        <?php if (count($data) === 0) : ?>
            <div class="text-center">
                <img src="<?= base_url('assets/images/empty.svg'); ?>" width="480" />
                <h5 class="my-5 text-muted">Tidak ada data tari.</h5>
            </div>
        <?php endif; ?>
        <?php foreach ($data as $key => $value) : ?>
            <div class="card shadow rounded-lg mb-5">
                <div class="row">
                    <div class="col-lg-3">
                        <img src="<?= $value->gambar ? base_url('uploads/' . $value->gambar) : base_url('assets/images/placeholder.png') ?>" class="card-img-top" alt="<?= $value->nama_tari ?>">
                    </div>
                    <div class="card-body col-lg-9 pl-0">
                        <h4><a href="<?= base_url('tari/show/' . $value->id_tari) ?>" class="card-link stretched-link"><?= $value->nama_tari ?></a></h4>
                        <div class="row mb-2">
                            <div class="col-md-2">
                                <i class="fa fa-file mr-1"></i>
                                <small><?= ucfirst($value->fungsi_tari) ?></small>
                            </div>
                            <div class="col-md-2">
                                <i class="fa fa-users mr-1"></i>
                                <small><?= ucfirst($value->jml_penari) ?> orang</small>
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