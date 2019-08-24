<?php
class Tabuh extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->auth->check();
        $this->load->model('tabuh_model', 'tabuh');
    }

    public function index()
    {
        $this->load->view('admin/tabuh/index', [
            'data' => $this->tabuh->get()
        ]);
    }

    public function create()
    {
        $this->load->view('admin/tabuh/form');
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

        $this->tabuh->create([
            'nama_tabuh' => $this->input->post('nama_tabuh'),
            'gambar' => $image,
            'konten' => $this->input->post('konten'),
        ]);

        redirect(base_url('admin/tabuh'));
    }

    public function update($id)
    {
        $data = $this->tabuh->find($id, 'id_tabuh');
        $image = $data->gambar;

        $this->load->library('upload', [
            'encrypt_name' => true,
            'upload_path' => './uploads/',
            'allowed_types' => 'gif|jpg|png|jpeg'
        ]);

        if ($this->upload->do_upload('photo')) {
            $image = $this->upload->data()['file_name'];
        }

        $this->tabuh->update($id, [
            'nama_tabuh' => $this->input->post('nama_tabuh'),
            'gambar' => $image,
            'konten' => $this->input->post('konten'),
        ], 'id_tabuh');

        redirect(base_url('admin/tabuh'));
    }

    public function edit($id)
    {
        $this->load->view('admin/tabuh/form', [
            'data' => $this->tabuh->find($id, 'id_tabuh')
        ]);
    }

    public function show($id)
    {
        $this->load->view('admin/tabuh/detail', [
            'data' => $this->tabuh->find($id, 'id_tabuh')
        ]);
    }

    public function delete($id)
    {
        $this->tabuh->where(['id_tabuh' => $id])->delete();

        redirect($_SERVER['HTTP_REFERER']);
    }

    public function json()
    {
        $data = $this->tabuh->get();

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($data));
    }
}