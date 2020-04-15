<?php
class Upacara extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->auth->check();
        $this->load->model('upacara_model', 'upacara');
        $this->load->model('upacara_detail_model', 'upacara_detail');
        $this->load->model('yadnya_model', 'yadnya');
        $this->load->model('prosesi_model', 'prosesi');
        $this->load->model('prosesi_detail_model', 'prosesi_detail');
        $this->load->model('tari_model', 'tari');
        $this->load->model('gamelan_model', 'gamelan');
        $this->load->model('kidung_model', 'kidung');
    }

    private $module = 'upacara';

    public function index()
    {
        if ($this->input->get('yadnya') === null) {
            redirect(base_url('/admin'));
        }
        
        $query = $this->upacara
            ->where('tb_upacara.id_yadnya', $this->input->get('yadnya'))
            ->join('tb_yadnya', 'tb_yadnya.id_yadnya', '=', 'tb_upacara.id_yadnya');

        if ($this->input->get('q') !== null) {
            $query->where('nama_upacara LIKE', "%{$this->input->get('q')}%");
        }

        $query->limit(10)
            ->offset((($this->input->get('page') ?: 1) - 1) * 10);

        $data = $query->get();

        $this->pagination->initialize([
            'total_rows' => $this->upacara->count(),
            'per_page' => 10,
        ]);

        $this->load->view('admin/' . $this->module . '/index', [
            'data' => $data,
            'yadnya' => $this->yadnya->find($this->input->get('yadnya'), 'id_yadnya'),
            'pagination' => $this->pagination->create_links()
        ]);
    }

    public function create()
    {
        $this->load->view('admin/upacara/form');
    }

    public function show($id)
    {
        $data = $this->upacara->select('tb_upacara.*, tb_yadnya.nama_yadnya')
            ->join('tb_yadnya', 'tb_upacara.id_yadnya', '=', 'tb_yadnya.id_yadnya')
            ->where('tb_upacara.id_upacara', $id)
            ->first();
        $data->prosesi = $this->upacara_detail->select('tb_upacara_detail.id_detail, tb_prosesi_upacara.*, tb_upacara_detail.kategori')
            ->join('tb_prosesi_upacara', 'tb_upacara_detail.id_item', '=', 'tb_prosesi_upacara.id_prosesi_upacara')
            ->where([
                'tb_upacara_detail.id_upacara' => $id,
                'type' => 'prosesi'
            ])
            ->orderBy('id_upacara', 'ASC')
            ->orderBy('position', 'ASC')
            ->get();
        $data->tari = $this->upacara_detail->select('tb_upacara_detail.id_detail, tb_tari.*')
            ->join('tb_tari', 'tb_upacara_detail.id_item', '=', 'tb_tari.id_tari')
            ->where([
                'tb_upacara_detail.id_upacara' => $id,
                'type' => 'tari'
            ])
            ->get();
        $data->gamelan = $this->upacara_detail->select('tb_upacara_detail.id_detail, tb_gamelan.*')
            ->join('tb_gamelan', 'tb_upacara_detail.id_item', '=', 'tb_gamelan.id_gamelan')
            ->where([
                'tb_upacara_detail.id_upacara' => $id,
                'type' => 'gamelan'
            ])
            ->get();
        $data->kidung = $this->upacara_detail->select('tb_upacara_detail.id_detail, tb_kidung.*')
            ->join('tb_kidung', 'tb_upacara_detail.id_item', '=', 'tb_kidung.id_kidung')
            ->where([
                'tb_upacara_detail.id_upacara' => $id,
                'type' => 'kidung'
            ])
            ->get();

        foreach ($data->prosesi as $index => $prosesi) {
            $detail = $this->prosesi_detail
                ->where('id_prosesi', $prosesi->id_prosesi_upacara)
                ->first();

            if ($detail === null) {
                continue;
            }

            if ($detail->type == 'tari') {
                $tari = $this->tari->where('id_tari', $detail->id_item)->first();
                if ($tari !== null) {
                    $tari->deletable = false;

                    foreach ($data->tari as $dtIndex => $dt) {
                        if ($dt->id_tari === $tari->id_tari) {
                            unset($data->tari[$dtIndex]);
                            continue;
                        }
                    }

                    $data->tari[] = $tari;
                }
            }

            if ($detail->type == 'gamelan') {
                $gamelan = $this->gamelan->where('id_gamelan', $detail->id_item)->first();
                if ($gamelan !== null) {
                    $gamelan->deletable = false;

                    foreach ($data->gamelan as $dtIndex => $dt) {
                        if ($dt->id_gamelan === $gamelan->id_gamelan) {
                            unset($data->gamelan[$dtIndex]);
                            continue;
                        }
                    }

                    $data->gamelan[] = $gamelan;
                }
            }

            if ($detail->type == 'kidung') {
                $kidung = $this->kidung->where('id_kidung', $detail->id_item)->first();
                if ($kidung !== null) {
                    $kidung->deletable = false;

                    foreach ($data->kidung as $dtIndex => $dt) {
                        if ($dt->id_kidung === $kidung->id_kidung) {
                            unset($data->kidung[$dtIndex]);
                            continue;
                        }
                    }

                    $data->kidung[] = $kidung;
                }
            }
        }

        // return $this->output
        //     ->set_content_type('application/json')
        //     ->set_output(json_encode($data));

        $this->load->view('admin/upacara/detail', [
            'data' => $data
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

        $this->upacara->create([
            'nama_upacara' => $this->input->post('nama_upacara'),
            'deskripsi' => $this->input->post('deskripsi'),
            'konten' => $this->input->post('konten'),
            'id_yadnya' => $this->input->post('id_yadnya'),
            'gambar' => $image,
        ]);

        redirect(base_url('admin/upacara?yadnya=' . $this->input->post('id_yadnya')));
    }

    public function update($id)
    {
        $data = $this->upacara->find($id, 'id_upacara');
        $image = $data->gambar;

        $this->load->library('upload', [
            'encrypt_name' => true,
            'upload_path' => './uploads/',
            'allowed_types' => 'gif|jpg|png|jpeg'
        ]);

        if ($this->upload->do_upload('photo')) {
            $image = $this->upload->data()['file_name'];
        }

        $this->upacara->update($id, [
            'nama_upacara' => $this->input->post('nama_upacara'),
            'deskripsi' => $this->input->post('deskripsi'),
            'konten' => $this->input->post('konten'),
            'id_yadnya' => $this->input->post('id_yadnya'),
            'gambar' => $image,
        ], 'id_upacara');

        redirect(base_url('admin/upacara?yadnya=' . $data->id_yadnya));
    }

    public function edit($id)
    {
        $this->load->view('admin/upacara/form', [
            'data' => $this->upacara->find($id, 'id_upacara')
        ]);
    }

    public function delete($id)
    {
        $data = $this->upacara->find($id, 'id_upacara');
        $this->upacara->where(['id_upacara' => $id])->delete();

        redirect($_SERVER['HTTP_REFERER']);
    }

    public function add_detail($id)
    {
        $checkDuplicate = $this->upacara_detail->where([
            'type' => $this->input->post('type'),
            'id_item' => $this->input->post('detail'),
            'id_upacara' => $id,
        ])->get();

        if (count($checkDuplicate) > 0) {
            $this->session->set_flashdata('error', ucwords($this->input->post('type')) . " tersebut sudah ada dalam upacara ini.");
            redirect(base_url('admin/upacara/show/' . $id));
        }

        $idItem = $this->input->post('detail');

        if ($this->input->post('type') === 'prosesi') {
            $prosesi = $this->prosesi
                ->where('id_prosesi_upacara', $id)
                ->first();
            $prosesiDetail = $this->prosesi_detail
                ->where([
                    'tb_prosesi_detail.id_prosesi' => $id,
                    'type' => 'prosesi'
                ])
                ->get();
                
            $p = $this->prosesi->create([
                'prosesi_upacara' => $prosesi->prosesi_upacara,
                'deskripsi' => $prosesi->deskripsi,
                'id_yadnya' => $prosesi->id_yadnya == 0 ? null : $prosesi->id_yadnya,
                'id_tari' => $prosesi->id_tari,
                'id_gamelan' => $prosesi->id_gamelan,
                'id_kidung' => $prosesi->id_kidung,
                'id_mantram' => $prosesi->id_mantram,
                'gambar' => $prosesi->gambar,
                'special' => 1
            ]);

            foreach ($prosesiDetail as $key => $detail) {
                $this->prosesi_detail->create([
                    'type' => $detail->type,
                    'id_item' => $detail->detail,
                    'kategori' => $detail->kategori,
                    'id_prosesi' => $p->id,
                ]);
            }

            $idItem = $p->id;
        }
        
        $this->upacara_detail->create([
            'type' => $this->input->post('type'),
            'id_item' => $idItem,
            'kategori' => $this->input->post('kategori'),
            'id_upacara' => $id,
        ]);

        redirect(base_url('admin/upacara/show/' . $id));
    }

    public function reorder($id)
    {
        $reorder = $this->input->post('reorder');

        foreach ($reorder as $key => $value) {
            $this->upacara_detail->update($value, [
                'position' => $key + 1
            ]);
        }

        redirect($_SERVER['HTTP_REFERER']);
    }

    public function delete_detail($id)
    {
        $this->upacara_detail->where(['id_detail' => $id])->delete();

        redirect($_SERVER['HTTP_REFERER']);
    }
}
