<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Product extends Model implements TranslatableContract
{
    use HasFactory;
    use Translatable;
    public $translatedAttributes = ['name', 'des'];
    protected $fillable = ['category_id' , 'image' , 'purchasePrice' , 'stockNumber'];

    public function category(){
        return $this->belongsTo(Category::class , 'category_id');
    }
        
}
