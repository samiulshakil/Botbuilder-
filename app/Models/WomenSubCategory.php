<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Womencategory;
use App\Models\AddToFavouriteWomen;

class WomenSubCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'womencategory_id',
        'image',
        'hidden_image',
    ];

    public function womenCategory(){
        return $this->belongsTo(Womencategory::class, 'womencategory_id');
    }

    public function womenFavourite(){
        return $this->belongsTo(AddToFavouriteWomen::class, 'women_sub_category_id');
    }
}
