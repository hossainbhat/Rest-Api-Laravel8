@extends('layouts.layout')
@section("css_script")

@endsection
@section('content')
<input type="hidden" name="_method" value="delete"> 
<div class="container">
    <h2>Country List</h2>
    <a style="float: right;margin:10px 0px;" href="{{url('http://localhost:8000/api/countries/create')}}"><button class="btn btn-success btn-sm">Create</button></a>
    <table class="table" id="contries">
      
    </table>
  </div>
@endsection
@section('js_script')
<script>
    $(document).ready( function () {
    $('#contries').DataTable({
      'ajax':'http://localhost:8000/api/countries',
      'serverSide':true,
      'columns': [
        {'title':'Country Name','name':'name','data':'name'},
        {'title':'BN Name','name':'name','data':'bn_name'},
        {
            'title': 'Action', data: 'id',class: 'text-right w72', render: function (data, type, row, col) {
                let returnData = '';
                
                  returnData += '<a title="Edit" href="http://localhost:8000/api/countries/'+data+'/edit" class="btn btn-sm btn-primary text-white text-center">Edit</a> ';
                  returnData += '<a title="Delete" recoedid="'+data+'" class="btn btn-sm btn-danger text-white text-center deleteCountry">Delete</a>';
                
                return returnData;
            }
        },
            
        
        
      ]
 
   
    });
 
} );
$(document).on('click', '.deleteCountry', function () {

      var recoedid =$(this).attr('recoedid');
      // alert(recoedid);
      confirm("Are You Sure delete this !");
      $.ajax(
        {
            url: "countries/"+recoedid,
            dataType: "JSON",
            type: 'DELETE',
            data: {
                '_token': $('meta[name=csrf-token]').attr("recoedid"),
            },
            success: function ()
            {
              $(this).remove();
              location.reload();
            }
        });
    });

</script>

@endsection