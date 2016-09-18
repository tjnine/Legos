<?php 
namespace App\Prototypes\Oop;

use App\Prototypes\Oop\Marketing;
use App\Prototypes\Oop\Management;
use App\Prototypes\Oop\Engineering;
use App\Prototypes\Oop\IAcmePrototype;

class OopClient
{
    private $market,
            $manage,
            $engineer;


    public function __construct()
    {
        define("IMG", "./public/assets/img/");

        $this->makeProto();

        $cTess = clone $this->market;
        $this->setEmployee($cTess, "Tess Smitty", 101, "ts101-1234", "wtf.jpg");
        $this->showEmployee($cTess);

        $cRick = clone $this->manage;
        $this->setEmployee($cRick, "Rick Fish", 203, "rf203-5634", "eye.jpg");
        $this->showEmployee($cRick);

        $cOlivia = clone $this->engineer;
        $this->setEmployee($cOlivia, "Olivia Newshon", 302, "on301-1278", "planet.jpg");
        $this->showEmployee($cOlivia);

        $cJohn = clone $this->engineer;
        $this->setEmployee($cJohn, "John Graham", 302, "jg301-1278", "puppy.gif");
        $this->showEmployee($cJohn);
    }

    private function makeProto()
    {
        $this->market = new Marketing;
        $this->manage = new Management;
        $this->engineer = new Engineering;
    }

    private function showEmployee(IAcmePrototype $employeeNow)
    {
        $px = $employeeNow->getPic();
        echo "<div class='col-md-3'><img src='" . IMG  . $px . "' width='150' height='150' /><br>";
        echo $employeeNow->getName() . "<br>";
        echo $employeeNow->getDept() . ": " . $employeeNow::UNIT . "<br>";
         echo $employeeNow->getId() . "</div>";
    }

    private function setEmployee(IAcmePrototype $employeeNow, $nm, $dp, $id, $px)
    {
        $employeeNow->setName($nm);
        $employeeNow->setDept($dp);
        $employeeNow->setId($id);
        $employeeNow->setPic($px);
    }
}

?>