<!DOCTYPE html>
<html>
<?php $this->load->view('admin/layouts/head', ['title' => 'Tari']); ?>

<body>
    <?php $this->load->view('admin/layouts/navigation'); ?>
    <?php $this->load->view('admin/layouts/sidebar'); ?>
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <!--/.row-->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    <?= isset($data) ? "Edit Tari: {$data->nama_tari}" : "Tambah Tari" ?>
                </h1>
            </div>
        </div>
        <div class="panel panel-default">
            <form class="form" action="<?= base_url('admin/tari/' . (isset($data) ? 'update/' . $data->id_tari : 'store')) ?>" method="POST" enctype="multipart/form-data">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="control-label">Nama Tari <span class="text-danger">*</span></label>
                                <input type="text" name="nama_tari" class="form-control" value="<?= isset($data) ? $data->nama_tari : '' ?>" required />
                            </div>
                            <div class="form-group">
                                <label class="control-label">Jumlah Penari <span class="text-danger">*</span></label>
                                <input type="number" min="0" name="jml_penari" class="form-control" value="<?= isset($data) ? $data->jml_penari : '' ?>" required />
                            </div>
                            <div class="form-group">
                                <label class="control-label">Fungsi Tari <span class="text-danger">*</span></label>
                                <select type="text" name="fungsi_tari" required class="form-control">
                                    <option value="wali" <?= isset($data) && $data->fungsi_tari == 'wali' ? 'selected' : '' ?>>Wali</option>
                                    <option value="bebali" <?= isset($data) && $data->fungsi_tari == 'bebali' ? 'selected' : '' ?>>Bebali</option>
                                    <option value="balih-balihan" <?= isset($data) && $data->fungsi_tari == 'balih-balihan' ? 'selected' : '' ?>>Balih-balihan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Link Video / Audio <span class="text-danger">*</span></label>
                                <input type="text" name="deskripsi" class="form-control" required value="<?= isset($data) ? $data->deskripsi : '' ?>" />
                            </div>
                        </div>
                        <div class=" col-lg-6">
                            <div class="form-group">
                                <label class="control-label">Gambar <span class="text-danger">*</span></label><br>
                                <img src="<?= isset($data) && $data->gambar ? base_url('uploads/' . $data->gambar) : base_url('assets/images/placeholder.png'); ?>" id="photo" height="240" /><br>
                                <input type="file" name="photo" class="hidden" accept="image/*" id="photo-input" />
                                <button type="button" onclick="document.getElementById('photo-input').click()" style="margin-top: 8px" class="btn btn-info"><i class="fa fa-folder-open" style="margin-right: 4px"></i> Browse...</button>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label class="control-label">Deskripsi <span class="text-danger">*</span></label>
                        <textarea name="deskripsi" id="deskripsi" required class="form-control"><?= isset($data) ? $data->deskripsi : '' ?></textarea>
                    </div>
                </div>
                <div class="panel-footer">
                    <a href="<?= base_url('admin/tari'); ?>" class="btn btn-default">Batal</a>
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