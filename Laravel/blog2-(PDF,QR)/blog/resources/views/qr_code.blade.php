<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <title>Laravel QR Code Example</title>
</head>
<body>

<div class="text-center" style="margin-top: 50px;">
    <h3>Laravel QR Code Example</h3>



    {!! QrCode::size(200)->generate('My name is mahmud . I live in nalua .My phone number is 01787315406 '); !!}   <br>   <br>   <br>    <br>

    {!! QrCode::wiFi([
	'encryption' => 'WPA/WEP',
	'ssid' => 'SSID of the network',
	'password' => 'Mamun787153',
	'hidden' => 'Whether the network is a hidden SSID or not.'
]);

!!}

   


    <p>MyNotePaper</p>
</div>

</body>
</html>