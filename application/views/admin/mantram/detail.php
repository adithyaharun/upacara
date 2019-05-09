<!DOCTYPE html>
<html>
<?php $this->load->view('admin/layouts/head', ['title' => $data->nama_mantram]); ?>

<body>
    <?php $this->load->view('admin/layouts/navigation'); ?>
    <?php $this->load->view('admin/layouts/sidebar'); ?>
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main" style="margin-top: 16px">
        <!--/.row-->
        <h1 class="page-header" style="margin: 0"><?= $data->nama_mantram ?></h1>
        <table width="100%">
            <?php if ($data->kategori !== null) : ?>
                <tr>
                    <td width="150"><strong>Kategori</strong></td>
                    <td><?= ucfirst($data->kategori); ?></td>
                </tr>
            <?php endif; ?>
        </table>
        <br>
        <blockquote><?= str_replace('\r\n', "<br>", "{$data->bait_mantram}") ?></blockquote>
    </div> <!-- Footer -->
    <?php $this->load->view('admin/layouts/footer'); ?>
</body>

</html>