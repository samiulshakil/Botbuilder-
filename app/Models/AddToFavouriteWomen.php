<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Womencategory;
use App\Models\WomenSubCategory;

class AddToFavouriteWomen extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'women_category_id',
        'women_sub_category_id',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function womenCategory(){
        return $this->belongsTo(Womencategory::class, 'women_category_id', 'id');
    }

    public function womenSubCategory(){
        return $this->belongsTo(WomenSubCategory::class, 'women_sub_category_id', 'id');
    }
}
