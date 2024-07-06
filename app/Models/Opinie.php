<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use App\Models\User;

class Opinie extends Model
{
    use HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
	public $table = 'Opinie';
    protected $fillable = [
        'id',
        'tytul',
        'opis',
        'stars',
    ];
    public function User()
    {
        return $this->hasMany(User::class,'id');
    }
}
