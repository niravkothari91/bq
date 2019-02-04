<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Productcategory extends Model
{
    protected $table = 'productcategory';

    public function subcategories() {
        return $this->hasMany(Subcategory::class, 'id', 'parent_id');
    }

    public function products()
    {
        //return $this->belongsToMany('App\Productcategory', 'productcategory_product', 'product_category_id', 'product_id');
        return $this->belongsToMany('App\Product');
    }

    public function scopeByParentId($query, $parentId) {
        return $query->where('parent_id', $parentId);
    }

    public function scopeBySlug($query, $slug) {
        return $query->where('slug', $slug);
    }
}
