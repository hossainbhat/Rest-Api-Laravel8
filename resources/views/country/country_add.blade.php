@extends('layouts.layout')
@section("css_script")

@endsection
@section('content')
<div class="container">
    <h2>Add Country</h2>
    <form action="{{url('http://localhost:8000/api/countries')}}" method="post">
      @csrf 
      <div class="form-group">
        <label for="text">Country Name:</label>
        <input type="text" class="form-control" id="name" placeholder="Enter Country Name" name="name">
      </div>
      <div class="form-group">
        <label for="pwd">BN Name:</label>
        <input type="text" class="form-control" id="bn_name" placeholder="Enter BN Name" name="bn_name">
      </div>
      <button type="submit" class="btn btn-primary">Create</button>
    </form>
  </div>
@endsection
@section('js_script')

@endsection