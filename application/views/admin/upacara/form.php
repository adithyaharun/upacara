<!DOCTYPE html>
<html>
<?php $this->load->view('admin/layouts/head', ['title' => 'Upacara']); ?>

<body>
    <?php $this->load->view('admin/layouts/navigation'); ?>
    <?php $this->load->view('admin/layouts/sidebar'); ?>
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <!--/.row-->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    <?= isset($data) ? "Edit Upacara: {$data->nama_upacara}" : "Tambah Upacara" ?>
                </h1>
            </div>
        </div>
        <div class="panel panel-default">
            <form class="form" action="<?= base_url('admin/upacara/' . (isset($data) ? 'update/' . $data->id_upacara : 'store')) ?>" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id_yadnya" value="<?= isset($data) ? $data->id_yadnya : $this->input->get('yadnya') ?>" />
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="control-label">Nama Upacara <span class="text-danger">*</span></label>
                                <input type="text" name="nama_upacara" class="form-control" value="<?= isset($data) ? $data->nama_upacara : '' ?>" required />
                            </div>
                            <div class="form-group">
                                <label class="control-label">Konten (Audio / Video)</label>
                                <textarea name="konten" id="konten" required class="form-control" rows="5"><?= isset($data) ? $data->konten : '' ?></textarea>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Deskripsi <span class="text-danger">*</span></label>
                                <textarea name="deskripsi" id="deskripsi" required class="form-control"><?= isset($data) ? $data->deskripsi : '' ?></textarea>
                            </div>
                        </div>
                        <div class="col-lg-6">
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
                    <a href="<?= base_url('admin/upacara?yadnya=' . (isset($data) ? $data->id_yadnya : $this->input->get('yadnya'))); ?>" class="btn btn-default">Batal</a>
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