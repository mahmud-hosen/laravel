<!DOCTYPE html>
<html lang="en">

<head>
    <title> Live Search</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>


    <h2>Live Search</h2>

    <div class="ml-3">
        <input type="search" onkeyup="search()" class="form-control" id="search">

    </div>


    <div class="container">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Firstname</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody id="success">
            </tbody>
        </table>
    </div>






    <script type="text/javascript">
    $(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-Token': '{{csrf_token()}}'
            }
        })


        $('#search').keyup(function() {

            var search = $('#search').val();
            var url = '{{url('
            search_data_read ')}}'

            console.log(search)

            $.ajax({
                url: url,
                method: 'POST',
                data: 'usearch=' + search,
                success: function(response) {
                    $('#success').html(response);
                },

            });



        });


    })
    </script>






</body>

</html>