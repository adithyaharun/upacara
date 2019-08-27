<?php
class Upacara extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->auth->check();
        $this->load->model('upacara_model', 'upacara');
        $this->load->model('upacara_detail_model', 'upacara_detail');
        $this->load->model('yadnya_model', 'yadnya');
        $this->load->model('prosesi_model', 'prosesi');
        $this->load->model('tari_model', 'tari');
        $this->load->model('gamelan_model', 'gamelan');
        $this->load->model('kidung_model', 'kidung');
    }

    public function index()
    {
        $values = [];

        if ($this->input->get('yadnya') !== null) {
            $values['yadnya'] = $this->yadnya->find($this->input->get('yadnya'), 'id_yadnya');
            $values['data'] = $this->upacara
                ->where('id_yadnya', $this->input->get('yadnya'))
                ->get();
        }

        $this->load->view('admin/upacara/index', $values);
    }

    public function create()
    {
        $this->load->view('admin/upacara/form');
    }

    public function show($id)
    {
        $data = $this->upacara->select('tb_upacara.*, tb_yadnya.nama_yadnya')
            ->join('tb_yadnya', 'tb_upacara.id_yadnya', '=', 'tb_yadnya.id_yadnya')
            ->where('tb_upacara.id_upacara', $id)
            ->first();
        $data->prosesi = $this->upacara_detail->select('tb_upacara_detail.id_detail, tb_prosesi_upacara.*, tb_upacara_detail.kategori')
            ->join('tb_prosesi_upacara', 'tb_upacara_detail.id_item', '=', 'tb_prosesi_upacara.id_prosesi_upacara')
            ->where([
                'tb_upacara_detail.id_upacara' => $id,
                'type' => 'prosesi'
            ])
            ->get();
        $data->tari = $this->upacara_detail->select('tb_upacara_detail.id_detail, tb_tari.*')
            ->join('tb_tari', 'tb_upacara_detail.id_item', '=', 'tb_tari.id_tari')
            ->where([
                'tb_upacara_detail.id_upacara' => $id,
                'type' => 'tari'
            ])
            ->get();
        $data->gamelan = $this->upacara_detail->select('tb_upacara_detail.id_detail, tb_gamelan.*')
            ->join('tb_gamelan', 'tb_upacara_detail.id_item', '=', 'tb_gamelan.id_gamelan')
            ->where([
                'tb_upacara_detail.id_upacara' => $id,
                'type' => 'gamelan'
            ])
            ->get();
        $data->kidung = $this->upacara_detail->select('tb_upacara_detail.id_detail, tb_kidung.*')
            ->join('tb_kidung', 'tb_upacara_detail.id_item', '=', 'tb_kidung.id_kidung')
            ->where([
                'tb_upacara_detail.id_upacara' => $id,
                'type' => 'kidung'
            ])
            ->get();


        // return $this->output
        //     ->set_content_type('application/json')
        //     ->set_output(json_encode($data));

        $this->load->view('admin/upacara/detail', [
            'data' => $data
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

        $this->upacara->create([
            'nama_upacara' => $this->input->post('nama_upacara'),
            'deskripsi' => $this->input->post('deskripsi'),
            'id_yadnya' => $this->input->post('id_yadnya'),
            'gambar' => $image,
        ]);

        redirect(base_url('admin/upacara?yadnya=' . $this->input->post('id_yadnya')));
    }

    public function update($id)
    {
        $data = $this->upacara->find($id, 'id_upacara');
        $image = $data->gambar;

        $this->load->library('upload', [
            'encrypt_name' => true,
            'upload_path' => './uploads/',
            'allowed_types' => 'gif|jpg|png|jpeg'
        ]);

        if ($this->upload->do_upload('photo')) {
            $image = $this->upload->data()['file_name'];
        }

        $this->upacara->update($id, [
            'nama_upacara' => $this->input->post('nama_upacara'),
            'deskripsi' => $this->input->post('deskripsi'),
            'id_yadnya' => $this->input->post('id_yadnya'),
            'gambar' => $image,
        ], 'id_upacara');

        redirect(base_url('admin/upacara?yadnya=' . $data->id_yadnya));
    }

    public function edit($id)
    {
        $this->load->view('admin/upacara/form', [
            'data' => $this->upacara->find($id, 'id_upacara')
        ]);
    }

    public function delete($id)
    {
        $data = $this->upacara->find($id, 'id_upacara');
        $this->upacara->where(['id_upacara' => $id])->delete();

        redirect($_SERVER['HTTP_REFERER']);
    }

    public function add_detail($id)
    {
        $checkDuplicate = $this->upacara_detail->where([
            'type' => $this->input->post('type'),
            'id_item' => $this->input->post('detail'),
            'kategori' => $this->input->post('kategori'),
            'id_upacara' => $id,
        ])->get();

        if (count($checkDuplicate) > 0) {
            $this->session->set_flashdata('error', ucwords($this->input->post('type')) . " ini sudah ada dalam upacara.");
            redirect(base_url('admin/upacara/show/' . $id));
        }
        
        $this->upacara_detail->create([
            'type' => $this->input->post('type'),
            'id_item' => $this->input->post('detail'),
            'kategori' => $this->input->post('kategori'),
            'id_upacara' => $id,
        ]);

        redirect(base_url('admin/upacara/show/' . $id));
    }

    public function delete_detail($id)
    {
        $this->upacara_detail->where(['id_detail' => $id])->delete();

        redirect($_SERVER['HTTP_REFERER']);
    }
}
