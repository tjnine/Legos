<?php 
namespace App\Models\DB;

use App\Models\DB\Creator;
use App\Models\DB\Product as Product;

class DbFactory extends Creator
{
    private $dbc;

    protected function factoryMethod(Product $product)
    {
        $this->dbc = $product;
        return($this->dbc->getConnection());
    }

    //getAll() abstract function
    protected function getAllMethod(Product $product, $where)
    {
        //Instance of DbProduct so we can call getAll()
         $this->dbc = $product;
         return($this->dbc->selectAll($where));
    }

    protected function queryMethod(Product $product, $sql, $params)
    {
        $this->dbc = $product;
        return($this->dbc->query($sql, $params));
    }

    protected function generateMethod(Product $product, $action, $table, $where)
    {
        $this->dbc = $product;
        return($this->dbc->generate($action, $table, $where));   
    }

    protected function insertMethod(Product $product, $table, $fields)
    {
        $this->dbc = $product;
        return($this->dbc->insert($table, $fields));
    }

    protected function updateMethod(Product $product, $table, $id, $fields)
    {
        $this->dbc = $product;
        return($this->dbc->update($table, $id, $fields));
    }

    protected function selectMethod(Product $product, $table, $where = [])
    {
        $this->dbc = $product;
        return($this->dbc->select($table, $where));
    }

    protected function deleteMethod(Product $product, $table, $where)
    {
        $this->dbc = $product;
        return($this->dbc->delete($table, $where));
    }

    protected function resultsMethod(Product $product)
    {
        $this->dbc = $product;
        return($this->dbc->results());
    }

    protected function firstResultMethod(Product $product)
    {
        $this->dbc = $product;
        return($this->dbc->first());
    }

    protected function countMethod(Product $product)
    {
        $this->dbc = $product;
        return($this->dbc->count());
    }

    protected function errorMethod(Product $product)
    {
        $this->dbc = $product;
        return($this->dbc->error());
    }

}