<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\CareerRequires as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;

class CareerRequires extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    /*
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'careerrequires';
    public $timestamps = false;
    
    protected $fillable = [
        'CareerID',
        'SkillID'
    ];

    /*
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /*
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        //'email_verified_at' => 'datetime',
    ];
}