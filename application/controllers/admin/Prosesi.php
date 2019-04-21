<?php
class Prosesi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->auth->check();
        $this->load->model('prosesi_model', 'prosesi');
        $this->load->model('yadnya_model', 'yadnya');
        $this->load->model('tari_model', 'tari');
        $this->load->model('gamelan_model', 'gamelan');
        $this->load->model('kidung_model', 'kidung');
        $this->load->model('mantram_model', 'mantram');
    }

    public function index()
    {
        $this->load->view('admin/prosesi/index', [
            'data' => $this->prosesi->join('tb_yadnya', 'tb_yadnya.id_yadnya', '=', 'tb_prosesi_upacara.id_yadnya')->get()
        ]);
    }

    public function show($id)
    {
        $this->load->view('admin/prosesi/detail', [
            'data' => $this->prosesi
                ->select('tb_prosesi_upacara.*, nama_yadnya, nama_tari, nama_gamelan, nama_kidung, nama_mantram, bait_mantram')
                ->where('id_prosesi_upacara', $id)
                ->join('tb_yadnya', 'tb_yadnya.id_yadnya', '=', 'tb_prosesi_upacara.id_yadnya', 'left')
                ->join('tb_tari', 'tb_tari.id_tari', '=', 'tb_prosesi_upacara.id_tari', 'left')
                ->join('tb_gamelan', 'tb_gamelan.id_gamelan', '=', 'tb_prosesi_upacara.id_gamelan', 'left')
                ->join('tb_kidung', 'tb_kidung.id_kidung', '=', 'tb_prosesi_upacara.id_kidung', 'left')
                ->join('tb_mantram', 'tb_mantram.id_mantram', '=', 'tb_prosesi_upacara.id_mantram', 'left')
                ->first()
        ]);
    }

    public function create()
    {
        $this->load->view('admin/prosesi/form', [
            'yadnya' => $this->yadnya->get(),
            'tari' => $this->tari->get(),
            'gamelan' => $this->gamelan->get(),
            'kidung' => $this->kidung->get(),
            'mantram' => $this->mantram->get(),
        ]);
    }

    public function store()
    {
        $image = null;
        $config['encrypt_name']         = true;
        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'gif|jpg|png';

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('photo')) {
            $image = $this->upload->data()['file_name'];
        }

        $this->prosesi->create([
            'prosesi_upacara' => $this->input->post('prosesi_upacara'),
            'id_yadnya' => $this->input->post('id_yadnya'),
            'id_tari' => $this->input->post('id_tari'),
            'id_gamelan' => $this->input->post('id_gamelan'),
            'id_kidung' => $this->input->post('id_kidung'),
            'id_mantram' => $this->input->post('id_mantram'),
            'gambar' => $image,
        ]);

        redirect(base_url('admin/prosesi'));
    }

    public function update($id)
    {
        $data = $this->prosesi->find($id, 'id_prosesi');
        $image = $data->gambar;

        $this->load->library('upload', [
            'encrypt_name' => true,
            'upload_path' => './uploads/',
            'allowed_types' => 'gif|jpg|png|jpeg'
        ]);

        if ($this->upload->do_upload('photo')) {
            $image = $this->upload->data()['file_name'];
        }

        $this->prosesi->update($id, [
            'prosesi_upacara' => $this->input->post('prosesi_upacara'),
            'id_yadnya' => $this->input->post('id_yadnya'),
            'id_tari' => $this->input->post('id_tari'),
            'id_gamelan' => $this->input->post('id_gamelan'),
            'id_kidung' => $this->input->post('id_kidung'),
            'id_mantram' => $this->input->post('id_mantram'),
            'gambar' => $image,
        ], 'id_prosesi');

        redirect(base_url('admin/prosesi'));
    }

    public function edit($id)
    {
        $this->load->view('admin/prosesi/form', [
            'data' => $this->prosesi->find($id, 'id_prosesi'),
            'yadnya' => $this->yadnya->get(),
            'tari' => $this->tari->get(),
            'gamelan' => $this->gamelan->get(),
            'kidung' => $this->kidung->get(),
            'mantram' => $this->mantram->get()
        ]);
    }

    public function delete($id)
    {
        $this->prosesi->where(['id_prosesi' => $id])->delete();
        redirect(base_url('admin/prosesi'));
    }

    public function json()
    {
        $data = $this->prosesi->get();

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($data));
    }
}
