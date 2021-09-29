@extends('front-end.layout.master')
@section('section')
<section class="wrapper">
			<div class="containers">
				<div class="checkout-page">
					<div class="hotline">
						<img src="{{url('/front-end/images/hotline.png')}}" alt="">
						<p>Gọi 1900 6909 để đặt hàng nhanh</p>
					</div>
					@if($db)

						<div class="form-login">
							<form action="{{route('address.store')}}" method="post">
								@csrf()
								<div class="title">
									<span>Địa chỉ</span>
								</div>
								<div class="step1">
									<div class="" style="width: 50%;border: 1px solid #ccc;box-shadow: 0 0 10px #ccc;padding: 20px 25px;">
										<div class="name" style="font-weight: bold; text-transform: uppercase;">
											{{$db->name}}
										</div>
										<div class="address">
											Địa chỉ : {{$db->detail_address}} - {{$db->ward}} - {{$db->district}} - {{$db->city}}
										</div>
										<div>
											Số điện thoại : {{$db->phone}}
										</div>
										<div>
											<a href="{{route('payment')}}" style="    border: 1px solid #f15b67;display: block;padding: 10px;width: 50%;margin-top: 10px;color: #f15b67;font-weight: bold;text-transform: uppercase;text-align: center;font-size: 18px;text-decoration: none;">Giao đến địa chỉ này</a>
										</div>
									</div>
									
								</div>
								<div class="step1">
									<div>
										Bạn muốn giao hàng đến địa chỉ khác? 
										<span class="show-add-newAddress" style="color:#f15b67;cursor: pointer;">Nhập địa chỉ giao hàng mới</span>
										<div class="form-login new-address" style="display:none">
												<div class="step1">
													<div class="step-content">
														<div class="form-group">
														    <label for="exampleInputEmail1">Họ tên :</label>
														    <input id="exampleInputEmail1" type="text" class="form-control"  placeholder="" name="name" required>
					                                    </div>
					                                    <div class="form-group">
														    <label for="exampleInputPassword">Số điện thoại :</label>
														    <input id="exampleInputPassword" type="number" class="form-control"  placeholder="Vascara sẽ liên hệ SĐT này khi đến giao hàng" name="phone" required >
					                                    </div>
					                                    <div class="form-group">
														    <label for="exampleInputPassword">Tỉnh/Thành phố :</label>
														    <input id="exampleInputPassword" type="text" class="form-control"  placeholder="" name="city" required>
					                                    </div>
					                                    <div class="form-group">
														    <label for="exampleInputPassword">Quận/Huyện :</label>
														    <input id="exampleInputPassword" type="text" class="form-control"  placeholder="" name="district" required>
					                                    </div>
					                                    <div class="form-group">
														    <label for="exampleInputPassword">Phường/Xã :</label>
														    <input id="exampleInputPassword" type="text" class="form-control"  placeholder="" name="ward" required>
					                                    </div>
					                                    <div class="form-group">
														    <label for="exampleInputPassword">Địa chỉ :</label>
														    <input id="exampleInputPassword" type="text" class="form-control"  placeholder="Vui lòng nhập số nhà, tên đường, tên tòa nhà (nếu có)" name="detail_address" required>
					                                    </div>
					                                    <button type="submit" class="btn btn-primary">Giao đến địa chỉ này</button>
													</div>
												</div>
											
										</div>
									</div>
								</div>
							</form>
						</div>
						
					@else

					<div class="form-login">
						<form action="{{route('address.store')}}" method="post">
							@csrf()
							<div class="title">
								<span>Địa chỉ</span>
							</div>
							<div class="step1">
								<div class="step-content">
									<div class="form-group">
									    <label for="exampleInputEmail1">Họ tên :</label>
									    <input id="exampleInputEmail1" type="text" class="form-control"  placeholder="" name="name" required>
                                    </div>
                                    <div class="form-group">
									    <label for="exampleInputPassword">Số điện thoại :</label>
									    <input id="exampleInputPassword" type="number" class="form-control"  placeholder="Vascara sẽ liên hệ SĐT này khi đến giao hàng" name="phone" required >
                                    </div>
                                    <div class="form-group">
									    <label for="exampleInputPassword">Tỉnh/Thành phố :</label>
									    <input id="exampleInputPassword" type="text" class="form-control"  placeholder="" name="city" required>
                                    </div>
                                    <div class="form-group">
									    <label for="exampleInputPassword">Quận/Huyện :</label>
									    <input id="exampleInputPassword" type="text" class="form-control"  placeholder="" name="district" required>
                                    </div>
                                    <div class="form-group">
									    <label for="exampleInputPassword">Phường/Xã :</label>
									    <input id="exampleInputPassword" type="text" class="form-control"  placeholder="" name="ward" required>
                                    </div>
                                    <div class="form-group">
									    <label for="exampleInputPassword">Địa chỉ :</label>
									    <input id="exampleInputPassword" type="text" class="form-control"  placeholder="Vui lòng nhập số nhà, tên đường, tên tòa nhà (nếu có)" name="detail_address" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Giao đến địa chỉ này</button>
								</div>
							</div>
						</form>
					</div>
					@endif
				</div>
			</div>
		</section>
@endsection