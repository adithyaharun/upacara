<!DOCTYPE html>
<html>
<?php $this->load->view('admin/layouts/head', ['title' => 'Upacara']); ?>

<body>
    <?php $this->load->view('admin/layouts/navigation'); ?>
    <?php $this->load->view('admin/layouts/sidebar'); ?>

    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Dashboard</h1>
            </div>
        </div>
        <!--/.row-->
        <div class="row">
            <div class="col-xs-6 col-md-2 col-lg-2">
                <div class="panel">
                    <div class="panel-body">
                        <span>Dewa Yadnya</span>
                        <h1 class="text-center" style="margin: 1em 0 0.5em; font-weight: bold"><?= $data['dewa'] ?></h1>
                    </div>
                </div>
            </div>
            <div class="col-xs-6 col-md-2 col-lg-2">
                <div class="panel panel-teal">
                    <div class="panel-body">
                        <span>Pitra Yadnya</span>
                        <h1 class="text-center" style="margin: 1em 0 0.5em; color: white; font-weight: bold"><?= $data['manusa'] ?></h1>
                    </div>
                </div>
            </div>
            <div class="col-xs-6 col-md-2 col-lg-2">
                <div class="panel panel-blue">
                    <div class="panel-body">
                        <span>Manusa Yadnya</span>
                        <h1 class="text-center" style="margin: 1em 0 0.5em; color: white; font-weight: bold"><?= $data['pitra'] ?></h1>
                    </div>
                </div>
            </div>
            <div class="col-xs-6 col-md-2 col-lg-2">
                <div class="panel panel-orange">
                    <div class="panel-body">
                        <span>Rsi Yadnya</span>
                        <h1 class="text-center" style="margin: 1em 0 0.5em; color: white; font-weight: bold"><?= $data['rsi'] ?></h1>
                    </div>
                </div>
            </div>
            <div class="col-xs-6 col-md-2 col-lg-2">
                <div class="panel panel-red">
                    <div class="panel-body">
                        <span>Bhuta Yadnya</span>
                        <h1 class="text-center" style="margin: 1em 0 0.5em; color: white; font-weight: bold"><?= $data['bhuta'] ?></h1>
                    </div>
                </div>
            </div>
            <!--/.row-->
        </div>
        <!--/.row-->
    </div>
    <?php $this->load->view('admin/layouts/footer'); ?>
</body>

</html>