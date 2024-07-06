<?php
    namespace App\scripts\cennik\methods;

    use App\resources\CennikResource as cennik_resources;
    use App\Models\cennik;

        class search_cennik implements cennik_interface
        {
            private $cennik,$cena,$urzadzenie,$usterka;
            public function __construct(Objekt_cennik $cennik)
            {
                if(isset($cennik->get_cena())
                {
                    $this->cena = $cennik->get_cena();
                }
                if(isset($cennik->get_urzadzenie())
                {
                    $this->urzadzenie = $cennik->get_urzadzenie();
                }
                if(isset($cennik->get_usterka())
                {
                    $this->usterka = $cennik->get_usterka();
                }
            }
            public function get_data()
            {
                $this->cennik = cennik::query();
                if(isset($this->cena))
                {
                    $this->cennik = $this->cennik->where('cena','=',$this->cena);
                }
                if(isset($this->urzadzenie))
                {
                    $this->cennik = $this->cennik->where('urzadzenie','=',$this->urzadzenie);
                }
                if(isset($this->usterka))
                {
                    $this->cennik  = $this->cennik->where('usluga','=',$this->usterka);
                }
		        return $this->cennik;
            }
        }
?>
