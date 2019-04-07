@extends('layouts.student')
@section('title', 'Events')
@section('more_meta')
<meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection
@section('bar', 'Events')
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
                    <input class="due-text" style="display: none" id="amount" value="{{$event->price}}">
                </div>

                <div class="my-card p-3 mt-2">
                    <div class="flex-parent">
                    <div class="flex-child">
                    <img src="{{asset('/img/bank.svg')}}" alt="bank image" />
                    </div>
                    <div class="flex-child flex-grow">
                    <h2>{{ $event->name }}</h2>
                    <p class="due-text">{{ $event->description }}</p>
                    <p class="due-session">{{$event->location}} </p>
                    <p class="due-session">{{$event->price}} </p>
                    <p class="due-session">{{$event->date}} </p>
                    <p class="due-session">{{date('M d,Y', strtotime($event->date))}} </p>
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
     $(function(){
            var email = $('#email').val();
            
        if(email == '')
        {
            alert('Your valid email address is required to be able to make payment. Please update your profile');
            window.location.href = window.location.origin+'/student/dues';
        }
        
        });
        function payWithPaystack(){
            // var matric = $('#matric').val();
            var firstname = $('#firstname').val();
            var lastname = $('#lastname').val();
            var email = $('#email').val();
            var phone = $('#phone').val();
            var amount = $('#amount').val();
             amount = amount * 100;
            var handler = PaystackPop.setup({
                key: 'pk_live_16860dd8d429b5f707b8fa6d12f94472ae060516',
                subaccount: 'ACCT_z2mt1uq2r3yaw8d',
                bearer:'subaccount',
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
                    alert('window closed');
                }
            });
            handler.openIframe();
        }

        function afterResponse(reference){
            var url = 'https://api.paystack.co/transaction/verify/'+reference;
            var key = 'Bearer sk_live_9e5ada2a153056a89a277e36573953b91116551e';
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
                complete: function(response){
                    // console.log(response)
                  window.location.href =  window.location.origin+'/student/home';
                },
                type: 'GET'
            });
        }

        function saveFeedback(reference, status, time)
        {
            var url = '/student/event/payment';
            var token = $('meta[name="csrf-token"]').attr('content')
            var data = {
                "_method": 'POST',
                "_token": token,
                reference: reference,
                status: status,
                matric:'{{$user->matric_num}}',
                payin_time: time,
                due_id: 0,
                event_id: '{{$event->id}}',
                mode:'Online',
                type:'Event',
                paid: '{{$event->price}}',
                balance: 0,
            }

            $.ajax({
                type: "POST",
                url: url,
                data: data,
                success: function(data) {
                    // console.log(data)
                // window.location.href =  window.location.origin+'/student/home';
                },
                dataType: 'JSON'
            });

        }
    </script>
@endsection