<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="userInfo" method="post">
        @CSRF
       
        <input type="text" name="name"></input> </br>
        <input type="number" name="age"></input> </br>
        <input type="text" name="location"></input>  </br>
        <input type="submit" value="OK"></input>  </br>


    </form  >
</body>
</html>