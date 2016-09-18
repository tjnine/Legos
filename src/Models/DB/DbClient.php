<?php 
namespace App\Models\DB;

use App\Models\DB\DbFactory;
use App\Models\DB\DbProduct;

class DbClient
{
    private $dbc;

    public function __construct()
    {
        $this->dbc = new DbFactory;
        return($this->dbc->doFactory(new DbProduct));
    }

    public function getIt($where)
    {
        $this->dbc = new  DbFactory;
        return($this->dbc->doAll(new DbProduct, $where));
    }
}


?>