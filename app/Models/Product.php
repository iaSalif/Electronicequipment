<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    use HasFactory;

    /**
     * Les attributs assignables en masse.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'slug',
        'short_description',
        'description',
        'regular_price',
        'sale_price',
        'SKU',
        'stock_status',
        'featured',
        'quantity',
        'image',
        'images',
        'category_id',
        'brand_id',
    ];

    /**
     * Les relations avec la table des catégories.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Les relations avec la table des marques.
     */
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    /**
     * Cast des attributs.
     */
    protected $casts = [
        'featured' => 'boolean',
        'regular_price' => 'decimal:2',
        'sale_price' => 'decimal:2',
        'images' => 'array',
    ];

    /**
     * Accesseur pour stock_status.
     */
    public function getStockStatusAttribute($value)
    {
        return $value === 'instock' ? 'En stock' : 'Rupture de stock';
    }
}

