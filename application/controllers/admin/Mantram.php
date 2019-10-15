<?php
class Mantram extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->auth->check();
        $this->load->model('mantram_model', 'mantram');
    }

    private $module = 'mantram';

    public function index()
    {
        $query = $this->{$this->module}->select('*');
        $total = $query->count();

        if ($this->input->get('q') !== null) {
            $query->where('nama_mantram LIKE', "%{$this->input->get('q')}%");
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
        $this->load->view('admin/mantram/form');
    }

    public function store()
    {
        $this->mantram->create([
            'nama_mantram' => $this->input->post('nama_mantram'),
            'bait_mantram' => $this->input->post('bait_mantram'),
            'kategori' => $this->input->post('kategori'),
            'konten' => $this->input->post('konten'),
        ]);

        redirect(base_url('admin/mantram'));
    }

    public function update($id)
    {
        $data = $this->mantram->find($id, 'id_mantram');

        $this->mantram->update($id, [
            'nama_mantram' => $this->input->post('nama_mantram'),
            'bait_mantram' => $this->input->post('bait_mantram'),
            'kategori' => $this->input->post('kategori'),
            'konten' => $this->input->post('konten'),
        ], 'id_mantram');

        redirect(base_url('admin/mantram'));
    }

    public function edit($id)
    {
        $this->load->view('admin/mantram/form', [
            'data' => $this->mantram->find($id, 'id_mantram')
        ]);
    }

    public function show($id)
    {
        $this->load->view('admin/mantram/detail', [
            'data' => $this->mantram->find($id, 'id_mantram')
        ]);
    }

    public function delete($id)
    {
        $this->mantram->where(['id_mantram' => $id])->delete();

        redirect($_SERVER['HTTP_REFERER']);
    }

    public function json()
    {
        $data = $this->mantram->get();

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($data));
    }
}
