<header class="header_section">
            <div class="container">
               <nav class="navbar navbar-expand-lg custom_nav-container ">
                  <a class="navbar-brand" href="{{url('/')}}"><img width="250" src="/images/logo.png" alt="#" /></a>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class=""> </span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                     <ul class="navbar-nav">
                        <li class="nav-item active">
                           <a class="nav-link" href="{{url('/')}}">Home <span class="sr-only">(current)</span></a>
                        </li>
                       
                        <li class="nav-item">
                           <a class="nav-link" href="{{url('all_products')}}">Products</a>
                        </li>
                        
                        <li class="nav-item">
                           <a class="nav-link" href="contact.html">Contact</a>
                        </li>

                        <li class="nav-item">
                           <a class="nav-link" href="{{url('show_cart')}}"><i class="fa fa-shopping-cart"></i>
</a>
                        </li>

                        <li class="nav-item">
                           <a class="nav-link" href="{{url('show_order')}}">Orders</a>
                        </li>

                        @if (Route::has('login'))

                        @auth
                        <li class="nav-item">
                        <form action="/logout" method="post">
                           @csrf
                           <button type="submit" class="btn btn-danger">Logout</button>
                        </form>
                        </li>
                        @else

                        <li class="nav-item">
                           <a class="btn btn-primary" id="logincss" href="{{ route('login') }}">Login</a>
                        </li>

                        <li class="nav-item">
                           <a class="btn btn-success" href="{{ route('register') }}">Register</a>
                        </li>
                        @endauth

                        @endif
                  
                     </ul>
                  </div>
               </nav>
            </div>
         </header>