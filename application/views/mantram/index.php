<!DOCTYPE html>
<html>
<?php $this->load->view('layouts/head', ['title' => 'Mantram']); ?>

<body>
    <?php $this->load->view('layouts/navigation'); ?>

    <div class="container pt-5">
        <h1 class="text-center mb-5">Mantram</h1>
        <?php if (count($data) === 0) : ?>
            <div class="text-center">
                <img src="<?= base_url('assets/images/empty.svg'); ?>" width="480" />
                <h5 class="my-5 text-muted">Tidak ada data mantram.</h5>
            </div>
        <?php endif; ?>
        <?php foreach ($data as $key => $value) : ?>
            <div class="card shadow rounded-lg mb-5">
                <div class="card-body">
                    <h4><a href="<?= base_url('mantram/show/' . $value->id_mantram) ?>" class="card-link stretched-link"><?= $value->nama_mantram ?></a></h4>
                    <div class="row">
                        <div class="col-lg-3">
                            <i class="fa fa-file mr-1"></i>
                            <small>Kategori <?= ucfirst($value->kategori) ?></small>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <?php $this->load->view('layouts/footer'); ?>
</body>

</html>