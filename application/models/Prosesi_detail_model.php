<?php

class Prosesi_detail_model extends MY_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->table = 'tb_prosesi_detail';
        $this->primaryKey = 'id_detail';
    }
}
