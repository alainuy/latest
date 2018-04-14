@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">ePLDT Employee Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div>Daily Time Record</div> 

                    <table class="table table-bordered table-hover ">
                        <tr class="success">
                            <th>ePLDT ID</th>
                            <th>Full Name</th>
                            <th>Time - IN</th>
                            <th>Time - OUT</th>
                        </tr>
                        @foreach ($attendances as $attendance)

                            <tr>
                                <td> EP{{ $attendance->emp_id }} </td>
                                <td> {{ $attendance->name }}</td>
                                <td> {{ Carbon\Carbon::parse($attendance->time_in)->format('l - d/F/Y - g:i A') }} </td>
                                <td> {{ $attendance->time_out ? Carbon\Carbon::parse($attendance->time_out)->format('l - d/F/Y - g:i A') : '' }} </td>
                            </tr>
    
                            
                        @endforeach

                    </table>

                    {{ $attendances->links() }}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
