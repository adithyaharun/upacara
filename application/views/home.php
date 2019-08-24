<!DOCTYPE html>
<html class="with-background">
<?php $this->load->view('layouts/head', ['title' => 'Upacara']); ?>

<body>
    <?php $this->load->view('layouts/navigation'); ?>

    <div class="container py-5">
        <h1 class="text-center mb-5 text-white">E-UPACARA</h1>
        <form class="form mb-5" action="<?= base_url('search') ?>">
            <div class="input-group">
                <input class="form-control" placeholder="Cari disini..." name="query" />
                <span class="input-group-append">
                    <button type="submit" class="btn btn-success"><i class="fa fa-search"></i> Cari</button>
                </span>
            </div>
        </form>
        <!-- Slider main container -->
        <div class="swiper-container">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
                <!-- Slides -->
                <div class="swiper-slide">
                    <div class="card card-upacara gradient-1 text-center">
                        <div class="card-body">
                            <h1 class="card-title my-5"><a href="<?= base_url('upacara/dewa_yadnya') ?>" class="stretched-link">Dewa Yadnya</a></h1>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="card card-upacara gradient-2 text-center">
                        <div class="card-body">
                            <h1 class="card-title my-5"><a href="<?= base_url('upacara/pitra_yadnya') ?>" class="stretched-link">Pitra Yadnya</a></h1>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="card card-upacara gradient-3 text-center">
                        <div class="card-body">
                            <h1 class="card-title my-5"><a href="<?= base_url('upacara/rsi_yadnya') ?>" class="stretched-link">Rsi Yadnya</a></h1>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="card card-upacara gradient-4 text-center">
                        <div class="card-body">
                            <h1 class="card-title my-5"><a href="<?= base_url('upacara/manusa_yadnya') ?>" class="stretched-link">Manusa Yadnya</a></h1>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="card card-upacara gradient-5 text-center">
                        <div class="card-body">
                            <h1 class="card-title my-5"><a href="<?= base_url('upacara/bhuta_yadnya') ?>" class="stretched-link">Bhuta Yadnya</a></h1>
                        </div>
                    </div>
                </div>
            </div>
            <!-- If we need navigation buttons -->
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>
    </div>
    <?php $this->load->view('layouts/footer'); ?>
</body>

</html>