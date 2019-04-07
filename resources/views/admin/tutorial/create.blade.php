@extends('layouts.admin')
@section('title', 'Create tutorial')
@section('bar', 'Create tutorial')
@section('content')
<div class="container mt-3 mb-3" style="max-width: 700px;">
    <div class="my-card p-3">
      <h3>Create tutorial</h3>
      <p>Fill necessary details</p>
      <hr>
      <form method="post">
      @csrf
          <div class="form-group">
            <label for="name">
              Tutorial name <span class="required">*</span>
            </label>
            <input type="text" name="name" value="{{ old('name')}}" id="name" class="form-control">
            @if($errors->has('name'))
            <p class="alert alert-danger">Name field is required</p>
            @endif
          </div>
          <div class="form-group">
              <label for="description">Description</label>
              <textarea name="description" name="description" value="{{ old('description')}}" id="description" class="form-control"></textarea>
              @if($errors->has('description'))
            <p class="alert alert-danger">Description field is required</p>
            @endif
          </div>
          <div class="form-group">
            <label for="location">Location <span class="required">*</span></label>
            <input type="text" name="location" value="{{ old('location')}}" id="location" class="form-control">
            @if($errors->has('location'))
            <p class="alert alert-danger">Location field is required</p>
            @endif
          </div>
          <div class="form-group">
            <label for="level">Level <span class="required">*</span></label>
            <select name="level" value="{{ old('level')}}" id="level" class="form-control">
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
            <label for="time">Tutorial start time <span class="required">*</span></label>
            <input type="time" value="{{ old('start_time')}}" name="start_time" class="form-control">
            @if($errors->has('start_time'))
            <p class="alert alert-danger">Start Time field is required</p>
            @endif
          </div>
          <div class="form-group">
            <label for="time">Tutorial End time <span class="required">*</span></label>
            <input type="time" value="{{ old('end_time')}}" name="end_time" class="form-control">
            @if($errors->has('end_time'))
            <p class="alert alert-danger">End Time field is required</p>
            @endif
          </div>
          <div class="form-group">
            <label for="date">Tutorial date <span class="required">*</span></label>
            <input type="date" value="{{ old('date')}}" name="date" id="date" class="form-control">
            @if($errors->has('date'))
            <p class="alert alert-danger">Tutorial Date field is required</p>
            @endif
          </div>
          <div class="form-group">
            <label for="date">Prequisites</label>
            <input type="text" value="{{ old('prequisites')}}" name="prequisites" class="form-control">
            @if($errors->has('prequisites'))
            <p class="alert alert-danger">Prequisites field is required</p>
            @endif
          </div>
          <div class="form-group">
            <a href="{{ route('admin.tutorials') }}" class="mdl-button mdl-button--colored mdl-button--raised mdl-js-button mdl-js-ripple-effect">Back</a>
            <button type="submit" href="{{ route('admin.tutorials') }}" class="mdl-button mdl-button--colored mdl-button--raised mdl-js-button mdl-js-ripple-effect">Create Tutorial</button>
          </div>
      </form>
    </div>
</div>
@stop