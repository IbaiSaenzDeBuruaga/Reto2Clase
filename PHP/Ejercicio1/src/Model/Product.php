<?php
namespace Egibide\Shop\Model;

class Product
{
    private $name;

    public function __construct($name){
        $this->name = $name;
    }
    public function getName(){
        return $this->name;
    }
}


?>