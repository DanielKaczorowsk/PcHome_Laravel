<?php
namespace App\scripts\zlecenia\methods;
use App\scripts\zlecenia\models\Zlecenia;
use App\Models\User;

        class MojeNaprawy 
        {
            private $choose;
            public function __construct($choose)
            {
                if($choose ==='Get'){
                $this->Records = Zlecenie::with(['user' => function($query){
                    $query->select('name');     
                }])->where('user_client','=', Auth::user()->name)->get();
                }else if($choose ==='Pagination'){
                     $this->Records = Zlecenie::with(['user' => function($query){
                    $query->select('name');     
                }])->where('user_client','=', Auth::user()->name)->paginate(9);
                }
            }
        }
