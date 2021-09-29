@extends('back-end.layout.master')
@section('form-table')

<div class="table-agile-info">
                    <div class="add-menu-btn">
                        <h2>Add Sub Menu</h2>
                        <a href="{{route('menuList')}}">List Menu</a>
                    </div>
                    <form action="{{route('menuAdd')}}" method="post">
                    	{!! csrf_field() !!}
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Name Sub Menu</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" name="name">
                            @error('name')
								<p style="margin-top: 10px">{{$errors->first('name')}}</p>
							@enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="exampleFormControlSelect2">Menu</label>
                            <select name="menu" class="form-control" id="exampleFormControlSelect2">
                            @if(isset($db))
                                <option value="">Chọn Menu</option>
                            @foreach($db as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                            @else
                                <option>Chưa có Menu nào</option>
                            @endif
                                
                            </select>
                        </div>

                        

                        <button type="submit" class="btn btn-primary">Submit</button>	
                    </form> 
                </div>
@endsection