@extends('layouts.student')
@section('title', 'Dues')
@section('bar', 'Dues')
@section('content')
   <div class="container-fluid">

<!-- Page-Title -->
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <h4 class="page-title">Due</h4>
            
            <div class="clearfix"></div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-2 col-md-2 col-sm-3"></div>
    <div class="col-lg-8 col-md-8 col-sm-6">
        <div class="card-box">
            

            <ul class="nav nav-tabs tabs-bordered nav-justified">
                <li class="nav-item">
                    <a href="/student/dues" aria-expanded="false" class="nav-link">
                        Pending Dues
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/student/dues/paid"  aria-expanded="true" class="nav-link active">
                        Paid Dues
                    </a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane  active" id="home-b2">
                   <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Session</th>
                                <th>Amount</th>
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
                    </table><br>
                    {{$student_dues->links()}}
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-2 col-md-2 col-sm-3"></div>
</div>
@stop