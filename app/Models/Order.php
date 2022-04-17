<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    public const STATUS = [
        0,
        1,
        2,
        3,
        4,
    ];

    protected $fillable = [
        'user_id',
        'status',
        'order_date',
        'comment',
        'shop_id'
    ];

    /**
     * one Order belongsTo one User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }
    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }

}
