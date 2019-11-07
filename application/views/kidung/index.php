<!DOCTYPE html>
<html>
<?php $this->load->view('layouts/head', ['title' => 'Kidung']); ?>

<body>
    <?php $this->load->view('layouts/navigation'); ?>

    <div class="container pt-5">
        <h1 class="text-center mb-5">Kidung</h1>
        <?php if (count($data) === 0) : ?>
            <div class="text-center">
                <img src="<?= base_url('assets/images/empty.svg'); ?>" width="480" />
                <h5 class="my-5 text-muted">Tidak ada data kidung.</h5>
            </div>
        <?php endif; ?>
        <?php foreach ($data as $key => $value) : ?>
            <div class="card shadow rounded-lg mb-5">
                <div class="card-body">
                    <h4><a href="<?= base_url('kidung/show/' . $value->id_kidung) ?>" class="card-link stretched-link"><?= $value->nama_kidung ?></a></h4>
                    <p><?= strlen($value->deskripsi_kidung) > 250 ? substr($value->deskripsi_kidung, 0, 250) . '...' : $value->deskripsi_kidung ?></p>
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