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
                <?php if ($data->id_mantram !== null) : ?>
                    <table width="100%">
                        <tr>
                            <td width="150"><strong>Mantram</strong></td>
                            <td><?= $data->nama_mantram; ?></td>
                        </tr>
                    </table>
                <?php endif; ?>
                <br>
                <div><?= $data->deskripsi ?></div>
            </div>
        </div>
        <hr>
        <div class="panel-group" id="accordion">
            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingFive">
                    <a style="text-decoration: none; color: #232323;" class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="true" aria-controls="collapseFive">
                        Prosesi
                    </a>
                </div>
                <div id="collapseFive" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingFive">
                    <div class="panel-body">
                        <div class="row">
                            <?php foreach ($data->prosesi as $prosesi) : ?>
                                <div class="col-lg-2">
                                    <div class="panel panel-default" style="border: 1px solid #efeef4">
                                        <img src="<?= $prosesi->gambar ? base_url('/uploads/' . $prosesi->gambar) : base_url('/assets/images/placeholder.png') ?>" width="100%" />
                                        <div class="panel-body">
                                            <p><?= $prosesi->prosesi_upacara ?></p>
                                            <a href="<?= base_url('admin/prosesi/detail/' . $prosesi->id_prosesi_upacara) ?>" class="btn btn-primary btn-sm">Lihat</a>
                                            <a href="#" class="btn btn-danger btn-delete btn-sm" data-id="<?= $prosesi->id_detail ?>">Hapus</a>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                            <div class="col-lg-2">
                                <a class="card" data-toggle="modal" href="#detail-modal" data-type="prosesi"><i class="fa fa-plus fa-4x"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel panel-primary">
                <div class="panel-heading" role="tab" id="headingOne">
                    <a style="text-decoration: none; color: #ffffff;" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Tari
                    </a>
                </div>
                <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                    <div class="panel-body">
                        <div class="row">
                            <?php foreach ($data->tari as $tari) : ?>
                                <div class="col-lg-2">
                                    <div class="card" style="background-image: url(<?= $tari->gambar ? base_url('/uploads/' . $tari->gambar) : base_url('/assets/images/placeholder.png') ?>)">
                                        <div class="card-body"><?= $tari->nama_tari ?></div>
                                        <a data-id="<?= $tari->id_detail ?>" class="btn btn-delete btn-sm btn-danger btn-card">Hapus</a>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                            <div class="col-lg-2">
                                <a class="card" data-toggle="modal" href="#detail-modal" data-type="tari"><i class="fa fa-plus fa-4x"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel panel-success">
                <div class="panel-heading" role="tab" id="headingTwo">
                    <a style="text-decoration: none; color: #ffffff;" class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                        Gamelan
                    </a>
                </div>
                <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                    <div class="panel-body">
                        <div class="row">
                            <?php foreach ($data->gamelan as $gamelan) : ?>
                                <div class="col-lg-2">
                                    <div class="card" style="background-image: url(<?= $gamelan->gambar ? base_url('/uploads/' . $gamelan->gambar) : base_url('/assets/images/placeholder.png') ?>)">
                                        <div class="card-body"><?= $gamelan->nama_gamelan ?></div>
                                        <a data-id="<?= $gamelan->id_detail ?>" class="btn btn-delete btn-sm btn-danger btn-card">Hapus</a>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                            <div class="col-lg-2">
                                <a class="card" data-toggle="modal" href="#detail-modal" data-type="gamelan"><i class="fa fa-plus fa-4x"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel panel-warning">
                <div class="panel-heading" role="tab" id="headingThree">
                    <a style="text-decoration: none; color: #ffffff;" class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                        Kidung
                    </a>
                </div>
                <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                    <div class="panel-body">
                        <div class="row">
                            <?php foreach ($data->kidung as $kidung) : ?>
                                <div class="col-lg-2">
                                    <div class="card" style="background-image: url(<?= base_url('/assets/images/placeholder.png') ?>)">
                                        <div class="card-body"><?= $kidung->nama_kidung ?></div>
                                        <a data-id="<?= $kidung->id_detail ?>" class="btn btn-delete btn-sm btn-danger btn-card">Hapus</a>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                            <div class="col-lg-2">
                                <a class="card" data-toggle="modal" href="#detail-modal" data-type="kidung"><i class="fa fa-plus fa-4x"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel panel-danger">
                <div class="panel-heading" role="tab" id="headingFour">
                    <a style="text-decoration: none; color: #ffffff;" class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                        Mantram
                    </a>
                </div>
                <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
                    <div class="panel-body">
                        <div class="row">
                            <?php foreach ($data->mantram as $mantram) : ?>
                                <div class="col-lg-2">
                                    <div class="card" style="background-image: url(<?= base_url('/assets/images/placeholder.png') ?>)">
                                        <div class="card-body"><?= $mantram->nama_mantram ?></div>
                                        <a data-id="<?= $mantram->id_detail ?>" class="btn btn-delete btn-sm btn-danger btn-card">Hapus</a>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                            <div class="col-lg-2">
                                <a class="card" data-toggle="modal" href="#detail-modal" data-type="mantram"><i class="fa fa-plus fa-4x"></i></a>
                            </div>
                        </div>
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