@extends('layouts.admin')
@section('title', 'Create Priviledge')
@section('bar', 'Create Priviledge')
@section('content')

    <div class="container mt-3" style="max-width: 700px;">
        <div class="my-card p-3">
            <h4>Provide necessary details</h4>
            <form method="post">
                @csrf
                <div class="mdl-textfield  mdl-textfield--full-width mdl-js-textfield mdl-textfield--floating-label">
                    <input class="mdl-textfield__input" name="name" value="{{ old('name') }}" type="text" id="name">
                    <label class="mdl-textfield__label" for="name">Name<span class="required">*</span></label>
                </div>
                @if($errors->has('name'))
                    <p class="danger alert-danger">
                        <span>{{ $errors->first('name') }}</span>
                    </p>
                @endif
                <div class="mdl-textfield  mdl-textfield--full-width mdl-js-textfield mdl-textfield--floating-label">
                    <textarea cols="10" rows="7" class="mdl-textfield__input" name="description" value="{{ old('description') }}" type="text" id="description"></textarea>
                    <label class="mdl-textfield__label" for="description">Description<span class="required">*</span></label>
                </div>

                <div class="form-group">
                    <a href="javascript:history.go(-1)" class="mdl-button mdl-button--colored mdl-button--raised mdl-js-button mdl-js-ripple-effect">Back</a>
                    <button name="submit" class="mdl-button mdl-button--colored mdl-button--raised mdl-js-button mdl-js-ripple-effect">Submit</button>
                </div>
            </form>
        </div>
    </div>
@stop