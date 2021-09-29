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
						<form action="">
							<div class="title">
								<span>Chuyển khoản</span>
							</div>
							<div class="step1">
								<div class="bank-acount">
									<div class="list-bank">
										<div class="m-title">
											Danh sách tài khoản
										</div>
										<div class="group">
											<div class="img-bank">
												<img src="{{url('/front-end/images/techcombank.png')}}" alt="">
											</div>
											<div class="info-account">
												<div class="name-bank">
													Ngân hàng : <span>Techcombank</span> 
												</div>
												<div class="name">
													Tên chủ tài khoản : <span>Hoàng Văn Sơn</span>
												</div>
												<div class="account-number">
													Số tài khoản : <span>
														19035082556019
													</span> 
												</div>
											</div>
										</div>
										<div class="group">
											<div class="img-bank">
												<img src="{{url('/front-end/images/techcombank.png')}}" alt="">
											</div>
											<div class="info-account">
												<div class="name-bank">
													Ngân hàng : <span>Techcombank</span> 
												</div>
												<div class="name">
													Tên chủ tài khoản : <span>Hoàng Văn Sơn</span>
												</div>
												<div class="account-number">
													Số tài khoản : <span>
														19035082556019
													</span> 
												</div>
											</div>
										</div>
									</div>
									<div class="note">
										<div class="m-title">
											Khách hàng thanh toán vui lòng điền đầy đủ nội dung thanh toán bao gồm: <span>Họ tên, số điện thoại, mã đơn hàng</span>
										</div>
										@if($code_order)
										<div class="m-title">
											Mã đơn hàng của bạn là: <span>{{$code_order}}</span>
										</div>
										@endif

										<div class="shopping">
											<a href="{{route('home')}}">Tiếp tục mua sắm</a>
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