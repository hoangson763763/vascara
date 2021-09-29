<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Vascara</title>
	<link rel="stylesheet" href="{{asset('/back-end/bootstrap/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('/back-end/fontawesome-free-5.15.3-web/css/all.css')}}">
	<link rel="stylesheet" href="{{asset('front-end/css/style.css')}}">
	 <link rel="icon" href="{{asset('front-end/images/cropped-favicon-chu-dep1.png')}}" type="image/png" sizes="16x16">
	<script type="text/javascript" src="{{asset('/front-end/js/jquery-3.6.0.min.js')}}"></script>

	<script type="text/javascript" src="{{asset('/front-end/js/myjs.js')}}"></script>

</head>
<body>
	<div id="app">
		<header>
			@if(session()->has('warning'))
				<div class="alert-warning"><i class="fas fa-check-circle"></i>{{session()->get('warning')}}</div>
			@endif
			@if(session()->has('message'))
				<div class="popup-success"><i class="fas fa-check-circle"></i>{{session()->get('message')}}</div>
			@endif
			<div class="header-top">
				<div class="containers">
					<div class="row">
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 fix">
							<div class="menu-inner">
								
								<div class="logo">
									<div class="btn-showmenu">
										<i class="fas fa-align-justify"></i>
									</div>
									<div class="logo-image">
										<a href="{{route('home')}}">
											<img src="{{url('/front-end/images/logo.png')}}" alt="">
										</a>
									</div>
									
									
								</div>
								<div class="search-wrap">
									<form action="">
										<button><i class="fas fa-search"></i></button>
										<input type="text" name="">

									</form>
								</div>
								<div class="tool-right">
									<div class="profile">
										@if(session()->has('user'))

										<div class="logged">
											<img src="{{url('/front-end/images/noavatar.png')}}" alt="">
											<div class="logged-menu">
												<ul>
													<li class="append_search">
														<i class="fas fa-search"></i>
													</li>
													<li>Xin Chào, {{session()->get('user')->name}}</li>
													<li><a href="{{route('profile')}}">Thông tin tài khoản</a></li>
													<li><a href="{{route('logout')}}">Đăng xuất</a></li>
												</ul>
											</div>
										</div>
										@else
										<div class="login">
											<ul>
												<li class="append_search">
														<i class="fas fa-search"></i>
													</li>
												<li class="a-register"><a href="{{route('register')}}">Đăng ký /</a></li>
												<li class="a-login"><a href="{{route('login')}}">Đăng nhập</a></li>
											</ul>
										</div>

										@endif
										
										
									</div>
									<a href="{{route('cartIndex')}}">
										<div class="cart">
											<img src="{{url('front-end/images/cartx2.png')}}" alt="">
											@if(session()->has('user'))
											
												@if(isset(App\User::find(session()->get('user')->id)->cart))
													<span>({{count(App\Cart::where('user_id',session()->get('user')->id)->get())}})</span>
												@else
													<span>(0)</span>
												@endif
											
											@endif
										</div>
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
			<div class="cover-header">
				<div class="main-header-top">
					<div class="close">
						<img src="{{url('front-end/images/close1.png')}}" alt="">
					</div>
					<div class="profile">
						<ul>
							<li>
								<a href="">
									<img src="{{url('/front-end/images/noavatar.png')}}" alt="">
								</a>
							</li>
						</ul>
						
					</div>
				</div>
				<div class="main-header">
					<div class="containers">
						<div class="row">
							<div class="menu">
								<ul>
									@foreach($paren_categories as $item)
									<li><a href="{{route('category',$item->slug)}}" class="chil-a">{{$item->name}}</a>
										@if(count(App\Paren_category::find($item->id)->category) > 0)
											<ul class="sub-menu">
												<li><a href="">xem tất cả {{$item->name}}</a></li>
												
												@foreach(App\Paren_category::find($item->id)->category as $item2)
												<li><a href="">{{$item2->name}}</a></li>
													
												@endforeach
												<!-- <li><a href="">giày cao gót</a></li>
												<li><a href="">giày bit</a></li>
												<li><a href="">giày sandals</a></li>
												<li><a href="">giày búp bê</a></li>
												<li><a href="">giày sneaker</a></li>
												<li><a href="">giày boots</a></li>
												<li><a href="">giày da thật</a></li>
												<li><a href="">giày lười</a></li> -->
											</ul>
											@endif
									</li>
									@endforeach
									<li><a href="" class="chil-a">PHỤ KIỆN</a></li>
									<li><a href="" class="chil-a">GIFTCARD</a></li>
									<li><a href=""class="chil-a">SALE OFF</a></li>
									<li><a href="" class="chil-a">NEW ARRIVAL</a></li>
									<li><a href="" class="chil-a">CONTACT</a></li>
									<li><a href="" class="chil-a">TIN TỨC</a></li> 
									<!--<li><a href="" class="chil-a">TÚI XÁCH</a>
										<ul class="sub-menu">
											<li><a href="">Xem tất cả túi xách</a></li>
											<li><a href="">Túi xách tay</a></li>
											<li><a href="">Túi đeo chéo</a></li>
											<li><a href="">Túi xách da thật</a></li>
										</ul>
									</li>
									<li><a href="" class="chil-a">BALO</a></li>
									<li><a href="" class="chil-a">VÍ BÓP</a>
										<ul class="sub-menu">
											<li><a href="">Xem tất cả ví bóp</a></li>
											<li><a href="">ví cầm tay</a></li>
											<li><a href="">ví dự tiệc</a></li>
											<li><a href="">ví da thật</a></li>
										</ul>
									</li>
									<li><a href="" class="chil-a">DÉP & GUỐC</a></li>
									<li><a href="" class="chil-a">PHỤ KIỆN</a></li>
									<li><a href="" class="chil-a">GIFTCARD</a></li>
									<li><a href=""class="chil-a">SALE OFF</a></li>
									<li><a href="" class="chil-a">NEW ARRIVAL</a></li>
									<li><a href="" class="chil-a">BLOOMINGDALES</a></li>
									<li><a href="" class="chil-a">TIN TỨC</a></li> -->

								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="main-header-bottom">
					<ul>
						<li><a href="">Đăng ký</a></li>
						<li><a href="">Đăng nhập</a></li>
					</ul>
				</div>
			</div>
		</header>
		@yield('section')
		<div style="clear:left;"></div>
		<footer>
			<div class="containers" style="padding: 15px 0;">
				<div class="main-footer">
					<div class="group-footer">
						<p>Công ty <i class="fas fa-angle-right"></i></p>
						<ul class="sub-menu-footer">
							<li><a href="">Giới thiệu</a></li>
							<li><a href="">Tuyển dụng</a></li>
						</ul>
					</div>
					<div class="group-footer">
						<p>Chính sách <i class="fas fa-angle-right"></i></p>
						<ul class="sub-menu-footer">
							<li><a href="">Chính sách bảo mật</a></li>
							<li><a href="">Ưu đãi khách hàng thân thiết</a></li>
							<li><a href="">Chính sách bảo hnahf trọn đời</a></li>
							<li><a href="">Chính sách giao nhận</a></li>
							<li><a href="">Chính sách đổi trả</a></li>
						</ul>
					</div>
					<div class="group-footer">
						<p>kết nối vascara <i class="fas fa-angle-right"></i></p>
						<ul class="sub-menu-footer">
							<li><a href="">Hướng dẫn mua hàng</a></li>
							<li><a href="">Tra cứu bảo hành</a></li>
							<li><a href="">Quy định về phiếu quà tặng</a></li>
							<li><a href="">Điều kiện sử dụng Giftcard</a></li>
							<li><a href="">Điều khoản sử dụng</a></li>
						</ul>
					</div>
					<div class="group-footer">
						<p>hỗ trợ khách hàng <i class="fas fa-angle-right"></i></p>
						<ul class="sub-menu-footer">
							
						</ul>
					</div>

				</div>
				<div class="footer-bottom">
					<div class="group-footer-bottom">
						<img src="{{url('front-end/images/bct.png')}}" alt="">
					</div>
					<div class="group-footer-bottom">
						<p><i class="fas fa-map-marker-alt"></i>	Xem vị trí cửa  hàng</p>
					</div>
					<div class="group-footer-bottom">
						<p><i class="fas fa-phone"></i>	1900 6909 <span>(1000đ/phút, 9h-22h)</span></p>
					</div>
					
				</div>

			</div>
			<div class="container-fluids">
				<div class="copy-right">
					<p>Công ty TNHH MTV Global Fashion. Văn phòng: Lầu 4 tòa nhà ACM số 96 Cao Thắng phường 04 quận 03 TP Hồ Chí Minh.</p>
					<p>GP số 0314657558 do sở KHĐT Tp Hồ Chí Minh cấp lần đầu ngày 05/10/2017</p>
				</div>
			</div>
		</footer>
	</div>
</body>


</html>