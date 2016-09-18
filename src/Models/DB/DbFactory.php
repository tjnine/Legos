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
    protected function getAll(Product $product, $where)
    {
        //Instance of DbProduct so we can call getAll()
         $this->dbc = $product;
         return($this->dbc->selectAll($where));
    }

}