@extends('back-end.layout.master')
@section('form-table')

<div class="table-agile-info">
    <div class="add-menu-btn">
        <h2>Add Parent Category</h2>
        <a href="{{route('parent.list')}}">Parent Category List</a>
    </div>
    <form action="{{route('parent.add')}}" method="post">
    	{!! csrf_field() !!}
        <div class="form-group">
            <label for="exampleFormControlInput1">Parent Category Name</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" name="name">
            @error('name')
				<p style="margin-top: 10px;color: red">{{$errors->first('name')}}</p>
			@enderror
        </div>

        <div class="form-group">
            <label for="exampleFormControlInput1">Code Parent Category</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" name="code">
            @error('code')
                <p style="margin-top: 10px;color: red">{{$errors->first('code')}}</p>
            @enderror
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
