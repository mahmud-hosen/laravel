<!DOCTYPE html>
<!-- saved from url=(0105)https://s3-eu-west-1.amazonaws.com/htmlpdfapi.production/free_html5_invoice_templates/example1/index.html -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <title>Invoice </title>
    <link rel="stylesheet" href="{{asset('admin/css/invoice.css')}}" media="all">

    
  </head>
  <body data-new-gr-c-s-check-loaded="14.981.0">
    <header class="clearfix">
      <div id="logo">
        <img src="./Example 1_files/logo.png">
      </div>
      <h1>INVOICE : {{$customar_order->id }}</h1>
      <div id="company" class="clearfix">
      <div><h3>Customar_info</h3> </div>
        <div>{{$customar->first_name.' '.$customar->last_name}}</div>
        <div> Totall : {{$customar_order->total_price}}<br> {{$customar->address}}</div>
        <div>{{$customar->phone_number}}</div>
        <div><a href="mailto:company@example.com">{{$customar->email_address}}</a></div>
      </div>
      <div id="project">
        <div><h3>Shipping_info</h3> </div>
        <div><span>CLIENT</span> {{$shipping_info->full_name}}</div>
        <div><span>ADDRESS</span> {{$shipping_info->address}}</div>
        <div><span>EMAIL</span> <a href="mailto:john@example.com">{{$shipping_info->email_address}}</a></div>
        <div><span>DATE</span> August 17, 2015</div>
        <div><span>DUE DATE</span> September 17, 2015</div>
      </div>
    </header>
    <main>
      <table>
        <thead>
          <tr>
            <th class="service">Product Name</th>
            <th class="desc">DESCRIPTION</th>
            <th>PRICE</th>
            <th>QTY</th>
            <th>TOTAL</th>
          </tr>
        </thead>
        <tbody>

        @foreach ($product_info as $product_info)

          <tr>
            <td class="service">{{$product_info->product_name}}</td>
            <td class="desc">{{$product_info->product_short_description}}</td>
            <td class="unit">{{$product_info->product_price}}</td>
            <td class="qty">{{$product_info->product_quantity}}</td>
            <td class="total">{{$product_info->product_quantity*$product_info->product_price}} </td>
          </tr>

          @endforeach

      

          <tr>
            <td colspan="4">SUBTOTAL</td>
            <td class="total">{{$customar_order->total_price}}</td>
          </tr>

          <tr>
            <td colspan="4">TAX 2%</td>
            <td class="total">{{$customar_order->total_price*0.02}}</td>
          </tr>
          <tr>
            <td colspan="4" class="grand total">GRAND TOTAL</td>
            <td class="grand total">{{$customar_order->total_price+($customar_order->total_price*0.02)}}</td>
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
  
</body></html>