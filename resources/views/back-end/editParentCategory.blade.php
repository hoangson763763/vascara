@extends('back-end.layout.master')
@section('form-table')

<div class="table-agile-info">
    <div class="add-menu-btn">
        <h2>Add Category</h2>
        <a href="{{route('parent.list')}}">Parent Category List</a>
    </div>
    @if(isset($db))
    <form action="{{route('parent.edit',$db->slug)}}" method="post">
    	{!! csrf_field() !!}
        
        <div class="form-group">
            <label for="exampleFormControlInput1">Parent Category Name</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" name="name" value="{{$db->name}}">
            <input type="hidden" value="{{$db->id}}" name="id">
            @error('name')
                <p style="margin-top: 10px">{{$errors->first('name')}}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Paren Category Code</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" name="code" value="{{$db->code}}">
            @error('code')
                <p style="margin-top: 10px">{{$errors->first('code')}}</p>
            @enderror
        </div>
    @endif
        
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
