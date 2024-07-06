<?php
namespace App\scripts\zlecenia\methods;

use App\scripts\zlecenia\models\zlecenia;

        class WszystkieZlecenia 
        {
            private $Records;
            public function __construct($choose)
            {
                /*if($choose ==='Get'){
                    $this->Records = Zlecenia::with(['user_client' => function($query){
                        $query->select('name');
                    }])->get();
                }else if($choose ==='Pagination'){
                         $this->Records = Zlecenia::with(['user_client'])->paginate(2);
                }*/
                 
                 return zlecenia::all();
            }
        }
