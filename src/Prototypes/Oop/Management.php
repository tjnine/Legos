<?php 
namespace App\Prototypes\Oop;

use App\Prototypes\Oop\IAcmePrototype;

class Management extends IAcmePrototype
{
    const UNIT = "Management";
    private $research = "research";
    private $plan = "planning";
    private $operations = "operations";

    public function setDept($orgCode)
    {
        switch($orgCode)
        {
            case 201:
            $this->dept = $this->research;
            break;

            case 202:
            $this->dept = $this->plan;
            break;

            case 203:
            $this->dept = $this->operations;
            break;
        }
    }

    public function getDept()
    {
        return $this->dept;
    }

    function __clone(){}
}

?>