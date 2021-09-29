@extends('front-end.layout.master')
@section('section')
<section class="wrapper">
			<div class="containers">
				<div class="checkout-page">
					<div class="hotline">
						<img src="{{url('/front-end/images/hotline.png')}}" alt="">
						<p>Gọi 1900 6909 để đặt hàng nhanh</p>
					</div>
					<div class="form-login">
						<form action="{{route('payment')}}" method="post">
							@csrf()
							<div class="title">
								<span>Thanh toán</span>
							</div>
							<div class="step1">
								<div class="payments">
									<div class="shipping">
										<div class="m-title">
											CHỌN GÓI VẬN CHUYỂN PHÙ HỢP
										</div>
										<p>
											<span>Thời gian giao hàng có thể trễ hơn so với dự kiến do dịch Covid-19. Mong quý khách hàng thông cảm.</span>
										</p>
										<div class="note-tit">
											Phí vận chuyển được tính dựa trên trọng lượng kiện hàng, địa điểm nhận hàng
										</div>
										<ul>
											<li>
												<input type="radio" name="" checked="checked">
											</li>
											<li>Nhận hàng trong 3-6 ngày, Giao hàng tiêu chuẩn (DHL): 29.000 ₫</li>
										</ul>
										<div class="payment-method">
											<div class="m-title">
												CHỌN PHƯƠNG THỨC THANH TOÁN
											</div>
											<ul>
												<li>
													<input type="radio" name="payment" value="1" id="payments1" required="required">
													<label for="payments1">Thanh toán khi nhận hàng</label>
												</li>
												<li>
													<input type="radio" name="payment" value="0" id="payments2" required="required">
													<label for="payments2">Chuyển khoản </label>
												</li>
											</ul>
										</div>
										<div class="note">
											<div class="m-title">
												GHI CHÚ
											</div>
											<textarea name="fnote" cols="30" rows="4" placeholder="Để lại lời nhắn cho Vasara"></textarea>
										</div>
										<div class="submit">
											<button>Đặt mua</button>
										</div>
									</div>

									<div class="info-bill">
										<?php $total_product = 0;
											  $total_price = 0;
										?>
										@if($cart)
										@foreach($cart as $item)
										<?php $total_product = $total_product + $item->quantity;
											$total_price = $total_price + $item->price * $item->quantity;

										?>
										<div class="list-product">
											<img src="{{url('/front-end/images/tui-van-da-ca-sau-khoa-marble-dinh-kim-loai-sho-0179-mau-kem-main__60178__1620991320-small.jpg')}}" alt="">
											
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