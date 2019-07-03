<!DOCTYPE html>
<html class="with-background">
<?php $this->load->view('layouts/head', ['title' => 'Hasil Pencarian']); ?>

<body>
    <?php $this->load->view('layouts/navigation'); ?>
    <div id="content" class="container my-5 py-5 rounded shadow-lg bg-white">
        <h1 class="text-center mb-5">Hasil Pencarian</h1>
        <form class="form mb-5" action="<?= base_url('search') ?>">
            <div class="input-group">
                <input class="form-control" placeholder="Cari disini..." name="query" value="<?= $this->input->get('query'); ?>" />
                <span class="input-group-append">
                    <button type="submit" class="btn btn-success"><i class="fa fa-search"></i> Cari</button>
                </span>
            </div>
        </form>
        <ul class="nav nav-pills" id="search-tab">
            <?php if (count($upacara) > 0) : ?>
                <li class="nav-item mr-2">
                    <a class="nav-link" data-toggle="pill" href="#upacara">Upacara <span class="badge badge-light ml-2"><?= count($upacara); ?></span></a>
                </li>
            <?php endif; ?>
            <?php if (count($tari) > 0) : ?>
                <li class="nav-item mr-2">
                    <a class="nav-link" data-toggle="pill" href="#tari">Tari <span class="badge badge-light ml-2"><?= count($tari); ?></span></a>
                </li>
            <?php endif; ?>
            <?php if (count($gamelan) > 0) : ?>
                <li class="nav-item mr-2">
                    <a class="nav-link" data-toggle="pill" href="#gamelan">Gamelan <span class="badge badge-light ml-2"><?= count($gamelan); ?></span></a>
                </li>
            <?php endif; ?>
            <?php if (count($kidung) > 0) : ?>
                <li class="nav-item mr-2">
                    <a class="nav-link" data-toggle="pill" href="#kidung">Kidung <span class="badge badge-light ml-2"><?= count($kidung); ?></span></a>
                </li>
            <?php endif; ?>
            <?php if (count($tabuh) > 0) : ?>
                <li class="nav-item mr-2">
                    <a class="nav-link" data-toggle="pill" href="#tabuh">Tabuh <span class="badge badge-light ml-2"><?= count($tabuh); ?></span></a>
                </li>
            <?php endif; ?>
        </ul>
        <div class="tab-content mt-3">
            <?php if (count($upacara) > 0) : ?>
                <div class="tab-pane fade" id="upacara" role="tabpanel">
                    <?php foreach ($upacara as $u) : ?>
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <img src="<?= base_url($u->gambar == null ? 'assets/images/placeholder-landscape.jpg' : 'uploads/' . $u->gambar) ?>" width="100%" />
                                    </div>
                                    <div class="col">
                                        <h5 class="card-title"><a href="<?= base_url('upacara/show/' . $u->id_upacara); ?>"><?= highlight_phrase($u->nama_upacara, $this->input->get('query'), '<span style="text-decoration: underline">', '</span>'); ?></a></h5>
                                        <div class="card-text"><?= word_limiter($u->deskripsi, 50); ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
            <?php if (count($tari) > 0) : ?>
                <div class="tab-pane fade" id="tari" role="tabpanel">
                    <?php foreach ($tari as $t) : ?>
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <img src="<?= base_url($t->gambar == null ? 'assets/images/placeholder-landscape.jpg' : 'uploads/' . $t->gambar) ?>" width="100%" />
                                    </div>
                                    <div class="col">
                                        <h5 class="card-title"><a href="<?= base_url('tari/show/' . $t->id_tari); ?>"><?= highlight_phrase($t->nama_tari, $this->input->get('query'), '<span style="text-decoration: underline">', '</span>'); ?></a></h5>
                                        <div class="card-text"><?= word_limiter($t->deskripsi, 50); ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
            <?php if (count($gamelan) > 0) : ?>
                <div class="tab-pane fade" id="gamelan" role="tabpanel">
                    <?php foreach ($gamelan as $g) : ?>
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <img src="<?= base_url($g->gambar == null ? 'assets/images/placeholder-landscape.jpg' : 'uploads/' . $g->gambar) ?>" width="100%" />
                                    </div>
                                    <div class="col">
                                        <h5 class="card-title"><a href="<?= base_url('gamelan/show/' . $g->id_gamelan); ?>"><?= highlight_phrase($g->nama_gamelan, $this->input->get('query'), '<span style="text-decoration: underline">', '</span>'); ?></a></h5>
                                        <div class="card-text"><?= word_limiter($g->deskripsi, 50); ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
            <?php if (count($kidung) > 0) : ?>
                <div class="tab-pane fade" id="kidung" role="tabpanel">
                    <?php foreach ($kidung as $k) : ?>
                        <div class="card mb-3">
                            <div class="card-body">
                                <h5 class="card-title"><a href="<?= base_url('kidung/show/' . $k->id_kidung); ?>"><?= highlight_phrase($k->nama_kidung, $this->input->get('query'), '<span style="text-decoration: underline">', '</span>'); ?></a></h5>
                                <div class="card-text"><?= word_limiter($k->deskripsi_kidung, 50); ?></div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
            <?php if (count($tabuh) > 0) : ?>
                <div class="tab-pane fade" id="tabuh" role="tabpanel">
                    <?php foreach ($tabuh as $tb) : ?>
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <img src="<?= base_url($tb->gambar == null ? 'assets/images/placeholder-landscape.jpg' : 'uploads/' . $tb->gambar) ?>" width="100%" />
                                    </div>
                                    <div class="col">
                                        <h5 class="card-title"><a href="<?= base_url('tabuh/show/' . $tb->id_tabuh); ?>"><?= highlight_phrase($tb->nama_tabuh, $this->input->get('query'), '<span style="text-decoration: underline">', '</span>'); ?></a></h5>
                                        <div class="card-text"><?= word_limiter($tb->deskripsi, 50); ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>

        <?php if (
            count($upacara) == 0 &&
            count($tari) == 0 &&
            count($gamelan) == 0 &&
            count($kidung) == 0 &&
            count($tabuh) == 0
        ) : ?>
            <div class="jumbotron text-center" style="border-radius: 16px">
                <div class="container">
                    <h1 class="display-4">Tidak ditemukan.</h1>
                    <p class="lead">Kami tidak menemukan apapun, maaf :(</p>
                </div>
            </div>
        <?php endif; ?>
    </div>
    <?php $this->load->view('layouts/footer'); ?>
    <script>
        $(document).ready(function() {
            $('#search-tab a:first').tab('show');
        });
    </script>
</body>

</html>