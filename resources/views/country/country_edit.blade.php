@extends('layouts.layout')
@section("css_script")

@endsection
@section('content')
<div class="container">
    <h2>Add Country</h2>
    <form action="{{url('http://localhost:8000/api/countries/'.$country->id)}}" method="post">
        @csrf 
        <input type="hidden" name="_method" value="PUT"> 
      <div class="form-group">
        <label for="text">Country Name:</label>
        <input type="text" class="form-control" id="name" value="{{$country->name}}" name="name">
      </div>
      <div class="form-group">
        <label for="pwd">BN Name:</label>
        <input type="text" class="form-control" id="bn_name" value="{{$country->bn_name}}" name="bn_name">
      </div>
      <button type="submit" class="btn btn-primary">Update</button>
    </form>
  </div>
@endsection
@section('js_script')

@endsection