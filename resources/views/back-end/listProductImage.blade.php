@extends('back-end.layout.master')
@section('form-table')

<div class="table-agile-info">
    <div class="add-menu-btn">
        <h2>List Product Image:{{App\Categorie::find(App\Product::find($db->id)->category->id)->parent->name}} - {{App\Product::find($db->id)->category->name}} - {{$db->code}}</h2>
        <a href="{{route('product.list')}}">List Product</a>
    </div>
    
    <form >
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
            <div>
                <label for="exampleFormControlInput1">List Image</label>
            </div>
            
            <div class="ajax-img">
                @if($productImg)
                    @foreach($productImg as $item)
                    <div>
                        <img style="width: 150px;border:1px solid #555" src="{{asset('uploads/image_product/'.$item->image)}}" />
                        <a href="{{route('productImage.delete',$item->id)}}" data="{{$item->id}}" url="">
                            <i class="fas fa-trash-alt"></i>
                        </a>
                    </div>
                    @endforeach
                @endif
                
            </div>
            
        </div>
         
       
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
