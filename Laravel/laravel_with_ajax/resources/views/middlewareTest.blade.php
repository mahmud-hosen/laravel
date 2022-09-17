<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1> Middleware Test</h1>
    
        <form action="{{ route('userAge') }}" method="POST">
            @csrf
            <label for="fname">First name:</label><br>
            <input type="text" id="name" name="name" value=""><br>
        
            <label for="lname">Age:</label><br>
            <input type="number" id="age" name="age" value=""><br><br>
            <input type="submit" value="Submit">
        </form> 


</body>
</html>