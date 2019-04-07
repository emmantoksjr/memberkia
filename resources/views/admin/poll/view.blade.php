@if($polls == null)
  <p>Vote has no data yet. Kindly start vote to view vote statistics and result</p>
@else
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Vote Details</title>
  <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/bootstrap.theme.css') }}">
  <link href="{{ asset('css/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('css/buttons.dataTables.min.css') }}" rel="stylesheet" type="text/css" />

  <style>
  
    body{
        margin: 0;
    }
  
    #description {
      max-width: 500px;
      text-align: center;
      margin: auto;
    }

    #myChart {
      width: 700px;
      height: 700px;
    }
    
    
    .my-card{
        -webkit-box-shadow: 6px 6px 5px 0px rgba(0,0,0,0.75);
        -moz-box-shadow: 6px 6px 5px 0px rgba(0,0,0,0.75);
        box-shadow: 6px 6px 5px 0px rgba(0,0,0,0.75);
        border: white;
    }
    
  </style>

</head>
<body>
  <div class="container" style="margin-top: 20px;">
      
    <div class="text-center">
      <h3> {{$polls->title}} </h3>
      <p id="description"> {{$polls->description}} </p>
      <span>Poll starting time: {{$polls->tostart}}     Poll ending time: {{$polls->deadline}}</span>
    </div>
    <br>
    <br>
    <br>
    <br>
    <div class="row">
      <div class="col-md-6">
        <div class="table-responsive">
          <table class="table table-striped" id="example">
            <thead>
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>No Vote</th>
              </tr>
            </thead>
            <tbody>
                 <tr>
                    <td>1</td>
                    <td>{{$polls->cand1}}</td>
                    <td>{{$cand1->count()}}</td>
                 </tr>
              <tr>
                <td>2</td>
                <td>{{$polls->cand2}}</td>
                <td>{{$cand2->count()}}</td>
              </tr>
              <tr>
                <td>3</td>
                <td>{{$polls->cand3}}</td>
                <td>{{$cand3->count()}}</td>
              </tr>
              <tr>
                <td>4</td>
                <td>{{$polls->cand4}}</td>
                <td>{{$cand4->count()}}</td>
              </tr>
              <tr>
                  <td>5</td>
                  <td>{{$polls->cand5}}</td>
                  <td>{{$cand5->count()}}</td>
                </tr>
              <tr>
                    <td>6</td>
                    <td>{{$polls->cand6}}</td>
                    <td>{{$cand6->count()}}</td>
              </tr>
              <tr>
                      <td>7</td>
                      <td>{{$polls->cand7}}</td>
                      <td>{{$cand7->count()}}</td>
              </tr>
              <tr>
                        <td>8</td>
                        <td>{{$polls->cand8}}</td>
                        <td>{{$cand8->count()}}</td>
              </tr>
            </tbody>
          </table>
        </div>

      </div>
      <div class="col-md-6">
        <canvas id="myChart" width="700px" height="700px"></canvas>
      </div>
    </div>
      <a href="/admin/polls">Back</a>
  </div>


  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
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
    // $('#example').DataTable();
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
  <script>

    var ctx = document.getElementById("myChart");
    var label1 = '{{$polls->cand1}}'
    var label2 = '{{$polls->cand2}}'
    var label3 = '{{$polls->cand3}}'
    var label4 = '{{$polls->cand4}}'
    var label5 = '{{$polls->cand5}}'
    var label6 = '{{$polls->cand6}}'
    var label7 = '{{$polls->cand7}}'
    var label8 = '{{$polls->cand8}}'
    
    var cand1 = {{$cand1->count()}}
    var cand2 = {{$cand2->count()}}
    var cand3 = {{$cand3->count()}}
    var cand4 = {{$cand4->count()}}
    var cand5 = {{$cand5->count()}}
    var cand6 = {{$cand6->count()}}
    var cand7 = {{$cand7->count()}}
    var cand8 = {{$cand8->count()}}

    var myChart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: [label1, label2, label3, label4, label5, label6, label7, label8],
        datasets: [{
          label: '# of Votes',
          data: [cand1, cand2, cand3, cand4, cand5, cand6, cand7, cand8],
          backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
          ],
          borderColor: [
            'rgba(255,99,132,1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)',
          ],
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero: true
            }
          }]
        }
      }
    });
  </script>
</body>
</html>
@endif