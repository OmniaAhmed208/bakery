<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'price', 'quantity', 'quantity_type', 'description', 'image', 'weight', 'time', 'temprature'];

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'category_menu');
    }
}
