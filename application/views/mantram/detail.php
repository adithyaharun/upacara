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
            </div>
        </div>
        <hr />
        <?= $data->konten; ?>
        <hr />
        <h4>Bait Mantram</h4>
        <blockquote class="custom-blockquote">
            <?= str_replace(array('\r\n', '\r', '\n'), '<br />', $data->bait_mantram); ?>
        </blockquote>
    </div>
    <?php $this->load->view('layouts/footer'); ?>
</body>

</html>