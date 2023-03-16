<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\MinorSelected as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;

class MinorSelected extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    /*
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'minorselected';
    public $timestamps = false;
    
    protected $fillable = [
        'ID',
        'MinorID'
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