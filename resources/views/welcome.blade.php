<!doctype html>
@include('layouts.app')
<style type="text/css">
    #realClock {
            font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            width: 900px;
            margin: auto;
            text-align: center;
            font-size: 150px;
    }
</style>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{ asset('css/input.css') }}">
        <title>TitO</title>


    </head>
    <body>


<div class="container">

        <div class="jumbotron text-center">
                         
                <div>                   
                    <h1><div class='container' id="realClock"></div></h1> 
                </div>

                {!! Form::open(['action' => 'AttendancesController@store', 'method' => 'POST', 'autocomplete' => 'off']) !!}

                <div style="width:250px;margin:0 auto;">

                        <div class="form-group">                       
                                <div style="width:150px;margin:0 auto;">
                            <div class="center-block">
                              <h3>{{ Form::label('employeeid', 'ePLDT ID #:' ) }}</h3>
                                {{ Form::text('emp_id', '', ['class' => 'form-control form-control-inline input-field', 'required', 'autofocus', 'size' => '3', 'maxlength' => '4', 'placeholder' => '8100']) }}                           
                            </div>
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
                </div>
                {!! Form::close() !!}

        </div>

        <div class="text-center"> 
            <h4>Currently Logged IN:</h4>  
        </div>

        <div style="width:250px;margin:0 auto;">

            @if ( count($actives) > 0)


                    <table class="table table-bordered table-condensed ">
                        <tr class="success">
                            {{--  <th class="text-center">Name</th>  --}}
                            {{--  <th class="text-center">Time IN</th>  --}}
                        </tr>

                        @foreach ($actives as $active)

                            <tr>
                                <td class="success">{{ $active->name}}</td>
                                {{--  <td>{{ Carbon\Carbon::parse($active->time_in)->format('M-d-Y - g:i A')  }}</td>  --}}
                            </tr>

                        @endforeach

                    </table>              
                
            @else
                <h4>
                    <div class="text-center"><p>NONE as of the moment..</p></div> 
                </h4>
            @endif
        </div>

</div>
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('js/timer.js') }}"></script>

    </body>
</html>
