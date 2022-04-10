<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ManSubCategory;

class Mancategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
    ];

    public function subCategories(){
        return $this->hasMany(ManSubCategory::class, 'mancategory_id', 'id');
    }
}
