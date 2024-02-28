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

        .comment-container {
          text-align: center;
          background-color: #002c3e; 
          border: 0.1px solid palegreen;
          border-radius: 16px;
          padding: 10px;
          color: #fff;


        }

        .reply-text {
          height: 150px;
          width: 250px;
          background-color: palegoldenrod;
          border-radius: 10px;
          color: #002c3e;
          font-size: 18px;
          font-weight: 700;
          border-style: none;
          padding: 10px;
          text-transform: lowercase;
        }

        /* replies css */

        .replies {
          background-color: #fff;
          color: #fff;
          width: 120px;
          margin-left: 600px;
          background-color: #002c3e; 

        }

                /* Style for the search bar */
     /* Reset default margins and paddings */
     * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Style for the search bar */
        .search-container {
            display: flex;
            align-items: center; /* Align items vertically */
            width: 300px;
            margin: 0 auto;
        }
        
        .search-input {
            flex: 1; /* Take remaining space */
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
            background-color: #002c3e;
            color: #fff;
        }
                  

     
      </style>
   </head>
   <body>

   @include('sweetalert::alert')
   
      <div class="hero_area">
         <!-- header section strats -->
         @include('home.header')
         <!-- end header section -->

         <!-- slider section -->
        @include('home.slider')
         <!-- end slider section -->
      </div>
      <!-- why section -->
        @include('home.why')
      <!-- end why section -->
      
      <!-- arrival section -->


        <!-- @include('home.new_arrival') -->


      <!-- end arrival section -->
      
      <!-- product section -->
        @include('home.product')
      <!-- end product section -->

        <!-- comment section starts here -->


        <div class="container mt-5 mb-5">

            <div class="row height d-flex justify-content-center align-items-center">

              <div class="col-md-7">

                <div class="card">

                  <div class="p-3">

                    <h6>Comments</h6>
                    
                  </div>

                  <div class="mt-3 d-flex flex-row align-items-center p-3 form-color">

                  <form action="{{url('add_comment')}}" method="post">

                  <input type="text" name="comment" class="form-control" placeholder="Enter your comment...">

                  <button type="submit" class="btn btn-primary">send</button>
                  </form>

                  </div>


                  <div class="mt-2">



@foreach ($comment as $comment)


<div class="d-flex flex-row p-3">


<div class="w-100">

  <div class="d-flex justify-content-between align-items-center">
      <div class="d-flex flex-row align-items-center">
        <span class="mr-2">{{$comment->name}}</span>
        <small class="c-badge">Top Comment</small>
      </div>
      <small>2h ago</small>
</div>

<p class="text-justify comment-text mb-0">{{$comment->comment}}</p>

<div class="d-flex flex-row user-feed">

  <span class="wish"><i class="fa fa-heartbeat mr-2"></i>14</span>
  <!-- <span class="ml-3"><i class="fa fa-comments-o mr-2"></i>Reply</span> -->
  <a href="" class="ml-3"><i class="fa fa-comments-o mr-2"></i>Reply</a>
  

  
</div>

</div>


</div>
  
@endforeach

                  
                </div>
                
              </div>
              
            </div>
            </div>
            
          </div>


        <!-- comment section ends here -->



      <!-- subscribe section -->
        @include('home.subscribe')
      <!-- end subscribe section -->

      <!-- client section -->
        @include('home.client')
      <!-- end client section -->

      <!-- footer start -->
        @include('home.footer')
      <!-- footer end -->
      <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://x.com/generali_mesh?t=zLYfMoRb2awif2-6eFtNag&s=09">Meshack Malonza</a><br>
         
            Distributed By <a href="https://x.com/generali_mesh?t=zLYfMoRb2awif2-6eFtNag&s=09" target="_blank">Extreme Developers</a>
         
         </p>
      </div>

      <!-- showing reply text area to sen a comment -->

      <script>
        
        function reply(caller) {
          // picking up commment id
          document.getElementById('commentId').value=$(caller).attr('data-commentid');
          
          // showing reply text box
          $('.replyDiv').insertAfter($(caller));
          $('.replyDiv').show();
        }

        // clossing the reply text box

        function reply_close(caller) {
            $('.replyDiv').hide();
        }


      </script>

      <!-- keeping the scroll position after refresh on the comment section -->

<script>
        document.addEventListener("DOMContentLoaded", function(event) { 
            var scrollpos = localStorage.getItem('scrollpos');
            if (scrollpos) window.scrollTo(0, scrollpos);
        });

        window.onbeforeunload = function(e) {
            localStorage.setItem('scrollpos', window.scrollY);
        };
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