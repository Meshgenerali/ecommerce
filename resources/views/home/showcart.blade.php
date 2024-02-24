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
         .center {
            margin: auto;
            width: 50%;
            text-align: center;
            padding: 20px;
         }

         table, th, td {
            border: 1px solid grey;
         }

      .th_design {
         font-size: 18px;
         padding: 5px;
         background-color: skyblue;
      }

      .image_design {
         width: 120px;
      }

      .total_design {
         padding: 30px;
         font-size: 20px;
         font-weight: bold;
      }

      </style>
      
   </head>
   <body>
      @include('sweetalert::alert')
      <div class="hero_area">
         <!-- header section strats -->
         @include('home.header')
         <!-- end header section -->
         

         @if (session()->has('message'))

          <div  class="alert alert-success">

            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
            {{ session()->get('message') }}

          </div>
              
          @endif


      <div class="center">
        <table>
            <tr>
                <th class="th_design">Product title</th>
                <th class="th_design">Product quantity</th>
                <th class="th_design">Price</th>
                <th class="th_design">Image</th>
                <th class="th_design">Action</th>
            </tr>

            <?php $totalPrice = 0; ?>

            @foreach ($cart as $cart)

            <tr>
                <td>{{$cart->product_title}}</td>
                <td>{{$cart->quantity}}</td>
                <td>{{$cart->price}}</td>
                
                <td>
                  <img class="image_design" src="/product/{{$cart->image}}" alt="">
                </td>

                <td>
                  <a class="btn btn-danger" onclick="confirm(event)" href="{{url('remove_cart', $cart->id)}}">Remove</a>
                </td>

            </tr>

            <?php $totalPrice = $totalPrice + $cart->price; ?>
               
            @endforeach

        </table>


        <div>
         <h4 class="total_design">Total Price: ${{$totalPrice}}</h4>
         </div>

         <div>
           <h4>Proceed to Order</h4>
           <br>

            <a href="{{url('cash_order')}}" class="btn btn-danger">Cash On Delivery</a>

            <a href="{{url('stripe_payment', $totalPrice)}}" class="btn btn-danger">Pay Using Card</a>
         </div>
            

      </div>

     
      <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://meshmalonza.42web.io/">Meshack Malonza</a><br>
         
            Distributed By <a href="https://meshmalonza.42web.io/" target="_blank">Extreme developers</a>
         
         </p>
      </div>

      <script>
      function confirm(ev) {
        ev.preventDefault();
        var urlToRedirect = ev.currentTarget.getAttribute('href');  
        console.log(urlToRedirect); 
        swal({
            title: "Are you sure to cancel this product",
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