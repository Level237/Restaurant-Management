<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index(){

        $categories=Category::all();
        return view('Categories.index',compact('categories'));

    }
    public function show(Category $category){

        return view('Categories.show',compact('category'));
    }
}
