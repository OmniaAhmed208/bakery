<?php

namespace App\Http\Controllers\Admin;

use App\Models\Menu;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\MenuStoreRequest;
use Storage;
use Illuminate\Validation\Rule;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::all();
        return view('admin.menus.index',[
            'menus' => $menus
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.menus.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MenuStoreRequest $request)
    {
        $image = $request->file('image')->store('public/menus');

        $menu = Menu::create([
            'name'=> $request->name,
            'image'=> $image,
            'description'=> $request->description,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'quantity_type' => $request->quantity_type,
            'time' => $request->time,
            'weight' => $request->weight,
            'temprature' => $request->temprature,
        ]);

        if($request->has('categories')){
            $menu->categories()->attach($request->categories);
        }

        return to_route('admin.menus.index')->with('success', 'Menu created successfully');
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
        $categories = Category::all();
        return view('admin.menus.edit', compact('menu', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Menu $menu)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'quantity_type' => 'required',
            'time' => 'required',
            'weight' => 'required',
            'temprature' => 'required',
            'description' => 'required'
        ]);
        $image =  $menu->image;

        if($request->hasFile('image')){
            Storage::delete($menu->image);
            $image = $request->file('image')->store('public/menus');
        }

        $menu->update([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $image,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'quantity_type' => $request->quantity_type,
            'weight' => $request->weight,
            'time' => $request->time,
            'temprature' => $request->temprature
        ]);

        if($request->has('categories')){
            $menu->categories()->sync($request->categories);
        }

        return to_route('admin.menus.index')->with('success', 'Menu updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        Storage::delete($menu->image);
        $menu->categories()->detach(); // because it many to many (relation between them)
        $menu->delete();

        return to_route('admin.menus.index')->with('danger', 'Menu deleted successfully');
    }
}
