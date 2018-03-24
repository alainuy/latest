<!doctype html>
@include('layouts.app')
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>TitO</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        {{--  <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>  --}}
    </head>
    <body>
        {{--  <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif  --}}

<div class="container">
        <div class="jumbotron text-center">
                         
                <div >
                    <h1>Levaral</h1> 
                </div>

                {!! Form::open(['action' => 'AttendancesController@store', 'method' => 'POST']) !!}
                    
                    <div class="form-group">                       

                        <div class="center-block">
                            {{ Form::label('employeeid', 'Employee ID:' ) }} <br>
                            {{ Form::text('emp_id', '', ['class' => 'form-control form-control-inline', 'autofocus', 'size' => '3', 'maxlength' => '4', 'placeholder' => '8100']) }}                           
                        </div>

                        <div class="row">
                            <br> 
                            <div class="pull-left">
                                {{ Form::button('Time IN', ['type'=>'submit', 'name' => 'btnIn', 'value' => 'btnIn', 'class' => 'btn btn-primary btn-lg ']) }}
                            </div>
     
                            <div class="pull-right">
                                {{ Form::button('Time Out', ['type'=>'submit', 'name' => 'btnOut', 'value' => 'btnOut', 'class' => 'btn btn-danger btn-lg']) }}
                            </div>
                        </div>
    
                    </div>

                {!! Form::close() !!}

                <div class="links text-center"><h3>
                    <a href="https://laravel.com/docs">Documentation</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a></h3>
                </div>

        </div>


        </div>
    </body>
</html>
