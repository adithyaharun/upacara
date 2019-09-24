<?php
class Kidung extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('kidung_model', 'kidung');
    }

    public function index()
    {
        $values = [];
        $values['data'] = $this->kidung->get();

        $this->load->view('kidung/index', $values);
    }

    public function show($id)
    {
        $data = $this->kidung->find($id, 'id_kidung');

        $this->load->view('kidung/detail', [
            'data' => $data
        ]);
    }
}
