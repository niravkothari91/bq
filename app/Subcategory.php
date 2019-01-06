<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    protected $table = 'subcategory';

    public function scopeByParentId($query, $parentId) {
        return $query->where('parent_id', $parentId);
    }
}
