<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Mancategory;
use App\Models\AddToFavourite;

class ManSubCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'mancategory_id',
        'image',
        'hidden_image',
    ];

    public function manCategory(){
        return $this->belongsTo(Mancategory::class, 'mancategory_id');
    }

    public function favourite(){
        return $this->belongsTo(AddToFavourite::class, 'sub_category_id');
    }
}
