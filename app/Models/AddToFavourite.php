<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Mancategory;
use App\Models\ManSubCategory;

class AddToFavourite extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'category_id',
        'sub_category_id',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function category(){
        return $this->belongsTo(Mancategory::class, 'category_id', 'id');
    }

    public function subCategory(){
        return $this->belongsTo(ManSubCategory::class, 'sub_category_id', 'id');
    }
}
