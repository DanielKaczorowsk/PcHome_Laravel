<?php
 
namespace App\scripts\artykuly\obj;

use App\scripts\artykuly\models\artykuly;
use App\scripts\artykuly\models\aktualnosci;
use App\scripts\artykuly\resources\ArtykulyResource as artykuly_resources;

	class Artykul
	{
		private $query,$artykuly;
			public function reset():void
			{
				$this->query = new \stdClass;
			}
            public function Id($id)
            {
                $this->reset();
                $this->query->Id = $id;
                return $this;
            }
              public function Paginate($paginate)
            {
                $this->reset();
                $this->query->Paginate = $paginate;
                return $this;
            }
			public function tytul($tytul)
			{
                $this->reset();
				$this->query->tytul = $tytul;
				return $this;
			}
			public function opis($opis)
			{
				$this->query->opis = $opis;
				return $this;
			}
			public function img($img)
			{
				$this->query->img = $img;
				return $this;
			}
            public function GetAllArtykulyPagination()
            {
                $this->artykuly = artykuly_resources::collection(artykuly::paginate($this->query->Paginate));
                return $this->artykuly;
            }
            public function GetAllArtykuly()
            {
                $this->artykuly = artykuly::all();
                return $this->artykuly;
            }
			public function get_artykul()
			{
				$this->artykuly = artykyly::orwhere('tytul',$this->query->tytul)
					 ->orwhere('opis',$this->query->opis)
					 ->orwhere('img',$this->query->img)
					 ->get();
                return $this;
			}
            public function get_id()
            {
                $this->artykuly = artykuly::with('aktualnosci')->where('id',$this->query->Id)
                ->get();
                return $this->artykuly;
            }
			public function save_artykul()
			{
				$this->artykuly::firstOrNew([
				    'tytul' =>	$this->query->tytul,
				    'opis'	=>	$this->query->opis,
				    'img'	=>	$this->query->img
				]);
				$this->artykuly->save();
                return 'Save to records';
			}
	}
?>
