<?php
class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->auth->check();
        $this->load->model('upacara_model', 'upacara');
    }

    public function index()
    {
        $values = [];

        $values['dewa'] = $this->upacara
            ->select('COUNT(*) AS count')
            ->where('id_yadnya', 1)
            ->first()
            ->count;

        $values['manusa'] = $this->upacara
            ->select('COUNT(*) AS count')
            ->where('id_yadnya', 2)
            ->first()
            ->count;

        $values['pitra'] = $this->upacara
            ->select('COUNT(*) AS count')
            ->where('id_yadnya', 3)
            ->first()
            ->count;

        $values['rsi'] = $this->upacara
            ->select('COUNT(*) AS count')
            ->where('id_yadnya', 4)
            ->first()
            ->count;

        $values['bhuta'] = $this->upacara
            ->select('COUNT(*) AS count')
            ->where('id_yadnya', 5)
            ->first()
            ->count;

        $this->load->view('admin/dashboard', ['data' => $values]);
    }
}
