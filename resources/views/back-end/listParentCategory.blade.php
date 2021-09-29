@extends('back-end.layout.master')
@section('form-table')
    <div class="table-agile-info">
                    <div class="add-menu-btn">
                        <div>
                            <h2>List Parent Category</h2>
                        </div>
                        <div>
                           <a href="{{route('parent.add')}}">Add Parent Category</a>

                        </div>
                        
                    </div>
                    <table id='table-main' class="display">
                        <thead>
                            <tr>
                                <th>Stt</th>
                                <th>Name</th>
                                <th>Code</th>
                                <th>Slug</th>
                                <th style="width: 200px;">Action</th>
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
                                <td>{{$item->name}}</td>
                                <td>{{$item->code}}</td>
                                <td>{{$item->slug}}</td>
                                <td>
                                    <a href="{{route('parent.edit',$item->slug)}}" style="padding: 5px 10px;background: yellow;border: 1px solid #333;border-radius: 4px;color: #000;">Edit</a> 
                                    <a href="{{route('parent.delete',$item->slug)}}" style="padding: 5px 10px;border-radius: 4px;border: 1px solid #333;background: red;color: #fff;" onclick="return confirm('Bạn chắc chắn muốn xóa dữ liệu này?')">Delete</a>
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
<script type="text/javascript">
    $(document).ready(function(){
        alert('{{Session::get('message')}}')
    })
                    
</script>
@endif 
