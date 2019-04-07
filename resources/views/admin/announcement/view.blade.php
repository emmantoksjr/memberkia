@extends('layouts.admin')
@section('title', 'View details')
@section('bar', 'Announcement')
@section('content')

    <div class="container my-card mt-4" style="max-width: 600px">

        <div class="head p-4">
            <h3>{{ $announcement->title }}</h3>
            <ul class="demo-list-icon mdl-list">

                <li class="mdl-list__item">
    <span class="mdl-list__item-primary-content">
    <i class="material-icons mdl-list__item-icon">record_voice_over</i>
        {{--<span class="badge badge-danger">Alumni</span>--}}
        @if($announcement->viewers == 1)
            <span class="badge badge-primary">Student</span>
        @elseif($announcement->viewers == 2)
            <span class="badge badge-danger">Alumni</span>
        @elseif($announcement->viewers == 3)
            <span class="badge badge-primary">Student</span>
           <span class="badge badge-danger">Alumni</span>
        @endif
    </span>
     </li>

                <li class="mdl-list__item">
    <span class="mdl-list__item-primary-content">
    <i class="material-icons mdl-list__item-icon">calendar_today</i>
    {{ $announcement->created_at }}
    </span></li>

            </ul>

            <a href="{{ route('admin.announcement.edit', $announcement->id) }}" class="mdl-button mdl-js-button mdl-button--raised mdl-button mdl-button--colored">Edit</a>
            <a href="/admin/announcements" class="mdl-button mdl-js-button mdl-button--raised mdl-button mdl-button--colored">Back</a>
        </div>
        <div class="body p-4">
           <p>{{ $announcement->description  }}
           </p>
        </div>

    </div>

@stop