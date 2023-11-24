<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')

    <style>
        .tblproduct {
            margin: auto;
            width: 100%;
            border: 2px solid #fff;
            text-align: center;
            margin-top: 40px;
        }
        .tr_bg {
            background-color: skyblue;
        }

        .tblproduct tr th {
            padding: 10px;
        }

        .h1_product {
            font-size: 30px;
            text-align: center;
        }

        .product_image {
            width: 70px;
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
          

          <h2 class="h1_product">All Products</h2>

          <table class="tblproduct">
            <tr class="tr_bg">
                <th>Product title</th>
                <th>Description</th>
                <th>Quantity</th>
                <th>Catagory</th>
                <th>Price</th>
                <th>Discount price</th>
                <th>Product image</th>
                <th>Delete</th>
                <th>Edit</th>
            </tr>

            @foreach ($product as $product)
                
            <tr>
                <td>{{$product->title}}</td>
                <td>{{$product->description}}</td>
                <td>{{$product->quantity}}</td>
                <td>{{$product->category}}</td>
                <td>{{$product->price}}</td>
                <td>{{$product->discount_price}}</td>


                <td>
                    <img class="product_image" src="/product/{{$product->image}}" alt="">
                </td>

                <td>
                    <a href="{{url('/delete_product',$product->id)}}" class="btn btn-danger" onclick="return confirm('Are you sure to delete this')">Delete</a>
                </td>

                <td>
                    <a href="{{url('/update_product', $product->id)}}" class="btn btn-success">Edit</a>
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
