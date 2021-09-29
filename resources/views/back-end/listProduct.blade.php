@extends('back-end.layout.master')
@section('form-table')
    <div class="table-agile-info">
                    <div class="add-menu-btn">
                        <div>
                            <h2>List Product</h2>
                        </div>
                        <div>
                           <a href="{{route('product.add')}}">Add Product</a>

                        </div>
                        
                    </div>
                    <table id='table-main' class="display">
                        <thead>
                            <tr>
                                <th>Stt</th>
                                <th>Code</th>
                                <th>Name</th>
                                <th>Category Name</th>
                                <th>discount</th>
                                <th style="width: 125px;">Feature Image</th>
                                
                                <th style="width: 100px;">Add Image</th>
                                <th style="width: 100px;">Listh Product Image</th>
                                <th style="width: 100px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $stt = 1;
                        ?>
                        @if(isset($db))
                        @foreach($db as $item)
                            <tr>
                                <td><?php  echo $stt ?></td>
                                <td>{{$item->code}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{App\Product::find($item->id)->category->name}}</td>
                                <td>{{$item->discount}}</td>
                                <td>
                                    <img style="width: 100px" src="{{asset('uploads/'.$item->feature_image)}}" alt="">
                                </td>
                                
                                <td>
                                    <a href="{{route('productImage.add',$item->slug)}}" style="padding: 5px 10px;border-radius: 4px;border: 1px solid #333;background: green;color: #fff;" >Add Image</a>
                                </td>
                                <td>
                                    <a href="{{route('productImage.list',$item->slug)}}" style="padding: 5px 10px;border-radius: 4px;border: 1px solid #333;background: green;color: #fff;" >List Product Image</a>
                                </td>
                                <td>
                                    <a href="{{route('product.edit',$item->slug)}}" style="padding: 5px 10px;background: yellow;border: 1px solid #333;border-radius: 4px;color: #000;">Edit</a> 
                                    <a href="{{route('product.delete',$item->slug)}}" style="padding: 5px 10px;border-radius: 4px;border: 1px solid #333;background: red;color: #fff;" onclick="return confirm('Bạn chắc chắn muốn xóa dữ liệu này?')">Delete</a>
                                    
                                </td>
                            </tr>
                            <?php $stt++ ?>
                        @endforeach
                        @endif    
                        </tbody>
                    </table>
                </div>
@endsection
@if(Session::has('message'))
<script type="text/javascript" src="{{asset('back-end/js/jquery-3.6.0.min.js')}}"></script>
<!-- <script type="text/javascript">
    $(document).ready(function(){
        alert('{{Session::get('message')}}')
    })
                    
</script> -->
@endif 
