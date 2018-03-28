@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!

                    <table class="table table-striped">
                        <tr>
                            <th>ePLDT ID</th>
                            <th>Full Name</th>
                            <th>Time - IN</th>
                            <th>Time - OUT</th>
                        </tr>
                        @foreach ($attendances as $attendance)

                            <tr>
                                <td> EP{{ $attendance->emp_id }} </td>
                                <td> {{ auth()->user()->name }}</td>
                                <td> {{ $attendance->time_in }}</td>
                                <td> {{ $attendance->time_out }} </td>
                            </tr>
    
                            
                        @endforeach

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
