<?php
class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->auth->check();
    }

    public function index()
    {
        $this->load->view('admin/dashboard', ['data' => []]);
    }
}
