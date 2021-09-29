@extends('front-end.layout.master')
@section('section')
<section class="wrapper">
	<div class="container-fluids">
		<div class="breadcrumb">
			<div class="containers">
				<ul>
					<li>Trang chủ -</li>
					<li class="cate-name" style="margin-left: 5px"> {{$parent_category->name}}</li>
				</ul>
			</div>
		</div>
		<div class="filter">
			<div class="containers">
				<div class="show-filter">
					<ul>
						<li>Bộ lọc<i class="fas fa-plus"></i></li>
					</ul>
					<div class="switch-facet">
						<p show="4">Tùy chọn sắp xếp sản phẩm</p>
					</div>
				</div>
			</div>
			
		</div>
		<div class="containers">
			<div class="block">
				<div class="product-list" >
					@if($product)
					@foreach($product as $item)
					<a href="{{route('products',[$parent_category->slug,$item->slug])}}">
						<div class="product-item">
							<div class="product-image">
								<img class="default-img" src="{{url('/uploads/',$item->feature_image)}}" alt="">

								<img class="hover-img" src="{{url('/uploads/',$item->special_image)}}" alt="">
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
					</a>
					

					@endforeach
					@endif
					<div style="clear: left;"></div>
				</div>

			</div>
			
			<div class="container-fluids">
				<div class="page">
					<nav aria-label="...">
					  <ul class="pagination">
					    <li class="page-item disabled">
					      <a class="page-link" href="#" tabindex="-1">Previous</a>
					    </li>
					    <li class="page-item"><a class="page-link" href="#">1</a></li>
					    <li class="page-item active">
					      <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
					    </li>
					    <li class="page-item"><a class="page-link" href="#">3</a></li>
					    <li class="page-item">
					      <a class="page-link" href="#">Next</a>
					    </li>
					  </ul>
					</nav>
				</div>
			</div>
			
		</div>

	</div>
</section>
@endsection