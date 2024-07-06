<?php
    namespace App\scripts\cennik\obj;

        class Objekt_cennik
        {
           private $usterka,$urzadzenie,$cena;
            public function set_usterka($usterka)
            {
                $this->usterka = $usterka;
            }
            public function get_usterka()
            {
                return $this->usterka;
            }
            public function set_urzadzenie($urzadzenie)
            {
                $this->urzadzenie = $urzadzenie;
            }
            public function get_urzadzenie()
            {
                return $this->urzadzenie;
            }
            public function set_cena($cena)
            {
                $this->cena = $cena;
            }
            public function get_cena()
            {
                return $this->cena;
            }

        }
?>
