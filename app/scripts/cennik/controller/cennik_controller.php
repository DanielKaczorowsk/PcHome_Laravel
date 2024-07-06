<?php
    namespace App\scripts\cennik\controller;

    use App\scripts\cennik\contex\contex;
    use App\scripts\cennik\obj\Objekt_cennik as Objekt;
    use App\scripts\cennik\methods;

        class cennik_controller
        {
            public function cennik_search(array $dane)
            {
                $objekt = new Objekt;
                $objekt->get_cena($dane[1]);
                $objekt->get_urzadzenie($dane[2]);
                $objekt->get_usterka($dane[3]);
                $contex = new contex;
                $cennik = new methods\search_cennik($objekt);
                $contex->set_method($cennik);
                return $contex;
            }
            public function get_all_cennik()
            {
                $contex = new contex;
                $cennik = new methods\get_all_cennik;
                $contex = $contex->set_method($cennik);
                return $contex;
            }
        }
?>
