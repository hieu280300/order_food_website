<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;
    protected $table = 'shops';
    protected $fillable = [
        'name',
        'address',
        'time_open',
        'time_close',
        'user_id',
    ];
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function product(){
        return $this->belongsTo(Product::class);
    }
    public function order(){
        return $this->belongsTo(Order::class);
    }
    
}
