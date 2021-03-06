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
        $this->load->model('tabuh_model', 'tabuh');
    }

    private $module = 'tari';

    public function index()
    {
        $query = $this->{$this->module}->select('*');
        $total = $query->count();

        if ($this->input->get('q') !== null) {
            $query->where('nama_tari LIKE', "%{$this->input->get('q')}%");
        }

        $query->limit(10)
            ->offset((($this->input->get('page') ?: 1) - 1) * 10);

        $data = $query->get();

        $this->pagination->initialize([
            'total_rows' => $total,
            'per_page' => 10,
        ]);

        $this->load->view('admin/' . $this->module . '/index', [
            'data' => $data,
            'pagination' => $this->pagination->create_links()
        ]);
    }

    public function create()
    {
        $this->load->view('admin/tari/form', [
            'gamelan' => $this->gamelan->get(),
            'kidung' => $this->kidung->get(),
            'tabuh' => $this->tabuh->get(),
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
            'id_tabuh' => $this->input->post('id_tabuh') == 0 ? null : $this->input->post('id_tabuh'),
        ]);

        redirect(base_url('admin/tari'));
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
            'id_tabuh' => $this->input->post('id_tabuh') == 0 ? null : $this->input->post('id_tabuh'),
        ], 'id_tari');

        redirect(base_url('admin/tari'));
    }

    public function edit($id)
    {
        $this->load->view('admin/tari/form', [
            'data' => $this->tari->find($id, 'id_tari'),
            'gamelan' => $this->gamelan->get(),
            'tabuh' => $this->tabuh->get(),
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
