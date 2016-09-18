<?php 
namespace App\Models\DB;

use App\Models\DB\Product as Product;

abstract class Creator
{
    protected abstract function factoryMethod(Product $product);
    protected abstract function getAll(Product $product, $where);

    public function doFactory($productCall)
    {
        return($this->factoryMethod($productCall));
    }

    public function doAll($productCall, $where)
    {
        return($this->getAll($productCall, $where));
    }

    

}
?>