<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Category;
use App\Http\Requests\MenuRequest;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus=Menu::all();
        return view('admin.menus.index',compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
        return view('admin.menus.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MenuRequest $request)
    {
        $image=$request->file('image')->store('public/menus');

        $menu=Menu::create([
            'name'=>$request->name,
            'description'=>$request->description,
            'image'=>$image,
            'price'=>$request->price
        ]);

        if($request->has('categories')){
            $menu->categories()->attach($request->categories);
        }

        return to_route('admin.menus.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        $categories=Category::all();
        return view('admin.menus.edit',compact('menu','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        $request->validate([
            'name'=>'required',
            'description'=>'required',
            'name'=>'required',
        ]);
        $image=$category->image;
        if($request->hasFile('image')){
            Storage::delete($category->image);
            $image=$request->file('image')->store('public/categories');

        }
        $category->update([
            'name'=>$request->name,
            'description'=>$request->description,
            'image'=>$image
        ]);
        return to_route('admin.categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
