@extends('layouts.student')
@section('title', 'Events')
@section('bar', 'Events')
@section('more_meta')
<meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection
@section('content')
<div class="container-fluid">
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <h4 class="page-title">Events</h4>
            
            <div class="clearfix"></div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-7">
        <div class="card-box">
            <ul class="sortable-list taskList list-unstyled" id="upcoming">

             @foreach($events as $event)

              @if($event->mode == 1)
                    <li class="task-info" id="task2">
                    <div class="pull-right">
                        <small class="badge badge-info">Free</small>
                    </div>
                    <h4 class="text-dark header-title m-t-0">{{ $event->name }}</h4>
                    {{ $event->description}}
                    <p><i class=" ti-location-pin"></i> Location</p>
                    <div class="clearfix"></div>
                    <div class="mt-3">
                        <p class="mb-0 float-right">
                            <small> {{date('M d,Y', strtotime($event->date))}}</small>
                        </p>
                        <p class="mb-0">
                        @if(in_array($event->id,$ats))
            <a id="unattendFree"onclick="removeFree(event,{{$event->id}})" href="" class="btn btn-danger">Unattend Event</a>
            <a href="{{ route('student.generate') }}" class="btn btn-success">Generate Pass</a>
                 @else
            <a id="attendFree" onclick="attendFree(event,{{$event->id}})" href="" class="btn btn-primary">Attend Event</a>
                 @endif
                            <!-- <button type="button" class="btn btn-info btn-sm waves-effect waves-light">Generate Pass</button> -->
                        </p>
                    </div>
                </li>
                @elseif($event->mode == 2)
                <li class="task-danger" id="task1">
                    <div class=" pull-right">
                        <small class="badge badge-danger">Price #{{ $event->price }}</small>
                    </div>
                    <h4 class="text-dark header-title m-t-0">{{ $event->name }}</h4>
                    {{ $event->description}}
                    <p><i class=" ti-location-pin"></i> Location</p>
                    <div class="clearfix"></div>
                    <div class="mt-3">
                        <p class="mb-0 float-right">
                            <small> {{date('M d,Y', strtotime($event->date))}}</small>
                        </p>
                        <p class="mb-0">
                        @if(in_array($event->id,$ats))
            <a href="{{ route('student.generate') }}" class="btn btn-success">Generate Pass</a>
                 @else
            <a href="{{ route('student.event.pay', $event->id) }}" class="btn btn-success">Attend Event</a>
                 @endif
                            <!-- <button type="button" class="btn btn-danger btn-sm waves-effect waves-light">Attend Event</button> -->
                        </p>
                    </div>
                </li>
            @endif

                @endforeach
            </ul><br>
            {{ $events->links()}}
            <!--<nav>-->
            <!--    <ul class="pagination justify-content-center">-->
            <!--        <li class="page-item">-->
            <!--            <a class="page-link" href="#" aria-label="Previous">-->
            <!--                <span aria-hidden="true">&laquo;</span>-->
            <!--                <span class="sr-only">Previous</span>-->
            <!--            </a>-->
            <!--        </li>-->
            <!--        <li class="page-item"><a class="page-link" href="#">1</a></li>-->
            <!--        <li class="page-item"><a class="page-link" href="#">2</a></li>-->
            <!--        <li class="page-item"><a class="page-link" href="#">3</a></li>-->
            <!--        <li class="page-item"><a class="page-link" href="#">4</a></li>-->
            <!--        <li class="page-item"><a class="page-link" href="#">5</a></li>-->
            <!--        <li class="page-item">-->
            <!--            <a class="page-link" href="#" aria-label="Next">-->
            <!--                <span aria-hidden="true">&raquo;</span>-->
            <!--                <span class="sr-only">Next</span>-->
            <!--            </a>-->
            <!--        </li>-->
            <!--    </ul>-->
            <!--</nav>-->
        </div>
    </div>
    <!-- <div class="col-lg-4 col-md-4 col-sm-5">
        <div class="card-box">
            <h4 class="text-dark header-title m-t-0">Upcoming Events</h4>
            <p class="text-muted m-b-30 font-13">
                Your awesome text goes here. Your awesome text goes here.
            </p>

            <ul class="sortable-list taskList list-unstyled" id="upcoming">

                <li class="task-danger" id="task1">
                    <div class=" pull-right">
                        <small class="badge badge-danger">Paid</small>
                    </div>
                    <h4 class="text-dark header-title m-t-0">Library due</h4>
                    When an unknown printer took a galley of type and scrambled it to make a type specimen book.
                    <div class="clearfix"></div>
                    <div class="mt-3">
                        <p class="mb-0 float-right">
                            <small>Sep 04, 2018 09:13</small>
                        </p>
                        <p class="mb-0">
                            <button type="button" class="btn btn-danger btn-sm waves-effect waves-light">View</button>
                        </p>
                    </div>
                </li>
                <li class="task-info" id="task2">
                    <div class="pull-right">
                        <small class="badge badge-info">Free</small>
                    </div>
                    <h4 class="text-dark header-title m-t-0">Health due</h4>
                    Many desktop publishing packages and web page editors now use Lorem.
                    <div class="clearfix"></div>
                    <div class="mt-3">
                        <p class="mb-0 float-right">
                            <small>Sep 04, 2018 09:13</small>
                        </p>
                        <p class="mb-0">
                            <button type="button" class="btn btn-info btn-sm waves-effect waves-light">View</button>
                        </p>
                    </div>
                </li>

                <li class="task-danger" id="task1">
                    <div class=" pull-right">
                        <small class="badge badge-danger">Paid</small>
                    </div>
                    <h4 class="text-dark header-title m-t-0">Library due</h4>
                    When an unknown printer took a galley of type and scrambled it to make a type specimen book.
                    <div class="clearfix"></div>
                    <div class="mt-3">
                        <p class="mb-0 float-right">
                            <small>Sep 04, 2018 09:13</small>
                        </p>
                        <p class="mb-0">
                            <button type="button" class="btn btn-danger btn-sm waves-effect waves-light">View</button>
                        </p>
                    </div>
                </li>
                <li class="task-info" id="task2">
                    <div class="pull-right">
                        <small class="badge badge-info">Free</small>
                    </div>
                    <h4 class="text-dark header-title m-t-0">Health due</h4>
                    Many desktop publishing packages and web page editors now use Lorem.
                    <div class="clearfix"></div>
                    <div class="mt-3">
                        <p class="mb-0 float-right">
                            <small>Sep 04, 2018 09:13</small>
                        </p>
                        <p class="mb-0">
                            <button type="button" class="btn btn-info btn-sm waves-effect waves-light">View</button>
                        </p>
                    </div>
                </li>
            </ul>
        </div> -->
    </div>
</div>

@stop
@section('more_js')
<script>
        function attendFree(e,id){
            e.preventDefault();
            var url = '/student/event/free/'+id;
            $.ajax({
                url: url,
                data: {
                    format: 'json'
                },
                error: function(data) {
                },
                dataType: 'json',
                success: function(response) {
                    $('#attendFree').remove();
                },
                type: 'GET'
            });
        }

        function removeFree(e,id){
            e.preventDefault();
            var url = '/student/event/free/remove/'+id;
            $.ajax({
                url: url,
                data: {
                    format: 'json'
                },
                error: function(data) {
                },
                dataType: 'json',
                success: function(response) {
                    $('#unattendFree').remove();
                    $('#generate').remove();
                },
                type: 'GET'
            });
        }

</script>
@endsection