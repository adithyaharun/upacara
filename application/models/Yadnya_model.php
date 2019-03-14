<?php

class Yadnya_model extends MY_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->table = 'tb_yadnya';
        $this->primaryKey = 'id_yadnya';
    }
}
