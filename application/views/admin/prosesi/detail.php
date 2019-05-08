<!DOCTYPE html>
<html>
<?php $this->load->view('admin/layouts/head', ['title' => $data->prosesi_upacara]); ?>

<body>
    <?php $this->load->view('admin/layouts/navigation'); ?>
    <?php $this->load->view('admin/layouts/sidebar'); ?>
    <div class="modal fade" id="detail-modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Tutup"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Tambah <span class="add-item-label"></span></h4>
                </div>
                <form class="form" action="<?= base_url('admin/prosesi/add_detail/' . $data->id_prosesi_upacara) ?>" method="POST">
                    <input type="hidden" name="type" />
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="control-label"><span class="add-item-label"></span></label>
                            <select name="detail" class="form-control" required></select>
                        </div>
                        <div class="form-group category-form">
                            <label class="control-label">Kategori Prosesi</label>
                            <select name="kategori" class="form-control" disabled>
                                <option value="awal">Awal</option>
                                <option value="puncak">Puncak</option>
                                <option value="akhir">Akhir</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main" style="margin-top: 16px">
        <!--/.row-->
        <div class="row">
            <div class="col-lg-3">
                <img src="<?= $data->gambar !== null ? base_url('uploads/' . $data->gambar) : base_url('assets/images/placeholder.png'); ?>" width="100%" />
            </div>
            <div class="col-lg-9">
                <h1 class="page-header" style="margin: 0"><?= $data->prosesi_upacara ?></h1>
                <br>
                <div><?= $data->deskripsi ?></div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-lg-4">
                <h3>Tari</h3>
                <div class="row" style="margin-bottom: 16px">
                    <?php foreach ($data->tari as $tari) : ?>
                        <div class="col-lg-4" style="margin-top: 16px">
                            <div class="card" style="background-image: url(<?= $tari->gambar ? base_url('/uploads/' . $tari->gambar) : base_url('/assets/images/placeholder.png') ?>)">
                                <div class="card-body"><?= $tari->nama_tari ?></div>
                                <a data-id="<?= $tari->id_detail ?>" class="btn btn-delete btn-sm btn-danger btn-card">Hapus</a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <div class="col-lg-4" style="margin-top: 16px">
                        <a class="card" data-toggle="modal" href="#detail-modal" data-type="tari"><i class="fa fa-plus fa-4x"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <h3>Gamelan</h3>
                <div class="row" style="margin-bottom: 16px">
                    <?php foreach ($data->gamelan as $gamelan) : ?>
                        <div class="col-lg-4" style="margin-top: 16px">
                            <div class="card" style="background-image: url(<?= $gamelan->gambar ? base_url('/uploads/' . $gamelan->gambar) : base_url('/assets/images/placeholder.png') ?>)">
                                <div class="card-body"><?= $gamelan->nama_gamelan ?></div>
                                <a data-id="<?= $gamelan->id_detail ?>" class="btn btn-delete btn-sm btn-danger btn-card">Hapus</a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <div class="col-lg-4" style="margin-top: 16px">
                        <a class="card" data-toggle="modal" href="#detail-modal" data-type="gamelan"><i class="fa fa-plus fa-4x"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <h3>Kidung</h3>
                <div class="row" style="margin-bottom: 16px">
                    <?php foreach ($data->kidung as $kidung) : ?>
                        <div class="col-lg-4" style="margin-top: 16px">
                            <div class="card" style="background-image: url(<?= base_url('/assets/images/placeholder.png') ?>)">
                                <div class="card-body"><?= $kidung->nama_kidung ?></div>
                                <a data-id="<?= $kidung->id_detail ?>" class="btn btn-delete btn-sm btn-danger btn-card">Hapus</a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <div class="col-lg-4" style="margin-top: 16px">
                        <a class="card" data-toggle="modal" href="#detail-modal" data-type="kidung"><i class="fa fa-plus fa-4x"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- Footer -->
    <?php $this->load->view('admin/layouts/footer'); ?>
    <script>
        let $detailModal = $("#detail-modal");
        let baseUrl = $('meta[name="base_url"]').attr('content');

        $detailModal.on("show.bs.modal", function(e) {
            let type = $(e.relatedTarget).data("type");

            $.ajax({
                url: `<?= base_url('admin/') ?>${type}/json`
            }).then(function(response) {
                let $input = $('[name="detail"]');

                $input.html(`<option value>Pilih ${type}...</option>`);

                response.forEach((item, index) => {
                    if (type === 'prosesi') {
                        $input.append(`<option value="${item['id_prosesi_upacara']}">${item['prosesi_upacara']}</option>`);
                    } else {
                        $input.append(`<option value="${item['id_' + type]}">${item['nama_' + type]}</option>`);
                    }
                });
            });

            $detailModal.find('.add-item-label').text(type.charAt(0).toUpperCase() + type.slice(1));
            $detailModal.find('[name="type"]').val(type);
            $detailModal.find('.category-form')
                .toggle(type === 'prosesi')
                .find('[name="kategori"]')
                .prop('disabled', type !== 'prosesi');
        });

        $('.btn-delete').on('click', function(e) {
            let id = $(this).data('id');

            e.preventDefault();
            e.stopPropagation();

            if (confirm('Apakah anda yakin ingin menghapus item ini?')) {
                window.location.href = `${baseUrl}admin/prosesi/delete_detail/${id}`;
            }
        });
    </script>
</body>

</html>