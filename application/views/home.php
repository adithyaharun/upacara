<!DOCTYPE html>
<html>
<?php $this->load->view('layouts/head', ['title' => 'Upacara']); ?>

<body>
    <?php $this->load->view('layouts/navigation'); ?>

    <div class="container pt-5">
        <h1 class="text-center mb-5">E-UPACARA</h1>
        <form class="form mb-5" action="<?= base_url('search') ?>">
            <input class="form-control" placeholder="Cari disini..." name="query" />
        </form>
        <div class="row text-center">
            <div class="col">
                <div class="card bg-danger">
                    <div class="card-body">
                        <a href="<?= base_url('upacara/dewa_yadnya') ?>" class="stretched-link text-white">
                            <h5 class="m-0 py-5">Dewa Yadnya</h5>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card bg-info">
                    <div class="card-body">
                        <a href="<?= base_url('upacara/pitra_yadnya') ?>" class="stretched-link text-white">
                            <h5 class="m-0 py-5">Pitra Yadnya</h5>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card bg-warning">
                    <div class="card-body">
                        <a href="<?= base_url('upacara/rsi_yadnya') ?>" class="stretched-link text-white">
                            <h5 class="m-0 py-5">Rsi Yadnya</h5>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card bg-success">
                    <div class="card-body">
                        <a href="<?= base_url('upacara/manusa_yadnya') ?>" class="stretched-link text-white">
                            <h5 class="m-0 py-5">Manusa Yadnya</h5>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card bg-primary">
                    <div class="card-body">
                        <a href="<?= base_url('upacara/bhuta_yadnya') ?>" class="stretched-link text-white">
                            <h5 class="m-0 py-5">Bhuta Yadnya</h5>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php $this->load->view('layouts/footer'); ?>
</body>

</html>