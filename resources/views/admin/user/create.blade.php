@extends('layouts.admin')
@section('title', 'Add user')
@section('content')
<div class="row">
        <div class="col-lg-3 col-md-3 col-sm-3"></div>
        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="card-box">
                <h4 class="text-dark  header-title m-t-0">Provide necessary details</h4><br>
                <form method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="">Name<span class="text-danger">*</span></label>
                        <input type="text"name="department_name" value="{{ old('name') }}" parsley-trigger="change" required
                               placeholder="" class="form-control" id="userName">
                         @if ($errors->has('name'))
                            <span class="alert-danger">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="">Email<span class="text-danger">*</span></label>
                        <input type="email" name="email" parsley-trigger="change" required
                               placeholder=""value="{{ old('email') }}"  class="form-control" id="">
                               @if ($errors->has('email'))
                                        <span class="alert-danger">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                    @endif
                    </div>

                    <div class="form-group">
                            <label for="">Phone<span class="text-danger">*</span></label>
                            <input type="number" name="phone" parsley-trigger="change" required
                                   placeholder=""value="{{ old('phone') }}"  class="form-control" id="">
                                   @if ($errors->has('phone'))
                                            <span class="alert-danger">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                        @endif
                            </div>

                        <div class="form-group">
                                <label for="">Address<span class="text-danger">*</span></label>
                                <input type="text" name="address" parsley-trigger="change" required
                                       placeholder=""value="{{ old('address') }}"  class="form-control" id="">
                                       @if ($errors->has('address'))
                                                <span class="alert-danger">
                                            <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Password<span class="text-danger">*</span></label>
                                <input type="password" name="password" value="{{ old('password') }}" parsley-trigger="change" required
                                placeholder="" class="form-control" id="userName">
                                @if ($errors->has('password'))
                                        <span class="alert-danger">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                    @endif
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Re-enter Password<span class="text-danger">*</span></label>
                                <input type="password" name="password_confirmation" value="{{ old('repass') }}" class="form-control">
                            </div>
                        </div>
                    </div>  

                    <div class="form-group">
                        <label for="">Role</label>
                        <select class="form-control" name='role[]'>
                            @foreach ($roles as $role)
                        <option value="{{ $role->id}}"> {{$role->name}} </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- <div class="form-group">
                        <label for="">Add Priviledges<span class="text-danger">*</span></label><br>
                        <div class="checkbox checkbox-success form-check-inline">
                            <input type="checkbox" id="inlineCheckbox1" value="option1">
                            <label for="inlineCheckbox1"> Create dues </label>
                        </div>
                        <div class="checkbox checkbox-success form-check-inline">
                            <input type="checkbox" id="inlineCheckbox2" value="option1" checked>
                            <label for="inlineCheckbox2"> View Payments </label>
                        </div>
                        
                    </div> --}}
                
                    
                
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
























    {{-- <div class="container mt-2 mb-4" style="max-width: 800px;">

        <div class="my-card p-3">

            <h4>Provide necessary details</h4>

            <form>

                <div class="mdl-textfield  mdl-textfield--full-width mdl-js-textfield mdl-textfield--floating-label">
                    <input class="mdl-textfield__input" name="matric" value="{{ old('matric') }}" type="text" id="matric">
                    <label class="mdl-textfield__label" for="matric">Matric number <span class="required">*</span></label>
                </div>

                <div class="mdl-textfield  mdl-textfield--full-width mdl-js-textfield mdl-textfield--floating-label">
                    <input class="mdl-textfield__input" name="name" value="{{ old('name') }}" type="text" id="name">
                    <label class="mdl-textfield__label" for="name">Full name <span class="required">*</span></label>
                </div>

                <div class="mdl-textfield  mdl-textfield--full-width mdl-js-textfield mdl-textfield--floating-label">
                    <input class="mdl-textfield__input" name="password" value="{{ old('password') }}" type="password" id="password">
                    <label class="mdl-textfield__label" for="pswd">Enter password<span class="required">*</span></label>
                </div>

                <div class="mdl-textfield  mdl-textfield--full-width mdl-js-textfield mdl-textfield--floating-label">
                    <input class="mdl-textfield__input" name="password" value="{{ old('repass') }}" type="password" id="repass">
                    <label class="mdl-textfield__label" for="repass">Re-Enter password<span class="required">*</span></label>
                </div>

                <div class="form-group">

                    <label for="role">
                        Role
                    </label>

                    <select class="form-control">

                        <option>Financial Secretary</option>
                        <option>Treasurer</option>
                    </select>
                </div>

                <div class="form-group mt-5">
                    <h4>Add priviledges</h4>
                    <hr>
                </div>

                <div class="form-group">

                    <div class="row mb-2">

                        <div class="col-md-3">

                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" value="">Create dues
                                </label>
                            </div>

                        </div>
                        <div class="col-md-3">

                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" value="">View Payments
                                </label>
                            </div>

                        </div>
                        <div class="col-md-3">

                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" value="">Create Events
                                </label>
                            </div>

                        </div>
                        <div class="col-md-3">

                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" value="">View dues
                                </label>
                            </div>

                        </div>

                    </div>
                    <div class="row">

                        <div class="col-md-3">

                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" value="">Add alumni
                                </label>
                            </div>

                        </div>
                        <div class="col-md-3">

                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" value="">Add students
                                </label>
                            </div>

                        </div>
                        <div class="col-md-3">

                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" value="">Add announcement
                                </label>
                            </div>

                        </div>
                        <div class="col-md-3">

                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" value="">Create user
                                </label>
                            </div>

                        </div>

                    </div>

                </div>

                <div class="form-group">

                    <a href="/admin/users" class="mdl-button mdl-button--colored mdl-button--raised mdl-js-button mdl-js-ripple-effect">Back</a>
                    <button class="mdl-button mdl-button--colored mdl-button--raised mdl-js-button mdl-js-ripple-effect">Submit</button>

                </div>

            </form>

        </div>

    </div> --}}

@stop