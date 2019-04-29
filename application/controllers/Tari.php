<?php
class Tari extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('tari_model', 'tari');
    }

    public function show($id)
    {
        $data = $this->tari->find($id, 'id_tari');

        $this->load->view('tari/detail', [
            'data' => $data
        ]);
    }
}
