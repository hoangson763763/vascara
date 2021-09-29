@extends('back-end.layout.master')
@section('form-table')

<div class="table-agile-info">
                    <div class="add-menu-btn">
                        <div>
                            <h2>Edit Menu</h2>
                        </div>
                        <div>
                            <a href="{{route('menuAdd')}}">Add Menu</a>
                            <a href="{{route('menuList')}}">List Menu</a>
                        </div>
                        
                    </div>
                    <div>
                        
                    </div>
                    @if(isset($db))
                    <form action="{{route('menuEdit',$db->id)}}" method="post">
                    	{!! csrf_field() !!}
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Name Menu</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" name="name" value="{{$db->name}}">
                            @error('name')
								<p style="margin-top: 10px">{{$errors->first('name')}}</p>
							@enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Slug</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" disabled="disable" value={{$db->slug}}>
                            
                        </div>
                        <div class="form-group">
                            
                            <input type="hidden" class="form-control" id="exampleFormControlInput1" name="id" value={{$db->id}}>
                            
                        </div class="form-group">
                        <div >
                            <label for="">Icon: {!! $db->icon !!}</label>
                            <input style='border: 1px solid #555;' type="text" class="form-control" id="exampleFormControlInput1" name="icon" value='{{$db->icon}}'>
                        </div>
                        <button style="margin-top:10px" type="submit" class="btn btn-primary">Submit</button>	
                    </form>
                    @endif 
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