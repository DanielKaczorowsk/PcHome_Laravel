<?php

namespace App\scripts\artykuly;

use App\scripts\artykuly\controller\ArtykulyController;

    class Aktualnosci
    {
       private $aktualnosci;
       public function  __construct()
        {
            $this->aktualnosci = new ArtykulyController();
        }
        public function GetAllArtykuly()
        {
            return $this->aktualnosci->GetAllArtykuly();
        }
        public function GetAllArtykulyPagination($paginate)
        {
            return $this->aktualnosci->GetAllArtykulyPagination($paginate);
        }
        public function GetArtykuly($question,$table)
        {
            return $this->aktualnosci->GetArtykuly($question,$table);
        }
        public function CreateArtykul($tytul,$opis,$img)
		{
			return $this->aktualnosci->CreateArtykul($tytul,$opis,$img);
		}
        public function getId($id)
        {
            return $this->aktualnosci->getId($id);
        }
    }
?>
