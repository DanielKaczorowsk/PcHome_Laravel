<?php
namespace App\scripts\zlecenia;
use App\scripts\zlecenia\controller\ZleceniaController as Controller;
        class Zlecenia 
        {
            public function __construct($option)
            {
                $this->controller = new Controller($option);
            }
            public function MojeZlecenia()
            {
               $this->controller = $this->controller->setoperation('MojeZlecenia');
               return $this->controller;
            }
            public function WszystkieZlecenia()
            {
               $this->controller = $this->controller->setoperation('WszystkieZlecenia');
               return $this->controller;
            }
            public function MojeNaprawy()
            {
               $this->controller = $this->controller->setoperation('MojeNaprawy');
               return $this->controller;
            }
        }
?>
