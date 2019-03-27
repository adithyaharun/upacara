<?php

class Prosesi_model extends MY_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->table = 'tb_prosesi_upacara';
        $this->primaryKey = 'id_prosesi_upacara';
    }
}
