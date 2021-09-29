@extends('back-end.layout.master')
@section('form-table')

<div class="table-agile-info">
                    <div class="add-menu-btn">
                        <h2>Add Menu</h2>
                        <a href="{{route('menuList')}}">List Menu</a>
                    </div>
                    <form action="{{route('menuAdd')}}" method="post">
                    	{!! csrf_field() !!}
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Name Menu</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" name="name">
                            @error('name')
								<p style="margin-top: 10px">{{$errors->first('name')}}</p>
							@enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Slug</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" name="slug">
                            @error('slug')
								<p style="margin-top: 10px">{{$errors->first('slug')}}</p>
							@enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlInput1">Link Icon Font awesom</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" name="icon">
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>	
                    </form> 
                </div>
@endsection