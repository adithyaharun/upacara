<!DOCTYPE html>
<html>
<?php $this->load->view('layouts/head', ['title' => $data->nama_mantram]); ?>

<body>
    <?php $this->load->view('layouts/navigation'); ?>
    <style>
        .custom-blockquote {
            font-family: "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;
            text-rendering: optimizeLegibility;
            border-radius: 3px;
            position: relative;
            /*  <--- */
            font-style: italic;
            text-align: center;
            padding: 1rem 1.2rem;
            width: 80%;
            /* create space for the quotes */
            color: #4a4a4a;
            margin: 1rem auto 2rem;
            color: #4a4a4a;
            background: #E8E8E8;
        }

        /* -- create the quotation marks -- */
        .custom-blockquote:before,
        .custom-blockquote:after {
            font-family: FontAwesome;
            position: absolute;
            /* -- inside the relative position of blockquote -- */
            top: 13px;
            color: #E8E8E8;
            font-size: 34px;
        }

        .custom-blockquote:before {
            content: '“';
            margin-right: 13px;
            right: 100%;
            font-weight: bold;
            font-size: 96px;
        }

        .custom-blockquote:after {
            content: '”';
            margin-left: 13px;
            left: 100%;
            font-weight: bold;
            font-size: 96px;
        }
    </style>
    <div class="container py-5">
        <div class="row">
            <div class="col-12">
                <h1 class="mb-3"><?= $data->nama_mantram ?></h1>
                <table width="100%" class="mb-3">
                    <tr>
                        <td width="150"><strong>Kategori</strong></td>
                        <td><?= $data->kategori; ?></td>
                    </tr>
                </table>
                <p><?= $data->makna ?></p>
            </div>
        </div>
        <hr />
        <?= $data->konten; ?>
        <hr />
        <h4>Bait Mantram</h4>
        <blockquote class="custom-blockquote">
            <?= str_replace(array('\r\n', '\r', '\n'), '<br />', $data->bait_mantram); ?>
        </blockquote>
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
</body>

</html>