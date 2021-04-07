<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menu = Menu::all();
        $data = [
            'status' => 200,
            'msg'    => "Show All Menu Success",
            'data'   => $menu
        ];
        return response()->json($data, Response::HTTP_OK);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'menu' => 'required|unique:menus',
            'id_category' => 'required|numeric',
            'img' => 'required|mimes:png,jpg|max:2048',
            'price' => 'required|numeric',
        ]);
        // Set File name
        $imgExt = $request->file('img')->getClientOriginalExtension();
        $imgName = uniqid('img_').'.'.$imgExt;
        // Build menu Data
        $menuData =  [
            'menu' => $request->input('menu'),
            'id_category' => $request->input('id_category'),
            'img' => $imgName,
            'price' => $request->input('price'),
        ];
        // Move Image files into folder upload with imgName as filename
        $request->file('img')->move('upload', $imgName);
        $insertedData = Menu::create($menuData);
        $data = [
            'status' => 200,
            'msg'    => "Input Menu Success",
            'data'   => $insertedData
        ];
        return response()->json($data, Response::HTTP_OK);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $menu = Menu::where('id_menu', $id)->get();
        $data = [
            'status' => 200,
            'msg'    => "Show Detail Menu",
            'data'   => $menu
        ];
        return response()->json($data, Response::HTTP_OK);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'menu' => 'required',
            'id_category' => 'required|numeric',
            'price' => 'required|numeric',
        ]);
        $menu = Menu::where('id_menu', $id)->update($request->all());
        $data = [
            'status' => 200,
            'msg'    => "Update Menu Success",
            'data'   => $menu
        ];
        return response()->json($data, Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Menu::where('id_menu', $id)->delete();
        $data = [
            'status' => 200,
            'msg'    => "Delete Menu Success"
        ];
        return response()->json($data, Response::HTTP_OK);
    }
}
