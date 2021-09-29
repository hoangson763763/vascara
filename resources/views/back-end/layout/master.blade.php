<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- CSS -->
    <link  href="{{ asset('/back-end/fontawesome-free-5.15.3-web/css/all.css') }}" rel="stylesheet">
    <link  type="text/css" href="{{ asset('back-end/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link  href="{{ asset('back-end/css/jquery.dataTables.min.css ') }}" rel="stylesheet ">
    <link  type="text/css" href="{{ asset('back-end/css/style.css') }}" rel="stylesheet ">
    <link rel="icon" href="{{asset('front-end/images/cropped-favicon-chu-dep1.png')}}" type="image/png" sizes="16x16">
    <script type="text/javascript" src="{{asset('back-end/js/jquery-3.6.0.min.js')}}"></script>
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script src="{{asset('ckfinder/ckfinder.js')}}"></script>
</head>
<body>
    <div id="app">
        @if(session()->has('message'))
            <div class="popup-success"><i class="fas fa-check-circle"></i>{{session()->get('message')}}</div>
        @endif
    	<header>
    		<div class="brand">
    			<h2>quản trị website</h2>
    		</div>
    		<div class="head-left">
    			<div class="nav-menu">
    				<ul>
                        <li class="show-sidebar"><i class="fas fa-bars"></i></li>
                        <li><i class="fas fa-archive"></i>
                            <span>8</span>
                        </li>
                        <li><i class="far fa-envelope"></i>
                            <span style="background: #ff6c60;">3</span>
                        </li>
                        <li><i class="far fa-bell"></i>
                            <span style="background:#FCB322">2</span>
                        </li>
                    </ul>
    			</div>
    			<div class="user">
    				<div class="search">
                        <form>
                            <button>
                                <i class="fas fa-search"></i>
                            </button>
                            <input type="" name="" placeholder="Search">
                        </form>
                        
                        
                    </div>
                    <div class="info-user">
                        <div class="username">
                            <img src="{{url('/back-end/image/2.png')}}" alt="">
                            @if(session()->has('user'))
                                <p>{{session()->get('user')->name}}</p>
                            @else
                                <p>John Doe</p>
                            @endif
                                
                            <b class="caret"></b>
                        </div>
                        <div class="menu-user">
                            <ul>
                                <li><a href=""><i class="fas fa-id-card"></i>Profile</a></li>
                                <li><a href=""><i class="fas fa-cog"></i>Setting</a></li>
                                <li><a href="{{route('logout')}}"><i class="fas fa-sign-out-alt"></i>Logout</a></li>
                            </ul>
                        </div>
                    </div>
    			</div>
    		</div>
    	</header>
        <div class="wrapper">
            <div class="side-bar">
                <ul >
                    <li><a href=""><i class="fas fa-tachometer-alt"></i>Dashboard</a></li>
                    <li><a href="javascript:;"><i class="fas fa-book"></i> UI element</a>
                        <span class="dcjq-icon"></span>
                        <ul class="sub-menu">
                            <li><a href="b.html">Typography</a></li>
                            <li><a href="">Glyphicon</a></li>
                            <li><a href="">Grids</a></li>
                        </ul>
                    </li>
                    <li><a href="javascript:;"><i class="fas fa-book"></i> Parent Category</a>
                        <span class="dcjq-icon"></span>
                        <ul class="sub-menu">
                            <li><a href="{{route('parent.add')}}">Add Parent Category</a></li>
                            <li><a href="{{route('parent.list')}}">List Parent Category</a></li>
                            
                        </ul>
                    </li>
                    <li><a href="javascript:;"><i class="fas fa-book"></i> Category</a>
                        <span class="dcjq-icon"></span>
                        <ul class="sub-menu">
                            <li><a href="{{route('cate.add')}}">Add Category</a></li>
                            <li><a href="{{route('cate.list')}}">List Category</a></li>
                            
                        </ul>
                    </li>
                    <li><a href="javascript:;"><i class="fas fa-book"></i> Product</a>
                        <span class="dcjq-icon"></span>
                        <ul class="sub-menu">
                            <li><a href="{{route('product.add')}}">Add Product</a></li>
                            <li><a href="{{route('product.list')}}">List Product</a></li>
                        </ul>
                    </li>
                    <li><a href="javascript:;"><i class="fas fa-book"></i> Order</a>
                        <span class="dcjq-icon"></span>
                        <ul class="sub-menu">
                            <li><a href="{{route('order.list')}}">List Order</a></li>
                            
                        </ul>
                    </li>
                    <li><a href="javascript:;"><i class="fas fa-book"></i> Setting</a>
                        <span class="dcjq-icon"></span>
                        <ul class="sub-menu">
                            <li><a href="{{route('setting.add')}}">Add Setting</a></li>
                            <li><a href="{{route('product.list')}}">List Setting</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="main">
                @yield('form-table')
                
            </div>

        </div>
        
    </div>
    <!-- JS -->
    
    <script type="text/javascript" src="{{asset('back-end/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="{{asset('back-end/bootstrap/js/popper.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('back-end/js/jquery.nicescroll.js')}}"></script>
    <script src="{{asset('back-end/js/jquery.dataTables.min.js')}}"></script>

    <script type="text/javascript" src="{{asset('back-end/js/myjs.js')}}"></script>
</body>

</html>