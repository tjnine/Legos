<?php 
namespace App\Controllers;

use App\Prototypes\Minimal\MaleProto;
use App\Prototypes\Minimal\FemaleProto;
use App\Prototypes\Minimal\IPrototype;

class ProtoClient
{
    //direct instantiation
    private $fly1,
            $fly2;

    //for cloning
    private $c1Fly,
            $c2Fly,
            $updatedCloneFly;

    public function __construct()
    {
        //instantiate
        $this->fly1 = new MaleProto;
        $this->fly2 = new FemaleProto;

        //clone
        $this->c1Fly = clone $this->fly1; //male
        $this->c2Fly = clone $this->fly2; //female
        $this->updatedCloneFly = $this->fly2; //female mutation

        //update clones
        $this->c1Fly->mated = "true";
        $this->c2Fly->fecundity = "186";

        //change the mutated female info
        $this->updatedCloneFly->eyeColor = "purple";
        $this->updatedCloneFly->wingBeat = "220";
        $this->updatedCloneFly->unitEyes = "720";
        $this->updatedCloneFly->fecundity = "92";

        //send the clones to showFly() method
        $this->showFly($this->c1Fly);
        $this->showFly($this->c2Fly);
        $this->showFly($this->updatedCloneFly);
    }

    private function showFly(IPrototype $fly)
    {
        echo "<p>Eye Color: " . $fly->eyeColor . '<br>';
        echo "Wing Beats/ second: " . $fly->wingBeat . '<br>';
        echo "Eye Units: " . $fly->unitEyes . '<br>';
        $genderNow = $fly::gender;
        echo "Gender: " . $genderNow . '<br>';

        if($genderNow == "FEMALE"){
            echo "Number of Eggs: " . $fly->fecundity . '</p>';
        }else {
            echo "Mated: " . $fly->mated . '</p>';
        }
    }

}


?>