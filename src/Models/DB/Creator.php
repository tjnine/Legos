<?php 
namespace App\Models\DB;

use App\Models\DB\Product as Product;

abstract class Creator
{
    protected abstract function factoryMethod(Product $product);
    protected abstract function getAllMethod(Product $product, $where);
    protected abstract function queryMethod(Product $product, $sql, $params);
    protected abstract function generateMethod(Product $product, $action, $table, $where);
    protected abstract function insertMethod(Product $product, $table, $fields);
    protected abstract function updateMethod(Product $product, $table, $id, $fields);
    protected abstract function selectMethod(Product $product, $table, $where = []);
    protected abstract function deleteMethod(Product $product, $table, $where);
    protected abstract function resultsMethod(Product $product);
    protected abstract function firstResultMethod(Product $product);
    protected abstract function countMethod(Product $product);
    protected abstract function errorMethod(Product $product);


    public function doFactory($productCall)
    {
        return($this->factoryMethod($productCall));
    }

    public function doAll($productCall, $where)
    {
        return($this->getAllMethod($productCall, $where));
    }

    public function doQuery($productCall, $sql, $params)
    {
        return($this->queryMethod($productCall, $sql, $params));
    }

    public function doGenerate($productCall, $action, $table, $where)
    {
        return($this->generateMethod($productCall, $action, $table, $where));
    }

    public function doInsert($productCall, $table, $fields)
    {
        return($this->insertMethod($productCall, $table, $fields));
    }

    public function doUpdate($productCall, $table, $id, $fields)
    {
        return($this->updateMethod($productCall, $table, $id, $fields));
    }

    public function doSelect($productCall, $table, $where = [])
    {
        return($this->selectMethod($productCall, $table, $where));
    }

    public function doDelete($productCall, $table, $where)
    {
        return($this->deleteMethod($productCall, $table, $where));
    }

    public function doResults($productCall)
    {
        return($this->resultsMethod($productCall));
    }

    public function doFirst($productCall)
    {
        return($this->firstResultMethod($productCall));
    }

    public function doCount($productCall)
    {
        return($this->countMethod($productCall));
    }

    public function doError($productCall)
    {
        return($this->errorMethod($productCall));
    }

}
?>