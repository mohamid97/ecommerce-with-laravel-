<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    use HasFactory;
    public function client(){
        return $this->belongsTo(Client::class , 'client_id');
    }
    public function products()
    {
        return $this->belongsToMany(Product::class , 'product_order');
    }
}
