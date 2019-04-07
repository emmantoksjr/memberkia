@extends('layouts.admin')
@section('title', 'Create Poll')
@section('bar', 'Create Poll')
@section('content')
<div class="container mt-3 mb-2" style="max-width: 700px;">
    
    <div class="card-box p-3 mb-3">
    <form method="POST">
        @csrf
      <div class="div-group">
        <label for="title">
          Vote Title
        </label>
        <input type="text" required name="title" id="title" class="form-control">
        @if ($errors->has('title'))
                                <p class="alert alert-danger">
                                    <span>{{ $errors->first('title') }}</span>
                                </p>
        @endif
      </div>

      <div class="div-group">
        <label for="description">Description</label>
        <textarea name="description" required id="description" class="form-control" cols="10" rows="5"></textarea>
        @if ($errors->has('description'))
                                <p class="alert alert-danger">
                                    <span>{{ $errors->first('description') }}</span>
                                </p>
                            @endif
      </div>

      {{-- <div class="div-group">
        <label for="deadline">Start Date</label>
        <input type="date" required name="tostart" id="deadline" class="form-control">
        @if ($errors->has('tostart'))
                                <p class="alert alert-danger">
                                    <span>{{ $errors->first('tostart') }}</span>
                                </p>
                            @endif
      </div> --}}

      <div class="div-group">
        <label for="deadline">Deadline</label>
        <input type="datetime-local" required name="deadline" id="deadline" class="form-control">
        @if ($errors->has('deadline'))
         <p class="alert alert-danger">
            <span>{{ $errors->first('deadline') }}</span>
         </p>
        @endif
      </div>

      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="candidate1">Candidate 1 (required)</label>
            <input type="text" id="candidate1" required name="cand1" class="form-control">
          </div>
          @if ($errors->has('cand1'))
          <p class="alert alert-danger">
              <span>{{ $errors->first('cand1') }}</span>
          </p>
      @endif
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label for="candidate2">Candidate 2 (required)</label>
            <input type="text" id="candidate2" required name="cand2" class="form-control">
          </div>
          @if ($errors->has('cand2'))
          <p class="alert alert-danger">
              <span>{{ $errors->first('cand2') }}</span>
          </p>
      @endif
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="candidate3">Candidate 3 (required)</label>
            <input type="text" required id="candidate3" name="cand3" class="form-control">
          </div>
          @if ($errors->has('cand3'))
          <p class="alert alert-danger">
              <span>{{ $errors->first('cand3') }}</span>
          </p>
      @endif
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="candidate4">Candidate 4 (required)</label>
            <input type="text" required id="candidate4" name="cand4" class="form-control">
          </div>
          @if ($errors->has('cand4'))
          <p class="alert alert-danger">
              <span>{{ $errors->first('cand4') }}</span>
          </p>
      @endif
        </div>

      </div>
      <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="candidate3">Candidate 5 (required)</label>
                <input type="text" required id="candidate3" name="cand5" class="form-control">
              </div>
              @if ($errors->has('cand5'))
              <p class="alert alert-danger">
                  <span>{{ $errors->first('cand5') }}</span>
              </p>
          @endif
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="candidate4">Candidate 6 (optional)</label>
                <input type="text" id="candidate4" name="cand6" class="form-control">
              </div>
              @if ($errors->has('cand6'))
              <p class="alert alert-danger">
                  <span>{{ $errors->first('cand6') }}</span>
              </p>
          @endif
            </div>
          </div>
          <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="candidate3">Candidate 7 (optional)</label>
                    <input type="text" id="candidate3" name="cand7" class="form-control">
                  </div>
                  @if ($errors->has('cand7'))
                  <p class="alert alert-danger">
                      <span>{{ $errors->first('cand7') }}</span>
                  </p>
              @endif
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="candidate4">Candidate 8 (optional)</label>
                    <input type="text" id="candidate4" name="cand8" class="form-control">
                  </div>
                  @if ($errors->has('cand8'))
                  <p class="alert alert-danger">
                      <span>{{ $errors->first('cand8') }}</span>
                  </p>
              @endif
                </div>
              </div>
      <div class="form-group">
        <button class="btn btn-block btn-primary">Create Vote</button>
      </div>
    </form>
    
    </div>
  </div>
{{-- 
    <div class="container mt-3 mb-3" style="max-width: 700px;">

        <div class="my-card p-3">

            <!-- <p class="text-center"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit recusandae accusamus sed, doloremque, minus sit dolorum
                molestiae in expedita, cum ipsum laborum quidem dicta atque commodi nobis autem doloribus consectetur?</p> -->

            <form class="mt-2">

                <div class="form-group">

                    <label for="poll">Poll name <span class="required">*</span></label>
                    <input type="text" class="form-control" id="poll">

                </div>

                <div class="form-group">
                    <label for="poll">Poll Description<span class="required">*</span></label>
                    <textarea class="form-control" cols="5" row="10"></textarea>
                </div>

                <h4>Candidates</h4>
                <hr>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Candidate 1 <span class="required">*</span></label>
                            <input type="text" class="form-control">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Candidate 2 <span class="required">*</span></label>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                </div>

                     <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Candidate 3</label>
                            <input type="text" class="form-control">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Candidate 4</label>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label>Deadline day <span class="required">*</span></label>
                    <input type="date" class="form-control">
                </div>

                <div class="form-group">
                    <a href="/admin/polls/" class="mdl-button mdl-button--colored mdl-button--raised mdl-js-button mdl-js-ripple-effect">Back</a>
                    <button type="submit" class="mdl-button mdl-button--colored mdl-button--raised mdl-js-button mdl-js-ripple-effect">Save</button>
                </div>
                
            </form>

        </div>

    </div> --}}

@stop