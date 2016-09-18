<?php 
namespace App\Prototypes\Oop;

use App\Prototypes\Oop\IAcmePrototype;

class Marketing extends IAcmePrototype
{
    const UNIT = "Marketing";
    private $sales = "sales";
    private $promotion = "promotion";
    private $strategic = "strategic planning";

    public function setDept($orgCode)
    {
        switch($orgCode)
        {
            case 101:
            $this->dept = $this->sales;
            break;

            case 102:
            $this->dept = $this->promotion;
            break;

            case 103:
            $this->dept = $this->strategic;
            break;

            default:
            $this->dept = "unrecognized marketing";
        }
    }

    public function getDept()
    {
        return $this->dept;
    }

    function __clone(){}
}
?>