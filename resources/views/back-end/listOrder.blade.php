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
                                <th>Order Code</th>
                                <th>Payment</th>
                                <th>Trạng thái</th>
                                <th>Thời gian đặt hàng</th>
                                <th>Show/Hide</th>
                                <th style="width: 100px;">Xem chi tiết</th>
                                <th style="width: 100px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $stt = 1;
                        ?>
                        @if(isset($order))
                        @foreach($order as $item)
                            <tr>
                                <td><?php  echo $stt ?></td>
                                <td>VAS0{{$item->id}}</td>
                                @if($item->payment == 1)
                                <td>Thanh toán khi nhận hàng</td>
                                @else
                                <td>Chuyển khoản</td>
                                @endif
                                @if($item->status == 0)
                                <td>Chưa giao hàng</td>
                                @else
                                <td>Đang giao hàng</td>
                                @endif
                                <td>{{$item->created_at}}</td>
                                <td>{{$item->show_hide}}</td>
                                <td>
                                    <a href="{{route('order.detail',$item->id)}}" style="padding: 5px 10px;border-radius: 4px;border: 1px solid #333;background: green;color: #fff;">Xem chi tiết</a>
                                </td>
                                <td>
                                    
                                    <a href="{{route('order.delete',$item->id)}}" style="padding: 5px 10px;border-radius: 4px;border: 1px solid #333;background: red;color: #fff;" onclick="return confirm('Bạn chắc chắn muốn xóa dữ liệu này?')">Delete</a>
                                    
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
