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

    public function queryIt($sql, $params =[])
    {
        $this->dbc = new DbFactory;
        return($this->dbc->doQuery(new DbProduct, $sql, $params));
    }

    public function generateIt($action, $table, $where = [])
    {
        $this->dbc = new DbFactory;
        return($this->dbc->doGenerate(new DbProduct, $action, $table, $where));
    }

    public function insertIt($table, $fields = [])
    {
        $this->dbc = new DbFactory;
        return($this->dbc->doInsert(new DbProduct, $table, $fields));
    }

    public function updateIt($table, $id, $fields)
    {
        $this->dbc = new DbFactory;
        return($this->dbc->doUpdate(new DbProduct, $table, $id, $fields));
    }

    public function selectIt($table, $where)
    {
        $this->dbc = new DbFactory;
        return($this->dbc->doSelect(new DbProduct, $table, $where));
    }

    public function deleteIt($table, $where)
    {
        $this->dbc = new DbFactory;
        return($this->dbc->doDelete(new DbProduct, $table, $where));
    }

    public function results()
    {
        $this->dbc = new DbFactory;
        return($this->dbc->doResults(new DbProduct));
    }

    public function first()
    {
        $this->dbc = new DbFactory;
        return($this->dbc->doFirst(new DbProduct));
    }

    public function count()
    {
        $this->dbc = new DbFactory;
        return($this->dbc->doCount(new DbProduct));
    }

    public function error()
    {
        $this->dbc = new DbFactory;
        return($this->dbc->doError(new DbProduct));
    }

}


?>