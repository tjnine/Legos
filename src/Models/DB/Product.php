<?php 
namespace App\Models\DB;

interface Product
{
    public function getConnection();
    public function selectAll($where);
    public function query($sql, $params = []);
    public function generate($action, $table, $where = []);
    public function insert($table, $fields = []);
    public function update($table, $id, $fields = []);
    public function delete($table, $where);
    public function select($table, $where);
    public function results();
    public function first();
    public function count();
    public function error();
}

?>