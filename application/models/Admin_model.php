<?php

class Admin_model extends MY_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->table = 'tb_admin';
        $this->primaryKey = 'id_admin';
    }
}
