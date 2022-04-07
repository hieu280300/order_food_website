<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
class Admin extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $table = 'admins';
    public const STATUS = [
        0,
        1,
    ];
    protected $fillable = [
        'name',
        'email',
        'password',
        'status',
    ];
    protected $guarded = array();
   
}