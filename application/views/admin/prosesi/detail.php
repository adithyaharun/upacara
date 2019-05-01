<!DOCTYPE html>
<html>
<?php $this->load->view('admin/layouts/head', ['title' => 'Prosesi Upacara']); ?>

<body>
    <?php $this->load->view('admin/layouts/navigation'); ?>
    <?php $this->load->view('admin/layouts/sidebar'); ?>

    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row" style="margin-top: 16px; margin-bottom: 16px">
            <div class="col-lg-3">
                <img src="<?= $data->gambar ? base_url('uploads/' . $data->gambar) : base_url('assets/images/placeholder.png'); ?>" width="100%" />
            </div>
            <div class="col-lg-9">
                <h1 class="page-header" style="margin: 0"><?= $data->prosesi_upacara ?></h1>
                <h4 style="margin: 0"><?= $data->nama_yadnya ?></h4>
                <br>
                <div><?= $data->deskripsi ?></div>
            </div>
        </div>
    </div>

    <?php $this->load->view('admin/layouts/footer'); ?>
</body>

</html>