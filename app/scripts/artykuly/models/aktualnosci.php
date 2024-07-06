<?php

namespace App\scripts\artykuly\models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use App\scripts\artykuly\models\artykuly;

class aktualnosci extends Model
{
	public $table = 'aktualnosci';
    public function artykul()
    {
        return $this->belongTo(artykul::class,'aktualnosci_id');
    }
}
