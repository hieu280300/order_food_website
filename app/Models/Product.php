<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
        'name',
        'code',
        'slug',
        'description',
        'thumbnail',
        'content',
        'money',
        'quantity',
        'is_feature',
        'category_id',
        'status',
    ];
    public const PAGE_LIMIT = 10;
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

}
