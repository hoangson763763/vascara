@extends('front-end.layout.master')
@section('section')
<section class="wrapper">
			<div class="container-fluids">
				<div class="breadcrumb">
					<div class="containers">
						<ul>
							<li>Trang chủ - </li>
							<li class="cate-name">{{App\Product::find($product->id)-> category ->parent->name}} -</li>
							<li class="cate-name">{{App\Product::find($product->id)-> category ->name}}</li>
						</ul>
					</div>
				</div>
				<div class="containers">
					<div class="product">
						<div class="group-image">
							<div class="image-avatar">
								<a href="">
									<img src="{{url('/uploads',$product->feature_image)}}" alt="">
								</a>
							</div>
							<div class="list-image">
								@if($image_product)
								@foreach($image_product as $item)
								<a href="">
									<img src="{{url('/uploads/image_product',$item->image)}}" alt="">
								</a>
								@endforeach
								@endif
								
							</div>
							<div style="clear:left"></div>
							<div class="info-detail">
								
							</div>
						</div>
						<div class="fix-product">
							
								<div class="popup-warning"><i class="fas fa-exclamation-triangle"></i>Vui lòng chọn kích cỡ</div>
							<form action="{{route('cartAdd')}}" method="post">
								@csrf
								
								<input class="product_id" name="product_id" type="hidden" value="{{$product->id}}">
								<div class="title-product">
									<h1>{{$product->title}}</h1>
								</div>
								<div class="price">
									<span>{{number_format($product->price)}} ₫</span>
									<input type="hidden" name="price" value="{{$product->price}}">
								</div>
								<div class="size">
									<p>Kích cỡ : <input name="size" type="text" value="Tất cả"></p>
									<ul>
										<li>35</li>
										<li>36</li>
										<li>37</li>
										<li>38</li>
										<li>39</li>
									</ul>
								</div>
								<div class="quantity">
									<p>Số lượng</p>
									<ul>
										<li class="minus">-</li>
										<li class="input-number" style="border:none;width: auto;"><input type="text" name="quantity" value="1" ></li>
										<li class="plus">+</li>
									</ul>
								</div>
								@if(session()->has('user'))
								<div class="btn">
									<button>Thêm vào giỏ hàng</button>
								</div>
								@else
								<div class="btn">
									<a href="{{route('login')}}"><p>Đăng nhập để mua hàng</p></a>
								</div>
								@endif
								<div class="other-product">
									<p>Sản phẩm cùng loại khác màu</p>
									<ul>
										@if($product_other)
										@foreach($product_other as $item)
										<li><a href="">
											<img src="{{url('/uploads',$item->feature_image)}}" alt="">
										</a></li>
										@endforeach
										@endif

									</ul>
								</div>
								<div style="clear:left"></div>
								<div class="promotion-content">
									<div class="fchat">
										<p><i class="fab fa-facebook-messenger"></i><a href="">Chát với nhân viên tư vấn</a></p>
									</div>
									<div class="hotline">
										<p><i class="fas fa-phone-square"></i><span>1900 6909 </span> - Hotline đặt hàng (9h - 22h)</p>
									</div>
									<div class="delivery">
										<p><i class="fas fa-truck"></i>Vận chuyển toàn quốc</p>
									</div>
									<div class="guarantee">
										<p><i class="fas fa-shield-alt"></i>Bảo hành sản phẩm trọn đời (trừ mắt kính, thắt lưng)</p>
									</div>
									<div class="freereturning">
										<p><i class="fas fa-undo-alt"></i>Miễn phí đổi sản phẩm trong 7 ngày (trừ mắt kính, thắt lưng)</p>
									</div>
									<div class="shoping-online">
										<p><i class="fas fa-archive"></i>
											Mua hàng Online - Miễn phí trả hàng hoàn tiền tại cửa hàng trong 17 ngày.
											<a href=""> XEM CHI TIẾT</a>
										</p>
									</div>
								</div>
							</form>
							
						</div>

						<div class="detail-product">
							<div class="group-content-product">
								<div class="head">
									<ul>
										<li class="active click-detail-product">thông tin chi tiết</li>
										<li class="click-size-guide">hướng dẫn chọn size</li>
									</ul>
								</div>
								<div class="body">
									<ul class="sub-menu-info-detail">
										<li>
											<span>Mã sản phẩm</span>
											<span>1010SNK0040</span>
										</li>
										<li>
											<span>Loại sản phẩm</span>
											<span>Giày Sneaker</span>
										</li>
										<li>
											<span>Kiểu gót</span>
											<span>Đế bánh mì</span>
										</li>
										<li>
											<span>Độ cao gót</span>
											<span>2.5 cm</span>
										</li>
										<li>
											<span>Loại mũi</span>
											<span>Bít mũi tròn</span>
										</li>
										<li>
											<span>Chất liệu</span>
											<span>Da nhân tạo & Plastic</span>
										</li>
										<li>
											<span>Hoa văn, chi tiết</span>
											<span>Phối màu, laser cut</span>
										</li>
										<li>
											<span>Phù hợp sử dụng	</span>
											<span>Đi chơi, đi làm, đi học</span>
										</li>	
									</ul>
									<div class="size-guide">
										<img src="{{url('/front-end/images/HUONG-DAN-CHON-SIZE-GIAY_DESK_915X600.png')}}" alt="">
									</div>
								</div>
							</div>
						</div>
						<div style="clear:left"></div>
					</div>
					<div class="relation-product">
						<div class="title">
							<p>sản phẩm xem cùng</p>
						</div>
						<div class="block">
							<div class="product-list">
								@if($product_other_cate)
									@foreach($product_other_cate as $item)
									<div class="product-item">
										<div class="product-image">
											<img class="default-img" src="{{url('/uploads/',$item->feature_image)}}" alt="">

											<img class="hover-img"  src="{{url('/uploads/',$item->special_image)}}" alt="">
										</div>
										@if($item->discount > 0)
											<div class="product-price">
												<span class="sale-price">{{number_format($item->price * (100 - $item->discount) / 100)}} ₫ </span>
												<span class="old-price">{{number_format($item->price)}} ₫</span>
											</div>
											
											<div class="product-title">
												<p>{{$item->name}}</p>
											</div>
											<div class="product-sale">
												<span>-{{$item->discount}}%</span>
											</div>
										@else
											<div class="product-price">
												<span class="old-pricr">{{number_format($item->price)}} ₫</span>
											</div>
											<div class="product-title">
												<p>{{$item->name}}</p>
											</div>
										@endif
										
									</div>
									@endforeach
								@endif
							</div>
						</div>
					</div>
				</div>
				<div style="clear:left"></div>
				<div class="popup-add">
					<div class="popup-content">
						<div class="popup-head">
							<p>Thông tin giỏ hàng</p>
							<span class="hide">X</span>
						</div>
						<div class="popup-main">
							<div class="table-product">
								<table>
									<tr>
										<th>thông tin sản phẩm</th>
										<th>tùy chọn của bạn</th>
										<th>giá</th>
									</tr>
									<tr>
										<td>
											<div class="col1">
												<img src="{{url('/front-end/images/giay-sandal-ankle-strap-van-da-ky-da-bmn-0489-mau-den-main__60173__1620991255-small.jpg')}}" alt="">
											    <div class="info-item">
												    <h3>Giày Ankle Strap Vân Da Kỳ Đà - BMN 0489 - Màu Đen</h3>
												    <div></div><span>545.000 ₫</span>
											    </div>
											</div>
										</td>
										<td>
											<div class="col2">
												<p>Màu : <span>Đen</span></p>
												<p>Size : <span>37</span></p>
											</div>
										</td>
										<td>
											<div class="col3">
												<div class="col4">
													<p>Số lượng : <span>3</span></p>
													<p>Tổng : <span>1.635.000 ₫</span></p>
												</div>
												<div class="col-del">
													<p><a href="">Xóa</a></p>
												</div>
											</div>
										</td>
									</tr>
									<tr>
										<td>
											<div class="col1">
												<img src="{{url('/front-end/images/giay-sandal-ankle-strap-van-da-ky-da-bmn-0489-mau-den-main__60173__1620991255-small.jpg')}}" alt="">
											    <div class="info-item">
												    <h3>Giày Ankle Strap Vân Da Kỳ Đà - BMN 0489 - Màu Đen</h3>
												    <div></div><span>545.000 ₫</span>
											    </div>
											</div>
										</td>
										<td>
											<div class="col2">
												<p>Màu : <span>Đen</span></p>
												<p>Size : <span>37</span></p>
											</div>
										</td>
										<td>
											<div class="col3">
												<div class="col4">
													<p>Số lượng : <span>3</span></p>
													<p>Tổng : <span>1.635.000 ₫</span></p>
												</div>
												<div class="col-del">
													<p><a href="">Xóa</a></p>
												</div>
											</div>
										</td>
									</tr>

									<tr>
										<td>
											<div class="col1">
												<img src="{{url('/front-end/images/giay-sandal-ankle-strap-van-da-ky-da-bmn-0489-mau-den-main__60173__1620991255-small.jpg')}}" alt="">
											    <div class="info-item">
												    <h3>Giày Ankle Strap Vân Da Kỳ Đà - BMN 0489 - Màu Đen</h3>
												    <div></div><span>545.000 ₫</span>
											    </div>
											</div>
										</td>
										<td>
											<div class="col2">
												<p>Màu : <span>Đen</span></p>
												<p>Size : <span>37</span></p>
											</div>
										</td>
										<td>
											<div class="col3">
												<div class="col4">
													<p>Số lượng : <span>3</span></p>
													<p>Tổng : <span>1.635.000 ₫</span></p>
												</div>
												<div class="col-del">
													<p><a href="">Xóa</a></p>
												</div>
											</div>
										</td>
									</tr>	
								</table>
								<div class="final-cart">
									<div class="left"></div>
									<div class="right">
										<div class="total-price">
											Tổng cộng : <span>2.080.000 ₫</span>
										</div>
										<div class="note-cart">
											Coupon, VIP, Phí vận chuyển sẽ được áp dụng ở trang thanh toán.
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="popup-footer">
							<div class="left">
								
							</div>
							<div class="right">
								<div class="next-discover">
									<a href="">Tiếp tục khám phá <i class="fas fa-caret-right"></i></a>
								</div>
								<div class="next-checkout">
									<a href=""><span>Đặt mua ngay</span> <span>(Giao hàng tận nơi)</span></a>
								</div>
							</div>
						</div>
					</div>
					
				</div>
				
			</div>
		</section>
@endsection