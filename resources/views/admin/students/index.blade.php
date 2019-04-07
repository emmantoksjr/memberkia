@extends('layouts.admin')
@section('title', 'View students')
@section('bar', 'Students')
@section('more_css')
<link href="{{ asset('css/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('css/buttons.dataTables.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<div class="row">
        <div class="col-12">
            <div class="card-box table-responsive">
                <a href="{{ route('admin.student.create') }}"  class="btn btn-success waves-effect waves-light">Add Student <i class="mdi mdi-plus-circle-outline"></i></a>
                <a href="{{ route('admin.student.batch') }}"  class="btn btn-success waves-effect waves-light">Import Student <i class="mdi mdi-plus-circle-outline"></i></a><br><br>
                <div class="table-responsive">
                <table id="example" class="table table-bordered table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th >ID</th>
                        <th data-priority="1">Matric Number</th>
                        <th data-priority="2">First Name</th>
                        <th data-priority="3">Last Name</th>
                        <th data-priority="4">Course of Study</th>
                        <th data-priority="5">Level</th>
                        <th data-priority="6">Telephone</th>
                        <th data-priority="7">Email</th>
                        <th class="notexport"></th>
                        <th class="notexport"></th>
                    </tr>
                    </thead>
                    <tbody>
                            @foreach($students as $student)
                            <tr>
                                <td>{!! $id++ !!}</td>
                                <td>{!! $student->matric_num !!}</td>
                                <td>{!! $student->firstname !!}</td>
                                <td>{!! $student->lastname !!}</td>
                                <td>{!! $student->course_of_study !!}</td>
                                <td>{!! $student->level !!}</td>
                                <td>{!! $student->phone !!}</td>
                                <td>{!! $student->email !!}</td>
                                <td >
                                <a  href="{!! action('AdminController@editStudent', $student->id)!!}"
                                        class="mdl-button mdl-js-button   mdl-button--raised mdl-button mdl-button--colored">Edit</a></td>
                                        @if($stu_diss->count() > 0)
                                @foreach($stu_diss as $dis)
                                    @if($student->slug == $dis->slug)
                                        @if($dis->disabled == 0)
                               <td> <a href="{!! action('AdminController@disableStudent', $student->id)!!}"
                                        class="mdl-button mdl-js-button  btn-danger  mdl-button--raised mdl-button">Disable</a></td>
                                        @else
                                      <td>  <a href="{!! action('AdminController@enableStudent', $student->id)!!}"
                                        class="mdl-button mdl-js-button  btn-primary  mdl-button--raised mdl-button">Enable</a></td>
                                        @endif
                                    @endif
                                @endforeach
                                @endif
                                </td>
                            </tr>
                            @endforeach
                        <!-- Repeat -->
                    </tbody>
                    
                    <!--<tfoot>-->
                    <!--    <tr>-->
                    <!--        <td class="text-center">Generated From <a href="http://www.memberkia.com">MemberKia.com</a></td>-->
                    <!--        <td class="text-center">Powered by <a href="http://www.raoatech.com">Raoatech</a></td>-->
                    <!--    </tr>-->
                        
                    <!--</tfoot>-->
                </table>
                </div>
            </div>
        </div>
    </div> <!-- end row -->
@stop
@section('more_js')
<!-- Required datatable js -->
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
        // buttons: [
        //     'copy', 'csv', 'excel', 'pdf', 'print'
        // ]
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
        // $('#datatable').DataTable();
        // var table = $('#datatable-buttons').DataTable({
        //     lengthChange: false,
        //     buttons: ['copy', 'excel', 'pdf']
        // });
        // $('#key-table').DataTable({
        //     keys: true
        // });
        // $('#responsive-datatable').DataTable();
        // $('#selection-datatable').DataTable({
        //     select: {
        //         style: 'multi'
        //     }
        // });
        // table.buttons().container()
        //         .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
    } );
</script>

@endsection