@extends('layouts.admin')
@section('title', 'Make payment')
@section('content')

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

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Select Academic year</label>
                                <select class="form-control" name="year" id="year">
                                        @foreach($years as $year)
                                            <option value="{{$year->name}}">{{$year->name}}</option>
                                        @endforeach
                                    </select>
                                        
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Select level</label>
                                <select class="form-control" name="app_session" id="app_session">
                                       <option value="100">100</option>
                                       <option value="200">200</option>
                                       <option value="300">300</option>
                                       <option value="400">400</option>
                                       <option value="500">500</option>
                                       <option value="600">600</option>
                                       <option value="700">700</option>
                                    </select>
                                        
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                            <label>Select Dues</label>
                            <select class="form-control" id="due" name="due_id">
                            </select>
                            <select class="form-control" id="due2" style="display: none" name="due_id">
                            </select>
                            @if ($errors->has('due_id'))
                                <p class="alert alert-danger">
                                    <span>{{ $errors->first('due_id') }}</span>
                                </p>
                            @endif
                            <div id="info2" style="display: none"></div>
                        </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Amount Payable (NGN</label>
                                <input type="number" class="form-control"  id="amountPay" name="paid" aria-describedby="emailHelp" placeholder="">
                                        
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Amount on Credit </label>
                                <input type="text" class="form-control" name="balance" disabled="true" id="amount" aria-describedby="emailHelp" placeholder="">
                              </div>
                        </div>
                        @if ($errors->has('paid'))
                        <p class="alert alert-danger">
                            <span>{{ $errors->first('paid') }}</span>
                        </p>
                    @endif
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



















    {{-- <div class="container my-card mt-3" style="max-width: 800px;">
        <form class="p-2" method="post">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Matric number</label>
                        <input type="text" id="matric" name="matric" class="form-control">
                    </div>
                    @if ($errors->has('matric'))
                        <p class="alert alert-danger">
                            <span>{{ $errors->first('matric') }}</span>
                        </p>
                    @endif
                    <div id="info" style="display: none"></div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" disabled="true" id="name"  class="form-control">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Level</label>
                        <input type="text" id="level"  disabled="true" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" disabled id="email" class="form-control">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label>Select Academic year</label>
                <select class="form-control" name="year" id="year">
                    @foreach($years as $year)
                        <option value="{{$year->name}}">{{$year->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Select Section</label>
                <select class="form-control" name="app_session" id="app_session">
                    @foreach($app_sessions as $app_session)
                    <option  value="{{$app_session->name}}">{{$app_session->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Select Dues</label>
                <select class="form-control" id="due" name="due_id">
                </select>
                <select class="form-control" id="due2" style="display: none" name="due_id">
                </select>
                @if ($errors->has('due_id'))
                    <p class="alert alert-danger">
                        <span>{{ $errors->first('due_id') }}</span>
                    </p>
                @endif
                <div id="info2" style="display: none"></div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Amount Payable (NGN)</label>
                        <input type="number" id="amountPay" name="paid" class="form-control">
                    </div>
                    @if ($errors->has('paid'))
                        <p class="alert alert-danger">
                            <span>{{ $errors->first('paid') }}</span>
                        </p>
                    @endif
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Amount on Credit (NGN)</label>
                        <input type="number" name="balance" disabled="true" id="amount" class="form-control">
                    </div>
                    @if ($errors->has('balance'))
                        <p class="alert alert-danger">
                            <span>{{ $errors->first('balance') }}</span>
                        </p>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <label>Reference ID</label>
                <input type="text" name="ref" value="{{old('ref')}}" class="form-control">
                @if ($errors->has('ref'))
                    <p class="alert alert-danger">
                        <span>{{ $errors->first('ref') }}</span>
                    </p>
                @endif
            </div>
            <div class="form-group">
                <a href="javascript:history.go(-1)" class="mdl-button mdl-js-button text-center mdl-button--raised mdl-button mdl-button--colored">Back</a>
                <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-button mdl-button--colored" data-toggle="modal" data-target="#myModal">Submit</button>
            </div>
        </form>
    </div> --}}
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
                    $('#info2').html('<p class="danger alert-danger">Cannot find Dues for the specified timeline</p>');
                },
                dataType: 'json',
                success: function(data) {
                    
                    // for (let key in data) {
                    //     for(let second in data[key] ){
                    //      console.log(data[key]);   
                    //     }
  
                    // }
//                     var stats = {};
//             var key = "";
// for (position in data.stats) {
//     for (stat_group in sport.stats[position]) {
//         for (stat in sport.stats[position][stat_group]) {
//             key = sport.stats[position][stat_group][stat].key;
//             stats[key] = true;
//         }
//     }
// }
                    
                    
        //   for (variable in object){
              
        //   }
                var arr = [];
for (var prop in data) {
    arr.push(data[prop]);
}
console.log(arr);
                    
                    if(arr.length > 0){
                        $('#info2').hide();
                        var rows = "";
                        rows += (`<option value="">`+ 'Select Due' +`</option>`);
                        $.each(arr, function (key, val) {
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
                        $('#info2').html('<p class="danger alert-danger">Cannot find Dues for the specified timeline</p>');
                    }
                },
                type: 'GET'
            });
        });
    }
</script>
@endsection