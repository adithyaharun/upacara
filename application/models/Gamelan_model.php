<?php

class Gamelan_model extends MY_Model
{
    public function __construct()
    {
        parent::__construct();

        $this->table = 'tb_gamelan';
        $this->primaryKey = 'id_gamelan';
    }
}
