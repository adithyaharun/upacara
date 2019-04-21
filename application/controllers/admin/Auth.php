<?php
class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin_model', 'admin');
    }

    public function login()
    {
        $this->load->view('admin/login');
    }

    public function logout()
    {
        session_destroy();
        redirect('admin/auth/login');
    }

    public function submit()
    {
        $usname = $this->input->post('usname');
        $pwd = $this->input->post('pwd');

        if (empty($usname) || empty($pwd)) {
            redirect('admin/auth/login?error=invalidate');
        }

        $admin = $this->admin->where(['usname' => $usname, 'pwd' => md5($pwd)])->first();

        if ($admin === null) {
            redirect('admin/auth/login?error=incorrect');
        } else {
            $_SESSION['id'] = $admin->id_admin;
            $_SESSION['name'] = $admin->nama;
            $_SESSION['username'] = $admin->usname;
            redirect('admin');
        }
    }
}
