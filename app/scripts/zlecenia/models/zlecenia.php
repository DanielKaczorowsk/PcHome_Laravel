<?php

namespace App\scripts\zlecenia\models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use App\Models\User;

class zlecenia extends Model
{
    use HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
	public $table = 'zlecenia';
    protected $fillable = [
        'usluga',
        'urzadzenie',
        'cena',
    ];
    public function user_client()
    {
        
        return $this->belongsTo(User::class,'user_client');
    }
}
