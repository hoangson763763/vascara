@extends('back-end.layout.master')
@section('form-table')

<div class="table-agile-info">
    <div class="add-menu-btn">
        <h2>Add Category</h2>
        <a href="{{route('cate.list')}}">Category List</a>
    </div>
    <form action="{{route('cate.add')}}" method="post">
    	{!! csrf_field() !!}
        <div class="form-group">
            <label for="exampleFormControlInput1">Category Name</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" name="name">
            @error('name')
				<p style="margin-top: 10px">{{$errors->first('name')}}</p>
			@enderror
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Category Code</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" name="code">
            @error('code')
                <p style="margin-top: 10px">{{$errors->first('code')}}</p>
            @enderror
        </div>
        <div class="form-group">
                <label for="exampleFormControlInput1">Parent Category</label>
                <select name="parent" class="form-control" id="exampleFormControlSelect2">
                    @foreach($db as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                </select>
                @error('cate')
                    <p style="margin-top: 10px;color:red">{{$errors->first('cate')}}</p>
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
