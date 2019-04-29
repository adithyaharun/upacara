<!DOCTYPE html>
<html>
<?php $this->load->view('admin/layouts/head', ['title' => 'Operator']); ?>

<body>
    <?php $this->load->view('admin/layouts/navigation'); ?>
    <?php $this->load->view('admin/layouts/sidebar'); ?>
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <!--/.row-->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    <?= isset($data) ? "Edit Operator" : "Tambah Operator" ?>
                </h1>
            </div>
            <div class="col-lg-6">
                <div class="panel panel-default">
                    <form class="form" action="<?= base_url('admin/user/' . (isset($data) ? 'update/' . $data->id_admin : 'store')) ?>" method="POST" enctype="multipart/form-data">
                        <div class="panel-body">
                            <div class="form-group">
                                <label class="control-label">Nama Operator <span class="text-danger">*</span></label>
                                <input type="text" name="nama" class="form-control" required value="<?= isset($data) ? $data->nama : '' ?>" />
                            </div>
                            <div class="form-group">
                                <label class="control-label">Nomor Telepon <span class="text-danger">*</span></label>
                                <input type="tel" name="nmr_telp" class="form-control" required value="<?= isset($data) ? $data->nmr_telp : '' ?>" />
                            </div>
                            <div class="form-group">
                                <label class="control-label">Email <span class="text-danger">*</span></label>
                                <input type="email" name="email" class="form-control" required value="<?= isset($data) ? $data->email : '' ?>" />
                            </div>
                            <hr>
                            <div class="form-group">
                                <label class="control-label">Username <span class="text-danger">*</span></label>
                                <input type="text" name="usname" class="form-control" required value="<?= isset($data) ? $data->usname : '' ?>" />
                            </div>
                            <div class="form-group">
                                <label class="control-label">Password <span class="text-danger">*</span></label>
                                <input type="password" name="pwd" class="form-control" value="<?= isset($data) ? $data->pwd : '' ?>" />
                            </div>
                        </div>
                        <div class="panel-footer">
                            <a href="<?= base_url('admin/user'); ?>" class="btn btn-default">Batal</a>
                            <button class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <?php $this->load->view('admin/layouts/footer'); ?>
    <script src="<?= base_url('assets/ckeditor/ckeditor.js') ?>"></script>
    <script>
        let $photo = $('#photo'),
            $photoInput = $('#photo-input')

        CKEDITOR.replace('deskripsi');
        $photoInput.on('change', function(e) {
            let file = e.target.files[0],
                fileReader = new FileReader();

            fileReader.onload = function(e) {
                $photo.attr('src', e.target.result);
            }

            fileReader.readAsDataURL(file);
        });
    </script>
</body>

</html>