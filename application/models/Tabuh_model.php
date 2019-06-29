<?php

class Tabuh_model extends MY_Model
{
    public function __construct()
    {
        parent::__construct();

        $this->table = 'tb_tabuh';
        $this->primaryKey = 'id_tabuh';
    }
}
