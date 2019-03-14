<?php

class Kidung_model extends MY_Model
{
    public function __construct()
    {
        parent::__construct();

        $this->table = 'tb_kidung';
        $this->primaryKey = 'id_kidung';
    }
}
