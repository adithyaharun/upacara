<?php
class Tabuh extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->auth->check();
        $this->load->model('tabuh_model', 'tabuh');
        $this->load->model('gamelan_detail_model', 'gamelan_detail');
        $this->load->model('prosesi_detail_model', 'prosesi_detail');
    }

    private $module = 'tabuh';

    public function index()
    {
        $query = $this->{$this->module}->select('*');
        $total = $query->count();

        if ($this->input->get('q') !== null) {
            $query->where('nama_tabuh LIKE', "%{$this->input->get('q')}%");
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
            'deskripsi' => $this->input->post('deskripsi'),
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
            'deskripsi' => $this->input->post('deskripsi'),
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
        $data = [];

        if ($this->input->get('id_prosesi') != null) {
            $gamelan = $this->prosesi_detail->where(['id_prosesi' => $this->input->get('id_prosesi'), 'type' => 'gamelan'])->get();

            foreach ($gamelan as $g) {
                $arrays = $this->gamelan_detail->select('tb_tabuh.*')
                    ->join('tb_tabuh', 'tb_tabuh.id_tabuh', '=', 'tb_gamelan_detail.id_tabuh')
                    ->where('id_gamelan', $g->id_item)
                    ->get();

                foreach ($arrays as $a) {
                    $data[] = $a;
                }
            }
        } else {
            $data = $this->tabuh->get();
        }

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($data));
    }
}
