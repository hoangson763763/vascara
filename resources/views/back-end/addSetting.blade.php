@extends('back-end.layout.master')
@section('form-table')

<div class="table-agile-info">
    <div class="add-menu-btn">
        <h2>Add Product</h2>
        <a href="{{route('product.list')}}">Product List</a>
    </div>
    
    <form action="{{route('setting.add')}}" method="post" enctype="multipart/form-data" method="post">
    	{!! csrf_field() !!}
        <div class="form-group">
            <label for="hotline">Hotline</label>
            <input type="text" class="form-control" id="hotline" name="hotline" >
            
            @error('hotline')
                <p style="margin-top: 10px;color:red">{{$errors->first('hotline')}}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="ship">Giá vận chuyển</label>
            <input type="text" class="form-control" id="ship" name="ship" >
            
            @error('ship')
                <p style="margin-top: 10px;color:red">{{$errors->first('ship')}}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="domain">Tên miền</label>
            <input type="text" class="form-control" id="domain" name="domain" >
            
            @error('domain')
                <p style="margin-top: 10px;color:red">{{$errors->first('domain')}}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="company_name">Tên công ty</label>
            <input type="text" class="form-control" id="company_name" name="company_name" >
            
            @error('company_name')
                <p style="margin-top: 10px;color:red">{{$errors->first('company_name')}}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="company_address">Địa chỉ công ty</label>
            <input type="text" class="form-control" id="company_address" name="company_address" >
            
            @error('company_address')
                <p style="margin-top: 10px;color:red">{{$errors->first('company_address')}}</p>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="footer">Footer</label>
            <input type="number" class="form-control" id="footer" name="footer" >
            
            @error('footer')
                <p style="margin-top: 10px;color:red">{{$errors->first('footer')}}</p>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="logo">Logo</label>
            <input type="file" class="form-control" id="logo" name="logo" >
            
            @error('logo')
                <p style="margin-top: 10px;color:red">{{$errors->first('logo')}}</p>
            @enderror
        </div>
        
        <button type="submit" class="btn btn-primary">Submit</button>	
    </form> 
</div>
@endsection
@if(Session::has('message'))
    
@endif
