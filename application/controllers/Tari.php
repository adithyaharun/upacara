<?php
class Tari extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('tari_model', 'tari');
        $this->load->model('upacara_detail_model', 'upacara_detail');
        $this->load->model('prosesi_detail_model', 'prosesi_detail');
    }

    public function index()
    {
        $values = [];
        $values['data'] = $this->tari->get();

        $this->load->view('tari/index', $values);
    }

    public function show($id)
    {
        $data = $this->tari->find($id, 'id_tari');

        $upacara = $this->upacara_detail->select('tb_upacara.*')
            ->join('tb_upacara', 'tb_upacara_detail.id_upacara', '=', 'tb_upacara.id_upacara', 'left')
            ->where('tb_upacara_detail.id_item', $id)
            ->where('tb_upacara_detail.type', 'tari')
            ->get();

        $prosesi = $this->prosesi_detail->select('tb_prosesi_upacara.*')
            ->join('tb_prosesi_upacara', 'tb_prosesi_detail.id_prosesi', '=', 'tb_prosesi_upacara.id_prosesi_upacara', 'left')
            ->where('tb_prosesi_detail.id_item', $id)
            ->where('tb_prosesi_detail.type', 'tari')
            ->get();

        $this->load->view('tari/detail', [
            'data' => $data,
            'upacara' => $upacara,
            'prosesi' => $prosesi
        ]);
    }
}
