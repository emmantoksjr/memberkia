@extends('layouts.admin')
@section('title', 'Make Event payment')
@section('bar', 'Make Event payment')
@section('content')
{{--
<form method="post">
        @csrf
        <div class="row mb-3">
            <div class="col-4">
                <label>From:</label>
                <input name="from" type="date">
            </div>
            <div class="col-4">
                <label>To:</label>
                <input name="to" type="date">
            </div>
            <div class="col-4">
                <button type="submit" class="btn btn-sm btn-success">Check</button>
            </div>
        </div>
    </form>
--}}
<div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2"></div>
        <div class="col-lg-8 col-md-8 col-sm-8">
            <div class="card-box">
                <h4 class="text-dark  header-title m-t-0">Enter Payment Details</h4><br>
                <form  method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="">Matric number<span class="text-danger">*</span></label>
                        <input type="text" id="matric" name="matric" parsley-trigger="change" required
                               placeholder="" class="form-control" id="userName">
                    </div>@if ($errors->has('matric'))
                    <p class="alert alert-danger">
                        <span>{{ $errors->first('matric') }}</span>
                    </p>
                @endif
                <div id="info" style="display: none"></div>
                    <div class="form-group">
                        <label for="">Name<span class="text-danger">*</span></label>
                        <input type="text" disabled="true" id="name" parsley-trigger="change" required
                               placeholder="" class="form-control" id="userName">
                    </div>
                    <div class="form-group">
                        <label for="">Level<span class="text-danger">*</span></label>
                        <input type="text" disabled="true" id="level" parsley-trigger="change" required
                               placeholder="" class="form-control" id="userName">
                    </div>
                    <div class="form-group">
                        <label for="">Email Address<span class="text-danger">*</span></label>
                        <input type="email" class="form-control" disabled="true" id="email"id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
                    </div>
                    <div class="form-group">
                            <label>Select Event</label>
                            <select class="form-control" name="event_id">
                                @foreach($events as $event)
                                    <option value="{{$event->id}}">{{$event->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    <div class="form-group">
                        <label for="">Reference ID</label>
                        <input type="text" class="form-control" name="ref" value="{{old('ref')}}" aria-describedby="emailHelp" placeholder="">
                        @if ($errors->has('ref'))
                        <p class="alert alert-danger">
                            <span>{{ $errors->first('ref') }}</span>
                        </p>
                    @endif     
                    </div>
                    <div class="row">
                        <div class="col-md-9 col-sm-9"></div>
                        <div class="col-md-3 col-sm-3">
                            <button type="submit" class="btn btn-primary">Make Payment</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-2"></div>
    </div>
@stop
@section('more_js')
<script>
    $(function () {
        matric();
        selectDue();

        $('select#year').change(function () {
            $('select#due2').hide()
            $('select#due').show()
            selectDue()
        })

        $('select#app_session').change(function () {
            $('select#due2').hide()
            $('select#due').show()
            selectDue()
        })

        $('select#due2').change(function () {
            var selectvalue = $('select#due2').val()
            const url2 = '/admin/due/'+ selectvalue;
            $.ajax({
                    url: url2,
                    data: {
                        format: 'json'
                    },
                    error: function(data) {
                        console.log(data);
                        $('#info2').show();
                        $('#info2').html('<p class="danger alert-danger">Cannot fetch data</p>');
                    },
                    dataType: 'json',
                    success: function(data) {
                        console.log(data);
                    $('#amount').val(data.amount);
                    substract(data);
                    },
                    type: 'GET'
                });
        })
    })
    function substract(data){
        $('#amountPay').keyup(function () {
            var pay = $('#amountPay').val()
            var oweing = data.amount - pay
            $('#amount').val(oweing)
        })
    }
    function matric(){
        $('#matric').keyup(function(){
            var matric = $('#matric').val();
            const url = '/admin/student/details/'+ matric;
            $.ajax({
                url: url,
                data: {
                    format: 'json'
                },
                error: function(data) {
                    console.log(data);
                    $('#info').show();
                    $('#info').html('<p class="danger alert-danger">Student not found</p>');
                },
                dataType: 'json',
                success: function(data) {
                    $('#info').hide();
                    console.log(data);
                    const fullname = data.lastname +' ' +data.firstname;
                    const level = data.level;
                    const email = data.email;
                    $('#name').val(fullname);
                    $('#level').val(level);
                    $('#email').val(email)
                },
                type: 'GET'
            });
        });
    }
    function selectDue(){
        $('select#due').click(function () {
             year = $('select#year').val();
             app_session = $('select#app_session').val();
            const url = '/admin/dues/select/'+app_session+'/'+year;
            $.ajax({
                url: url,
                data: {
                    format: 'json'
                },
                error: function(data) {
                    console.log(data);
                    $('#info2').show();
                    $('#info2').html('<p class="danger alert-danger">Cannot find Events for the specified timeline</p>');
                },
                dataType: 'json',
                success: function(data) {
                    console.log(data);
                    if(data.length > 0){
                        $('#info2').hide();
                        var rows = "";
                        rows += (`<option value="">`+ 'Select Events' +`</option>`);
                        $.each(data, function (key, val) {
                            rows += (`<option value="${val.id}">`+ val.name+`</option>`);
                        });
                        $('select#due').hide()
                        $('select#due2').show()
                        $('#due2').append(rows);
                    }
                    else{
                        $('select#due').show()
                        $('select#due2').hide()
                        $('#info2').show();
                        $('#info2').html('<p class="danger alert-danger">Cannot find Events for the specified timeline</p>');
                    }
                },
                type: 'GET'
            });
        });
    }
</script>
@endsection