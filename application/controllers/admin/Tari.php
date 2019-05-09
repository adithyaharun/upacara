<?php
class Tari extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->auth->check();
        $this->load->model('tari_model', 'tari');
        $this->load->model('gamelan_model', 'gamelan');
        $this->load->model('kidung_model', 'kidung');
    }

    public function index()
    {
        $this->load->view('admin/tari/index', [
            'data' => $this->tari->get()
        ]);
    }

    public function create()
    {
        $this->load->view('admin/tari/form', [
            'gamelan' => $this->gamelan->get(),
            'kidung' => $this->kidung->get(),
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

        $this->tari->create([
            'nama_tari' => $this->input->post('nama_tari'),
            'deskripsi' => $this->input->post('deskripsi'),
            'jml_penari' => $this->input->post('jml_penari'),
            'fungsi_tari' => $this->input->post('fungsi_tari'),
            'gambar' => $image,
            'konten' => $this->input->post('konten'),
            'id_gamelan' => $this->input->post('id_gamelan') == 0 ? null : $this->input->post('id_gamelan'),
            'id_kidung' => $this->input->post('id_kidung') == 0 ? null : $this->input->post('id_kidung'),
        ]);

        redirect(base_url('tari'));
    }

    public function update($id)
    {
        $data = $this->tari->find($id, 'id_tari');
        $image = $data->gambar;

        $this->load->library('upload', [
            'encrypt_name' => true,
            'upload_path' => './uploads/',
            'allowed_types' => 'gif|jpg|png|jpeg'
        ]);

        if ($this->upload->do_upload('photo')) {
            $image = $this->upload->data()['file_name'];
        }

        $this->tari->update($id, [
            'nama_tari' => $this->input->post('nama_tari'),
            'deskripsi' => $this->input->post('deskripsi'),
            'jml_penari' => $this->input->post('jml_penari'),
            'fungsi_tari' => $this->input->post('fungsi_tari'),
            'gambar' => $image,
            'konten' => $this->input->post('konten'),
            'id_gamelan' => $this->input->post('id_gamelan') == 0 ? null : $this->input->post('id_gamelan'),
            'id_kidung' => $this->input->post('id_kidung') == 0 ? null : $this->input->post('id_kidung'),
        ], 'id_tari');

        redirect(base_url('tari/show/' . $id));
    }

    public function edit($id)
    {
        $this->load->view('admin/tari/form', [
            'data' => $this->tari->find($id, 'id_tari'),
            'gamelan' => $this->gamelan->get(),
            'kidung' => $this->kidung->get()
        ]);
    }

    public function show($id)
    {
        $data = $this->tari->select('tb_tari.*, tb_gamelan.nama_gamelan, tb_kidung.nama_kidung')
            ->join('tb_gamelan', 'tb_tari.id_gamelan', '=', 'tb_gamelan.id_gamelan', 'left')
            ->join('tb_kidung', 'tb_tari.id_kidung', '=', 'tb_kidung.id_kidung', 'left')
            ->where('tb_tari.id_tari', $id)
            ->first();

        $this->load->view('admin/tari/detail', [
            'data' => $data
        ]);
    }

    public function delete($id)
    {
        $this->tari->where(['id_tari' => $id])->delete();

        redirect($_SERVER['HTTP_REFERER']);
    }

    public function json()
    {
        $data = $this->tari->get();

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($data));
    }
}
