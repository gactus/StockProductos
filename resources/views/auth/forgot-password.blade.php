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
                display: inline-table;
            }

            .titulo{
                -webkit-text-fill-color: white;
                -webkit-text-stroke: 1px black;
                text-align: center ;


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
            .container{
                align-content: center;
                color: #ffffff;  
                max-height:550px;
                max-width: 700px;

            }



        </style>

        <div class="container">
            <div class="mb-4 text-sm text-gray-600">
                {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
            </div>

            @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
            @endif
            <h1 class="titulo"  >Ingrese su email: </h1>
            <x-jet-validation-errors class="mb-4" />

            <form  method="POST" action="{{ route('password.email') }}"
                   @csrf

                   <div class="block">

                <center><x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                </center></div>

    <center><div class="flex items-center justify-end mt-4">
            <x-jet-button>
                {{ __('Email Password Reset Link') }}
            </x-jet-button>
    </center></div>
</form>
</div>
</x-guest-layout>
