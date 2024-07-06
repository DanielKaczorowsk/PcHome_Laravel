<?php
    namespace App\scripts\cennik;

    use App\scripts\cennik\controller\cennik_controller as controller;

        class Cennik
        {
            private $controller;
            public function all_cennik()
            {
                $this->controller = new controller;
                $this->controller = $this->controller->get_all_cennik();
                return $this->controller;
            }
            public function search_cennik(array $dane)
            {
                $this->controller = new controller;
                $this->controller = $this->controller->search_cennik($dane);
                return $this->controller;
            }
        }
