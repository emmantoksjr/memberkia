@extends('layouts.admin')
@section('title', 'Create Role')
@section('content')

<div class="row">
        <div class="col-lg-3 col-md-3 col-sm-3"></div>
        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="card-box">
                <h4 class="text-dark  header-title m-t-0">Provide necessary details</h4><br>
                <form method="POST" >
                        @csrf
                    <div class="form-group">
                        <label for="">Name<span class="text-danger">*</span></label>
                        <input type="text" name="name" value="{{ old('name') }}" parsley-trigger="change" required
                               placeholder="Enter user name" class="form-control" id="userName">
                    </div>

                    <div class="form-group">
                        <label class="control-label">Description<span class="text-danger">*</span></label>
                        <div class="">
                            <textarea class="form-control" name="description" value="{{ old('description') }}" rows="2" required=""></textarea>
                        </div>
                    </div>

                     <div class="form-group">
                        <label for="">Add Priviledges<span class="text-danger">*</span></label><br>
                        @if($permissions->count() > 1)
                        @foreach($permissions as $permission)
                        <div class="checkbox checkbox-success form-check-inline">
                            <input type="checkbox" id="inlineCheckbox1" name="permission[]" value="{{$permission->id}}">
                            <label >  {{$permission->name}}</label>
                        </div>
                        @endforeach
                        @else
                            <div class="col-md"> No Permission created</div>
                         @endif
                    </div>
                    <div class="row">
                        <div class="col-md-9 col-sm-9"></div>
                        <div class="col-md-3 col-sm-3">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3"></div>
</div>






















    {{-- <div class="container mt-3" style="max-width: 700px;">
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
                <div class="form-group mt-5">
                    <h4>Add priviledges</h4>
                    <hr>
                </div>
                <div class="form-group">
                    <div class="row mb-2">
                        @if($permissions->count() > 1)
                        @foreach($permissions as $permission)
                            <div class="col-md-3">
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="permission[]" value="{{$permission->id}}">{{$permission->name}}
                                    </label>
                                </div>
                            </div>
                        @endforeach
                        @else
                            <div class="col-md"> No Permission created</div>
                         @endif
                    </div>
                </div>
                <div class="form-group">
                    <a href="javascript:history.go(-1)" class="mdl-button mdl-button--colored mdl-button--raised mdl-js-button mdl-js-ripple-effect">Back</a>
                    <button name="submit" class="mdl-button mdl-button--colored mdl-button--raised mdl-js-button mdl-js-ripple-effect">Submit</button>
                </div>
            </form>
        </div>
    </div> --}}
@stop