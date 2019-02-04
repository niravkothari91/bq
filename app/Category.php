<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Category extends Model
{
    protected $guarded = [];

    protected $table = 'category';

    public function subcategories() {
        return $this->hasMany(Subcategory::class, 'parent_id', 'id');
    }
}
