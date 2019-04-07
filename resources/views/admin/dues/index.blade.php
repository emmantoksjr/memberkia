@extends('layouts.admin')
@section('title', 'Dues')
@section('more_css')
<link href="{{ asset('css/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('css/buttons.dataTables.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')

<div class="row">
        <div class="col-12">
            <div class="card-box table-responsive">
                <a href="{{ route('admin.due.create') }}/"  class="btn btn-success waves-effect waves-light">Add Due <i class="mdi mdi-plus-circle-outline"></i></a><br><br>
                <table id="example" class="table table-bordered table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Audience</th>
                        <th>Amount(#)</th>
                        <th>Year</th>
                        <th>Level</th>
                        <th class="notexport"></th>
                        <th class="notexport"></th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($dues as $due)
                    <tr>
                        {{-- <td>{{ $id++ }}</td> --}}
                        <td>{!! $due->name !!}</td>
                        @if($due->viewers == 1)
                        <td>Student</td>
                        @elseif($due->viewers == 2)
                        <td>Student</td>
                        @elseif($due->viewers == 3)
                        <td>Student</td>
                        @endif
                        <td>{{ $due->amount }}</td>
                        <td>{{ $due->year }}</td>
                        <td>{{ $due->session }}</td>
                        <td><a href="{{ route('admin.due.edit', $due->id) }}" class="btn btn-info waves-effect waves-light m-b-5">Edit</a></td>
                      <td>  <a onclick="pushdue(event,'{{$due}}')" id="pus"  class="btn btn-success waves-effect waves-light m-b-5">Push </a> </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop
@section('more_js')

<script>

function pushdue(event, due)
{
    var newJ= $.parseJSON(due);
     var app = 'com.raoatech.memberkia';
     var api = 'AAAAbIZ5V7E:APA91bGpTmpow18sOfxydugae5ssU5UnR4alYqyR-M7eST2uTaihojuqoyvrECFTkx6XbCVAvpAIxT3egkChnUQuGh_VgObDsPrhUYXYTxgk08ug9pfutFmwKuhWxNfWwwmqmtEMDUk5';
    var title = newJ.name;
    var description = 'Amount :'+ newJ.amount;
    var topic = 'dues';
    var endpoint = "https://fcm.googleapis.com/fcm/send";
    
    var requestData = {
    notification: {
      title: title,
      body: description,
      sound: "default"
    },
    to: "/topics/" + topic,
    priority: "high",
    restricted_package_name: app
  };

  $.ajax({
    type: "POST",
    url: endpoint,
    contentType: "application/json; charset=utf-8",
    dataType: "JSON",
    data: JSON.stringify(requestData),
    headers: {
      "content-type": "application/json",
      Authorization: "key=" + api
    },
    success: function(data) {
      alert("Push Notification Successfully");
      console.log(data);
    },
    error: function(error) {
      $("#error").html(error.responseText);
    }
  });
}
</script>
<script src="{{ asset('js/jquery.js')}}"></script>
<script src="{{ asset('js/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('js/dataTables.buttons.min.js')}}"></script>
<script src="{{ asset('js/buttons.flash.min.js')}}"></script>
<script src="{{ asset('js/jszip.min.js')}}"></script>
<script src="{{ asset('js/pdfmake.min.js')}}"></script>
<script src="{{ asset('js/vfs_fonts.js')}} "></script>
<script src="{{ asset('js/buttons.html5.min.js')}}"></script>
<script src="{{ asset('js/buttons.print.min.js')}}"></script>
<script src="{{ asset('js/jquery.core.js')}}"></script>
<script src="{{ asset('js/jquery.app.js')}}"></script>
   <script type="text/javascript">
    $(document).ready(function() {
         $('#example').DataTable( {
        dom: 'Bfrtip',
         buttons: [
        {
        extend: 'excel',
        text: 'Excel',
        className: 'btn btn-default',
        exportOptions: {
            columns: ':not(.notexport)'
        }},
        {
        extend: 'copy',
        text: 'Copy',
        className: 'btn btn-default',
        exportOptions: {
            columns: ':not(.notexport)'
        }},
        {
        extend: 'csv',
        text: 'CSV',
        className: 'btn btn-default',
        exportOptions: {
            columns: ':not(.notexport)'
        }},
        {
        extend: 'pdf',
        text: 'PDF',
        className: 'btn btn-default',
        exportOptions: {
            columns: ':not(.notexport)'
        }},
        {
        extend: 'print',
        text: 'Print',
        className: 'btn btn-default',
        exportOptions: {
            columns: ':not(.notexport)'
        }},
        
    ]
    } );
   
});
</script>
@endsection