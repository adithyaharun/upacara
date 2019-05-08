<!DOCTYPE html>
<html>
<?php $this->load->view('admin/layouts/head', ['title' => 'Prosesi']); ?>

<body>
    <?php $this->load->view('admin/layouts/navigation'); ?>
    <?php $this->load->view('admin/layouts/sidebar'); ?>
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <!--/.row-->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    <?= isset($data) ? "Edit Prosesi" : "Tambah Prosesi" ?>
                </h1>
            </div>
        </div>
        <div class="panel panel-default">
            <form class="form" action="<?= base_url('admin/prosesi/' . (isset($data) ? 'update/' . $data->id_prosesi_upacara : 'store')) ?>" method="POST" enctype="multipart/form-data">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="control-label">Nama Prosesi <span class="text-danger">*</span></label>
                                <input type="text" name="prosesi_upacara" class="form-control" value="<?= isset($data) ? $data->prosesi_upacara : '' ?>" required />
                            </div>
                            <div class="form-group">
                                <label class="control-label">Yadnya <span class="text-danger">*</span></label>
                                <select type="text" name="id_yadnya" required class="form-control">
                                    <?php foreach ($yadnya as $index => $value) : ?>
                                        <option value="<?= $value->id_yadnya ?>" <?= isset($data) && $data->id_yadnya == $value->id_yadnya ? 'selected' : '' ?>><?= $value->nama_yadnya ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Mantram <span class="text-danger">*</span></label>
                                <select type="text" name="id_mantram" required class="form-control">
                                    <?php foreach ($mantram as $index => $value) : ?>
                                        <option value="<?= $value->id_mantram ?>" <?= isset($data) && $data->id_mantram == $value->id_mantram ? 'selected' : '' ?>><?= $value->nama_mantram ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Deskripsi <span class="text-danger">*</span></label>
                                <textarea name="deskripsi" id="deskripsi" required class="form-control"><?= isset($data) ? $data->deskripsi : '' ?></textarea>
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
                </div>
                <div class="panel-footer">
                    <a href="<?= base_url('admin/prosesi'); ?>" class="btn btn-default">Batal</a>
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