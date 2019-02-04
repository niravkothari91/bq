<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductProductcategory extends Model
{
    protected $table = 'product_productcategory';

    protected $fillable = ['product_id', 'product_category_id'];

    public function scopeByProductCategoryId($query, $productCategoryId) {
        if(is_array($productCategoryId)) {
            return $query->whereIn('productcategory_id', $productCategoryId);
        } else {
            return $query->where('productcategory_id', $productCategoryId);
        }
    }
}
