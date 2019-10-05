<?php
class Tabuh extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('tabuh_model', 'tabuh');
    }

    public function index()
    {
        $values = [];
        $values['data'] = $this->tabuh->get();

        $this->load->view('tabuh/index', $values);
    }

    public function show($id)
    {
        $data = $this->tabuh->find($id, 'id_tabuh');

        $this->load->view('tabuh/detail', [
            'data' => $data
        ]);
    }
}
