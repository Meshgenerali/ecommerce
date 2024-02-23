<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="home/images/favicon.png" type="">
      <title>ecommerce website</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="{{asset('home/css/bootstrap.css')}}" />
      <!-- font awesome style -->
      <link href="{{asset('home/css/font-awesome.min.css')}}" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="{{asset('home/css/style.css')}}" rel="stylesheet" />
      <!-- responsive style -->
      <link href="{{asset('home/css/responsive.css')}}" rel="stylesheet" />

      <style>

        .order-container {
            margin: auto;
            width: 80%;
            text-align: center;
            padding: 20px;
        }

        table, th, td {
            border: 2px solid gray;
        }

        .th-design {
            padding: 10px;
            font-size: 18px;
            font-weight: bold;
            background-color: skyblue;
        }

        .image-design {
            width: 140px;
            border-radius: 6px;
        }

    

      </style>
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
         @include('home.header')
         <!-- end header section -->

         @if (session()->has('message'))

                <div  class="alert alert-danger">

                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                {{ session()->get('message') }}

                </div>
    
            @endif
    

      <div class="order-container">
        <table>
           <tr>
               <th class="th-design">Product Title</th>
               <th class="th-design">Quantity</th>
                <th class="th-design">Price</th>
                <th class="th-design">Payment Status</th>
                <th class="th-design">Delivery Status</th>
                <th class="th-design">Image</th>
                <th class="th-design">cancel order</th>
           </tr>

           @foreach ($order as $order)


           <tr>
                <td>{{$order->product_title}}</td>
                <td>{{$order->quantity}}</td>
                <td>{{$order->price}}</td>
                <td>{{$order->payment_status}}</td>
                <td>{{$order->delivery_status}}</td>


                <td>

                    <img src="product/{{$order->image}}" alt="" class="image-design">

                </td>

                <td>
                    @if ($order->delivery_status == 'processing')

                    <a onclick="return confirm('are you sure to cancel this order ?')" href="{{url('cancel_order', $order->id)}}" class="btn btn-danger">cancel order</a>
                        

                    @else 

                    <p class="btn btn-danger">Not allowed</p>

                    @endif
                    
                </td>
           </tr>
               
           @endforeach

        </table>
      </div>

       <!-- footer start -->
       @include('home.footer')
      <!-- footer end -->
      

      <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://x.com/generali_mesh?t=zLYfMoRb2awif2-6eFtNag&s=09">Meshack Malonza</a><br>
         
            Distributed By <a href="https://x.com/generali_mesh?t=zLYfMoRb2awif2-6eFtNag&s=09" target="_blank">Extreme Developers</a>
         
         </p>
      </div>
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