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
                        <input type="text"name="department_name" value="{{ $user->department_name }}" parsley-trigger="change" required
                               placeholder="" class="form-control" id="userName">
                         @if ($errors->has('department_name'))
                            <span class="alert-danger">
                                <strong>{{ $errors->first('department_name') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="">Email<span class="text-danger">*</span></label>
                        <input type="email" name="email" parsley-trigger="change" required
                               placeholder=""value="{{ $user->email }}"  class="form-control" id="">
                               @if ($errors->has('email'))
                                        <span class="alert-danger">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                    @endif
                    </div>

                    <div class="form-group">
                            <label for="">Phone<span class="text-danger">*</span></label>
                            <input type="number" name="phone" parsley-trigger="change" required
                                   placeholder=""value="{{ $user->phone }}"  class="form-control" id="">
                                   @if ($errors->has('phone'))
                                            <span class="alert-danger">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                        @endif
                            </div>

                        <div class="form-group">
                                <label for="">Address<span class="text-danger">*</span></label>
                                <input type="text" name="address" parsley-trigger="change" required
                                       placeholder=""value="{{ $user->address }}"  class="form-control" id="">
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
                                <input type="password" name="password" value="{{ old('password') }}" parsley-trigger="change" 
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

                    {{-- <div class="form-group">
                        <label for="">Role</label>
                        <select class="form-control" name='role[]'>
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}"> {{ $role->name }} </option>
                            @endforeach
                        </select>
                    </div> --}}

                    <div class="row">
                        <div class="col-md-4">
                                    @foreach($roles as $role)
                                    <!--<p>{{$role->id}}</p>-->
                                    <div class="form-group">
                                        <input  name="role[]" value="{!! $role->id !!}"
                                    type="checkbox"
                                class="w3-check"
                                               @if(in_array($role->id, $selectedRoles))
                                               checked="checked" @endif > 
                            <label>{!! $role->display_name !!}</label>
                                    </div>
                                    <!--<td><input class="w3-check" name="role[]" value="{!! $role->id !!}"-->
                                    <!--           type="checkbox" @if(in_array($role->id, $selectedRoles))-->
                                    <!--           checked="checked" @endif ></td>-->
                                    <!--<td></td>-->
                                    @endforeach
                             </div>
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
@stop