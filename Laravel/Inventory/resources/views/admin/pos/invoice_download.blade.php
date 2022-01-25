<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <title>Invoice </title>


</head>

<body data-new-gr-c-s-check-loaded="14.981.0">

    <div class="row">

        <div class="col-lg-6">
            <h1>INVOICE : {{$customar->id }}</h1>
            <div id="company" class="clearfix">
                <div>
                    <h3>Customar_info</h3>
                </div>
                <div>{{$customar->name}}</div>
                <div> {{$customar->address}}</div>
                <div>{{$customar->phone}}</div>
                <div><a href="mailto:company@example.com">{{$customar->email}}</a></div>
            </div>


        </div>

        <div class="col-lg-6">

            <div id="project">
                <div>
                    <h3>Shipping_info</h3>
                </div>
                <div><span>CLIENT</span> Mahmud</div>
                <div><span>ADDRESS</span>Nalua</div>
                <div><span>EMAIL</span> <a href="mailto:john@example.com">mahmud@gmail.com</a></div>
                <div><span>DATE</span> August 17, 2015</div>
                <div><span>DUE DATE</span> September 17, 2015</div>
            </div>


        </div>


    </div>



    <main>

        <table>
            <thead>
                <tr>
                    <th scope="col">SI</th>
                    <th scope="col">Product</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Sub Totall</th>
                </tr>
            </thead>
            <tbody>

                @foreach($contents as $Cart_pdt)
                <tr>
                    <th scope="row">{{$loop->index+1}}</th>
                    <td>{{$Cart_pdt->name}}</td>
                    <td>{{$Cart_pdt->price}}</td>
                    <td>{{$Cart_pdt->quantity}}</td>
                    <td>{{$Cart_pdt->price * $Cart_pdt->quantity}}</td>
                </tr>
                @endforeach


                <?php $totall= Cart::getTotal();

                    $tax=$totall*0.02;
                
                ?>



                <tr>
                    <td colspan="4"> TOTAL</td>
                    <td class="total">{{$totall}}</td>
                </tr>

                <tr>
                    <td colspan="4">TAX 2%</td>
                    <td class="total">{{$tax }}</td>
                </tr>
                <tr>
                    <td colspan="4" class="grand total">GRAND TOTAL</td>
                    <td class="grand total">{{$totall+$tax}}</td>
                </tr>

            </tbody>
        </table>



        <div id="notices">
            <div>NOTICE:</div>
            <div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
        </div>
    </main>
    <footer>
        Invoice was created on a computer and is valid without the signature and seal.
    </footer>

</body>

</html>