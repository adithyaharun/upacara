<?php
class Prosesi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('upacara_model', 'upacara');
        $this->load->model('upacara_detail_model', 'upacara_detail');
        $this->load->model('yadnya_model', 'yadnya');
        $this->load->model('prosesi_model', 'prosesi');
        $this->load->model('prosesi_detail_model', 'prosesi_detail');
        $this->load->model('tari_model', 'tari');
        $this->load->model('gamelan_model', 'gamelan');
        $this->load->model('kidung_model', 'kidung');
    }

    public function index($id = null)
    {
        $values = [];
        $yadnya = 1;

        if ($id !== null) {
            switch ($id) {
                case 'dewa_yadnya':
                    $yadnya = 1;
                    break;

                case 'manusa_yadnya':
                    $yadnya = 2;
                    break;

                case 'pitra_yadnya':
                    $yadnya = 3;
                    break;

                case 'rsi_yadnya':
                    $yadnya = 4;
                    break;

                case 'bhuta_yadnya':
                    $yadnya = 5;
                    break;

                default:
                    $yadnya = 1;
                    break;
            }

            $values['yadnya'] = $this->yadnya->find($yadnya, 'id_yadnya');
            $values['data'] = $this->prosesi
                ->select('tb_upacara.*, tb_yadnya.nama_yadnya')
                ->where('tb_upacara.id_yadnya', $yadnya)
                ->join('tb_yadnya', 'tb_yadnya.id_yadnya', '=', 'tb_upacara.id_yadnya')
                ->get();
        }

        $this->load->view('prosesi/index', $values);
    }

    public function show($id)
    {
        $data = $this->prosesi->find($id, 'id_prosesi_upacara');
        $data->prosesi = $this->prosesi_detail->select('tb_prosesi_upacara.*')
            ->join('tb_prosesi_upacara', 'tb_prosesi_detail.id_item', '=', 'tb_prosesi_upacara.id_prosesi_upacara')
            ->where([
                'tb_prosesi_detail.id_detail' => $id,
                'type' => 'prosesi'
            ])
            ->get();
        $data->tari = $this->prosesi_detail->select('tb_tari.*')
            ->join('tb_tari', 'tb_prosesi_detail.id_item', '=', 'tb_tari.id_tari')
            ->where([
                'tb_prosesi_detail.id_detail' => $id,
                'type' => 'tari'
            ])
            ->get();
        $data->gamelan = $this->prosesi_detail->select('tb_gamelan.*')
            ->join('tb_gamelan', 'tb_prosesi_detail.id_item', '=', 'tb_gamelan.id_gamelan')
            ->where([
                'tb_prosesi_detail.id_detail' => $id,
                'type' => 'gamelan'
            ])
            ->get();
        $data->kidung = $this->prosesi_detail->select('tb_kidung.*')
            ->join('tb_kidung', 'tb_prosesi_detail.id_item', '=', 'tb_kidung.id_kidung')
            ->where([
                'tb_prosesi_detail.id_detail' => $id,
                'type' => 'kidung'
            ])
            ->get();
        $data->tabuh = $this->prosesi_detail->select('tb_tabuh.*')
            ->join('tb_tabuh', 'tb_prosesi_detail.id_item', '=', 'tb_tabuh.id_tabuh')
            ->where([
                'tb_prosesi_detail.id_detail' => $id,
                'type' => 'tabuh'
            ])
            ->get();
        $data->mantram = $this->prosesi_detail->select('tb_mantram.*')
            ->join('tb_mantram', 'tb_prosesi_detail.id_item', '=', 'tb_mantram.id_mantram')
            ->where([
                'tb_prosesi_detail.id_detail' => $id,
                'type' => 'mantram'
            ])
            ->get();

        $this->load->view('prosesi/detail', [
            'data' => $data
        ]);
    }
}
