<!DOCTYPE html>
<html>
<?php $this->load->view('admin/layouts/head', ['title' => 'Mantram']); ?>

<body>
    <?php $this->load->view('admin/layouts/navigation'); ?>
    <?php $this->load->view('admin/layouts/sidebar'); ?>
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <!--/.row-->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    <?= isset($data) ? "Edit Mantram" : "Tambah Mantram" ?>
                </h1>
            </div>
        </div>
        <div class="panel panel-default">
            <form class="form" action="<?= base_url('admin/mantram/' . (isset($data) ? 'update/' . $data->id_mantram : 'store')) ?>" method="POST" enctype="multipart/form-data">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="control-label">Nama Mantram <span class="text-danger">*</span></label>
                                <input type="text" name="nama_mantram" class="form-control" required value="<?= isset($data) ? $data->nama_mantram : '' ?>" />
                            </div>
                            <div class="form-group">
                                <label class="control-label">Kategori <span class="text-danger">*</span></label>
                                <select type="text" name="kategori" required class="form-control">
                                    <option value="ekajati" <?= isset($data) && $data->kategori == 'ekajati' ? 'selected' : '' ?>>Ekajati</option>
                                    <option value="Dwijati" <?= isset($data) && $data->kategori == 'Dwijati' ? 'selected' : '' ?>>Dwijati</option>
                                    <option value="umum" <?= isset($data) && $data->kategori == 'umum' ? 'selected' : '' ?>>Umum</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Link Video / Audio <span class="text-danger">*</span></label>
                                <input type="text" name="konten" class="form-control" required value="<?= isset($data) ? $data->konten : '' ?>" />
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="control-label">Bait Mantram <span class="text-danger">*</span></label>
                                <textarea rows="7" type="text" name="bait_mantram" class="form-control" required><?= isset($data) ? $data->bait_mantram : '' ?></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <a href="<?= base_url('admin/mantram'); ?>" class="btn btn-default">Batal</a>
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