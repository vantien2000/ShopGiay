<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BrandProductController extends Controller
{
    public function index(){
        return View('admin.BrandProduct.index');
    }
}
