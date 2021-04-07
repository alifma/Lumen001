<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customer = Customer::all();
        $data = [
            'status' => 200,
            'msg'    => "Show All Customer Success",
            'data'   => $customer
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
            'name'    => 'required|unique:customers',
            'address' => 'required',
            'phone'   => 'required'
        ]);
        $customer = Customer::create($request->all());
        $data = [
            'status' => 200,
            'msg'    => "Insert Customer Success",
            'data'   => $customer
        ];
        return response()->json($data, Response::HTTP_OK);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Customer::where('id_customer', $id)->get();
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
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'    => 'required|unique:customers',
            'address' => 'required',
            'phone'   => 'required|numeric'
        ]);
        Customer::where('id_customer', $id)->update($request->all());
        $data = [
            'status' => 200,
            'msg'    => "Update Customer Success",
        ];
        return response()->json($data, Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Customer::where('id_customer', $id)->delete();
        $data = [
            'status' => 200,
            'msg'    => "Delete Customer Success",
        ];
        return response()->json($data, Response::HTTP_OK);
    }
}
