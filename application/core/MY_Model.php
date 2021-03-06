<?php
class MY_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Table name.
     *
     * @var string
     */
    public $table = '';

    /**
     * Table name.
     *
     * @var string
     */
    public $primaryKey = 'id';

    /**
     * Get.
     */
    public function get()
    {
        $data = $this->db->get($this->table);

        return $data->result();
    }

    /**
     * first.
     */
    public function first()
    {
        $data = $this->db->get($this->table);
        return $data->row();
    }

    /**
     * Where.
     */
    public function where($key, $value = '')
    {
        if (is_array($key)) {
            foreach ($key as $a => $b) {
                $this->db->where($a, $b);
            }
        } else {
            $this->db->where($key, $value);
        }

        return $this;
    }

    /**
     * Where Null.
     */
    public function whereNull($key)
    {
        $this->db->where("{$key} IS NULL");

        return $this;
    }

    /**
     * Where Null.
     */
    public function orWhereNull($key)
    {
        $this->db->or_where("{$key} IS NULL");

        return $this;
    }

    /**
     * Select.
     */
    public function select($column = '*')
    {
        if (is_array($column)) {
            $column = implode(",", $column);
        }

        $this->db->select($column);

        return $this;
    }

    /**
     * DB.
     */
    public function db()
    {
        return $this->db;
    }

    /**
     * Join.
     */
    public function join($table, $column1, $operator, $column2, $type = "")
    {
        $this->db->join($table, "{$column1} {$operator} {$column2}", $type);

        return $this;
    }

    /**
     * Limit.
     */
    public function limit($number)
    {
        $this->db->limit($number);

        return $this;
    }

    /**
     * Offset.
     */
    public function offset($number)
    {
        $this->db->offset($number);

        return $this;
    }

    /**
     * Find.
     */
    public function find($value)
    {
        $query = $this->db->get_where($this->table, [$this->primaryKey => $value]);
        $row = $query->row();

        if (isset($row)) {
            return $row;
        } else {
            $this->generateError();
        }
    }

    /**
     * Create.
     */
    public function create(array $attributes)
    {
        $create = $this->db->insert($this->table, $attributes);

        if ($create) {
            return $this->find($this->db->insert_id(), $this->primaryKey);
        } else {
            $this->generateError();
        }
    }

    /**
     * Update
     */
    public function update($id, array $attributes)
    {
        $this->db->where($this->primaryKey, $id);
        $update = $this->db->update($this->table, $attributes);

        if ($update) {
            return $this->find($id);
        } else {
            $this->generateError();
        }
    }

    /**
     * Update
     */
    public function delete()
    {
        $this->db->delete($this->table);
    }

    /**
     * Count
     */
    public function count()
    {
        return $this->db->count_all($this->table);
    }

    /**
     * Count
     */
    public function num_rows()
    {
        return $this->db->count_all($this->table);
    }

    public function orderBy($column, $direction)
    {
        $this->db->order_by($column, $direction);

        return $this;
    }

    /**
     * Error generator.
     */
    private function generateError()
    {
        $error = $this->db->error();
        var_dump($error);
        die();
    }
}
