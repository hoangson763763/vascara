@extends('front-end.layout.master')
@section('section')
<section class="wrapper">
	<div class="containers">
		<div class="cart-page">
			<div class="title-page">
				<p>Giỏ hàng của bạn</p>
			</div>
			@if(session()->has('message'))
				<div class="popup-success"><i class="fas fa-check-circle"></i>{{session()->get('message')}}</div>
			@endif

			<div class="cart">
				<table>
					<thead>
						<tr>
							<th class="col1">Ảnh sản phẩm</th>
							<th class="col2">Tên sản phẩm</th>
							<th class="col2" style="width: auto;">Kích cỡ</th>
							<th class="col3">Đơn giá</th>
							<th class="col4">Số lượng</th>
							<th class="col5">Thành tiền</th>
							<th class="col6">Xóa</th>
						</tr>
					</thead>
					<tbody>
						@if($cart)
						@foreach($cart as $item)
						<tr>
							<td>
								<img src="{{url('/uploads/',App\Cart::find($item->id)->product->feature_image)}}" alt="">
							</td>
							<td>
								<div class="info-item">
									<div class="title-product">
										{{App\Cart::find($item->id)->product->name}}
									</div>
									<ul>
										<li>Màu : {{App\Cart::find($item->id)->product->color}}</li>
										<li>Size : {{App\Cart::find($item->id)->product->size}}</li>
									</ul>
								</div>
							</td>
							<td class="center">
								{{$item->size}}
							</td>
							<td class="center">
								{{App\Cart::find($item->id)->product->price	}}₫
							</td>
							<td class="center">
								<div class="quantity">
									<ul>
										<li class="minus">-</li>
										<li class="value">
											<input type="text" value="{{$item->quantity}}" disabled="disabled">
										</li>
										<li class="plus">+</li>
									</ul>
								</div>
							</td>
							<td class="center">
								{{number_format(App\Cart::find($item->id)->product->price * $item->quantity)}} ₫
							</td>
							<td class="center"><a
							Onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?');" href="{{route('cartDelete',$item->id)}}"><i class="far fa-trash-alt"></i></a></td>
						</tr>
						@endforeach
						@endif
					</tbody>
					
				</table>
			</div>
			<div class="cart-button">
				<div></div>
				@if(isset(App\User::find(session()->get('user')->id)->cart))
				<div class="payment-total">
					<ul>
						<li><?php $quantity = 0;
									$price = 0;
									if(App\setting::first()->ship == null){
										$ship = 0;
									}
									else{
										$ship = App\setting::first()->ship;
									}
									
						 ?>
							<span>Số lượng sản phẩm</span>
							@if($cart)
								@foreach($cart as $item)
									<?php $quantity = $quantity + $item->quantity;
										$price = $price + App\Cart::find($item->id)->product->price * $item->quantity
									 ?>
								@endforeach
							@endif
							<span>
								{{$quantity}}
							</span>
						</li>
						<li>
							<span>
								Giá trị hàng hóa
							</span>
							<span class="value-product"> 
								{{number_format($price)}}₫
							</span>
						</li>
						<li>
							<span>
								Phí vận chuyển
							</span>
							<span>
								{{number_format($ship) }} ₫
							</span>
						</li>
						<li>
							<span>
								Giảm tiền
							</span>
							<span class="reduce">
								
							</span>
						</li>
						<li>
							<span>
								Thành tiền (đã bao gồm VAT)
							</span>
							<span>
								{{number_format($price + $ship)}}₫
							</span>
						</li>
					</ul>
					<div class="checkout-cart">
						<a href="{{route('address.index')}}">tiến hành thanh toán</a>
					</div>
				</div>
				@endif
			</div>
		</div>
	</div>
</section>
@endsection