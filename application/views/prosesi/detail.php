<!DOCTYPE html>
<html>
<?php $this->load->view('layouts/head', ['title' => $data->prosesi_upacara]); ?>

<body>
    <?php $this->load->view('layouts/navigation'); ?>
    <div class="hero" style="background-image: url(<?= $data->gambar ? base_url('uploads/' . $data->gambar) : base_url('assets/images/placeholder-wide.jpg') ?>)">
        <div class="container">
            <h1 class="mb-3"><?= $data->prosesi_upacara ?></h1>
        </div>
    </div>

    <div class="container py-5">
        <div class="row">
            <div class="col-lg-8">
                <div class="clearfix">
                    <img src="<?= $data->gambar ? base_url('uploads/' . $data->gambar) : base_url('assets/images/placeholder-landscape.jpg') ?>" width="240" class="mb-3 mr-3" style="float: left" />
                    <?= $data->deskripsi ?>
                </div>
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item mr-1">
                        <a class="nav-link active" id="tari-tab" data-toggle="tab" href="#tari" role="tab" aria-controls="tari" aria-selected="true">Tari</a>
                    </li>
                    <li class="nav-item mr-1">
                        <a class="nav-link" id="gamelan-tab" data-toggle="tab" href="#gamelan" role="tab" aria-controls="gamelan" aria-selected="false">Gamelan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="kidung-tab" data-toggle="tab" href="#kidung" role="tab" aria-controls="kidung" aria-selected="false">Kidung</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="tabuh-tab" data-toggle="tab" href="#tabuh" role="tab" aria-controls="tabuh" aria-selected="false">Tabuh</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="mantram-tab" data-toggle="tab" href="#mantram" role="tab" aria-controls="mantram" aria-selected="false">Mantram</a>
                    </li>
                </ul>
                <div class="tab-content p-3 border-bottom border-left border-right">
                    <div id="tari" class="tab-pane fade show active">
                        <?php if (count($data->tari) > 0) : ?>
                            <div class="row">
                                <?php foreach ($data->tari as $tari) : ?>
                                    <div class="col-4 mb-3">
                                        <a class="card" href="<?= base_url('tari/show/' . $tari->id_tari) ?>">
                                            <img src="<?= $tari->gambar ? base_url('/uploads/' . $tari->gambar) : base_url('/assets/images/placeholder.png') ?>" width="100%" />
                                            <div class="card-body"><?= $tari->nama_tari ?></div>
                                        </a>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php else : ?>
                            <div class="text-center text-muted"><em>Tidak ada data.</em></div>
                        <?php endif; ?>
                    </div>
                    <div id="gamelan" class="tab-pane fade">
                        <?php if (count($data->gamelan) > 0) : ?>
                            <div class="row">
                                <?php foreach ($data->gamelan as $gamelan) : ?>
                                    <div class="col-4 mb-3">
                                        <a class="card" href="<?= base_url('gamelan/show/' . $gamelan->id_gamelan) ?>">
                                            <img src="<?= $gamelan->gambar ? base_url('/uploads/' . $gamelan->gambar) : base_url('/assets/images/placeholder.png') ?>" width="100%" />
                                            <div class="card-body"><?= $gamelan->nama_gamelan ?></div>
                                        </a>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php else : ?>
                            <div class="text-center text-muted"><em>Tidak ada data.</em></div>
                        <?php endif; ?>
                    </div>
                    <div id="kidung" class="tab-pane fade">
                        <?php if (count($data->kidung) > 0) : ?>
                            <div class="row">
                                <?php foreach ($data->kidung as $kidung) : ?>
                                    <div class="col-4 mb-3">
                                        <a class="card" href="<?= base_url('kidung/show/' . $kidung->id_kidung) ?>">
                                            <img src="<?= base_url('/assets/images/placeholder.png') ?>" width="100%" />
                                            <div class="card-body"><?= $kidung->nama_kidung ?></div>
                                        </a>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php else : ?>
                            <div class="text-center text-muted"><em>Tidak ada data.</em></div>
                        <?php endif; ?>
                    </div>
                    <div id="tabuh" class="tab-pane fade">
                        <?php if (count($data->tabuh) > 0) : ?>
                            <div class="row">
                                <?php foreach ($data->tabuh as $tabuh) : ?>
                                    <div class="col-4 mb-3">
                                        <a class="card" href="<?= base_url('tabuh/show/' . $tabuh->id_tabuh) ?>">
                                            <img src="<?= base_url('/assets/images/placeholder.png') ?>" width="100%" />
                                            <div class="card-body"><?= $tabuh->nama_tabuh ?></div>
                                        </a>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php else : ?>
                            <div class="text-center text-muted"><em>Tidak ada data.</em></div>
                        <?php endif; ?>
                    </div>
                    <div id="mantram" class="tab-pane fade">
                        <?php if (count($data->mantram) > 0) : ?>
                            <div class="row">
                                <?php foreach ($data->mantram as $mantram) : ?>
                                    <div class="col-4 mb-3">
                                        <a class="card" href="<?= base_url('mantram/show/' . $mantram->id_mantram) ?>">
                                            <img src="<?= base_url('/assets/images/placeholder.png') ?>" width="100%" />
                                            <div class="card-body"><?= $mantram->nama_mantram ?></div>
                                        </a>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php else : ?>
                            <div class="text-center text-muted"><em>Tidak ada data.</em></div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <?php if (count($data->prosesi) > 0) : ?>
                    <h4 class="mb-3">Prosesi Awal</h4>
                    <ul class="timeline mb-5">
                        <?php foreach ($data->prosesi as $index => $prosesi) : ?>
                            <?php if ($prosesi->kategori == 'awal') : ?>
                                <li>
                                    <a href="<?= base_url('prosesi/show/' . $prosesi->id_prosesi_upacara) ?>"><?= $prosesi->prosesi_upacara ?></a>
                                </li>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </ul>
                    <h4 class="mb-3">Prosesi Puncak</h4>
                    <ul class="timeline mb-5">
                        <?php foreach ($data->prosesi as $index => $prosesi) : ?>
                            <?php if ($prosesi->kategori == 'puncak') : ?>
                                <li>
                                    <a href="<?= base_url('prosesi/show/' . $prosesi->id_prosesi_upacara) ?>"><?= $prosesi->prosesi_upacara ?></a>
                                </li>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </ul>
                    <h4 class="mb-3">Prosesi Akhir</h4>
                    <ul class="timeline">
                        <?php foreach ($data->prosesi as $index => $prosesi) : ?>
                            <?php if ($prosesi->kategori == 'akhir') : ?>
                                <li>
                                    <a href="<?= base_url('prosesi/show/' . $prosesi->id_prosesi_upacara) ?>"><?= $prosesi->prosesi_upacara ?></a>
                                </li>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </ul>
                <?php else : ?>
                    <div class="text-muted"><em>Tidak ada data.</em></div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <?php $this->load->view('layouts/footer'); ?>
</body>

</html>