<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Productcategory extends Model
{
    protected $table = 'productcategory';

    public function subcategories() {
        return $this->hasMany(Subcategory::class, 'id', 'parent_id');
    }

    //This is used by Voyager Admin to define relationship with the Subcategory Model
    public function parentId() {
        return $this->hasOne(Subcategory::class, 'id', 'parent_id');
    }

    public function scopeByParentId($query, $parentId) {
        return $query->where('parent_id', $parentId);
    }

    public function scopeBySlug($query, $slug) {
        return $query->where('slug', $slug);
    }
}
