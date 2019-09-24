<!DOCTYPE html>
<html>
<?php $this->load->view('layouts/head', ['title' => $data->nama_upacara]); ?>

<body>
    <?php $this->load->view('layouts/navigation'); ?>
    <div class="hero" style="background-image: url(<?= $data->gambar ? base_url('uploads/' . $data->gambar) : base_url('assets/images/placeholder-wide.jpg') ?>)">
        <div class="container">
            <h1 class="mb-3"><?= $data->nama_upacara ?></h1>
        </div>
    </div>

    <div class="container py-5">
        <div class="row">
            <div class="col-lg-8">
                <div class="clearfix">
                    <img src="<?= $data->gambar ? base_url('uploads/' . $data->gambar) : base_url('assets/images/placeholder-landscape.jpg') ?>" width="240" class="mb-3 mr-3" style="float: left" />
                    <?= $data->deskripsi ?>
                </div>
                <div class="mb-3"><?= $data->konten ?></div>
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <?php if (count($data->tari) > 0) : ?>
                        <li class="nav-item mr-1">
                            <a class="nav-link active" id="tari-tab" data-toggle="tab" href="#tari" role="tab" aria-controls="tari" aria-selected="true">Tari</a>
                        </li>
                    <?php endif; ?>
                    <?php if (count($data->gamelan) > 0) : ?>
                        <li class="nav-item mr-1">
                            <a class="nav-link" id="gamelan-tab" data-toggle="tab" href="#gamelan" role="tab" aria-controls="gamelan" aria-selected="false">Gamelan</a>
                        </li>
                    <?php endif; ?>
                    <?php if (count($data->kidung) > 0) : ?>
                        <li class="nav-item">
                            <a class="nav-link" id="kidung-tab" data-toggle="tab" href="#kidung" role="tab" aria-controls="kidung" aria-selected="false">Kidung</a>
                        </li>
                    <?php endif; ?>
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
                            <div class="text-center"><em>Tidak ada data.</em></div>
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
                            <div class="text-center"><em>Tidak ada data.</em></div>
                        <?php endif; ?>
                    </div>
                    <div id="kidung" class="tab-pane fade">
                        <?php if (count($data->kidung) > 0) : ?>
                            <div class="row">
                                <?php foreach ($data->kidung as $kidung) : ?>
                                    <div class="col-4 mb-3">
                                        <a class="card" href="<?= base_url('kidung/show/' . $kidung->id_kidung) ?>">
                                            <img src="<?= base_url('/assets/images/note.png') ?>" width="100%" />
                                            <div class="card-body"><?= $kidung->nama_kidung ?></div>
                                        </a>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php else : ?>
                            <div class="text-center"><em>Tidak ada data.</em></div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <h4 class="mb-3">Prosesi Upacara</h4>
                <ul class="timeline">
                    <?php foreach ($data->prosesi as $index => $prosesi) : ?>
                        <li>
                            <a href="<?= base_url('prosesi/show/' . $prosesi->id_prosesi_upacara) ?>"><?= $prosesi->prosesi_upacara ?></a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
    <?php $this->load->view('layouts/footer'); ?>
</body>

</html>