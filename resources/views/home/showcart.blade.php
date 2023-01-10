<!DOCTYPE html>
<html>
   <head>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      
      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="images/favicon.png" type="">
      <title>Pyntal cart page</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="home/css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="home/css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="home/css/responsive.css" rel="stylesheet" />

      

      <style type="text/css">
        .center
        {
            margin: auto;
            width: 50%;
            text-align: center;
            padding: 30px;
        }

        table,th,td
        {
            border: 1px solid grey;
        }

        .th_deg
        {
            font-size: 30px;
            padding: 5px;
            background: gold;

        }

        .img_deg
        {
         height: 200px;
         weight:200px;
        }

        .total_deg
        {
         font-size: 20px;
         padding: 40px:
        }


        </style>

   </head>

   
   <body>
     
      <div class="hero_area">
         <!-- header section strats -->
        @include('home.header')
         <!-- end header section -->

         @if(session()->has('message'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>

            {{session()->get('message')}}

    </div>
            @endif

         
         <div class="center">

         <table>
            <tr>
                <th class="th_deg">Product title</th>
                <th class="th_deg">Product quantity</th>
                <th class="th_deg">Price</th>
                <th class="th_deg">Image</th>
                <th class="th_deg">Action</th>
          </tr>

          <?php $totalprice=0;  ?>

          @foreach($cart as $cart)

          <tr>
            <td>{{$cart->product_title}}</td>
            <td>{{$cart->quantity}}</td>
            <td>ksh{{$cart->price}}</td>
            <td><img class="img_deg" src="/product/{{$cart->image}}"></td>
            <td><a class="btn btn-warning" onclick="confirmation(event)" href="{{url('/remove_cart',$cart->id)}}">Remove Product</a></td>

          </tr>

          <?php $totalprice=$totalprice + $cart->price ?>

          @endforeach

         
            


         </table>

         <div>
            <h1 class="total_deg">Total price: ksh {{$totalprice}}</h1>
  </div>


      <div>
         <h1 style="font-size: 25px; padding-bottom: 15px;">Complete Order</h1>
         <a href="{{url('stripe',$totalprice)}}" class="btn btn-danger">Pay using card</a>
         <a href="{{url('/cash_order')}}" class="btn btn-danger">Cash on Delivery</a>
      </div>

         

            </div>
      
     
      <!-- footer end -->
      <div class="cpy_">
         <p class="mx-auto">© 2023 All Rights Reserved By Pyntal Designs</a><br>
         
            Distributed By Daniella Akinyi
         
         </p>
      </div>
      </div>

      <script>
      function confirmation(ev) {
        ev.preventDefault();
        var urlToRedirect = ev.currentTarget.getAttribute('href');  
        console.log(urlToRedirect); 
        swal({
            title: "Are you sure you want to remove this product",
            text: "You will not be able to revert this!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willCancel) => {
            if (willCancel) {


                 
                window.location.href = urlToRedirect;
               
            }  


        });

        
    }
</script>

      <!-- jQery -->
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>
   </body>
</html>