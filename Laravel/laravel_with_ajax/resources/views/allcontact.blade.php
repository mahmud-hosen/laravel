<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bootstrap Card</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Data Table CSS-->
    <link rel="stylesheet" type="text/css" href="/datatables.min.css"/>
    <link rel="stylesheet" href="{{asset('datatables.min.css')}}">


    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.22/datatables.min.css"/>
 
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.22/datatables.min.js"></script>


</head>

<body>

    <div class="container">
        <h2>CRUD Operation By Ajax & Laravel </h2>
        <div class="row">
            <table   id="contact-table" class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Religion</th>
                        <th>Action</th>


                    </tr>
                </thead>
                <tbody>
                      
                </tbody>
            </table>

        </div>
    </div>


  <!-- Sweet Alert -->
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<!-- Data Table JS -->

<script src="{{asset('datatables.min.js')}}" ></script>

<!-- Bootstrap JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- Validators JS -->
<script src="//cdnjs.cloudflare.com/ajax/libs/validate.js/0.13.1/validate.min.js"></script>


    <script type="text/javascript">
    var table1 =$('#contact-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('allcontact')}}",
        columns: [

            {data:'id', name:'id'},
            {data:'name', name:'name'},
            {data:'phone', name:'phone'},
            {data:'email', name:'email'},
            {data:'religion', name:'religion'},
            {data:'action', name:'action',orderable: false , searchable: false},

        ]


    });
  

    </script>


</body>

</html>