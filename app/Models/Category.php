<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'categories';

    /**
     * Fillable attributes
     * @var array
     */
    protected $fillable = [
		  'name'
    ];
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function products()
    {
        return $this->belongsToMany(Product::class, 'products_to_categories');
    }

    public function addRow($data)
    {
      return $this->fill($data)->push();
    }

    public function updateRow($data)
    {
      return $this->update($data);
    }
}
