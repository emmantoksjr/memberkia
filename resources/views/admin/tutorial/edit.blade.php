@extends('layouts.admin')
@section('title', 'Edit tutorial')
@section('bar', 'Edit tutorial')
@section('content')
<div class="container mt-3 mb-3" style="max-width: 700px;">
    <div class="my-card p-3">
      <h3>Edit tutorial</h3>
      <p>Fill necessary details</p>
      <hr>
      <form method="post">
      @csrf
          <div class="form-group">
            <label for="name">
              Tutorial name <span class="required">*</span>
            </label>
            <input type="text" name="name" value="{{ $tutorial->name}}" id="name" class="form-control">
            @if($errors->has('name'))
            <p class="alert alert-danger">Name field is required</p>
            @endif
          </div>
          <div class="form-group">
              <label for="description">Description</label>
              <textarea name="description"   name="description" id="description" class="form-control">{{ $tutorial->description}}</textarea>
              @if($errors->has('description'))
            <p class="alert alert-danger">Description field is required</p>
            @endif
          </div>
          <div class="form-group">
            <label for="location">Location <span class="required">*</span></label>
            <input type="text" name="location" value="{{ $tutorial->location}}"  id="location" class="form-control">
            @if($errors->has('location'))
            <p class="alert alert-danger">Location field is required</p>
            @endif
          </div>
          <div class="form-group">
            <label for="level">Level <span class="required">*</span></label>
            <select name="level" id="level" class="form-control">
              <option value="100">100</option>
              <option value="200">200</option>
              <option value="300">300</option>
              <option value="400">400</option>
              <option value="500">500</option>
              <option value="600">600</option>
              <option value="700">700</option>
            </select>
          </div>
          <div class="form-group">
            <label for="time">Tutorial Start time <span class="required">*</span></label>
            <input type="time" name="start_time" value="{{ $tutorial->start_time}}"  id="time" class="form-control">
            @if($errors->has('start_time'))
            <p class="alert alert-danger">Start Time field is required</p>
            @endif
          </div>
          <div class="form-group">
            <label for="time">Tutorial End time <span class="required">*</span></label>
            <input type="time" name="end_time" value="{{ $tutorial->end_time}}"  id="time" class="form-control">
            @if($errors->has('end_time'))
            <p class="alert alert-danger">End Time field is required</p>
            @endif
          </div>
          <div class="form-group">
            <label for="date">Tutorial date <span class="required">*</span></label>
            <input type="date" name="date" value="{{ $tutorial->date}}"  id="date" class="form-control">
            @if($errors->has('date'))
            <p class="alert alert-danger">Tutorial Date field is required</p>
            @endif
          </div>
          <div class="form-group">
            <label for="date">Prequisites</label>
            <input type="text" name="prequisites"value="{{ $tutorial->prequisites}}"  class="form-control">
            @if($errors->has('prequisites'))
            <p class="alert alert-danger">Prequisites field is required</p>
            @endif
          </div>
          <div class="form-group">
            <a href="{{ route('admin.tutorials') }}" class="mdl-button mdl-button--colored mdl-button--raised mdl-js-button mdl-js-ripple-effect">Back</a>
            <button type="submit" class="btn btn-primary waves-effect waves-light m-b-5">Save Tutorial</button>
          </div>
      </form>
    </div>
</div>
@stop