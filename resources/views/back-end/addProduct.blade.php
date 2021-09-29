@extends('back-end.layout.master')
@section('form-table')

<div class="table-agile-info">
    <div class="add-menu-btn">
        <h2>Add Product</h2>
        <a href="{{route('product.list')}}">Product List</a>
    </div>
    
    <form action="{{route('product.add')}}" method="post" enctype="multipart/form-data" method="post">
    	{!! csrf_field() !!}
        <div class="form-group">
            <label for="name">Product Name</label>
            <input type="text" class="form-control" id="name" name="name" >
            
            @error('name')
                <p style="margin-top: 10px;color:red">{{$errors->first('name')}}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="code">Product Code</label>
            <input type="text" class="form-control" id="code" name="code" >
            
            @error('code')
                <p style="margin-top: 10px;color:red">{{$errors->first('code')}}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" >
            
            @error('title')
                <p style="margin-top: 10px;color:red">{{$errors->first('title')}}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="color">Color</label>
            <input type="text" class="form-control" id="color" name="color" >
            
            @error('color')
                <p style="margin-top: 10px;color:red">{{$errors->first('color')}}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="size">Size</label>
            <input type="text" class="form-control" id="size" name="size" >
            
            @error('size')
                <p style="margin-top: 10px;color:red">{{$errors->first('size')}}</p>
            @enderror
        </div>
        @if(isset($db))
            <div class="form-group">
                <label for="cate">Category</label>
                <select name="cate" class="form-control" id="cate">
                    <option value="">Chọn danh mục cho sản phẩm</option>
                    @foreach($db as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                </select>
                @error('cate')
                    <p style="margin-top: 10px;color:red">{{$errors->first('cate')}}</p>
                @enderror
            </div>
        @else
            <div class="form-group">
                <label for="cate">Category</label>
                <select name="cate" class="form-control" id="cate">
                    <option value="">Chưa có danh mục sản phẩm nào</option>
                </select>
                @error('cate')
                    <p style="margin-top: 10px;color:red">{{$errors->first('cate')}}</p>
                @enderror
            </div>
        @endif
        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" class="form-control" id="price" name="price" >
            
            @error('price')
                <p style="margin-top: 10px;color:red">{{$errors->first('price')}}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="quantity">Quantity</label>
            <input type="number" class="form-control" id="quantity" name="quantity" >
            
            @error('quantity')
                <p style="margin-top: 10px;color:red">{{$errors->first('quantity')}}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="discount">Discount</label>
            <input type="text" class="form-control" id="discount" name="discount" >
            
            @error('discount')
                <p style="margin-top: 10px;color:red">{{$errors->first('discount')}}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="feature_image">Feature Image</label>
            <input type="file" class="form-control" id="feature_image" name="feature_image" >
            
            @error('feature_image')
                <p style="margin-top: 10px;color:red">{{$errors->first('feature_image')}}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="special_image">Special Image</label>
            <input type="file" class="form-control" id="special_image" name="special_image" >
            
            @error('special_image')
                <p style="margin-top: 10px;color:red">{{$errors->first('special_image')}}</p>
            @enderror
        </div>
         <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="2" id="description" name="description">

            </textarea>
            <script> CKEDITOR.replace('description'); </script>
            @error('description')
                <p style="margin-top: 10px;color:red">{{$errors->first('description')}}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="content">Content</label>
            <textarea class="form-control" id=" content" rows="10" name="content">

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
