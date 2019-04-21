<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        Login &mdash; E-Upacara
    </title>
    <link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/font-awesome.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/styles.css') ?>" rel="stylesheet">

    <style>
        .sidebar ul.nav li.parent ul li a {
            padding-left: 43px;
        }
    </style>

    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <div style="padding-top: 5rem; margin: auto; width: 480px;">
        <div class="panel">
            <div class="panel-body">
                <h2 class="text-center" style="margin-bottom: 1em">E-Upacara</h2>
                <?php if ($this->input->get('error')) : ?>
                    <div class="alert alert-danger">
                        <?php if ($this->input->get('error') == 'invalidate') : ?>
                            <span>Username atau Password tidak boleh kosong!</span>
                        <?php else : ?>
                            <span>Username atau Password salah!</span>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
                <form class="form" action="<?= base_url('admin/auth/submit') ?>" method="POST">
                    <input type="text" name="usname" placeholder="Username" class="form-control" style="margin-bottom: 16px" required />
                    <input type="password" name="pwd" placeholder="Password" class="form-control" style="margin-bottom: 16px" required />
                    <button type="submit" class="btn btn-primary btn-block">Login</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>