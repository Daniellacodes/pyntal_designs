<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.css')
    < </head>
    <style type="text/css">
        .div_centre

        {
            text-align: center;
            padding-top: 40px;
        }
        .h2_font
        {
           font-size: 40px;
           padding-bottom: 40px;
        }

        .input_color
         {
            color: black;
        }

    </style>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      @include('admin.header')
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            @if(session()->has('message'))

            <div class="alert alert-success">
                {{session()->get('message')}}
             </div>
            @endif

          <div class="div_center">
                <h2 class="h2_font">Add Category</h2>

                <form action="{{url('/add_category')}}" method="POST">
                    @csrf
                    <input class="input_color" type="text" name="category" placeholder="Write category name">
                    <input type ="submit"  class="btn btn-primary" name="submit" value="Add Category">

                 </form>


          </div>


           </div>
                </div>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
   @include('admin.script')
  </body>
</html>