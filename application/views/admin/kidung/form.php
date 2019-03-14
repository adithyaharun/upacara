<!DOCTYPE html>
<html>
<?php $this->load->view('admin/layouts/head', ['title' => 'Kidung']); ?>

<body>
    <?php $this->load->view('admin/layouts/navigation'); ?>
    <?php $this->load->view('admin/layouts/sidebar'); ?>
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <!--/.row-->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    <?= isset($data) ? "Edit Kidung: {$data->nama_kidung}" : "Tambah Kidung" ?>
                </h1>
            </div>
        </div>
        <div class="panel panel-default">
            <form class="form" action="<?= base_url('kidung/' . (isset($data) ? 'update/' . $data->id_kidung : 'store')) ?>" method="POST" enctype="multipart/form-data">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="control-label">Nama Kidung <span class="text-danger">*</span></label>
                                <input type="text" name="nama_kidung" class="form-control" value="<?= isset($data) ? $data->nama_kidung : '' ?>" required />
                            </div>
                            <div class="form-group">
                                <label class="control-label">Deskripsi <span class="text-danger">*</span></label>
                                <textarea rows="3" name="deskripsi_kidung" class="form-control" required><?= isset($data) ? $data->deskripsi_kidung : '' ?></textarea>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="control-label">Bait Kidung <span class="text-danger">*</span></label>
                                <textarea rows="7" type="text" name="bait_kidung" class="form-control" required><?= isset($data) ? $data->bait_kidung : '' ?></textarea>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label class="control-label">Konten <span class="text-danger">*</span></label>
                        <textarea name="konten" id="konten" required class="form-control"><?= isset($data) ? $data->konten : '' ?></textarea>
                    </div>
                </div>
                <div class="panel-footer">
                    <a href="<?= base_url('kidung'); ?>" class="btn btn-default">Batal</a>
                    <button class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
    <!-- Footer -->
    <?php $this->load->view('admin/layouts/footer'); ?>
    <script src="<?= base_url('assets/ckeditor/ckeditor.js') ?>"></script>
    <script>
        let $photo = $('#photo'),
            $photoInput = $('#photo-input')

        CKEDITOR.replace('konten');
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