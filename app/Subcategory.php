<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    protected $table = 'subcategory';

    public function productCategories() {
        return $this->hasMany(Productcategory::class, 'parent_id', 'id');
    }

    public function scopeByParentId($query, $parentId) {
        return $query->where('parent_id', $parentId);
    }

    public function scopeBySlug($query, $slug) {
        return $query->where('slug', $slug);
    }
}
