<?php 
namespace App\Prototypes\Oop;

abstract class IAcmePrototype
{
    protected $name,
              $id,
              $employeePic,
              $dept;

    //dept
    abstract function setDept($orgCode);
    abstract function getDept();

    //name
    public function setName($empName)
    {
        $this->name = $empName;
    }

    public function getName()
    {
        return $this->name;
    }

    //id
    public function setId($empId)
    {
        $this->id = $empId;
    }

    public function getId()
    {
        return $this->id;
    }

    //employeePic
    public function setPic($empPic)
    {
        $this->employeePic = $empPic;
    }

    public function getPic()
    {
        return $this->employeePic;
    }

    abstract function __clone();

}

?>