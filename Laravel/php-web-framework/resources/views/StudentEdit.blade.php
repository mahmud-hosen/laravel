<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Student Edit </h2>
  <form action="{{ route('students.update', [$student->id]) }}" method="POST" >
    @method('PUT')
    @csrf
    <div class="form-group">
      <input type="text" class="form-control" placeholder="Enter Name" value="{{$student->name}}" name="name">
    </div>

     <div class="form-group">
      <input type="number" class="form-control" placeholder="Enter Age" value="{{$student->age}}" name="age">
    </div>

     <div class="form-group">
      <input type="email" class="form-control" placeholder="Enter Email" value="{{$student->email}}" name="email">
    </div>
    
   
    <button type="submit" class="btn btn-primary">Edit</button>
  </form>
</div>

</body>
</html>
