<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class Product extends Model
{
    use SearchableTrait;

    protected $table = 'products';
    protected $fillable = ['quantity'];

    /**
     * Searchable rules.
     *
     * @var array
     */
    protected $searchable = [
        /**
         * Columns and their priority in search results.
         * Columns with higher values are more important.
         * Columns with equal values have equal importance.
         *
         * @var array
         */
        'columns' => [
            'products.name' => 10,
            'products.details' => 5,
            'products.description' => 2,
        ],
    ];

    public function prodCategories()
    {
        //return $this->belongsToMany('App\Productcategory', 'productcategory_product', 'product_id', 'product_category_id');
        return $this->hasOne('App\Productcategory', 'id', 'productcategory_id');
    }

    public function productcategoryId() {
        return $this->belongsTo(Productcategory::class, 'productcategory_id', 'id');
    }

    public function scopeBySubCategoryIds($query, $subCategoryIds) {
        if(is_array($subCategoryIds)) {
            return $query->whereIn('parent_id', $subCategoryIds);
        } else {
            return $query->where('parent_id', $subCategoryIds);
        }
    }

    public function presentPrice()
    {
        /*return money_format('₹%i', $this->price / 100);*/
        return @money_format('₹%.0n', $this->price);
    }

    public function scopeMightAlsoLike($query)
    {
        return $query->inRandomOrder()->take(4);
    }

    /**
     * Get the indexable data array for the model.
     *
     * @return array
     */
    public function toSearchableArray()
    {
        $array = $this->toArray();

        $extraFields = [
            'prodcategories' => $this->prodCategories->pluck('name')->toArray(),
        ];

        return array_merge($array, $extraFields);
    }
}
