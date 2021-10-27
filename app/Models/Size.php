<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product_Size;

class Size extends Model
{
    use HasFactory;

    protected $table = 'sizes';
    protected $fillable = ['SizeID','Number'];

    
}
