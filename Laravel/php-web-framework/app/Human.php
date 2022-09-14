<?php
namespace App;
class Human{
    public $name;
    public function setName($name){
        $this->name = $name;
    }
    public function getName(){
        return $this->name;
    }
}

