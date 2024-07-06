<?php
namespace App\scripts\zlecenia\controller;
use App\scripts\zlecenia\methods;
        class ZleceniaController 
        {
            private $operation,$methods;
            public function __construct($operation)
            {
                $this->operation = $operation;
            }
            public function setoperation($choice)
            {
              switch ($choice)
              {
                  case 'MojeZlecenia':
                   $this->methods = new methods\MojeZlecenia($this->operation);
                   return $this->methods;
                  case 'MojeNaprawy':
                   $this->methods = new methods\MojeNaprawy($this->operation);
                   return $this->methods;
                  case 'WszystkieZlecenia':
                   $this->methods = new methods\WszystkieZlecenia($this->operation);
                   return $this->methods;
              }
            }
        }
?>
