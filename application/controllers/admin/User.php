<?php
class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->auth->check();
        $this->load->model('user_model', 'user');
    }

    public function index()
    {
        $this->load->view('admin/user/index', [
            'data' => $this->user->get()
        ]);
    }

    public function create()
    {
        $this->load->view('admin/user/form');
    }

    public function store()
    {
        $this->user->create([
            'nama' => $this->input->post('nama'),
            'nmr_telp' => $this->input->post('nmr_telp'),
            'email' => $this->input->post('email'),
            'usname' => $this->input->post('usname'),
            'pwd' => md5($this->input->post('pwd')),
        ]);

        redirect(base_url('admin/user'));
    }

    public function update($id)
    {
        $data = $this->user->find($id, 'id_admin');
        $values = [
            'nama' => $this->input->post('nama'),
            'nmr_telp' => $this->input->post('nmr_telp'),
            'email' => $this->input->post('email'),
            'usname' => $this->input->post('usname'),
        ];

        if ($this->input->post('pwd') !== null) {
            $values['pwd'] = md5($this->input->post('pwd'));
        }

        $this->user->update($id, $values, 'id_admin');

        redirect(base_url('admin/user'));
    }

    public function edit($id)
    {
        $this->load->view('admin/user/form', [
            'data' => $this->user->find($id, 'id_admin')
        ]);
    }

    public function delete($id)
    {
        $this->user->where(['id_admin' => $id])->delete();
        redirect(base_url('admin/user'));
    }

    public function json()
    {
        $data = $this->user->get();

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($data));
    }
}
