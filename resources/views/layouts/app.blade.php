<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'BicycleMd') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-table/bootstrap-table.css') }}" rel="stylesheet">
    <link href="{{ asset('fontawesome/css/all.css') }}" rel="stylesheet">

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('css/bootstrap-table/bootstrap-table.js') }}"></script>
    <script src="{{ asset('css/bootstrap-table/extensions/export/bootstrap-table-export.js') }}"></script>



    <script src="{{ asset('js/actions.js') }}"></script>
    <script src="{{ asset('js/tableExport.js') }}"></script>
    <script src="{{ asset('js/cartTable.js') }}"></script>

    <script>
        $(document).ready(function () {
            $('#carouselIndicators').carousel({
                interval: 5000
            });


        });
    </script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/home') }}">
                        <!--{{ config('app.name', 'Bicycle Md') }} -->
                        <img style="margin-left: 15px;" src="{{URL::asset('./images/logo.jpg')}}">
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ url('/') }}">Bikes</a></li>
                            <li><a href="{{ url('/') }}">Accessories</a></li>
                            <li><a href="{{ url('/') }}">Apparels</a></li>
                            <li><a href="{{ url('/') }}">About Us</a></li>

                            <!--<li><a href="{{ route('login') }}">Login</a></li>-->
                        @else
                            <li><a href="{{ route('purchase.index') }}">Purchase</a></li>
                            <li><a href="{{ route('transactions.index') }}">Transactions</a></li>
                            @if(Auth::user()->role == 'admin')
                                <li><a href="{{ route('inventory.index') }}">Inventory</a></li>
                                <li><a href="{{ route('reports.index') }}">Reports</a></li>
                                <li><a href="{{ route('admin.index') }}">Admin</a></li>
                            @endif
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                    {{ Auth::user()->user_id }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

                @yield('homeContent')

        <div class="container">
            <div class="container-fluid">
                <div class="row">
                @include('partials.errors')
                @include('partials.success')
                @yield('content')
                </div>
            </div>
        </div>



    </div>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
