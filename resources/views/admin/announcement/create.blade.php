@extends('layouts.admin')
@section('title', 'Add announcement')
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
                            <input type="text"  placeholder="" name="title" class="form-control" required>
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
                            <textarea class="form-control" rows="2" name="description" required></textarea>
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
                                    <input type="radio" id="inlineRadio2" name="options" value="1" checked>
                                    <label for="inlineRadio2"> Student </label>
                                </div>
                                <div class="radio radio-info form-check-inline">
                                    <input type="radio" id="inlineRadio1" name="options" value="2">
                                    <label for="inlineRadio1"> Alumni</label>
                                </div>
                                <div class="radio radio-info form-check-inline">
                                    <input type="radio" id="inlineRadio3" name="options" value="3">
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
    {{-- <div class="container my-card mt-4" style="max-width: 600px">
            <h3 class="p-3">Kindly enter announcement and specify viewers</h3>
            <form class="p-4" method="post">
                @csrf
    
                <div class="form-group">
                    <div class="mdl-textfield  mdl-textfield--full-width mdl-js-textfield mdl-textfield--floating-label">
                        <input class="mdl-textfield__input" type="text" name="title" id="title">
                        <label class="mdl-textfield__label" for="name">Title <span class="required">*</span></label>
                    </div>
                    @if ($errors->has('title'))
                        <p class="alert alert-danger">
                          <span>{{ $errors->first('title') }}</span>
                        </p>
                    @endif
                </div>
                <div class="form-group">
                    <div class="mdl-textfield  mdl-textfield--full-width mdl-js-textfield mdl-textfield--floating-label">
                        <textarea rows="5" class="mdl-textfield__input" type="text" name="description" id="description"></textarea>
                        <label class="mdl-textfield__label" for="name">Announcement <span class="required">*</span></label>
                    </div>
                    @if ($errors->has('description'))
                        <p class="alert alert-danger">
                          <span>{{ $errors->first('description') }}</span>
                        </p>
                    @endif
                </div>
                <div class="form-group">
                    <label for="department">Select Audience</label><br>
                    <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-1">
                        <input type="radio" id="option-1" class="mdl-radio__button" name="options" value="1" checked>
                        <span class="mdl-radio__label">Student</span>
                    </label>
                    <label class="mdl-radio mdl-js-radio ml-4 mdl-js-ripple-effect" for="option-2">
                        <input type="radio" id="option-2" class="mdl-radio__button" name="options" value="2">
                        <span class="mdl-radio__label">Alumni</span>
                    </label>
                    <label class="mdl-radio mdl-js-radio ml-4 mdl-js-ripple-effect" for="option-3">
                        <input type="radio" id="option-3" class="mdl-radio__button" name="options" value="3">
                        <span class="mdl-radio__label">Both</span>
                    </label>
                </div>
                <div class="form-group">
    
                    <button type="submit" name="save" value="save" class="mdl-button mdl-js-button mdl-button--colored mdl-button--raised mdl-js-ripple-effect">
                        Save
                    </button>
    
                    <!--This button saves to the database and remain on the page -->
    
                    <button type="submit" name="save" value="saveAndContinue" class="mdl-button mdl-js-button mdl-button--colored mdl-button--raised mdl-js-ripple-effect">
                        Save and continue
                    </button>
    
                    <!-- This button takes user to the previous page -->
                    <a href="javascript:history.go(-1);" role="button" class="mdl-button mdl-js-button  mdl-button--colored mdl-button--raised mdl-js-ripple-effect">
                        Back
                    </a>
    
                </div>
            </form>
    
        </div> --}}