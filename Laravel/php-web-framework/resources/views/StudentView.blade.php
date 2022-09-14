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
  <h2>Student All Info</h2>
  <a href="{{ route('students.create') }}" > Insert </a>

  <table class="table table-hover">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Age</th>
        <th>Action</th>



      </tr>
    </thead>
    <tbody>
      @foreach( $students as $student)
      <tr>
        <td>1</td>
        <td>{{ $student->name }}</td>
        <td>{{ $student->age }}</td>
        <td>{{ $student->email }}</td>
        <td> 
            <a  href="{{ route('students.edit', [$student->id]) }}"  > Edit </a> |
            <form action="{{ route('students.destroy', [$student->id]) }}" 
                                                method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit">Delete </button>
                </form>
        </td>
      </tr>
        @endforeach
        
     
      
    </tbody>
  </table>
</div>

</body>
</html>
