<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';
    protected $fillable = [
        'name',
        'slug',
        'user_id'
    ];
    public function products()
    {
        return $this->hasMany(Product::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

