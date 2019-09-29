<?php
class Prosesi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->auth->check();
        $this->load->model('prosesi_model', 'prosesi');
        $this->load->model('prosesi_detail_model', 'prosesi_detail');
        $this->load->model('yadnya_model', 'yadnya');
        $this->load->model('tari_model', 'tari');
        $this->load->model('gamelan_model', 'gamelan');
        $this->load->model('kidung_model', 'kidung');
        $this->load->model('mantram_model', 'mantram');
    }

    public function index()
    {
        $this->load->view('admin/prosesi/index', [
            'data' => $this->prosesi->join('tb_yadnya', 'tb_yadnya.id_yadnya', '=', 'tb_prosesi_upacara.id_yadnya', 'left')->get()
        ]);
    }

    public function create()
    {
        $this->load->view('admin/prosesi/form', [
            'yadnya' => $this->yadnya->get(),
            'tari' => $this->tari->get(),
            'gamelan' => $this->gamelan->get(),
            'kidung' => $this->kidung->get(),
            'mantram' => $this->mantram->get(),
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

        $this->prosesi->create([
            'prosesi_upacara' => $this->input->post('prosesi_upacara'),
            'deskripsi' => $this->input->post('deskripsi'),
            'id_yadnya' => $this->input->post('id_yadnya') == 0 ? null : $this->input->post('id_yadnya'),
            'id_tari' => $this->input->post('id_tari'),
            'id_gamelan' => $this->input->post('id_gamelan'),
            'id_kidung' => $this->input->post('id_kidung'),
            'id_mantram' => $this->input->post('id_mantram'),
            'gambar' => $image,
        ]);

        redirect(base_url('admin/prosesi'));
    }

    public function update($id)
    {
        $data = $this->prosesi->find($id, 'id_prosesi');
        $image = $data->gambar;

        $this->load->library('upload', [
            'encrypt_name' => true,
            'upload_path' => './uploads/',
            'allowed_types' => 'gif|jpg|png|jpeg'
        ]);

        if ($this->upload->do_upload('photo')) {
            $image = $this->upload->data()['file_name'];
        }

        $this->prosesi->update($id, [
            'prosesi_upacara' => $this->input->post('prosesi_upacara'),
            'deskripsi' => $this->input->post('deskripsi'),
            'id_yadnya' => $this->input->post('id_yadnya') == 0 ? null : $this->input->post('id_yadnya'),
            'id_tari' => $this->input->post('id_tari'),
            'id_gamelan' => $this->input->post('id_gamelan'),
            'id_kidung' => $this->input->post('id_kidung'),
            'id_mantram' => $this->input->post('id_mantram'),
            'gambar' => $image,
        ], 'id_prosesi');

        redirect(base_url('admin/prosesi'));
    }

    public function detail($id)
    {
        $isDetail = $this->prosesi_detail->select('COUNT(id_detail) AS count')->where(['id_item' => $id, 'type' => 'prosesi'])->first()->count > 0;
        $data = $this->prosesi
            ->select('tb_prosesi_upacara.*, tb_mantram.nama_mantram')
            ->join('tb_mantram', 'tb_prosesi_upacara.id_mantram', '=', 'tb_mantram.id_mantram', 'left')
            ->where('id_prosesi_upacara', $id)
            ->first();
        $data->prosesi = $this->prosesi_detail->select('tb_prosesi_detail.id_detail, tb_prosesi_upacara.*')
            ->join('tb_prosesi_upacara', 'tb_prosesi_detail.id_item', '=', 'tb_prosesi_upacara.id_prosesi_upacara')
            ->where([
                'tb_prosesi_detail.id_prosesi' => $id,
                'type' => 'prosesi'
            ])
            ->get();
        $data->tari = $this->prosesi_detail->select('tb_prosesi_detail.id_detail, tb_tari.*')
            ->join('tb_tari', 'tb_prosesi_detail.id_item', '=', 'tb_tari.id_tari')
            ->where([
                'tb_prosesi_detail.id_prosesi' => $id,
                'type' => 'tari'
            ])
            ->get();
        $data->gamelan = $this->prosesi_detail->select('tb_prosesi_detail.id_detail, tb_gamelan.*')
            ->join('tb_gamelan', 'tb_prosesi_detail.id_item', '=', 'tb_gamelan.id_gamelan')
            ->where([
                'tb_prosesi_detail.id_prosesi' => $id,
                'type' => 'gamelan'
            ])
            ->get();
        $data->kidung = $this->prosesi_detail->select('tb_prosesi_detail.id_detail, tb_kidung.*')
            ->join('tb_kidung', 'tb_prosesi_detail.id_item', '=', 'tb_kidung.id_kidung')
            ->where([
                'tb_prosesi_detail.id_prosesi' => $id,
                'type' => 'kidung'
            ])
            ->get();
        $data->tabuh = $this->prosesi_detail->select('tb_prosesi_detail.id_detail, tb_tabuh.*')
            ->join('tb_tabuh', 'tb_prosesi_detail.id_item', '=', 'tb_tabuh.id_tabuh')
            ->where([
                'tb_prosesi_detail.id_prosesi' => $id,
                'type' => 'tabuh'
            ])
            ->get();
        $data->mantram = $this->prosesi_detail->select('tb_prosesi_detail.id_detail, tb_mantram.*')
            ->join('tb_mantram', 'tb_prosesi_detail.id_item', '=', 'tb_mantram.id_mantram')
            ->where([
                'tb_prosesi_detail.id_prosesi' => $id,
                'type' => 'mantram'
            ])
            ->get();

        // return $this->output
        //     ->set_content_type('application/json')
        //     ->set_output(json_encode($data->tari));

        $this->load->view('admin/prosesi/detail', [
            'data' => $data,
            'isDetail' => $isDetail
        ]);
    }

    public function edit($id)
    {
        $this->load->view('admin/prosesi/form', [
            'data' => $this->prosesi->find($id, 'id_prosesi'),
            'yadnya' => $this->yadnya->get(),
            'tari' => $this->tari->get(),
            'gamelan' => $this->gamelan->get(),
            'kidung' => $this->kidung->get(),
            'mantram' => $this->mantram->get()
        ]);
    }

    public function delete($id)
    {
        $this->prosesi->where(['id_prosesi_upacara' => $id])->delete();

        redirect(base_url('admin/prosesi'));
    }

    public function json()
    {
        $query = $this->prosesi->select('*');

        if ($this->input->get('id_yadnya') !== null) {
            $query->where('id_yadnya', $this->input->get('id_yadnya'));
        }

        $data = $query->orWhereNull('id_yadnya')->get();

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($data));
    }

    public function add_detail($id)
    {
        $checkDuplicate = $this->prosesi_detail->where([
            'type' => $this->input->post('type'),
            'id_item' => $this->input->post('detail'),
            'id_prosesi' => $id,
        ])->get();

        if (count($checkDuplicate) > 0) {
            $this->session->set_flashdata('error', ucwords($this->input->post('type')) . " tersebut sudah ada dalam prosesi ini.");
            redirect(base_url('admin/prosesi/detail/' . $id));
        }

        $this->prosesi_detail->create([
            'type' => $this->input->post('type'),
            'id_item' => $this->input->post('detail'),
            'kategori' => $this->input->post('kategori'),
            'id_prosesi' => $id,
        ]);

        redirect(base_url('admin/prosesi/detail/' . $id));
    }

    public function delete_detail($id)
    {
        $this->prosesi_detail->where(['id_detail' => $id])->delete();

        redirect($_SERVER['HTTP_REFERER']);
    }
}
