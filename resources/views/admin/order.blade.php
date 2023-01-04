<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.css')
    <style type="text/css">
        .title_deg
        {
            text-align: center;
            font-size: 25px;
            font-width: bold;
            padding-bottom: 40px;
        }

        .table_deg
        {
            border: 2px solid gold;
            width: 100%;
            text-align: center;
            margin: auto;
         }

         .th_deg
         {
            background-color: gold;
            
         }

         .text_deg
         {
            color: black;
         }

         .img_size
         {
            width: 200px;
            height: 100px;

         }

        </style>
    < </head>
    
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      @include('admin.header')
        <!-- partial -->
        <div class="main-panel">
      <div class="content-wrapper">

      <h1 class="title_deg">All Orders</h1>

      <table class="table_deg">
       <tr class="th_deg">
        <th class="text_deg">Name</th>
        <th class="text_deg">Email</th>
        <th class="text_deg">Address</th>
        <th class="text_deg">Phone</th>
        <th class="text_deg">Product title</th>
        <th class="text_deg">Quantity</th>
        <th class="text_deg">Price</th>
        <th class="text_deg">Payment status</th>
        <th class="text_deg">Delivery status</th>
        <th class="text_deg">Image</th>
        

    </tr>

    @foreach($order as $order)

    <tr>
        <td>{{order->name}}</td>
        <td>{{order->email}}</td>
        <td>{{order->address}}</td>
        <td>{{order->phone}}</td>
        <td>{{order->product_title}}</td>
        <td>{{order->quantity}}</td>
        <td>{{order->price}}</td>
        <td>{{order->payment_status}}</td>
        <td>{{order->delivery_status}}</td>
        <td>
            <img class="img_size" src="/product/{{$order->image}}">
        </td>
    </tr>

    @endforeach

    </table>

</div>
</div>
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
   @include('admin.script')
  </body>
</html>