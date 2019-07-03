<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="<?= config_item('base_url') ?>"><strong><span class="text-primary">E-</span>UPACARA</strong></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('upacara/dewa_yadnya') ?>">Dewa Yadnya</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('upacara/pitra_yadnya') ?>">Pitra Yadnya</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('upacara/rsi_yadnya') ?>">Rsi Yadnya</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('upacara/manusa_yadnya') ?>">Manusa Yadnya</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('upacara/bhuta_yadnya') ?>">Bhuta Yadnya</a>
                </li>
            </ul>
        </div>
    </div>
</nav>