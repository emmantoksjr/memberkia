@extends('layouts.student')
@section('title', 'Announcements')
@section('bar', 'Announcement')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 mb-3">
                <form method="post">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-4">
                            <label>From:</label>
                            <input name="from" type="date">
                        </div>
                        <div class="col-4">
                            <label>To:</label>
                            <input name="to" type="date">
                        </div>
                        <div class="col-4">
                            <button type="submit" class="btn btn-sm btn-success">Check</button>
                        </div>
                    </div>
                </form>
                @if($announcements->count() < 1)
                    <div class="my-card">
                        <div class="title-card ml-4 mt-4">
                            <p class="text-left text-wrap pt-3">No Announcement</p>
                        </div>
                        <div class="comment more ml-4 pb-4">
                            There is no announcement in the time range chosen. Kindly select another time range.
                        </div>
                    </div>
                @else
                    @foreach($announcements as $announcement)
                        <div class="my-card">
                            <div class="title-card ml-4 mt-4">
                                <h2 class="text-left text-wrap pt-3">{{ $announcement->title }}</h2>
                                <small class="badge badge-primary">admin</small>
                                <br>
                                <small class="text-muted text-left">{{ date('M d, Y H:i', strtotime($announcement->created_at)) }}</small>
                                <hr>
                            </div>
                            <div class="comment more ml-4 pb-4">
                                {{ $announcement->description }}
                            </div>
                        </div>
                    @endforeach
                @endif
                {{ $announcements->links() }}
            </div>
            <div class="col-md-4">
                <div class="title">
                    <h3>More Details</h3>
                    <hr>
                </div>
                <div class="my-card">
                    <ul class="demo-list-item mdl-list">
                        <li class="mdl-list__item">
                            <a href="#" class="mdl-list__item-primary-content">
                                Pay due
                            </a>
                        </li>
                        <li class="mdl-list__item">
                            <a href="#" class="mdl-list__item-primary-content">
                                Attend Event
                            </a>
                        </li>
                        <li class="mdl-list__item">
                            <a href="#" class="mdl-list__item-primary-content">
                                View Payments
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@stop