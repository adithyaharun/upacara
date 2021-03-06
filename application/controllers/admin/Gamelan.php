<?php
class Gamelan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->auth->check();
        $this->load->model('gamelan_model', 'gamelan');
        $this->load->model('gamelan_detail_model', 'gamelan_detail');
        $this->load->model('tabuh_model', 'tabuh');
    }

    private $module = 'gamelan';

    public function index()
    {
        $query = $this->{$this->module}->select('*');
        $total = $query->count();

        if ($this->input->get('q') !== null) {
            $query->where('nama_gamelan LIKE', "%{$this->input->get('q')}%");
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
        $this->load->view('admin/' . $this->module . '/form', [
            'tabuh' => $this->tabuh->select('id_tabuh AS id, nama_tabuh AS text')->get()
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

        $gamelan = $this->gamelan->create([
            'nama_gamelan' => $this->input->post('nama_gamelan'),
            'deskripsi' => $this->input->post('deskripsi'),
            'golongan' => $this->input->post('golongan'),
            'gambar' => $image,
            'konten' => $this->input->post('konten'),
        ]);

        foreach ($this->input->post('tabuh') as $tabuh) {
            $this->gamelan_detail->create([
                'id_tabuh' => $tabuh,
                'id_gamelan' => $gamelan->id_gamelan
            ]);
        }

        redirect(base_url('admin/' . $this->module . ''));
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

        $this->gamelan_detail->where(['id_gamelan' => $id])->delete();
        foreach ($this->input->post('tabuh') as $tabuh) {
            $this->gamelan_detail->create([
                'id_tabuh' => $tabuh,
                'id_gamelan' => $id
            ]);
        }

        redirect(base_url('admin/' . $this->module . ''));
    }

    public function edit($id)
    {
        $this->load->view('admin/' . $this->module . '/form', [
            'data' => $this->gamelan->find($id, 'id_gamelan'),
            'tabuh' => $this->tabuh->select('id_tabuh AS id, nama_tabuh AS text')->get(),
            'gamelan_tabuh' => $this->gamelan_detail->where(['id_gamelan' => $id])->get()
        ]);
    }

    public function show($id)
    {
        $this->load->view('admin/' . $this->module . '/detail', [
            'data' => $this->gamelan->find($id, 'id_gamelan'),
            'gamelan_tabuh' => $this->gamelan_detail->select('tb_tabuh.*')->where(['id_gamelan' => $id])->join('tb_tabuh', 'tb_tabuh.id_tabuh', '=', 'tb_gamelan_detail.id_tabuh')->get()
        ]);
    }

    public function delete($id)
    {
        $this->gamelan->where(['id_gamelan' => $id])->delete();

        redirect($_SERVER['HTTP_REFERER']);
    }

    public function json()
    {
        $data = $this->gamelan->get();

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($data));
    }
}
