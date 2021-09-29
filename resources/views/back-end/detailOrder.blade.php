@extends('front-end.layout.master')
@section('section')
<section class="wrapper">
			<div class="containers">
				<div class="checkout-page">
					<div class="hotline">
						
					</div>
					<div class="form-login">
						<form action="{{route('order.detail',$order->id)}}" method="post">
							@csrf()
							<div class="title">
								<span>Thông tin đơn hàng</span>
							</div>
							<div class="step1">
								<div class="payments">
									<div class="shipping">
										<div class="m-title" style="text-transform: uppercase;">
											Thông tin khách hàng
										</div>
										<p>
											Họ tên : <strong>{{$address->name}}</strong>
										</p>
										<p>
											Số điện thoại : <strong>{{$address->phone}}</strong>
										</p>
										<p>
											Tỉnh/Thành phố: <strong>{{$address->city}}</strong>
										</p>
										<p>
											Quận/Huyện: <strong>{{$address->district}}</strong>
										</p>
										<p>
											Phường/Xã: <strong>{{$address->ward}}</strong>
										</p>
										<p>
											Chi tiết: <strong>{{$address->detail_address}}</strong>
										</p>
										<p>
											Hình thức thanh toán : @if($order->payment == 1)
											<strong>
												Thanh toán khi nhận hàng
											</strong>
											@else
											<strong>
												Chuyển khoản
											</strong>
											@endif
										</p>
										<p>
											Ghi chú của khách hàng : {{$order->note_user}}
										</p>
										<div class="m-title" style="text-transform: uppercase;">
											trạng thái đơn hàng
										</div>
										@if($order->status == 0)
										<p>
											Trạng thái :<strong> Chưa giao hàng</strong> 
										</p>
										<div class="submit">
											<button>Xác nhận đơn hàng hàng</button>
										</div>
										@else
										<p>
											Trạng thái : <strong> Đang giao hàng</strong> 
										</p>
										<div class="submit">
											<button>Quay lại trạng thái chưa giao hàng</button>
										</div>
										@endif
										<div class="submit" style="margin-top: 20px;">
											<a href="{{route('order.list')}}" style="padding: 15px 0;
    											display: block;
											    background: green;
											    color: #fff;
											    
											    text-align: center;
											    text-transform: uppercase;
											    text-decoration: none;
											    font-weight: bold;;">Đi tới trang danh sách đơn hàng</a>
										</div>
									</div>

									<div class="info-bill">
										<?php $total_product = 0;
											  $total_price = 0;
										?>
										@if($order_item)
										@foreach($order_item as $item)
										<?php $total_product = $total_product + $item->quantity;
											$total_price = $total_price + $item->price * $item->quantity;

										?>
										<div class="list-product">
											<img src="{{url('/uploads/',App\Product::find($item->product_id)->feature_image)}}" alt="">
											
											<div class="info">
												<div class="m-title">
													{{App\Product::find($item->product_id)->title}}
												</div>
												<div class="feature">
													<span>Màu: {{App\Product::find($item->product_id)->color}}</span>
													<span>Size: {{$item->size}}</span>
												</div>
												<div class="quantity">Số lượng: {{$item->quantity}}</div>
												<div class="price">Giá: {{$item->price}} ₫</div>
												<div class="sum">
													Tổng : {{number_format($item->quantity * $item->price)}} ₫
												</div>
											</div>
											
										</div>
										@endforeach
											@endif
										<div class="group-price">
											<div class="number-product">
												<div class="label">Tổng số lượng sản phẩm</div>
												<div class="value">{{$total_product}}</div>
											</div>
												<div class="total-price">
	                                            <div class="label">Tạm tính:</div>
	                                            <div class="value lbl-sellingprice" data-vl="825000">{{number_format($total_price)}} ₫</div>
	                                        </div>
	                                        
		                                        <div class="shipping-total">
	                                            <div class="label">Phí vận chuyển:</div>
	                                            @if($setting->ship)
	                                            <div class="value lbl-shippingprice" data-vl="29000 ">{{$setting->ship}} ₫</div>
	                                            @else
	                                             <div class="value lbl-shippingprice" data-vl="29000 ">0 ₫</div>
	                                            @endif

	                                        
	                                        </div>
	                                        <div class="discount-price">
	                                        	<div class="label">Giảm tiền:</div>
	                                        	<div class="value"><span class="lbl-discountbill" data-vl="50000"> 0 </span> ₫</div>
	                                        </div>
	                                        <div class="final-price">
	                                        	<div class="label">Thành tiền:</div>
	                                        	<div class="value">
	                                        		@if($setting->ship)
	                                        		<span class="lbl-finalprice" data-vl="804000" style="font-weight: bold">{{number_format($total_price + $setting->ship)}} ₫</span>
	                                        		@else
	                                        		<span class="lbl-finalprice" data-vl="804000" style="font-weight: bold">{{number_format($total_price)}} ₫</span>
	                                        		@endif
	                                        	</div>
	                                        </div>
										</div>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</section>
@endsection