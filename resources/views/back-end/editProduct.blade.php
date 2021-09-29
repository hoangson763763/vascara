@extends('back-end.layout.master')
@section('form-table')

<div class="table-agile-info">
    <div class="add-menu-btn">
        <h2>Add Category</h2>
        <a href="{{route('product.list')}}">Product List</a>
    </div>
    
    <form action="{{route('product.edit',$db->slug)}}" method="post" enctype="multipart/form-data" method="post">
    	{!! csrf_field() !!}
        <div class="form-group">
            <label for="exampleFormControlInput1">Product Name</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" name="name" value="{{$db ? $db->name : ''}}">
            
            @error('name')
                <p style="margin-top: 10px;color:red">{{$errors->first('name')}}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Product Code</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" name="code" value="{{$db ? $db->code : ''}}">
            
            @error('code')
                <p style="margin-top: 10px;color:red">{{$errors->first('code')}}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Title</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" name="title" value="{{$db ? $db->title : ''}}">
            
            @error('title')
                <p style="margin-top: 10px;color:red">{{$errors->first('title')}}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Color</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" name="color" value="{{$db ? $db->color : ''}}">
            
            @error('color')
                <p style="margin-top: 10px;color:red">{{$errors->first('color')}}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Size</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" name="size" value="{{$db ? $db->size : ''}}">
            
            @error('size')
                <p style="margin-top: 10px;color:red">{{$errors->first('size')}}</p>
            @enderror
        </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Category</label>
                <select name="cate" class="form-control" id="exampleFormControlSelect2">

                    @foreach($category as $item)
                        @if($db->category_id == $item->id)
                            <option selected="selected" value="{{$item->id}}">{{$item->name}}</option>
                        @else
                            <option value="{{$item->id}}">{{$item->name}}</option>
                        @endif

                    @endforeach
                </select>
                @error('cate')
                    <p style="margin-top: 10px;color:red">{{$errors->first('cate')}}</p>
                @enderror
            </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Price</label>
            <input type="number" class="form-control" id="exampleFormControlInput1" name="price" value="{{$db ? $db->price : ''}}">
            
            @error('price')
                <p style="margin-top: 10px;color:red">{{$errors->first('price')}}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Quantity</label>
            <input type="number" class="form-control" id="exampleFormControlInput1" name="quantity" value="{{$db ? $db->quantity : ''}}">
            
            @error('quantity')
                <p style="margin-top: 10px;color:red">{{$errors->first('quantity')}}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Discount</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" name="discount" value="{{$db ? $db->discount : ''}}">
            
            @error('discount')
                <p style="margin-top: 10px;color:red">{{$errors->first('discount')}}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Feature Image</label>
            <div>
               <img style="width: 150px;border:1px solid #555" src="{{asset('uploads/'.$db->feature_image)}}" />  
            </div> 
            
            <input type="file" class="form-control" id="exampleFormControlInput1" name="feature_image" >
            <input type="hidden" name="feature_image_old" value="{{$db->feature_image}}">
            @error('feature_image')
                <p style="margin-top: 10px;color:red">{{$errors->first('feature_image')}}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="special_image">Special Image</label>
            <div>
               <img style="width: 150px;border:1px solid #555" src="{{asset('uploads/'.$db->special_image)}}" />  
            </div> 
            
            <input type="file" class="form-control" id="special_image" name="special_image" >
            <input type="hidden" name="special_image_old" value="{{$db->special_image}}">
            @error('special_image')
                <p style="margin-top: 10px;color:red">{{$errors->first('special_image')}}</p>
            @enderror
        </div>
         <div class="form-group">
            <label for="exampleFormControlInput1">Description</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="2" id="description" name="description">
                {{$db ? $db->description : ''}}
            </textarea>
            <script> CKEDITOR.replace('description'); </script>
            @error('description')
                <p style="margin-top: 10px;color:red">{{$errors->first('description')}}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Content</label>
            <textarea class="form-control" id="exampleFormControlTextarea1 content" rows="5" name="content">
                {{$db ? $db->content : ''}}
            </textarea>
            <script> CKEDITOR.replace('content'); </script>
            @error('content')
                <p style="margin-top: 10px;color:red">{{$errors->first('content')}}</p>
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
