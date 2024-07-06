<?php
    namespace App\scripts\cennik\contex;
    use App\scripts\cennik\methods;
        class contex
        {
            public function set_method(methods\cennik_interface $cennik)
            {
                $this->cennik = $cennik;
                return $this->cennik=$cennik->get_data();
            }
        }
