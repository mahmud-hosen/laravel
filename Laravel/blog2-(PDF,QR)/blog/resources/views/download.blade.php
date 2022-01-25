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


   


   

    @foreach ($details as $detail)
    <div id="project" class="text-center">
        <div>
            <h3>Details</h3>
        </div>
        <div><span>ID</span> {{$detail->id}}</div>
        <div><span>Name</span> {{$detail->brand_name}}</div>
        <div><span>Name</span> {{$detail->brand_description}}</div>

  
    </div>
    @endforeach

</body>

</html>