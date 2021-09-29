@extends('back-end.layout.master')
@section('form-table')
    <div class="table-agile-info">
                    <div class="add-menu-btn">
                        <div>
                            <h2>List Menu</h2>
                        </div>
                        <div>
                           <a href="{{route('menuAdd')}}">Add Menu</a>

                        </div>
                        
                    </div>
                    <table id='table-main' class="display">
                        <thead>
                            <tr>
                                <th>Stt</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Icon</th>
                                <th>Sub Menu</th>
                                <th>Action</th>
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
                                <td>{{$item->slug}}</td>
                                <td>{!! $item->icon !!}</td>
                                <td><a href="{{route('menusubmenuadd',$item->slug)}}" style="padding: 5px 10px;background: green;border: 1px solid #333;border-radius: 4px;color: #fff;">Sub Menu</a></td>
                                <td>
                                    <a href="{{route('menuEdit',$item->id)}}" style="padding: 5px 10px;background: yellow;border: 1px solid #333;border-radius: 4px;color: #000;">Edit</a> 
                                    <a href="{{route('menuDelete',$item->id)}}" style="padding: 5px 10px;border-radius: 4px;border: 1px solid #333;background: red;color: #fff;" onclick="return confirm('Bạn chắc chắn muốn xóa dữ liệu này?')">Delete</a>
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
