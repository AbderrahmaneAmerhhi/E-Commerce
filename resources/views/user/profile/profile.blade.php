<!DOCTYPE html>
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

    <!--Font cdn-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Styles -->
    <link href="../../css/app.css" rel="stylesheet">
      <!-- Link Swiper's CSS -->
      <link  rel="stylesheet"   href="https://unpkg.com/swiper/swiper-bundle.min.css"  />
    <link href="../../css/mystyle.css" rel="stylesheet">

      @yield('styele')
</head>
<body id="profile">
    @if (session()->has("success") || session()->has('info') || session()->has('success-mail') || $errors->all())
    <div class="row" style="margin-top: 80px">
        <div class=" col-sm-6 col-md-8 mx-auto my-4">
        @include('layouts.alerts')
        </div>
    </div>
  @endif

    <center class='mt-5'>
        <div class="profile-box">
            <form action="{{route('user.update',$user->id)}}" method="POST"  autocomplete="off" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                @if (!empty($user->image))
                <img src="{{asset('images/users/'.$user->image)}}" alt="{{$user->name}}">
                @else
                <img src="{{asset('images/users/DefaultUserImg.png')}}" alt="Profil">
                @endif
               <input type="file" name="image" id="file" accept="image/*">
               <label for="file">EDIT PIC</label>

               <input
               type="text"
               name="name"
               autocomplete="off"
               @if (!empty($user->name))
                 value='{{$user->name}}'
               @else
               placeholder="User Name"
               @endif
                >

               <input
                type="text"
               name="FullName"
                @if (!empty($user->FullName))
                value='{{$user->FullName}}'
                @else
                placeholder="Add Your FullName. "
                @endif
                >
               <input
                type="email"
                 name="email"
                 @if (!empty($user->email))
                 value='{{$user->email}}'
                 @else
                 placeholder="Edit Your Email "
                 @endif
                 >
               <input
                type="password"
                 name="password_confirmation"
                 placeholder="Enter the new Password">

               <input
               type="password"
                name="password"
                 placeholder="Re-enter your password"
                 >
               <a type="button" href="/" style="float: left;margin: 10px 0 0 18.2%;" class="btn">CANCEL</a>
               <button type="submit" style="float: right;margin: 10px 18.2% 0 0;" class="btn">EDIT</button>

            </form>

        </div>
    </center>


    <script>
        var Msj=document.getElementsByClassName("msj")
        var btnclose=document.getElementById("close");
            btnclose.onclick=function(){
                for(c=0;c<Msj.length;c++){
                    Msj[c].style.display = "none";

                }

            }

    </script>

</body>
</html>
