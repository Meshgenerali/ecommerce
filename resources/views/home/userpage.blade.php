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
      <title>Ecommerce website</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="home/css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="home/css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="home/css/responsive.css" rel="stylesheet" />

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
        }

        /* replies css */

        .replies {
          background-color: #fff;
          color: #fff;
          width: 120px;
          margin-left: 600px;
          background-color: #002c3e; 

        }

     
      </style>
   </head>
   <body>
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
        @include('home.new_arrival')
      <!-- end arrival section -->
      
      <!-- product section -->
        @include('home.product')
      <!-- end product section -->


      <!-- comment and reply section sterts here -->

          <div class="comment-container">
            <h4 style="color: #f7444e; font-size: 40px; font-weight: bold; font-style: italic; text-align: center;">Comments</h4>


           @if (session()->has('message'))

            <div  class="alert alert-success">

              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
              {{ session()->get('message') }}

            </div>

          @endif

          <form action="{{url('add_comment')}}" method="post">
            @csrf
            <textarea name="comment" style="background-color: #002c3e; color: #fff; padding: 2%; border-radius: 12px; font-size: 16px;" name="comment" cols="30" rows="5" placeholder="type your comment here" ></textarea>
            <input type="submit" value="send" class="btn btn-primary">
            <br>
            <br>
            
          </form>
          </div>

          <div class="comment-container">
          <h4 style="color: #f7444e; font-size: 40px; font-weight: bold; font-style: italic; text-align: center;">All Comments</h4>
         

          @foreach ($comment as $comment)

          <div>
          <b>{{$comment->name}}</b>
          <p>{{$comment->comment}}</p>
          <a href="javascript::void(0)" class="btn btn-danger" onclick="reply(this)" data-commentid = "{{$comment->id}}">reply now</a>
          </div>
          <br>

            @foreach ($reply as $user_reply)

            @if ($user_reply->comment_id == $comment->id)

            <div class="replies">

              <b>{{$user_reply->name}}</b>
              <p>{{$user_reply->reply}}</p>
              <a href="javascript::void(0)" class="btn btn-danger" onclick="reply(this)" data-commentid = "{{$comment->id}}">reply</a>

            </div>
            @endif
            
              
            @endforeach
          <br>
          <br>
            
          @endforeach

          <!-- reply text box -->
          <div style="display: none;" class="replyDiv">

          <form action="{{url('add_reply')}}" method="post">
            @csrf

            <textarea name="reply" class="reply-text" placeholder="type your reply here and hit send"></textarea>
            <input type="text" id="commentId" name="commentId" hidden>
            <br>
            <button type="submit" class="btn btn-success">send</button>
            <a href="javascript::void(0)" class="btn btn-danger" onclick="reply_close(this)">X</a>
          </form>

          </div>

          </div>

          


      <!-- comment and reply section ends here -->

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