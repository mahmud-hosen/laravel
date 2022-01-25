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
        <form action="/action_page.php" id="contactForm" method="post">

            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name">
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
            </div>

            <div class="form-group">
                <label for="phone">Number:</label>
                <input type="number" class="form-control" id="phone" placeholder="Enter Number" name="phone">
            </div>


            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <script>

    $(function(){
        $.ajaxSetup({
            headers: { 'X-CSRF-Token' : '{{csrf_token()}}' }
        })


        $('#contactForm').submit(function(e){
            e.preventDefault();
            var data = $(this).serialize();
            var url = '{{url('postContact')}}'

            console.log(data)

            $.ajax({
                
                url:url,
                method:'POST',
                data:data,
                success:function(response){
                    if(response.success){
                        alert(response.message)
                    }
                },
                error:function(error){
                    console.log(error)  
                }

            })



        })
    })
    
    </script>





</body>

</html>