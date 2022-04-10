<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\WomenSubCategory;

class Womencategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
    ];

    
    public function womensubCategories(){
        return $this->hasMany(WomenSubCategory::class, 'womencategory_id', 'id');
    }
}
