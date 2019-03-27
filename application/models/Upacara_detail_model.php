<?php

class Upacara_detail_model extends MY_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->table = 'tb_upacara_detail';
        $this->primaryKey = 'id_detail';
    }
}
