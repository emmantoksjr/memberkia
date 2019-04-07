@extends('layouts.student')
@section('title', 'Dues')
@section('bar', 'Dues')
@section('content')

    <div class="container" >
        <ul class="nav nav-tabs nav-justified">
            <li class="nav-item">
                <a class="nav-link" href="/student/dues">Pending Dues</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="#">Paid Dues</a>
            </li>
        </ul>
        <div class="my-card p-3 mt-2">
            <div class="table-responsive table-responsive-sm">
                <table id="example1" class="table table-striped table-hover dataTable js-exportable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Session</th>
                            <th>Amount (NGN)</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($dues as $due)
                        @foreach($student_dues as $student_due)
                            @if($due->id == $student_due->deu_id && $student_due->paid == 1)
                        <tr>
                            <td>{{$id++}}</td>
                            <td>{{$due->name}}</td>
                            <td>{{$due->session}}</td>
                            <td>{{$due->amount}}</td>
                            <td>{{$due->created_at}}</td>
                        </tr>
                            @endif
                        @endforeach
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@stop