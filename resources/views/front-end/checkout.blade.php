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
								<span>Đăng nhập</span>
							</div>
							<div class="step1">
								<div class="step-content">
									<div class="radio-ls">
										<ul>
											<li class="fix-radio"><input type="radio" checked="checked"></li>
											<li>ĐĂNG NHẬP TÀI KHOẢN TẠI VASCARA.COM</li>
										</ul>
									</div>
									<div class="form-group">
									    <label for="exampleInputEmail1">Email address</label>
									    <input id="exampleInputEmail1" type="email" class="form-control"  placeholder="Enter email">
                                    </div>
                                    <div class="form-group">
									    <label for="exampleInputPassword">Password</label>
									    <input id="exampleInputPassword" type="password" class="form-control"  placeholder="Enter password">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</section>
@endsection