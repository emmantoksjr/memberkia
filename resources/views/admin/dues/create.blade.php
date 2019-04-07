@extends('layouts.admin')
@section('title', 'Create Due')
@section('content')
<div class="row">
        <div class="col-lg-3 col-md-3 col-sm-3"></div>
        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="card-box">
                <h4 class="text-dark  header-title m-t-0">Kindly enter dues and specify payers</h4><br>
                <form method="POST">
                        @csrf
                    <div class="form-group">
                        <div class="form-group">
                            <label for="">Name<span class="text-danger">*</span></label>
                            <input type="text" name="name"  placeholder="" class="form-control">
                        </div>
                        @if ($errors->has('name'))
                    <p class="alert alert-danger">
                      <span>{{ $errors->first('name') }}</span>
                    </p>
                @endif
                    </div>

                    <div class="form-group">
                        <div class="form-group">
                            <label for="">Amounts<span class="text-danger">*</span></label>
                            <input type="number" name="amount"  placeholder="" class="form-control">
                        </div>
                        @if ($errors->has('amount'))
                        <p class="alert alert-danger">
                          <span>{{ $errors->first('amount') }}</span>
                        </p>
                    @endif
                    </div>

                    <div class="form-group">
                        <label for="">Select level</label>
                        <select class="form-control" name="sessions">
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
                        <label for="">Select Year</label>
                        <select class="form-control" name="years">
                                @foreach($years as $year)
                                    <option value="{{ $year->name }}">{{ $year->name }}</option>
                                @endforeach
                            </select>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group no-margin">
                                <label for="field-7" class="control-label">Select Audience</label><br>
                                <div class="radio radio-info form-check-inline">
                                    <input type="radio" id="inlineRadio2" name="options" value="1"  checked>
                                    <label for="inlineRadio2"> Student </label>
                                </div>
                                <div class="radio radio-info form-check-inline">
                                    <input type="radio" id="inlineRadio1" value="2" name="options">
                                    <label for="inlineRadio1"> Alumni</label>
                                </div>
                                <div class="radio radio-info form-check-inline">
                                    <input type="radio" id="inlineRadio3" value="3" name="options">
                                    <label for="inlineRadio3"> Both </label>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-9 col-sm-9"></div>
                        <div class="col-md-3 col-sm-3">
                            <button type="submit" class="btn btn-primary">Save Due</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3"></div>
</div>























    {{-- <div class="container my-card mt-3" style="max-width: 600px;">
        <h3 class="p-3">Kindly enter dues and specify payers</h3>
        <form class="p-4" method="post">
            @csrf
            <div class="form-group">
                <div class="mdl-textfield  mdl-textfield--full-width mdl-js-textfield mdl-textfield--floating-label">
                    <input class="mdl-textfield__input" name="name" type="text" id="name">
                    <label class="mdl-textfield__label" for="name">Name <span class="required">*</span></label>
                </div>
                @if ($errors->has('name'))
                    <p class="alert alert-danger">
                      <span>{{ $errors->first('name') }}</span>
                    </p>
                @endif
            </div>
            <div class="form-group">
                <div class="mdl-textfield  mdl-textfield--full-width mdl-js-textfield mdl-textfield--floating-label">
                    <input class="mdl-textfield__input" name="amount" type="text" id="amount">
                    <label class="mdl-textfield__label" for="amount">Amount <small>(NG)</small></label>
                </div>
                @if ($errors->has('amount'))
                    <p class="alert alert-danger">
                      <span>{{ $errors->first('amount') }}</span>
                    </p>
                @endif
            </div>
            <div class="form-group">
                <label>Select session</label>
                <select class="form-control" name="sessions">
                    @foreach($sessions as $session)
                    <option value="{{ $session->name }}">{{ $session->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Select year</label>
                <select class="form-control" name="years">
                    @foreach($years as $year)
                        <option value="{{ $year->name }}">{{ $year->name }}</option>
                    @endforeach
                </select>
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
                <button type="submit" class="mdl-button mdl-js-button text-center mdl-button--raised mdl-button mdl-button--colored">Create Dues</button>
                <a href="javascript:history.go(-1)" class="mdl-button mdl-js-button text-center mdl-button--raised mdl-button mdl-button--colored">Back</a>
            </div>
        </form>
    </div> --}}

@stop