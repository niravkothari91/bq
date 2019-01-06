<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    protected $table = 'productcategory';

    public function scopeByParentId($query, $parentId) {
        return $query->where('parent_id', $parentId);
    }
}
