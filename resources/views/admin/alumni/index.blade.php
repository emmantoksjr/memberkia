@extends('layouts.admin')
@section('title', 'View alumni')
@section('bar', 'Alumni')
@section('content')

    <div class="container my-card mt-4">

        <div>
            <a href="{{ route('admin.alumni.create') }}" role="button" class="mdl-button mdl-js-button m-2 mdl-button--raised mdl-button mdl-button--colored">Add alumni</a>
            <a href ="{{ route('admin.alumni.batch') }}" role="button" class="mdl-button mdl-js-button m-2  mdl-button--raised mdl-button mdl-button--colored">Upload alumni</a>
        </div><br>
        <div class="table-responsive-sm table-responsive-lg">

            <table class="table table-striped">

                <thead>
                <tr>
                    <th class="mdl-data-table__cell--non-numeric">ID</th>
                    <th>Matric number</th>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Matric Number</th>
                    <th>Course of study</th>
                    <th>Phone number</th>
                    <th>Email address</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($alumnis as $alumni)
                    <tr>
                        <td>{!! $id++ !!}</td>
                        <td>{!! $alumni->matric_num !!}</td>
                        <td>{!! $alumni->firstname !!}</td>
                        <td>{!! $alumni->lastname !!}</td>
                        <td>{!! $alumni->matric_num !!}</td>
                        <td>{!! $alumni->course_of_study !!}</td>
                        <td>{!! $alumni->phone !!}</td>
                        <td>{!! $alumni->email !!}</td>
                        <td>
                            <a  href="{!! action('AdminController@editAlumni', $alumni->id)!!}"
                                class="mdl-button mdl-js-button   mdl-button--raised mdl-button mdl-button--colored">Edit</a>
                            <a href="{!! action('AdminController@disableAlumni', $alumni->id)!!}"
                               class="mdl-button mdl-js-button  btn-danger  mdl-button--raised mdl-button">Disable</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <a href="{{ route('admin.alumni.create') }}/" target="_blank" id="view-source" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--primary">
            <i class="material-icons">add</i>
        </a>
    </div>
@stop