<?php
class Tabuh extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('tabuh_model', 'tabuh');
        $this->load->model('upacara_detail_model', 'upacara_detail');
        $this->load->model('prosesi_detail_model', 'prosesi_detail');
    }

    public function index()
    {
        $query = $this->tabuh;
        $total = $query->count();

        $query->limit(2)
            ->offset((($this->input->get('page') ?: 1) - 1) * 2);

        $data = $query->get();

        $this->pagination->initialize([
            'total_rows' => $total,
            'per_page' => 2,
        ]);

        $this->load->view('tabuh/index', [
            'data' => $data,
            'pagination' => $this->pagination->create_links()
        ]);
    }

    public function show($id)
    {
        $data = $this->tabuh->find($id, 'id_tabuh');

        $upacara = $this->upacara_detail->select('tb_upacara.*')
            ->join('tb_upacara', 'tb_upacara_detail.id_upacara', '=', 'tb_upacara.id_upacara', 'left')
            ->where('tb_upacara_detail.id_item', $id)
            ->where('tb_upacara_detail.type', 'tabuh')
            ->get();

        $prosesi = $this->prosesi_detail->select('tb_prosesi_upacara.*')
            ->join('tb_prosesi_upacara', 'tb_prosesi_detail.id_prosesi', '=', 'tb_prosesi_upacara.id_prosesi_upacara', 'left')
            ->where('tb_prosesi_detail.id_item', $id)
            ->where('tb_prosesi_detail.type', 'tabuh')
            ->get();

        $this->load->view('tabuh/detail', [
            'data' => $data,
            'upacara' => $upacara,
            'prosesi' => $prosesi
        ]);
    }
}
