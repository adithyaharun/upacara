<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth
{
    public function check()
    {
        if (!isset($_SESSION['id'])) {
            redirect(base_url('admin/auth/login'));
        }
    }
}
