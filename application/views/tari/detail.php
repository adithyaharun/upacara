<!DOCTYPE html>
<html>
<?php $this->load->view('layouts/head', ['title' => $data->nama_tari]); ?>

<body>
    <?php $this->load->view('layouts/navigation'); ?>

    <div class="container py-5">
        <div class="row">
            <div class="col-3">
                <img src="<?= $data->gambar ? base_url('uploads/' . $data->gambar) : base_url('assets/images/placeholder.png') ?>" class="card-img-top" alt="...">
            </div>
            <div class="col-9">
                <h1 class="mb-3"><?= $data->nama_tari ?></h1>
                <table width="100%" class="mb-3">
                    <tr>
                        <td width="150"><strong>Jumlah Penari</strong></td>
                        <td><?= $data->jml_penari; ?> orang</td>
                    </tr>
                    <tr>
                        <td width="150"><strong>Fungsi Tari</strong></td>
                        <td><?= $data->fungsi_tari; ?></td>
                    </tr>
                </table>
                <p><?= $data->deskripsi ?></p>
            </div>
        </div>
        <hr />
        <?= $data->konten; ?>
        <?php if (count($upacara) > 0 || count($prosesi) > 0) : ?>
            <?php if (count($upacara) > 0) : ?>
                <h3 class="mb-0 mt-5">Upacara Terkait</h3>
                <hr class="mb-4" />
                <!-- Slider main container -->
                <div class="swiper-container">
                    <!-- Additional required wrapper -->
                    <div class="swiper-wrapper">
                        <!-- Slides -->
                        <?php foreach ($upacara as $s) : ?>
                            <div class="swiper-slide">
                                <div class="card text-center">
                                    <div class="card-body">
                                        <h5 class="card-title"><a href="<?= base_url('upacara/show/' . $s->id_upacara) ?>" class="stretched-link"><?= $s->nama_upacara ?></a></h5>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <!-- If we need navigation buttons -->
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>
            <?php endif; ?>
            <?php if (count($prosesi) > 0) : ?>
                <h3 class="mb-0 mt-5">Prosesi Terkait</h3>
                <hr class="mb-4" />
                <!-- Slider main container -->
                <div class="swiper-container">
                    <!-- Additional required wrapper -->
                    <div class="swiper-wrapper">
                        <!-- Slides -->
                        <?php foreach ($prosesi as $p) : ?>
                            <div class="swiper-slide">
                                <div class="card text-center">
                                    <div class="card-body">
                                        <h5 class="card-title"><a href="<?= base_url('prosesi/show/' . $p->id_prosesi_upacara) ?>" class="stretched-link"><?= $p->prosesi_upacara ?></a></h5>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <!-- If we need navigation buttons -->
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>
            <?php endif; ?>
        <?php endif; ?>
    </div>
    <?php $this->load->view('layouts/footer'); ?>
    <script>
        var mySwiper = new Swiper('.swiper-container', {
            slidesPerView: 4,
            spaceBetween: 15,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            grabCursor: true
        });
    </script>
</body>

</html>