<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $table = 'shops';
    protected $fillable = [
        'name',
        'address',
        'time_open',
        'time_close',
        'user_id',
        'image'
    ];
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function product(){
        return $this->belongsTo(Product::class);
    }
    public function orders(){
        return $this->hasOne(Order::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
