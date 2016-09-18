<?php 
namespace App\Models\DB;

interface Product
{
    public function getConnection();
    public function selectAll($where);
    // public function query();
    // public function prepare();
    // public function execute();
    // public function resultSet();
}

?>