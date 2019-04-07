@extends('layouts.student')
@section('title', 'Dues')
@section('bar', 'Dues')
@section('content')

<div class="container-fluid">
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <h4 class="page-title">Due</h4>
            
            <div class="clearfix"></div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-3 col-md-3 col-sm-3"></div>
    <div class="col-lg-6 col-md-6 col-sm-6">
        <div class="card-box">
            

            <ul class="nav nav-tabs tabs-bordered nav-justified">
                <li class="nav-item">
                    <a href="/student/dues" aria-expanded="false" class="nav-link active">
                        Pending Dues
                    </a>
                </li>
                <!--<li class="nav-item">-->
                <!--    <a href="/student/dues/paid"  aria-expanded="true" class="nav-link">-->
                <!--        Paid Dues-->
                <!--    </a>-->
                <!--</li>-->
            </ul>
            <div class="tab-content">
                <div class="tab-pane  active" id="home-b2">
                   <ul class="sortable-list taskList list-unstyled" id="upcoming">
                @foreach($dues as $due)
                @if(in_array($due->id, $alldues))
                
               @else
                    <li id="task3">
                      <h4 class="text-dark header-title m-t-0">{{ $due->name }}</h4>
                     <p>{{ $due->amount }}</p>
                        <div class="clearfix"></div>
                            <div class="mt-3">
                             <p class="">100 Level</p> 
                            <p class="">{{$due->session}}</p>
                            <p class="mb-0">
                                    <a href="{{ route('student.due.pay', $due->id) }}" role="button" class="btn btn-success btn-sm waves-effect waves-light">Pay Now</a>
                                </p>
                            </div>
                        </li>
                  @endif
                @endforeach
                    </ul><br>
                    {{$student_dues->links()}}
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
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-3"></div>
</div> <!-- end row -->




@stop
