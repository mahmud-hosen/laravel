<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


<div>

<table>

@foreach($students as $students)


<tr>
<td> {{$students->id}} </td>
<td> {{$students->name}} </td>
<td> {{$students->age}} </td>
</tr>

@endforeach

</table>

</div>




</body>
</html>