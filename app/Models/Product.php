<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'products';

    /**
     * Fillable attributes
     * @var array
     */
    protected $fillable = [
        'name', 'description'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'products_to_categories');
    }
    /**
     * @param Int $categoryId
     * @param Int $limit
     * @param Int $offset
     * @return Array of Product
     */
    public function getProductsByCategory($categoryId, $limit, $offset)
    {
        return Product::whereHas('categories', function ($query) use($categoryId, $limit, $offset) {
            $query->where('id', $categoryId);
        })->limit($limit)->offset($offset)->get();  
    }

    public function addRow($data)
    {
        $product = new Product();
        $product->name = $data['name'];
        $product->description = $data['description'];
        $product->save();

        $product->categories()->sync($data['categories'], false);
    }

    public function updateRow($data)
    {
        $this->update(['name' => $data['name'], 'description' => $data['description']]);
        $this->categories()->sync($data['categories']);   
    }
}
