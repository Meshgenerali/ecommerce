<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')

    <style type="text/css">
        .div_center {
            text-align: center;
            padding-top: 10px;
        }

        .h2_font{
            font-size: 40px;
            padding: 40px;
        }

        .center {
          margin: auto;
          width: 50%;
          text-align: center;
          margin-top: 20px;
          border: 2px solid #fff;
        }
    </style>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
            @include('admin.sidebar')
        <!-- partial -->

        <!-- header partial starts -->

        @include('admin.header')

         <!-- header partial ends -->

         <div class="main-panel">
          <div class="content-wrapper">

          @if (session()->has('message'))

          <div  class="alert alert-success">

            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
            {{ session()->get('message') }}

          </div>
              
          @endif


          <div class="div_center">
            <h2 class="h2_font">Add Category</h2>

            <form action="{{url('/add_category')}}" method="post">
                @csrf
                <input type="text" name="category" placeholder="Write category name">

                <input type="submit" class="btn btn-primary" value="Add Category">
            </form>
          </div>

          <table class="center">
        <tr>
          <td>Catagory Name</td>
          <td>Action</td>
        </tr>

        @foreach ($data as $data)
        <tr>
          <td>{{$data->category_name}}</td>
          <td>
            <a onclick="return confirm('Are You Sure To Delete This')" class="btn btn-danger" href="{{url('/delete_category',$data->id)}}">Delete</a>
          </td>
        </tr>
          
        @endforeach
       

          </table>


          </div>
         </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    @include('admin.script')
  </body>
</html>
