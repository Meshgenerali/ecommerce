<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')

    <style>

        .title_design {
            text-align: center;
            padding-bottom: 20px;
        }

        .table_design {
            border: 2px solid #fff;
            width: 100%;
            padding: 50%;
            margin: auto;
            text-align: center;
        }

        .th_design {
          background-color: skyblue;
        }

        .img_design {
          width: 100px;
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

        <div class="main-panel">
          <div class="content-wrapper">


          <h1 class="title_design">All Orders</h1>

          <table class="table_design">

          <tr class="th_design">
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Product</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Payment Status</th>
            <th>Delivery status</th>
            <th>Image</th>
            <th>Delivered</th>
            <th>Receipt</th>
            <th>sen mail</th>
          </tr>

          @foreach ($order as $order)

          <tr>
            <td>{{$order->name}}</td>
            <td>{{$order->email}}</td>
            <td>{{$order->phone}}</td>
            <td>{{$order->product_title}}</td>
            <td>{{$order->quantity}}</td>
            <td>{{$order->price}}</td>
            <td>{{$order->payment_status}}</td>
            <td>{{$order->delivery_status}}</td>
            <td>

            <img class="img_design" src="/product/{{$order->image}}" alt="">

            </td>


            <td>

           @if ($order->delivery_status == 'processing')

           
              <a class="btn btn-primary" href="{{url('deliver', $order->id)}}" onclick="return confirm('Are you sure this product is delivered !!!')">Delivered</a>
            

            @else

            <p style="color: green;">Delivered</p>
             
           @endif

           </td>

           <td>
            <a href="{{url('print_pdf', $order->id)}}" class="btn btn-secondary">print</a>
           </td>

           <td>
             <a href="{{url('send_email', $order->id)}}" class="btn btn-info">send mail</a>
           </td>

          </tr>
            
          @endforeach

          </table>


          </div>
          </div>


        
    </div>
    <!-- container-scroller -->
    @include('admin.script')
  </body>
</html>
