@extends('layouts.admin')
@section('title', 'Edit Events')
@section('bar', 'Edit Events')
@section('content')
    <div class="container mt-3 mb-2" style="max-width: 700px;">
        <div class="my-card mb-3">
            <div class="title p-3">
                <h3>Provide Event necessary details.</h3>
            </div>
            <form id="form" class="p-3" method="post">
                @csrf
                <div class="form-group">
                    <label for="name">Event Name <span class="required">*</span> </label>
                    <input  class="form-control" type="text" name="name" value="{{$event->name}}" id="name" required>
                </div>
                @if ($errors->has('name'))
                    <p class="alert alert-danger">
                        <span>{{ $errors->first('name') }}</span>
                    </p>
                @endif
                <div class="form-group">
                    <label for="description">Event Description <span class="required">*</span></label>
                    <textarea rows="5" cols="5" class="form-control" type="text" name="description" id="description" required> {{$event->description }}</textarea>
                </div>
                @if ($errors->has('description'))
                    <p class="alert alert-danger">
                        <span>{{ $errors->first('description') }}</span>
                    </p>
                @endif
                <div class="form-group">
                    <label for="location">Event location <span class="required">*</span></label>
                    <input  class="form-control" type="text" value="{{$event->location}}" name="location" id="location">
                </div>
                <div class="form-group">
                    <label for="datepicker">Event Date <span class="required">*</span></label>
                    <input  class="form-control input-group" type="date" value="{{$event->date}}" id="datepicker" name="date" required>
                </div>
                @if ($errors->has('date'))
                    <p class="alert alert-danger">
                        <span>{{ $errors->first('date') }}</span>
                    </p>
                @endif
                <div class="form-group">
                    <label for="datepicker">Event Start Time <span class="required">*</span></label>
                    <input  class="form-control" autocomplete="off" type="time" value="{{$event->time}}" id="datepicker" name="time">
                </div>
                @if ($errors->has('time'))
                    <p class="alert alert-danger">
                        <span>{{ $errors->first('time') }}</span>
                    </p>
                @endif

                <div class="form-group">
                    <label for="datepicker">Event End Time <span class="required">*</span></label>
                    <input  class="form-control" autocomplete="off" type="time" value="{{$event->end_time}}" id="datepicker" name="end_time">
                </div>
                @if ($errors->has('end_time'))
                    <p class="alert alert-danger">
                        <span>{{ $errors->first('end_time') }}</span>
                    </p>
                @endif

                <div class="form-group">
                    <label>Mode <span class="required">*</span></label><br>
                    <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="free">
                        <input checked class="mdl-radio__button" id="free"  name="mode" type="radio"
                               value="1">
                        <span class="mdl-radio__label">Free</span>
                    </label>
                    <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="paid">
                        <input class="mdl-radio__button" id="paid" name="mode" type="radio" value="2">
                        <span class="mdl-radio__label">Paid</span>
                    </label>
                </div>
                <div class="form-group">
                    <label>Viewers <span class="required">*</span></label><br>
                    <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="student">
                        <input checked class="mdl-radio__button" id="student" name="viewers" type="radio"
                               value="1">
                        <span class="mdl-radio__label">Student</span>
                    </label>
                    <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="alumni">
                        <input class="mdl-radio__button" id="alumni" name="viewers" type="radio" value="2">
                        <span class="mdl-radio__label">Alumni</span>
                    </label>
                    <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="both">
                        <input class="mdl-radio__button" id="both" name="viewers" type="radio" value="3">
                        <span class="mdl-radio__label">Both</span>
                    </label>
                </div>
                <div class="form-group" id="showPrice">
                    <label for="c2">Price(NGN) <span class="required">*</span></label>
                    <input type="number" value="0" min="0" step="0.01" data-number-to-fixed="2"
                           name="price"  data-number-stepfactor="100" class="form-control input-group" id="c2" required/>
                </div>
                <div class="form-group">
                    <a href="javascript:history.go(-1);" class="mdl-button mdl-button--colored mdl-button--raised mdl-js-button mdl-js-ripple-effect">Back</a>
                    <button type="submit" style="float: right;" class="mdl-button mdl-button--colored mdl-button--raised mdl-js-button mdl-js-ripple-effect">Save</button>
                </div>
            </form>
        </div>
    </div>
@stop
