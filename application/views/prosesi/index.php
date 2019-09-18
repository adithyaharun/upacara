<!DOCTYPE html>
<html>
<?php $this->load->view('layouts/head', ['title' => $yadnya->nama_yadnya]); ?>

<body>
    <?php $this->load->view('layouts/navigation'); ?>

    <div class="container pt-5">
        <h1 class="text-center mb-5"><?= $yadnya->nama_yadnya ?></h1>
        <?php if (count($data) === 0) : ?>
        <div class="text-center">
            <img src="<?= base_url('assets/images/empty.svg'); ?>" width="480" />
            <h5 class="my-5 text-muted">Tidak ada upacara.</h5>
        </div>
        <?php endif; ?>
        <?php foreach ($data as $key => $value) : ?>
        <div class="card">
            <div class="row">
                <div class="col-lg-3">
                    <img src="<?= $value->gambar ? base_url('uploads/' . $value->gambar) : base_url('assets/images/placeholder.png') ?>" class="card-img-top" alt="...">
                </div>
                <div class="card-body col-lg-9 pl-0">
                    <h4><a href="<?= base_url('upacara/show/' . $value->id_upacara) ?>" class="card-link stretched-link"><?= $value->nama_upacara ?></a></h4>
                    <div class="row">
                        <div class="col-lg-3">
                            <i class="fa fa-file mr-1"></i>
                            <small><?= $value->nama_yadnya ?></small>
                        </div>
                    </div>
                    <p><?= $value->deskripsi ?></p>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    <?php $this->load->view('layouts/footer'); ?>
</body>

</html>