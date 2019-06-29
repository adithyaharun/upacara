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
                <img src="<?= $data->gambar ? base_url('uploads/' . $data->gambar) : base_url('assets/images/placeholder-landscape.jpg') ?>" width="100%" class="mb-3" /><br>
                <div><?= $data->deskripsi ?></div>
                <div class="mb-3"><?= $data->konten ?></div>
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
                </ul>
                <div class="tab-content p-3 border-bottom border-left border-right">
                    <div id="tari" class="tab-pane fade show active">
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
                    </div>
                    <div id="gamelan" class="tab-pane fade">
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
                    </div>
                    <div id="kidung" class="tab-pane fade">
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
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="accordion" id="accordionExampl6 mb-3">
                    <?php foreach ($data->prosesi as $index => $prosesi) : ?>
                        <div class="card">
                            <div class="card-header" id="heading-<?= $index + 1 ?>">
                                <h2 class="mb-0">
                                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse-<?= $index + 1 ?>" aria-expanded="true" aria-controls="collapse-<?= $index + 1 ?>">
                                        Prosesi #<?= $index + 1 ?>
                                    </button>
                                </h2>
                            </div>

                            <div id="collapse-<?= $index + 1 ?>" class="collapse show" aria-labelledby="heading-<?= $index + 1 ?>" data-parent="#accordionExample">
                                <div class="card-body">
                                    <?= $prosesi->prosesi_upacara ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
    <?php $this->load->view('layouts/footer'); ?>
</body>

</html>