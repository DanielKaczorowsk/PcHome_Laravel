<?php
namespace App\scripts\zlecenia\methods;
use App\scripts\zlecenia\models\Zlecenia;
use App\Models\User;

        class MojeZlecenia 
        {
            private $choose;
            public function __construct($choose)
            {
                if($choose ==='Get'){
                $this->Records = Zlecenie::with(['user' => function($query){
                    $query->select('name');     
                }])->where('user_personel','=', Auth::user()->name)->get();
                }else if($choose ==='Pagination'){
                     $this->Records = Zlecenie::with(['user' => function($query){
                    $query->select('name');
                }])->where('user_pesonel','=', Auth::user()->name)->paginate(9);
                }
            }
        }
