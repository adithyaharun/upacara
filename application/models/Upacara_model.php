<?php

class Upacara_model extends MY_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->table = 'tb_upacara';
        $this->primaryKey = 'id_upacara';
    }
}
