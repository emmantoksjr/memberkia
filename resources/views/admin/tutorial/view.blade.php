@extends('layouts.admin')
@section('title', 'View tutorials')
@section('title', 'View tutorials')
@section('content')

  <div class="container mt-3 mb-3" style="max-width:700px;">
  
      <div class="my-card p-3">

        <h1>{{$tutorial->name}}</h1>
        <p class="text-left">
            {{ $tutorial->description}}
        </p>
        <p class="text-left">
          Prequisites:  {{ $tutorial->prequisites}}
        </p>
        <div class="details mt-5">
           <div class="row mb-3">
              <div class="col-1">
                <i class="material-icons">
                person
                </i> 
              </div>
              <div class="col-11">
                 <h4>{{$tutorial->level}} Level</h4>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-1">
                <i class="material-icons">
                location_on
                </i>
              </div>
              <div class="col-11">
                 <h4> {{$tutorial->location}}</h4>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-1">
                <i class="material-icons">
                access_time
                </i>
              </div>
              <div class="col-11">
               Start:  <h4> {{$tutorial->start_time}} </h4>
               End:  <h4> {{$tutorial->end_time}} </h4>
              </div>
              
            </div>
             <div class="row mb-3">
              <div class="col-1">
                <i class="material-icons">
                calendar_today
                </i>
              </div>
              <div class="col-11">
                 <h4> {{$tutorial->date}} </h4>
              </div>
            </div>
            <div class="actions">
            <a href="{{ route('admin.tutorials') }}" class="mdl-button mdl-button--colored mdl-button--raised mdl-js-button mdl-js-ripple-effect">Back</a>
            <a href="{{ route('tutorial.edit', $tutorial->id) }}" class="mdl-button mdl-button--colored mdl-button--raised mdl-js-button mdl-js-ripple-effect">Edit</a>
            </div>
        </div>
      </div>
  </div>
@stop