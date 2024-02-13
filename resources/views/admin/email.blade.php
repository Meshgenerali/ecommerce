<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')


    <style>

      label {

        display: inline-block;
        width: 200px;
        font-weight: 700;
        font-size: 20px;
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

            <h1 style="text-align: center; margin-top: 20px;">Send Email to <span style="color: blue;">{{$order->email}}</span></h1>


           
            <form action="{{url('send_user_email', $order->id)}}" method="post">

                  @csrf

                    <div style="margin-left: 35%; padding-top: 20px;">

                    <label for="greeting">Email Greeting :</label>
                    <input type="text" name="greeting">

                    </div>

                    <div style="margin-left: 35%; padding-top: 20px;">

                    <label for="fline">Email firstLine :</label>
                    <input type="text" name="emailFirstLine">

                    </div>

                    <div style="margin-left: 35%; padding-top: 20px;">

                    <label for="body">Email Body :</label>
                    <input type="text" name="emailBody">

                    </div>

                    <div style="margin-left: 35%; padding-top: 20px;">

                    <label for="button">Email Button name :</label>
                    <input type="text" name="emailButton">

                    </div>

                    <div style="margin-left: 35%; padding-top: 20px;">

                    <label for="url">Email url :</label>
                    <input type="url" name="url">

                    </div>

                    <div style="margin-left: 35%; padding-top: 20px;">

                    <label for="last-line">Email lastLine :</label>
                    <input type="text" name="emailLastLine">

                    </div>


                    <div style="margin-left: 35%; padding-top: 20px;">

                    <input type="submit" value="send email" class="btn btn-primary">


                    </div>



            </form>

            </div>
        </div>

      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    @include('admin.script')
  </body>
</html>
