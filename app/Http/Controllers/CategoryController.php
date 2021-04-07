<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::all();
        $data = [
            'status' => 200,
            'msg'    => "Show All Category Success",
            'data'   => $category
        ];
        return response()->json($data, Response::HTTP_OK);
    //    return response()->json("ini adalah func index class categoryController");
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
            'category' => 'required|unique:categories',
            'desc' => 'required'
        ]);
        $category = Category::create($request->all());
        $data = [
            'status' => 200,
            'msg'    => "Input Category Success",
            'data'   => $category
        ];
        return response()->json($data, Response::HTTP_OK);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::where('id_category', $id)->get();
        $data = [
            'status' => 200,
            'msg'    => "Show Detail Success",
            'data'   => $category
        ];
        return response()->json($data, Response::HTTP_OK);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'category' => 'required|unique:categories',
            'desc' => 'required'
        ]);
        Category::where('id_category', $id)->update($request->all());
        $data = [
            'status' => 200,
            'msg'    => "Update Category Success"
        ];
        return response()->json($data, Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::where('id_category', $id)->delete();
        $data = [
            'status' => 200,
            'msg'    => "Delete Category Success"
        ];
        return response()->json($data, Response::HTTP_OK);
    }
}
