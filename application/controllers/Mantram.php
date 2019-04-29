<?php
class Mantram extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('mantram_model', 'mantram');
    }

    public function show($id)
    {
        $data = $this->mantram->find($id, 'id_mantram');

        $this->load->view('mantram/detail', [
            'data' => $data
        ]);
    }
}
