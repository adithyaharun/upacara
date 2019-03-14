<?php

class Mantram_model extends MY_Model
{
    public function __construct()
    {
        parent::__construct();

        $this->table = 'tb_mantram';
        $this->primaryKey = 'id_mantram';
    }
}
