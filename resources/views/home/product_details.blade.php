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
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
         @include('home.header')
         <!-- end header section -->

        
      
      
      <div style="width: 50%; margin: auto; padding: 30px; background-color: #D3D3D3; border-radius: 4px;" class="col-sm-6 col-md-4 col-lg-4">
                  
                     
                     <div class="img-box">
                        <img style="width: 60%; padding: 5px;" src="/product/{{$product->image}}" alt="">
                     </div>
                     <div class="detail-box">
                        <h5>
                           {{ $product->title }}
                        </h5>

                        @if ($product->discount_price!=null)
                           <h6 style="color: red;">
                           Discount price
                           <br>
                           ${{ $product->discount_price }}
                           </h6>

                                 <h6 style="text-decoration: line-through; color:blue;">
                                 Price
                                 <br>
                                 ksh. {{ $product->price }}
                                </h6>

                                @else

                                 <h6 style="color: blue;">
                                 price
                                 <br>
                                      ksh. {{ $product->price }}
                               </h6>

                              @endif
                              <h6> <b>Product Catagory: </b> {{$product->category}}</h6>
                              <h6> <b>Product Description: </b> {{$product->description}}</h6>
                              <!-- <h6> <b>Product Quantity: </b> {{$product->quantity}}</h6> -->

                                 <form action="{{url('/add_cart',$product->id)}}" method="post">
                                    @csrf
                                    <div class="row">
                                       <div class="col-md-4">
                                          <input class="btn btn-primary" type="number" name="quantity" value="1" min="1" style="color: #fff;">
                                       </div>

                                       <div class="col-md-4">
                                          <input type="submit" value="Add to Cart">
                                       </div>
                                    </div>

                                 </form>
                       
                     </div>
                  </div>
               </div>


      <!-- footer start -->
        @include('home.footer')
      <!-- footer end -->
      <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>
         
            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>
         
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