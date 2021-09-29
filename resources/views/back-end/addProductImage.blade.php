@extends('back-end.layout.master')
@section('form-table')

<div class="table-agile-info">
    <div class="add-menu-btn">
        <h2>Add List Image Product</h2>
        <a href="{{route('productImage.list',$db->slug)}}">List Product Image</a>
    </div>
    
    <form action="{{route('productImage.add',$db->slug)}}" method="post" enctype="multipart/form-data" method="post">
    	{!! csrf_field() !!}
        
        <div class="form-group">
            <label for="exampleFormControlInput1">Product Name</label>
            <input type="text" disabled="disable" class="form-control" id="exampleFormControlInput1" value="{{$db->name}}">
            
        </div>

        <div class="form-group">
            <label for="exampleFormControlInput1">Product Code</label>
            <input type="text" disabled="disable" class="form-control" id="exampleFormControlInput1" value="{{$db->code}}">
        </div>

        <div class="form-group">
            <label for="exampleFormControlInput1">Feature Image</label>
            <div>
               <img style="width: 150px;border:1px solid #555" src="{{asset('uploads/'.$db->feature_image)}}" />  
            </div>
            
            
        </div>
        
        <div class="form-group">
            <label for="exampleFormControlInput1">Image</label>
            <input type="file" class="form-control" id="exampleFormControlInput1" name="list_img[]" multiple>
        </div>
         
        <button type="submit" class="btn btn-primary">Submit</button>	
    </form> 
</div>
@endsection
@if(Session::has('message'))
<script type="text/javascript" src="{{asset('back-end/js/jquery-3.6.0.min.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function(){
        alert('{{Session::get('message')}}')
    })
                    
</script>
@endif
