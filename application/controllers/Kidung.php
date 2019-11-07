<?php
class Kidung extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('kidung_model', 'kidung');
        $this->load->model('upacara_detail_model', 'upacara_detail');
        $this->load->model('prosesi_detail_model', 'prosesi_detail');
    }

    public function index()
    {
        $query = $this->kidung;
        $total = $query->count();

        $query->limit(2)
            ->offset((($this->input->get('page') ?: 1) - 1) * 2);

        $data = $query->get();

        $this->pagination->initialize([
            'total_rows' => $total,
            'per_page' => 2,
        ]);

        $this->load->view('kidung/index', [
            'data' => $data,
            'pagination' => $this->pagination->create_links()
        ]);
    }

    public function show($id)
    {
        $data = $this->kidung->find($id, 'id_kidung');

        $upacara = $this->upacara_detail->select('tb_upacara.*')
            ->join('tb_upacara', 'tb_upacara_detail.id_upacara', '=', 'tb_upacara.id_upacara', 'left')
            ->where('tb_upacara_detail.id_item', $id)
            ->where('tb_upacara_detail.type', 'kidung')
            ->get();

        $prosesi = $this->prosesi_detail->select('tb_prosesi_upacara.*')
            ->join('tb_prosesi_upacara', 'tb_prosesi_detail.id_prosesi', '=', 'tb_prosesi_upacara.id_prosesi_upacara', 'left')
            ->where('tb_prosesi_detail.id_item', $id)
            ->where('tb_prosesi_detail.type', 'kidung')
            ->get();

        $this->load->view('kidung/detail', [
            'data' => $data,
            'upacara' => $upacara,
            'prosesi' => $prosesi
        ]);
    }
}
