<?php

namespace App\Http\Controllers\Address;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Address;
use Validator;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return response()->json(Address::get(),200);
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
        $rulse =[
         "building_name" =>"required|min:3",
         "street_name"  =>"required|min:2|max:2",
     ];
     $validator = Validator::make($request->all(), $rulse);
     if ($validator->fails()) {
         return response()->json($validator->errors(),400);
     }
     $address = Address::create($request->all());
     return response()->json($address,201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $address = Address::find($id);
     if (is_null($address)) {
         return response()->json(["message"=>"Recode Not Found !"],404);
     }
     return response()->json($address,200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
     $address = Address::find($id);
     if (is_null($address)) {
         return response()->json(["message"=>"Recode Not Found !"],404);
     }
     $address->update($request->all());
     return response()->json($address,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $address = Address::find($id);
       if (is_null($address)) {
           return response()->json(["message"=>"Recode Not Found !"],404);
     }
     $address->delete();
     return response()->json(null,204);
    }
}
