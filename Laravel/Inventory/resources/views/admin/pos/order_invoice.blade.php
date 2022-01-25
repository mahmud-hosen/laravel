<!DOCTYPE html>
<!-- saved from url=(0105)https://s3-eu-west-1.amazonaws.com/htmlpdfapi.production/free_html5_invoice_templates/example1/index.html -->
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <title>Invoice </title>
    <link rel="stylesheet" href="{{asset('admin/css/invoice.css')}}" media="all">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


</head>

<body data-new-gr-c-s-check-loaded="14.981.0">
    <header class="clearfix">

        <section>
            <div class="row">
                <div class="col-lg-12">



                </div>
            </div>
        </section>







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
    </header>
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
                   $all_totall=$totall+$tax;
                
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
                    <td class="grand total">{{$all_totall}}</td>
                </tr>

            </tbody>
        </table>



        <div id="notices">
            <div>NOTICE:</div>
            <div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
        </div>


        <p align="right">

            <a href="{{route('pdf',$customar->id)}}" class="btn "><i class="fa fa-file-pdf-o"
                    style="font-size:40px;color:green"></i></a>

            <button type="button" class="btn " onclick="window.print()"> <i class="fa fa-print"
                    style="font-size:40px;color:green"></i> </button>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal"> Submit </button>

        </p>






    </main>
    <footer>
        Invoice was created on a computer and is valid without the signature and seal.
    </footer>

    <!-- ----------------------------------------------------Payment Modal----------------------------------------------- -->
    <!-- -----------------------------------------------------------------------------------------------------------------  -->
    <div class="container">
        <!-- The Modal -->
        <div class="modal" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title"> Invoice of {{$customar->name}}</>
                        </h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <h4 class="text-center">Totall:{{$all_totall}}</h4>

                    <form action="{{route('final_invoice')}}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- Modal body -->
                        <div class="modal-body">



                            <input type="hidden" name="customer_id" value="{{$customar->id }}">
                            <input type="hidden" name="order_date" value="{{ date('d-m-y')}}">
                            <input type="hidden" name="order_status" value="pending">
                            <input type="hidden" name="totall_products" value="{{ Cart::getTotalQuantity() }}">
                            <input type="hidden" name="sub_totall" value="{{ Cart::getTotal() }}">
                            <input type="hidden" name="vat" value="{{$tax}}">
                            <input type="hidden" name="total" value="{{$all_totall}}">


                            <div class="row">
                                <div class="col-md-6 mt-4">

                                    <select name="payment_status" class="form-control " id="payment_status" required>
                                        <option value="" disabled="" selected="">Select Payment Method </option>
                                        <option value="handCash">HandCash </option>
                                        <option value="cheque">Cheque </option>
                                        <option value="due">Due </option>
                                    </select>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="name">Pay</label>

                                        <input type="text" name="pay" class="form-control" id="pay"
                                            value="{{$all_totall}}" required>
                                    </div>
                                </div>

                                <div class="col-md-3">

                                    <div class="form-group">
                                        <label for="name">Due</label>
                                        <input type="text" name="due" class="form-control" id="due" value="0" required>
                                    </div>
                                </div>
                            </div>



                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-info" >Submit</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>

    <!-- End Payment Modal -->



</body>

</html>