@extends('layouts.student')
@section('title', 'Dues')
@section('more_meta')
<meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection
@section('bar', 'Dues')
@section('content')
    <div class="loader">
        <img src="{{ asset('img/66.gif') }}" style="display:none;">
    </div>
    <div id="whole" class="container-fluid">
        <div class="row">
            <div class="col-md-8 mb-3">
                <ul class="nav nav-tabs nav-justified">
                </ul>

                <div class="col-md-4 mb-3">
                    <input class="due-text" style="display: none" id="firstname" value="{{$user->firstname}}">
                    <input class="due-text" style="display: none" id="lastname" value="{{$user->lastname}}">
                    <input class="due-text" style="display: none" id="email" value="{{$user->email}}">
                    <input class="due-text" style="display: none" id="phone" value="{{$user->phone}}">
                    <input class="due-text" style="display: none" id="amount" value="{{$due->amount}}">
                </div>

                <div class="my-card p-3 mt-2">
                    <div class="flex-parent">
                    <div class="flex-child">
                    <img src="{{asset('/img/bank.svg')}}" alt="bank image" />
                    </div>
                    <div class="flex-child flex-grow">
                    <h2>{{ $due->name }}</h2>
                    <p class="due-text">{{ $due->amount }}</p>
                    <p class="due-session">{{$due->session}} session</p>
                    </div>
                    </div>
                    <form >
                        <script src="https://js.paystack.co/v1/inline.js"></script>
                        <button type="button" class="mdl-button mdl-js-button mdl-button--colored mdl-button--raised mdl-js-ripple-effect"
                                onclick="payWithPaystack()"> Pay Now</button>
                    </form>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="mt-0">
                    <h3>More Details</h3>
                    <hr>
                </div>
                <div class="my-list my-card">
                    <div class="my-list-item p-3">
                        <a href="/student/announcement">View announcements</a>
                    </div>
                    <div class="my-list-item p-3">
                        <a href="/student/announcement">View events</a>
                    </div>
                    <div class="my-list-item p-3">
                        <a href="/student/announcement">View payments</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('more_js')
    <script>
        function payWithPaystack(){
            // var matric = $('#matric').val();
            var firstname = $('#firstname').val();
            var lastname = $('#lastname').val();
            var email = $('#email').val();
            var phone = $('#phone').val();
            var amount = $('#amount').val();
            var handler = PaystackPop.setup({
                key: 'pk_test_2290789cd99a94f5c07a3621f36eb74dd7fc7229',
                email: email,
                amount: amount,
                // ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
                firstname: firstname,
                lastname: lastname,
                // label: "Optional string that replaces customer email"
                metadata: {
                    custom_fields: [
                        {
                            display_name: "Mobile Number",
                            variable_name: "mobile_number",
                            value: phone
                        }
                    ]
                },
                callback: function(response){
                    afterResponse(response.reference)
                },
                onClose: function(){
                    // alert('window closed');
                }
            });
            handler.openIframe();
        }

        function afterResponse(reference){
            var url = 'https://api.paystack.co/transaction/verify/'+reference;
            var key = 'Bearer sk_test_747644d7d69c96503375541dcd436818273a5e56';
            $.ajax({
                url: url,
                headers: {
                    Authorization: key
                },
                data: {
                    format: 'json'
                },
                error: function(data) {
                    console.log(data);
                },
                dataType: 'json',
                success: function(response) {
                    console.log(response)
                    saveFeedback(response.data.reference,response.data.status,response.data.transaction_date)
                },
                beforeSend: function(){
                    $('#whole').hide();
                    $('.loader').show();
                },
                complete: function(){
                    window.location.href =  window.location.origin+'/student/dues/paid';
                },
                type: 'GET'
            });
        }

        function saveFeedback(reference, status, time)
        {
            var url = '/student/due/payment';
            var token = $('meta[name="csrf-token"]').attr('content')
            var data = {
                "_method": 'POST',
                "_token": token,
                reference: reference,
                status: status,
                matric:'{{$user->matric_num}}',
                payin_time: time,
                due_id: '{{$due->id}}',
                event_id: 0,
                mode:'Online',
                type:'Due',
                paid: '{{$due->amount}}',
                balance: 0,
            }

            $.ajax({
                type: "POST",
                url: url,
                data: data,
                success: function(data) {
                window.location.href =  window.location.origin+'/student/dues/paid';
                },
                dataType: 'JSON'
            });

        }
    </script>
@endsection