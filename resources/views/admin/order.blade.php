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

      <div style="padding-bottom: 30px;" >
        <form action="{{url('search')}}" method="get">

        @csrf

          <input type ="text" style="color: black;" name="search" placeholder="Search For Something">

          <input type ="submit" value="Search" class="btn btn-outline-primary">

        </form>
      </div>

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
        <th class="text_deg">Delivered</th>
        <th class="text_deg">Print PDF</th>
        <th class="text_deg">Send Email</th>


    </tr>

    @forelse($order as $order)

    <tr>
        <td>{{$order->name}}</td>
        <td>{{$order->email}}</td>
        <td>{{$order->address}}</td>
        <td>{{$order->phone}}</td>
        <td>{{$order->product_title}}</td>
        <td>{{$order->quantity}}</td>
        <td>{{$order->price}}</td>
        <td>{{$order->payment_status}}</td>
        <td>{{$order->delivery_status}}</td>
        <td>
            <img class="img_size" src="/product/{{$order->image}}">
        </td>

        <td>
          @if($order->delivery_status=='processing')

          <a href="{{url('delivered',$order->id)}}" onclick="return confirm('Are you sure this product is delivered??')" class="btn btn-primary"> Delivered</a>

          @else 

          <p style="color: gold;">Delivered</p>

          @endif

        </td>

        <td>

        <a href="{{url('print_pdf',$order->id)}}" class="btn btn-secondary">Print PDF</a>

         </td>

         <td>
          <a href="{{url('send_email',$order->id)}}" class="btn btn-info">Send Email</a>
         </td>
    </tr>

    @empty

    <tr>
      <td colspan="16">
        No Data Found
      </td>
    </tr>
   
    @endforelse

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