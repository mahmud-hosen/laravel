<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>

    <div class="container">

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Discription</th>
                    <th>Action</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($brands as $brand)
                <tr>
                    <td>{{$brand->id}}</td>
                    <td>{{$brand->brand_name}}</td>
                    <td>{{$brand->brand_description}}</td>


                    <td>
                        <div class="btn-group">
                            <a class="btn btn-info"href="{{route('brand_details',$brand->id)}}">View</a>
                            <a class="btn btn-info"href="{{route('brand_download',$brand->id)}}">Download</a>


                        </div>
                    </td>
                </tr>
                @endforeach




            </tbody>
        </table>
    </div>

</body>

</html>






<