<x-guest-layout>
    <head>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous"> 
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
    </head>
    <body>

        <style>
            .abs-center {
                display: flex;

                justify-content: center;
                min-height: 100vh;
            }

            html,body{
                height: 100%;
                width: 100%;
            }
            body{
                background-image: url(./img/background.jpg) ; 

                /* Full height */
                height: 100%;
                /* Center and scale the image nicely */
                background-position: center;
                background-repeat: no-repeat;
                background-size: cover;
                position: relative;
                overflow: hidden;
            }
            .titulo{
                -webkit-text-fill-color: white;
                -webkit-text-stroke: 1px black;
                text-align: center ;


            }
            .container{
                align-content: center;
                color: #d1d1d4d1;  
                max-height:550px;
                max-width: 700px;
                /*background:#1f1d1cd1;*/
            }
        </style>

    <x-jet-validation-errors class="mb-4" />

    <div class="container">
        <div class="float-left"><img src="//eva.ciisa.cl/pluginfile.php/1/theme_klassroom/logo/1634227653/logo-Ciisa.png" alt="logo"></div>

        <nav class="navbar navbar-bootswatch navbar-expand moodle-has-zindex float-right">
            <a style="color: white" class="navbar-brand d-none d-sm-inline ">
               
            </a>

            <ul class="navbar-nav navigation main-menu theme-ddmenu mobile-menu" data-animtype="2" data-animspeed="450" style="touch-action: pan-y;">
                <!-- custom_menu -->
                <li class="dropdown">
                    <a style="color: white" href="{{ route('login') }}" class="dropdown-toggle nav-link sf-with-ul" id="drop-down-616f38facef09616f38fac857216" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#" aria-controls="drop-down-menu-616f38facef09616f38fac857216">
                        Login
                        <b class="mobile-arrow"></b></a>

                <li class="dropdown">
                    <a style="color: white" href="{{ route('register') }}" class="dropdown-toggle nav-link sf-with-ul" id="drop-down-616f38facef09616f38fac857216" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#" aria-controls="drop-down-menu-616f38facef09616f38fac857216">
                        Registrar
                        <b class="mobile-arrow"></b></a>    
            </ul>
        </nav>
        <div class="clearfix"></div>
    </div>


     


    <div  class="container">
        <br>
        <br>
        <h1 class="titulo" > Registrar Usuario </h1> 
        <br>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="col">

                <div>
                    <x-jet-input class="form-control"  placeholder="name" id="name"  type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                </div>

                <div class="mt-4">
                    <x-jet-input  class="form-control"  placeholder="email" id="email"  type="email" name="email" :value="old('email')" required />
                </div>

                <div class="mt-4">

                    <x-jet-input class="form-control"  placeholder="password" id="password"  type="password" name="password" required autocomplete="new-password" />
                </div>

                <div class="mt-4">
                    <x-jet-input class="form-control"  placeholder="confirmar password" id="password_confirmation"  type="password" name="password_confirmation" required autocomplete="new-password" />
                </div>



                <div class="flex items-center justify-end mt-4">
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>

                    <button style="margin-left: 10px; margin-bottom:  10px"  type="submit" class="btn btn-primary">Registrar </button>
                </div>

        </form>
    </div>
</x-guest-layout>
