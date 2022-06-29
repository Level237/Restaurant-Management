<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class WelcomeController extends Controller
{
    public function index(){
        $specials=Category::where('name','specials')->first();

        return view('welcome',compact('specials'));
    }
}
