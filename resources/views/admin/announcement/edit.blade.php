@extends('layouts.admin')
@section('title', 'Edit announcement')
@section('bar', 'Edit announcement')
@section('content')

<div class="row">
        <div class="col-lg-3 col-md-3 col-sm-3"></div>
        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="card-box">
                <h4 class="text-dark  header-title m-t-0">Kindly enter announcement and specify viewers</h4><br>
                <form action="" method="POST">
                    @csrf
                    <div class="form-group">
                        <div class="form-group">
                            <label for="">Title<span class="text-danger">*</span></label>
                            <input type="text"  placeholder="" name="title" class="form-control" required value="{{ $announcement->title }}">
                        </div>
                        @if ($errors->has('title'))
                    <p class="alert alert-danger">
                      <span>{{ $errors->first('title') }}</span>
                    </p>
                @endif
                    </div>
                    <div class="form-group">
                        <label class="control-label">Announcement<span class="text-danger">*</span></label>
                        <div class="">
                            <textarea class="form-control" rows="2" name="description" required>{{ $announcement->description }}</textarea>
                        </div>
                        @if ($errors->has('description'))
                        <p class="alert alert-danger">
                          <span>{{ $errors->first('description') }}</span>
                        </p>
                    @endif
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group no-margin">
                                <label for="field-7" class="control-label">Select Audience</label><br>
                                <div class="radio radio-info form-check-inline">
                                    <input type="radio" id="inlineRadio2" name="options" value="1" {{ $announcement->viewers == 1 ? 'checked' : 'notchecked' }}>
                                    <label for="inlineRadio2"> Student </label>
                                </div>
                                <div class="radio radio-info form-check-inline">
                                    <input type="radio" id="inlineRadio1" name="options" value="2" {{ $announcement->viewers == 2 ? 'checked' : 'notchecked' }}>
                                    <label for="inlineRadio1"> Alumni</label>
                                </div>
                                <div class="radio radio-info form-check-inline">
                                    <input type="radio" id="inlineRadio3" name="options" value="3" {{ $announcement->viewers == 3 ? 'checked' : 'notchecked' }}>
                                    <label for="inlineRadio3"> Both </label>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-9 col-sm-9"></div>
                        <div class="col-md-3 col-sm-3">
                            <button type="submit" name="save" value="save" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3"></div>
</div>
@stop