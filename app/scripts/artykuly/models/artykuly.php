<?php

namespace App\scripts\artykuly\models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use App\scripts\artykuly\models\aktualnosci;

class artykuly extends Model
{
    use HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
	public $table = 'artykuly';
    protected $fillable = [
        'id',
        'tytul',
        'opis',
        'img',
    ];
    public function aktualnosci()
    {
        return $this->hasMany(aktualnosci::class,'id');
    }
}
