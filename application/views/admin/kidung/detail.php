<!DOCTYPE html>
<html>
<?php $this->load->view('admin/layouts/head', ['title' => $data->nama_kidung]); ?>

<body>
    <?php $this->load->view('admin/layouts/navigation'); ?>
    <?php $this->load->view('admin/layouts/sidebar'); ?>
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main" style="margin-top: 16px">
        <!--/.row-->
        <h1 class="page-header" style="margin: 0"><?= $data->nama_kidung ?></h1>
        <div><?= $data->deskripsi_kidung ?></div>
        <br>
        <blockquote><?= str_replace('\r\n', "<br>", "{$data->bait_kidung}") ?></blockquote>
    </div> <!-- Footer -->
    <?php $this->load->view('admin/layouts/footer'); ?>
</body>

</html>