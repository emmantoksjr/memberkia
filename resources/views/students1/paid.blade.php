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
                <a class="nav-link active" href="/student/paid">Paid Dues</a>
            </li>

        </ul>


        <div class="my-card p-3 mt-2">

            <div class="table-responsive table-responsive-sm">

                <table class="table table-striped">

                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Session</th>
                            <th>Mode of payment</th>
                            <th>Amount Paid (NGN)</th>
                            <th>Amount balance (NGN)</th>
                            <th>Date</th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>

                        <tr>
                            <td>1</td>
                            <td>Student Association fee</td>
                            <td>2017/2018</td>
                            <td>Bank</td>
                            <td>1000</td>
                            <td>0.00</td>
                            <td>26-11-2018</td>
                            <td><a href="{{ route('admin.payment.details') }}" class="mdl-button btn-sm mdl-js-button text-center mdl-button mdl-button--colored">View details</a></td>

                        </tr>

                        <tr>
                            <td>2</td>
                            <td>Student Development fee</td>
                            <td>2017/2018</td>
                            <td>Bank</td>
                            <td>1500</td>
                            <td>0.00</td>
                            <td>26-11-2018</td>
                            <td><a href="{{ route('admin.payment.details') }}" class="mdl-button btn-sm mdl-js-button text-center mdl-button mdl-button--colored">View details</a></td>


                        </tr>

                        <tr>
                            <td>3</td>
                            <td>Student Sport fee</td>
                            <td>2017/2018</td>
                            <td>Office</td>
                            <td>700</td>
                            <td>300.00</td>
                            <td>26-11-2018</td>
                            <td><a href="{{ route('admin.payment.details') }}" class="mdl-button btn-sm mdl-js-button text-center mdl-button mdl-button--colored">View details</a></td>


                        </tr>

                        <tr>
                            <td>4</td>
                            <td>Student Medical fee</td>
                            <td>2017/2018</td>
                            <td>Online</td>
                            <td>500</td>
                            <td>400.00</td>
                            <td>26-11-2018</td>
                            <td><a href="{{ route('admin.payment.details') }}" class="mdl-button btn-sm mdl-js-button text-center mdl-button mdl-button--colored">View details</a></td>


                        </tr>
                    </tbody>

                </table>

            </div>


        </div>


    </div>

@stop