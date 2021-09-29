@extends('front-end.layout.master')
@section('section')
<section class="wrapper">
			<div class="container-fluids">
				<div class="slideshow">
					<div class="slide-wrapper">
						<div class="slide" idx='0'>
							<img src="{{url('/front-end/images/slider4.png')}}" alt="">
						</div>
						<div class="slide" idx='1'>
							<img src="{{url('/front-end/images/slider3.png')}}" alt="">
						</div>
						<div class="slide" idx='2'>
							<img src="{{url('/front-end/images/slider2.jpg')}}" alt="">
						</div>')}}
						<div class="slide" idx='3'>
							<img src="{{url('/front-end/images/slider1.png')}}" alt="">
						</div>
						
					</div>
				</div>
			</div>
			<div class="containers">
				<div class="block">
					<div class="title-block">
						<p>SẢN PHẨM MỚI NHẤT</p>
						<a href="">Xem tất cả</a>
					</div>
					<div class="product-list">
						@if($new_product)
						@foreach($new_product as $item)
						<a href="{{route('products',[App\product::find($item->id)->category->slug,$item->slug])}}">
							<div class="product-item">
							<div class="product-image">
								<img class="default-img" src="{{url('/uploads/',$item->feature_image)}}" alt="">

								<img class="hover-img" src="{{url('/uploads/',$item->special_image)}}" alt="">
							</div>
							<div class="product-price">
								<span class="old-pricr">{{number_format($item->price)}} ₫</span>
							</div>
							<div class="product-title">
								<p>{{$item->name}}</p>
							</div>
						</div>
						</a>
						
						@endforeach
						@endif
					</div>
				</div>
				<div style="clear: left;"></div>

				<div class="block">
					<div class="title-block">
						<p>SẢN PHẨM Khuyến mãi</p>
						<a href="">Xem tất cả</a>
					</div>
					<div class="product-list">
						@if($sale_product)
						@foreach($sale_product as $item)
						<a href="">
							<div class="product-item">
							<div class="product-image">
								<img class="default-img" src="{{url('/uploads/',$item->feature_image)}}" alt="">

								<img class="hover-img" src="{{url('/uploads/',$item->special_image)}}" alt="">
							</div>
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
						</div>
						</a>
						
						@endforeach
						@endif
					</div>
				</div>
				<div style="clear: left;"></div>
			</div>
			<div style="clear: left;"></div>
		</section>
@endsection