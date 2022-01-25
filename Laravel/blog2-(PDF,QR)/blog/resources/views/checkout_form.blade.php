<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <form action="{{route('customar_signup')}}" method="post">
        @csrf

        <div class="form-group">
            <label for="first_name">First Name</label>
            <input id="first_name" class="form-control" type="text" name="first_name" value=""
                placeholder="Enter First Name">
        </div>

        <div class="form-group">
            <label for="email_address">Email Address</label>
            <input id="email_address" class="form-control" type="text" name="email_address" value=""
                placeholder="Enter Your Email">
        </div>

        <div class="form-group">
            <label for="phone_number"> Phone Number</label>
            <input id="phone_number" class="form-control" type="text" name="phone_number" value=""
                placeholder="Enter Your Phone Number">
        </div>


        <input class="btn btn-success btn-lg btn-block" type="submit" value="Resister">
    </form>

</body>

</html>