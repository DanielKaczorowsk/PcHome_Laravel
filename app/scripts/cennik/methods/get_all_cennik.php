<?php
    namespace App\scripts\cennik\methods;

    use App\resources\CennikResource as cennik_resources;
    use App\Models\cennik;

        class get_all_cennik implements cennik_interface
        {
            private $cennik;
            public function get_data()
            {
                $this->cennik = cennik_resources::collection(cennik::paginate(2));
		        return $this->cennik;
            }
        }
?>
