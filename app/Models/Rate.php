<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    use HasFactory;
    protected $table = "rates";
    protected $primaryKey = 'id';
    protected $fillable = [
        'user_id','product_id','point'
    ];
    public $timestamps = false;
}
