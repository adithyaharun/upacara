<?php
class Upacara extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('upacara_model', 'upacara');
        $this->load->model('yadnya_model', 'yadnya');
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
            'tingkatan_upacara' => $this->input->post('tingkatan_upacara'),
            'id_yadnya' => $this->input->post('id_yadnya'),
            'gambar' => $image,
            'konten' => $this->input->post('konten'),
        ]);

        redirect(base_url('upacara?yadnya=' . $this->input->post('id_yadnya')));
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
            'tingkatan_upacara' => $this->input->post('tingkatan_upacara'),
            'id_yadnya' => $this->input->post('id_yadnya'),
            'gambar' => $image,
            'konten' => $this->input->post('konten'),
        ], 'id_upacara');

        redirect(base_url('upacara?yadnya=' . $data->id_yadnya));
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

        redirect(base_url('upacara?yadnya=' . $data->id_yadnya));
    }
}
