<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
    <div class="profile-sidebar">
        <div class="profile-userpic">
            <img src="http://placehold.it/50/30a5ff/fff" class="img-responsive" alt="">
        </div>
        <div class="profile-usertitle">
            <div class="profile-usertitle-name"><?= $_SESSION['name']; ?></div>
            <div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
        </div>
        <div class="clear"></div>
    </div>
    <div class="divider"></div>
    <ul class="nav menu">
        <li>
            <a href="<?= base_url('/admin'); ?>">
                <i style="width: 24px" class="fa fa-home">&nbsp;</i>
                <span>Beranda</span>
            </a>
        </li>
        <li>
            <hr />
        </li>
        <li class="parent">
            <a data-toggle="collapse" href="#sub-item-1">
                <i style="width: 24px" class="fa fa-star">&nbsp;</i> Yadnya
                <span data-toggle="collapse" href="#" class="icon pull-right"><i class="fa fa-plus"></i></span>
            </a>
            <ul class="children collapse" id="sub-item-1">
                <li>
                    <a href="<?= base_url('admin/upacara?yadnya=1') ?>">Dewa Yadnya</a>
                </li>
                <li>
                    <a href="<?= base_url('admin/upacara?yadnya=2') ?>">Manusa Yadnya</a>
                </li>
                <li>
                    <a href="<?= base_url('admin/upacara?yadnya=3') ?>">Pitra Yadnya</a>
                </li>
                <li>
                    <a href="<?= base_url('admin/upacara?yadnya=4') ?>">Rsi Yadnya</a>
                </li>
                <li>
                    <a href="<?= base_url('admin/upacara?yadnya=5') ?>">Bhuta Yadnya</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="<?= base_url('admin/tari') ?>">
                <i style="width: 24px" class="fa fa-cubes"></i>
                <span>Tari</span>
            </a>
        </li>
        <li>
            <a href="<?= base_url('admin/gamelan') ?>">
                <i style="width: 24px" class="fa fa-database"></i>
                <span>Gamelan</span>
            </a>
        </li>
        <li>
            <a href="<?= base_url('admin/mantram') ?>">
                <i style="width: 24px" class="fa fa-archive"></i>
                <span>Mantram </span>
            </a>
        </li>
        <li>
            <a href="<?= base_url('admin/kidung') ?>">
                <i style="width: 24px" class="fa fa-music"></i>
                <span>Kidung</span>
            </a>
        </li>
        <li>
            <a href="<?= base_url('admin/prosesi') ?>">
                <i style="width: 24px" class="fa fa-refresh"></i>
                <span>Prosesi</span>
            </a>
        </li>
        <li>
            <hr />
        </li>
        <li>
            <a href="<?= base_url('admin/user') ?>">
                <i style="width: 24px" class="fa fa-users"></i>
                <span>Operator</span>
            </a>
        </li>
        <li>
            <a href="<?= base_url('admin/auth/logout') ?>">
                <i style="width: 24px" class="fa fa-power-off"></i>
                <span>Keluar</span>
            </a>
        </li>
    </ul>
</div>