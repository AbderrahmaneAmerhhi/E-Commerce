<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{asset('js/app.js')}}" defer></script>
        <link rel="shortcut icon" href="{{asset("images/logos/logosite.png")}}">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Styles -->
    <link href="../../css/app.css" rel="stylesheet">
      <!-- Link Swiper's CSS -->
      <link  rel="stylesheet"   href="https://unpkg.com/swiper/swiper-bundle.min.css"  />
    <link href="../../css/mystyle.css" rel="stylesheet">

      @yield('styele')

</head>
<body>

    <div id="app">

            <nav class="navbar navbar-expand-md navbar-light  bg-white d-flex justify-content-between fixed-top">
                <div class="container">
                    <a class="navbar-brand logo" href="{{ url('/') }}">
                       <img src="{{asset("images/logos/logosite.png")}}" alt="Logo" class="img-fluid logo">
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>


                    <div class="collapse navbar-collapse" id="navbarSupportedContent">


                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item"><a href="/#products" class="nav-link">Products</a></li>
                            <li class="nav-item"><a href="/#contact" class="nav-link">Contacts</a></li>
                        </ul>


                         @if (Auth()->guard("admin")->check())

                         @else
                         <ul class="navbar-nav mr-auto">
                             <li class="nav-item">
                                <a href="{{route('user.orders')}}" class="nav-link">
                                    @if (Auth()->guard()->check())
                                    <i class="fa fa-shopping-cart"></i> ({{auth()->user()->orders->count()}})
                                    @else
                                     @endif

                               </a>
                            </li>
                         </ul>
                         @endif



                        <ul class="navbar-nav ml-auto ">
                            <!-- Authentication Links -->
                                @guest
                                @if (Request::is("admin/login"))
                                @else
                                        @if (Route::has('login'))
                                       <li class="nav-item d-flex align-items-center login ">
                                        <i class="fa fa-user "></i>  <a class="nav-link ml-2" href="{{ route('login') }}">{{ __('Login') }}</a>
                                        </li>
                                    @endif

                                    @if (Route::has('register'))
                                        <li class="nav-item">
                                            <a class="nav-link register" href="{{ route('register') }}">{{ __('Register') }}</a>
                                        </li>
                                    @endif
                                @endif

                                @else

                                    @if (Auth()->guard("admin")->check())
                                    <li class="nav-item dropdown">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            {{ Auth::guard("admin")->user()->name }}
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>

                                            <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                        </div>
                                    </li>
                                    @else

                                      <li class="nav-item dropdown">

                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                           @if (!empty(Auth()->user()->FullName))
                                           {{ Auth::user()->FullName }}
                                           @else
                                           {{ Auth::user()->name }}
                                           @endif
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                          {{-- Edit profin button --}}
                                          <a class="dropdown-item" href="{{ route('user.edit',auth()->user()->id) }}">
                                           Edit My Profil
                                          </a>

                                          {{-- Logout Button --}}
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                        </div>
                                    </li>

                                    @endif

                                @endguest
                            </li>


                        </ul>
                    </div>
                </div>
            </nav>



                @if (session()->has("success") || session()->has('info') || session()->has('success-mail') || $errors->all())
                <div class="row mt-md-5 pt-5">
                    <div class=" col-sm-6 col-md-8 mx-auto my-4">
                    @include('layouts.alerts')
                    </div>
                </div>
              @endif


        <main class="">
            @yield('content')
        </main>
    </div>

<!-- Swiper dyal cats scripts --->
    <!-- Swiper JS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
            </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

    @yield('javascript')
</body>
</html>
