<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use Validator;

class CountryController extends Controller
{
    public function index(Request $request){
        // return response()->json(Country::get(),200);
        if ($request->wantsJson()) {
            $country = new Country();
            $limit = 10;
            $offset = 0;
            $search = [];
            $where = [];
            $with = [];
            $join = [];
            $orderBy = [];

            if($request->input('length')){
                $limit = $request->input('length');
            }

            if ($request->input('order')[0]['column'] != 0) {
                $column_name = $request->input('columns')[$request->input('order')[0]['column']]['name']['column']['name'];
                $sort = $request->input('order')[0]['dir'];
                $orderBy[$column_name] = $sort;
            }

            if($request->input('start')){
                $offset = $request->input('start');
            }

            if($request->input('search') && $request->input('search')['value'] != ""){
                $search['name'] = $request->input('search')['value'];
            }

            if($request->input('where')){
                $where = $request->input('where');
            }

            $country = $country->getDataForDataTable($limit, $offset, $search, $where, $with, $join, $orderBy,  $request->all());
            return response()->json($country);
        }
        return view("country.countries");

    }

    public function create(){
        return view('country.country_add');
    }

    public function store(Request $request){
        $rulse =[
            "name" =>"required|min:3",
        ];
        $validator = Validator::make($request->all(), $rulse);
        if ($validator->fails()) {
            return response()->json($validator->errors(),400);
        }
        $country = Country::create($request->all());
        return redirect('http://localhost:8000/api/countries');
        return response()->json($country,201);
    }

    public function edit($id){
        $country = Country::find($id);
        return view('country.country_edit')->with(compact('country'));
    }

    public function update(Request $request,$id){
        $country = Country::find($id);
        if (is_null($country)) {
            return response()->json(["message"=>"Recode Not Found !"],404);
        }
        $country->update($request->all());
        return redirect('http://localhost:8000/api/countries');
        return response()->json($country,200);
       
    }

    public function destroy($id){
        $country = Country::find($id);
        if (is_null($country)) {
                return response()->json(["message"=>"Recode Not Found !"],404);
        }
      $country->delete();
    //   return redirect()->back();
      return response()->json(null,204);
    }
}
