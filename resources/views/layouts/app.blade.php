<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <!--<script src="{{ asset('js/app.js') }}" defer></script>-->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/product-details-style.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/all.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/footer.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/navbar-style.css')}}" type="text/css">
    

    @yield('extra-css')

</head>
<body>
    <div id="app">
        <header class="main-header">
            <!-- Start Navigation -->
            <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-default bootsnav">
                <div class="container">
                    <!-- Start Header Navigation -->
                    <div class="navbar-header">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fa fa-bars"></i>
                        </button>
                        <a class="navbar-brand" href="{{ url('/') }}"><img src="images/logo.png" class="logo" alt=""></a>
                    </div>
                    <!-- End Header (brands) Navigation -->
    
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="navbar-menu">
                        <ul class="nav navbar-nav mr-auto" data-in="fadeInDown" data-out="fadeOutUp">
                            @guest
                            @else

                            @if (Auth::user()->role_id == 1) {{-- if admin --}}
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('workers')}}">Manage workers</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('clients')}}">Manage clients</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('admin.newOrders')}}">Orders</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('postalsettings')}}">Post settings</a>
                                </li>
                            @endif

                            @if (Auth::user()->role_id == 2) {{-- if postal worker --}}
                                <li class="nav-item">
                                    <a class="nav-link" href="/postalworker">My orders<span class="sr-only"></span></a>
                                </li>
                            @endif

                            @if (Auth::user()->role_id == 3 && Auth::user()->isActive) {{-- if seller --}}
                                <li class="nav-item">
                                    <a class="nav-link" href="/order">New Order<span class="sr-only"></span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/orders">All Orders <span class="sr-only"></span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/newProduct">New Product<span class="sr-only"></span></a>
                                </li>
                            @endif
                        @endguest
                    </ul>

                    <!-- Right Side Of Navbar -->

                        <ul class="nav navbar-nav" data-in="fadeInDown" data-out="fadeOutUp">
                            <!-- Authentication Links -->
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('order.track.view') }}">{{ __('Track order') }}</a>
                            </li>
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if(Route::has('register'))
                            <li class="dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Register</span></a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{ route('register') }}">
                                        {{ __('As seller') }}
                                    </a></li>
                                    <li><a class="dropdown-item" href="{{ route('registerBuyer') }}">
                                        {{ __('As buyer') }}
                                    </a></li>
                                </ul>
                            </li>
                            @endif
                        @else
                            
                            @if (Auth::user()->isActive)
                            <li class="dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">{{ Auth::user()->name }}</a>
                                <ul class="dropdown-menu">
                                    @if (Auth::user()->role_id == 4)
                                    <li>
                                        <a href={{route('purchaseHistory', Auth::user()->id)}}>My Purchases</a>
                                    </li>
                                        @endif
                                        <li><a href="#">Reset Password</a></li>
                                        <li><a href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a></li>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                </ul>
                            @endif
                            @if(Auth::user()->role_id == 4 && Auth::user()->isActive) {{-- if buyer --}}
                            <li>
                            <div class="attr-nav">
                                <ul>
                                    <li class="search"><a href="#"><i class="fa fa-search"></i></a></li>
                                    <li class="side-menu">
                                        <a href="/cart">
                                            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                            {{-- <i class="fa fa-shopping-bag"></i> --}}
                                            <span class="badge">{{$cartItems}}</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                            @endif
                        @endguest
                    </ul>
                </div>
            </div>

            <div class="side">
                <a href="#" class="close-side"><i class="fa fa-times"></i></a>
                <li class="cart-box">
                    <ul class="cart-list">
                        <li>
                            <a href="#" class="photo"><img src="images/img-pro-01.jpg" class="cart-thumb" alt="" /></a>
                            <h6><a href="#">Delica omtantur </a></h6>
                            <p>1x - <span class="price">$80.00</span></p>
                        </li>
                        <li class="total">
                            <a href="/cart" class="btn btn-default hvr-hover btn-cart">VIEW CART</a>
                            <span class="float-right"><strong>Total</strong>: $180.00</span>
                        </li>
                    </ul>
                </li>
            </div>
        </nav>
        </header>
        
        <div class="top-search">
            <div class="container">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-search"></i></span>
                    <input type="text" class="form-control" placeholder="Search">
                    <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
                </div>
            </div>
        </div>


        

        <main class="py-4">
            @include('inc.messages')
            @yield('content')
            @include('inc.footer')
        </main>
    </div>

@section('extra-js')
<script src="{{ asset('js/app.js') }}" defer></script>
<script src="{{ asset('js/bootsnav.js') }}" defer></script>
<script src="{{ asset('js/costum.js') }}" defer></script>
<script src="{{ asset('js/jquery-3.2.1.min.js') }}" defer></script>
@show

</body>
</html>
