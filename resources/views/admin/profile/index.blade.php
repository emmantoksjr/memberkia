@extends('layouts.admin')
@section('title', 'Profile')
@section('content')
<div class="row">
        <div class="col-lg-3 col-md-4 col-sm-4"></div>
        <div class="col-lg-6 col-md-4 col-sm-4">
            <div class="text-center card-box">
                <div class="member-card">
                    <div class="text-left m-t-40">
                        <p class="text-muted font-13"><strong>Full Name :</strong> <span class="m-l-15">{{ $organisation->department_name }}</span></p>

                        <p class="text-muted font-13"><strong>Mobile :</strong><span class="m-l-15">{{ $organisation->phone }}</span></p>

                        <p class="text-muted font-13"><strong>Email :</strong> <span class="m-l-15"> {{ $user->email }}</span></p>
                        </div>
                    </div>
                    <a href="{{ route('admin.profile.edit', Auth::user()->id) }}" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">Edit Profile</a>
                </div>
            </div>
        <div class="col-lg-3 col-md-4 col-sm-4"></div>
</div>
@stop






















