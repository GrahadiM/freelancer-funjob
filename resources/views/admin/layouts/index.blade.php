<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{ config('app.name', 'Laravel') }}</title>
    @include('admin.layouts.head')
</head>
<body>
    <div id="app">
        <div id="sidebar" class='active'>
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    {{-- <img src="{{ asset('assets/dist') }}/assets/images/logo.svg" alt="" srcset=""> --}}
                    <h1 style="font-weight: bold;"><a href="{{ url('/home') }}">{{ config('app.name', 'Laravel') }}</a></h1>
                </div>
                @include('admin.layouts.sidebar')
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>
        <div id="main">
            <nav class="navbar navbar-header navbar-expand navbar-light">
                <a class="sidebar-toggler" href="#"><span class="navbar-toggler-icon"></span></a>
                <button class="btn navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav d-flex align-items-center navbar-light ml-auto">
                        <li class="dropdown">
                            <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                                <div class="d-none d-md-block d-lg-inline-block mr-2">{{ Auth::user()->name }}</div>
                                <div class="avatar mr-1">
                                    {{-- <img src="{{ asset('') }}{{ Auth::user()->image }}" alt="" srcset=""> --}}
                                    <img src="{{ asset('image/profile') }}/{{ Auth::user()->image }}" alt="thumbnail" srcset="">
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item {{ Request::is('profile*') ? 'active' : ''}}" href="{{ url('/profile') }}"><i data-feather="user"></i> Account</a>
                                {{-- <a class="dropdown-item" href="#"><i data-feather="mail"></i> Messages</a> --}}
                                @if (auth()->user()->role_id == 1)
                                    <a class="dropdown-item {{ Request::is('setting*') ? 'active' : ''}}" href="#"><i data-feather="settings"></i> Settings</a>
                                @endif
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                              document.getElementById('logout-form').submit();">
                                    <i data-feather="log-out"></i> Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            
            <div class="main-content container-fluid">
                <div class="page-title">
                    <h3>@yield('judul')</h3>
                    {{-- <p class="text-subtitle text-muted">A good dashboard to display your statistics</p> --}}
                </div>
                @yield('content')
            </div>

            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-left">
                        {{-- <p>2021 &copy; {{ config('app.name', 'Laravel') }}</p> --}}
                        <p class="text-center">Copyright &copy; <?php echo date('Y') ?> {{ config('app.name', 'Laravel') }}</p>
                    </div>
                    {{-- <div class="float-right">
                        <p>Crafted with <span class='text-danger'><i data-feather="heart"></i></span> by <a href="http://ahmadsaugi.com">Ahmad Saugi</a></p>
                    </div> --}}
                </div>
            </footer>
        </div>
    </div>
    @include('admin.layouts.js')
</body>
</html>