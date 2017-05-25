<?php
/**
 * Created by PhpStorm.
 * User: aarmstrong
 * Date: 11/22/2016
 * Time: 2:25 PM
 */

namespace Yoda;

use PDO;


class Builder
{

    public $table;

    public $where = [];

    public $sql = "";

    public $database;


    /**
     * Builder constructor.
     * @param $table
     */
    public function __construct($table)
    {
        $this->table = $table;
        $this->database = new Database();
    }

    public function where($key, $operator, $value = null)
    {
        if (func_num_args() == 2) {
            $value = $operator;
            $operator = "=";
        }

        //$push = compact($key, $operator, $value);
        $push = [
            'key' => $key,
            'operator' => $operator,
            'value' => $value
        ];

        array_push($this->where, $push);
        return $this;
    }

    public function get($columns = [])
    {
        if (count($columns) == 0) {
            $this->sql = "SELECT * FROM {$this->table}";
        } else {
            $formatted_columns = implode(',', $columns);
            $this->sql = "SELECT $formatted_columns FROM {$this->table}";
        }

        $variables = [];

        $count = 0;
        foreach($this->where as $where) {
            if ($count == 0) {
                $this->sql .= " WHERE {$where['key']} {$where['operator']} :where{$where['key']}";
                $variables[":where{$where['key']}"] = $where['value'];
            } else {
                $this->sql .= " AND {$where['key']} {$where['operator']} :where{$where['key']}";
                $variables[":where{$where['key']}"] = $where['value'];
            }
            $count++;
        }
        $result = $this->database->query($this->sql, $variables);
        $array = [];
        foreach($result as $row) {
            array_push($array, $row);
        }
        return $array;
    }




}