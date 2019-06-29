<?php
class Search extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->helper('text');
        $this->load->model('upacara_model', 'upacara');
        $this->load->model('yadnya_model', 'yadnya');
        $this->load->model('prosesi_model', 'prosesi');
        $this->load->model('tari_model', 'tari');
        $this->load->model('gamelan_model', 'gamelan');
        $this->load->model('kidung_model', 'kidung');
        $this->load->model('tabuh_model', 'tabuh');
    }

    public function index()
    {
        $values = [
            'upacara' => $this->upacara->where('nama_upacara LIKE', "%{$this->input->get('query')}%")->get(),
            'tari' => $this->tari->where('nama_tari LIKE', "%{$this->input->get('query')}%")->get(),
            'gamelan' => $this->gamelan->where('nama_gamelan LIKE', "%{$this->input->get('query')}%")->get(),
            'kidung' => $this->kidung->where('nama_kidung LIKE', "%{$this->input->get('query')}%")->get(),
            'tabuh' => $this->tabuh->where('nama_tabuh LIKE', "%{$this->input->get('query')}%")->get(),
        ];

        $this->load->view('search/index', $values);
    }
}
