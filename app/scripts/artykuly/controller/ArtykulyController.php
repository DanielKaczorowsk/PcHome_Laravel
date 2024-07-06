<?php
 
namespace App\scripts\artykuly\controller;

use Illuminate\Http\Request;
use App\scripts\artykuly\obj\Artykul;
use App\scripts\artykuly\resources\ArtykulyResource as artykuly_resources;
use App\scripts\artykuly\models\artykuly;


	class ArtykulyController
	{
		protected $artykul,$artykuly;
		public function GetArtykuly($question,$table)
		{
			$this->artykul = new Artykul;
			if($question == 'tytul')
			{
				$this->artykul->tytul($table)->get_artykul; 
			}
			else if($question == 'opis')
			{
				$this->artykul->opis($table)->get_artykul;
			}
			else if($question == 'img')
			{
				$this->artykul->img($table)->get_artykul;
			}
		}
        public function GetAllArtykulyPagination($paginate)
        {
            $this->artykul = new Artykul;
            $this->artykul = $this->artykul->Paginate($paginate)
            ->GetAllArtykulyPagination();
            return $this->artykul;
        }
        public function GetAllArtykuly()
        {
            $this->artykul = new Artykul;
            $this->artykul = $this->artykul->GetAllArtykuly();
            return $this->artykul;
        }
		public function CreateArtykul($tytul,$opis,$img)
		{
			$this->artykuly->tytul($tytul)->opis($opis)->img($img)->save_artykul();
		}
        public function getId($id)
        {
            $this->artykul = new Artykul;
            $this->artykul = $this->artykul->Id($id)
            ->get_id();
            return $this->artykul;
        }
	}
	?>
