<!DOCTYPE html>
<html>
<?php $this->load->view('admin/layouts/head', ['title' => $data->nama_gamelan]); ?>

<body>
    <?php $this->load->view('admin/layouts/navigation'); ?>
    <?php $this->load->view('admin/layouts/sidebar'); ?>
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main" style="margin-top: 16px">
        <!--/.row-->
        <div class="row">
            <div class="col-lg-3">
                <img src="<?= $data->gambar !== null ? base_url('uploads/' . $data->gambar) : base_url('assets/images/placeholder.png'); ?>" width="100%" />
            </div>
            <div class="col-lg-9">
                <h1 class="page-header" style="margin: 0"><?= $data->nama_gamelan ?></h1>
                <table width="100%">
                    <?php if ($data->golongan !== null) : ?>
                    <tr>
                        <td width="150"><strong>Golongan</strong></td>
                        <td><?= ucwords($data->golongan); ?></td>
                    </tr>
                    <?php endif; ?>
                    <?php if ($data->golongan !== null) : ?>
                    <tr>
                        <td width="150"><strong>Tabuh</strong></td>
                        <td>
                            <?php $index = count($gamelan_tabuh) - 1; ?>
                            <?php foreach ($gamelan_tabuh as $i => $gt) : ?>
                                <?= $gt->nama_tabuh . ($i < $index ? ", " : ""); ?>
                            <?php endforeach; ?>
                        </td>
                    </tr>
                    <?php endif; ?>
                </table>
                <br>
                <div><?= $data->deskripsi ?></div>
                <div style="width: 50%"><?= $data->konten ?></div>
            </div>
        </div>
    </div> <!-- Footer -->
    <?php $this->load->view('admin/layouts/footer'); ?>
</body>

</html>