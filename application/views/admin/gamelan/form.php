<!DOCTYPE html>
<html>
<?php $this->load->view('admin/layouts/head', ['title' => 'Gamelan']); ?>

<body>
    <?php $this->load->view('admin/layouts/navigation'); ?>
    <?php $this->load->view('admin/layouts/sidebar'); ?>
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <!--/.row-->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    <?= isset($data) ? "Edit Gamelan: {$data->nama_gamelan}" : "Tambah Gamelan" ?>
                </h1>
            </div>
        </div>
        <div class="panel panel-default">
            <form class="form" action="<?= base_url('admin/gamelan/' . (isset($data) ? 'update/' . $data->id_gamelan : 'store')) ?>" method="POST" enctype="multipart/form-data">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="control-label">Nama Gamelan <span class="text-danger">*</span></label>
                                <input type="text" name="nama_gamelan" class="form-control" value="<?= isset($data) ? $data->nama_gamelan : '' ?>" required />
                            </div>
                            <div class="form-group">
                                <label class="control-label">Fungsi Gamelan <span class="text-danger">*</span></label>
                                <select type="text" name="golongan" required class="form-control">
                                    <option value="tua" <?= isset($data) && $data->golongan == 'tua' ? 'selected' : '' ?>>Tua</option>
                                    <option value="madya" <?= isset($data) && $data->golongan == 'madya' ? 'selected' : '' ?>>Madya</option>
                                    <option value="baru" <?= isset($data) && $data->golongan == 'baru' ? 'selected' : '' ?>>Baru</option>
                                    <option value="kontemporer" <?= isset($data) && $data->golongan == 'kontemporer' ? 'selected' : '' ?>>Kontemporer</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Video/Audio <span class="text-danger">*</span></label>
                                <textarea name="konten" id="konten" required class="form-control"><?= isset($data) ? $data->konten : '' ?></textarea>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Tabuh <span class="text-danger">*</span></label>
                                <select name="tabuh[]" class="form-control"></select>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Deskripsi <span class="text-danger">*</span></label>
                                <textarea rows="" type="text" name="deskripsi" class="form-control" required><?= isset($data) ? $data->deskripsi : '' ?></textarea>
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
                    <a href="<?= base_url('admin/gamelan'); ?>" class="btn btn-default">Batal</a>
                    <button class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
    <!-- Footer -->
    <?php $this->load->view('admin/layouts/footer'); ?>
    <script src="<?= base_url('assets/ckeditor/ckeditor.js') ?>"></script>
    <script src="<?= base_url('assets/select2/select2.min.js') ?>"></script>
    <link href="<?= base_url('assets/select2/select2.min.css') ?>" rel="stylesheet" />
    <script>
        let $photo = $('#photo'),
            $photoInput = $('#photo-input'),
            tabuhData = <?= json_encode($tabuh); ?>

        console.log(tabuhData)

        CKEDITOR.replace('deskripsi');
        $photoInput.on('change', function(e) {
            let file = e.target.files[0],
                fileReader = new FileReader();

            fileReader.onload = function(e) {
                $photo.attr('src', e.target.result);
            }

            fileReader.readAsDataURL(file);
        });

        $('[name="tabuh[]"]').select2({
            data: tabuhData,
            multiple: true,
            placeholder: 'Pilih tabuh...'
        });

        $('[name="tabuh[]"]').val('');
    </script>
</body>

</html>