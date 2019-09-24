<?php
class Kidung extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->auth->check();
        $this->load->model('kidung_model', 'kidung');
    }

    public function index()
    {
        $this->load->view('admin/kidung/index', [
            'data' => $this->kidung->get()
        ]);
    }

    public function create()
    {
        $this->load->view('admin/kidung/form');
    }

    public function store()
    {
        $this->kidung->create([
            'nama_kidung' => $this->input->post('nama_kidung'),
            'deskripsi_kidung' => $this->input->post('deskripsi_kidung'),
            'bait_kidung' => $this->input->post('bait_kidung'),
            'konten' => $this->input->post('konten'),
        ]);

        redirect(base_url('admin/kidung'));
    }

    public function update($id)
    {
        $this->kidung->update($id, [
            'nama_kidung' => $this->input->post('nama_kidung'),
            'deskripsi_kidung' => $this->input->post('deskripsi_kidung'),
            'bait_kidung' => $this->input->post('bait_kidung'),
            'konten' => $this->input->post('konten'),
        ], 'id_kidung');

        redirect(base_url('admin/kidung'));
    }

    public function edit($id)
    {
        $this->load->view('admin/kidung/form', [
            'data' => $this->kidung->find($id, 'id_kidung')
        ]);
    }

    public function show($id)
    {
        $this->load->view('admin/kidung/detail', [
            'data' => $this->kidung->find($id, 'id_kidung')
        ]);
    }

    public function delete($id)
    {
        $this->kidung->where(['id_kidung' => $id])->delete();

        redirect($_SERVER['HTTP_REFERER']);
    }

    public function json()
    {
        $data = $this->kidung->get();

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($data));
    }
}
