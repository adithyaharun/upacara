<!DOCTYPE html>
<html>
<?php $this->load->view('admin/layouts/head', ['title' => $data->nama_upacara]); ?>

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
                <form class="form" action="<?= base_url('/upacara/add_detail/' . $data->id_upacara) ?>" method="POST">
                    <input type="hidden" name="type" />
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="control-label"><span class="add-item-label"></span></label>
                            <select name="detail" class="form-control" required></select>
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
    <div class="modal fade" id="prosesi-modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Tutup"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Tambah Prosesi</h4>
                </div>
                <form class="form" action="<?= base_url('/upacara/add_prosesi/' . $data->id_upacara) ?>" method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="control-label">Mantram</label>
                            <select name="detail" class="form-control" required></select>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Deskripsi</label>
                            <input name="detail" class="form-control" required />
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
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <!--/.row-->
        <div class="row" style="margin-top: 16px; margin-bottom: 16px">
            <div class="col-lg-3">
                <img src="<?= $data->gambar ? base_url('uploads/' . $data->gambar) : base_url('assets/images/placeholder.png'); ?>" width="100%" />
            </div>
            <div class="col-lg-9">
                <h1 class="page-header" style="margin: 0"><?= $data->nama_upacara ?></h1>
                <h4 style="margin: 0"><?= $data->deskripsi ?></h4>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-body"><?= $data->konten ?></div>
        </div>
        <hr>
        <div class="clearfix" style="margin-bottom: 16px">
            <h3 style="margin: 0" class="pull-left">Prosesi</h3>
            <a href="#" data-toggle="modal" data-target="#prosesi-modal" class="btn btn-sm btn-primary pull-right"><i class="fa fa-plus"></i> Tambah Prosesi</a>
        </div>
        <?php if (count($data->prosesi) > 0) : ?>
        <div class="row" style="margin-top: 16px; margin-bottom: 16px">
            <?php foreach ($data->prosesi as $prosesi) : ?>
            <div class="col-lg-3">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <p><?= $prosesi->prosesi_upacara ?></p>
                        <a href="#" class="btn btn-primary btn-block">Lihat</a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <?php else : ?>
        <div style="padding: 32px; background: rgba(0,0,0,0.1)" class="text-center">
            <h4><em>Tidak ada prosesi pada upacara ini.</em></h4>
        </div>
        <?php endif; ?>
        <hr>
        <div class="row">
            <div class="col-lg-4">
                <h3>Tari</h3>
                <div class="row" style="margin-top: 16px; margin-bottom: 16px">
                    <?php foreach ($data->tari as $tari) : ?>
                    <div class="col-lg-4">
                        <a class="card" href="#" style="background-image: url(<?= $tari->gambar ? base_url('/uploads/' . $tari->gambar) : base_url('/assets/images/placeholder.png') ?>)">
                            <div class="card-body"><?= $tari->nama_tari ?></div>
                        </a>
                    </div>
                    <?php endforeach; ?>
                    <div class="col-lg-4">
                        <a class="card" data-toggle="modal" href="#detail-modal" data-type="tari"><i class="fa fa-plus fa-4x"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <h3>Gamelan</h3>
                <div class="row" style="margin-top: 16px; margin-bottom: 16px">
                    <?php foreach ($data->gamelan as $gamelan) : ?>
                    <div class="col-lg-4">
                        <a class="card" href="#" style="background-image: url(<?= $gamelan->gambar ? base_url('/uploads/' . $gamelan->gambar) : base_url('/assets/images/placeholder.png') ?>)">
                            <div class="card-body"><?= $gamelan->nama_gamelan ?></div>
                        </a>
                    </div>
                    <?php endforeach; ?>
                    <div class="col-lg-4">
                        <a class="card" data-toggle="modal" href="#detail-modal" data-type="gamelan"><i class="fa fa-plus fa-4x"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <h3>Kidung</h3>
                <div class="row" style="margin-top: 16px; margin-bottom: 16px">
                    <?php foreach ($data->kidung as $kidung) : ?>
                    <div class="col-lg-4">
                        <a class="card" href="#" style="background-image: url(<?= $kidung->gambar ? base_url('/uploads/' . $kidung->gambar) : base_url('/assets/images/placeholder.png') ?>)">
                            <div class="card-body"><?= $kidung->nama_kidung ?></div>
                        </a>
                    </div>
                    <?php endforeach; ?>
                    <div class="col-lg-4">
                        <a class="card" data-toggle="modal" href="#detail-modal" data-type="kidung"><i class="fa fa-plus fa-4x"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- Footer -->
    <?php $this->load->view('admin/layouts/footer'); ?>
    <script>
        let $detailModal = $("#detail-modal");

        $detailModal.on("show.bs.modal", function(e) {
            let type = $(e.relatedTarget).data("type");

            $.ajax({
                url: `<?= base_url() ?>${type}/json`
            }).then(function(response) {
                let $input = $('[name="detail"]');

                $input.html(`<option value>Pilih ${type}...</option>`);

                response.forEach((item, index) => {
                    $input.append(`<option value="${item['id_' + type]}">${item['nama_' + type]}</option>`);
                });
            });

            $detailModal.find('.add-item-label').text(type.charAt(0).toUpperCase() + type.slice(1));
            $detailModal.find('[name="type"]').val(type);
        });
    </script>
</body>

</html> 