<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="<?= config_item('base_url') ?>"><strong><span class="text-primary">E-</span>UPACARA</strong></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Yadnya
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="<?= base_url('upacara/dewa_yadnya') ?>">Dewa Yadnya</a>
                        <a class="dropdown-item" href="<?= base_url('upacara/pitra_yadnya') ?>">Pitra Yadnya</a>
                        <a class="dropdown-item" href="<?= base_url('upacara/rsi_yadnya') ?>">Rsi Yadnya</a>
                        <a class="dropdown-item" href="<?= base_url('upacara/manusa_yadnya') ?>">Manusa Yadnya</a>
                        <a class="dropdown-item" href="<?= base_url('upacara/bhuta_yadnya') ?>">Bhuta Yadnya</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('tari'); ?>" class="nav-link">Tari</a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('gamelan'); ?>" class="nav-link">Gamelan</a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('tabuh'); ?>" class="nav-link">Tabuh</a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('kidung'); ?>" class="nav-link">Kidung</a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('mantram'); ?>" class="nav-link">Mantram</a>
                </li>
            </ul>
            <form class="form-inline ml-auto" action="<?= base_url('search') ?>">
                <input class="form-control form-control-sm" type="search" name="query" value="<?= $this->input->get('query') ?>" placeholder="Cari sesuatu..." aria-label="Search">
            </form>
        </div>
    </div>
</nav>