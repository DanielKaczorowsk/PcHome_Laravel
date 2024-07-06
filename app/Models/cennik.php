<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class cennik extends Model
{
    use HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
	public $table = 'cennik';
    protected $fillable = [
        'usluga',
        'urzadzenie',
        'cena',
    ];
}
