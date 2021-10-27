<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\Size;

class Product_Size extends Model
{
    use HasFactory;

    protected $table = 'product_sizes';

    protected $fillable = [
        'ProductID','SizeID'
    ];

    public function products(){
        return $this->belongsTo(User::class, 'ProductID','ProductID');
    }

    public function sizes(){
        return $this->belongsTo(Size::class, 'SizeID','SizeID');
    }
}
