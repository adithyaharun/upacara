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
        $this->load->view('admin/gamelan/index', [
            'data' => $this->gamelan->get()
        ]);
    }

    public function create()
    {
        $this->load->view('admin/gamelan/form');
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

        $this->gamelan->create([
            'nama_gamelan' => $this->input->post('nama_gamelan'),
            'deskripsi' => $this->input->post('deskripsi'),
            'golongan' => $this->input->post('golongan'),
            'gambar' => $image,
            'konten' => $this->input->post('konten'),
        ]);

        redirect(base_url('gamelan'));
    }

    public function update($id)
    {
        $data = $this->gamelan->find($id, 'id_gamelan');
        $image = $data->gambar;

        $this->load->library('upload', [
            'encrypt_name' => true,
            'upload_path' => './uploads/',
            'allowed_types' => 'gif|jpg|png|jpeg'
        ]);

        if ($this->upload->do_upload('photo')) {
            $image = $this->upload->data()['file_name'];
        }

        $this->gamelan->update($id, [
            'nama_gamelan' => $this->input->post('nama_gamelan'),
            'deskripsi' => $this->input->post('deskripsi'),
            'golongan' => $this->input->post('golongan'),
            'gambar' => $image,
            'konten' => $this->input->post('konten'),
        ], 'id_gamelan');

        redirect(base_url('gamelan'));
    }

    public function edit($id)
    {
        $this->load->view('admin/gamelan/form', [
            'data' => $this->gamelan->find($id, 'id_gamelan')
        ]);
    }

    public function delete($id)
    {
        $this->gamelan->where(['id_gamelan' => $id])->delete();
        redirect(base_url('gamelan'));
    }

    public function json()
    {
        $data = $this->gamelan->get();

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($data));
    }
}
