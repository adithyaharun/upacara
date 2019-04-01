<?php
class Mantram extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('mantram_model', 'mantram');
    }

    public function index()
    {
        $this->load->view('admin/mantram/index', [
            'data' => $this->mantram->get()
        ]);
    }

    public function create()
    {
        $this->load->view('admin/mantram/form');
    }

    public function store()
    {
        $this->mantram->create([
            'deskripsi_mantram' => $this->input->post('deskripsi_mantram'),
            'bait_mantram' => $this->input->post('bait_mantram'),
            'kategori' => $this->input->post('kategori'),
            'konten' => $this->input->post('konten'),
        ]);

        redirect(base_url('mantram'));
    }

    public function update($id)
    {
        $data = $this->mantram->find($id, 'id_mantram');
        $image = $data->gambar;

        $this->load->library('upload', [
            'encrypt_name' => true,
            'upload_path' => './uploads/',
            'allowed_types' => 'gif|jpg|png|jpeg'
        ]);

        if ($this->upload->do_upload('photo')) {
            $image = $this->upload->data()['file_name'];
        }

        $this->mantram->update($id, [
            'nama_mantram' => $this->input->post('nama_mantram'),
            'deskripsi_mantram' => $this->input->post('deskripsi_mantram'),
            'kategori' => $this->input->post('kategori'),
            'gambar' => $image,
            'konten' => $this->input->post('konten'),
        ], 'id_mantram');

        redirect(base_url('mantram'));
    }

    public function edit($id)
    {
        $this->load->view('admin/mantram/form', [
            'data' => $this->mantram->find($id, 'id_mantram')
        ]);
    }

    public function delete($id)
    {
        $this->mantram->where(['id_mantram' => $id])->delete();
        redirect(base_url('mantram'));
    }

    public function json()
    {
        $data = $this->mantram->get();

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($data));
    }
}
