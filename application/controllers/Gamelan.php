<?php
class Gamelan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('gamelan_model', 'gamelan');
    }

    public function index()
    {
        $values = [];
        $values['data'] = $this->gamelan->get();

        $this->load->view('gamelan/index', $values);
    }

    public function show($id)
    {
        $data = $this->gamelan->find($id, 'id_gamelan');

        $this->load->view('gamelan/detail', [
            'data' => $data
        ]);
    }
}
