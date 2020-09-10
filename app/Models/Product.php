<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public const ACTIVE_PRODUCT = 'active';
    public const INACTIVE_PRODUCT = 'inactive';

    protected $fillable=[
        'cat_id',
        'subcat_id',
        'brand_id',
        'name',
        'slug',
        'model',
        'buying_price',
        'selling_price',
        'special_price',
        'special_start',
        'special_end',
        'quantity',
        'thumbnail',
        'description',
        'long_description',
        'hot_deals',
        'f_products',
        'status',
    ];
}
