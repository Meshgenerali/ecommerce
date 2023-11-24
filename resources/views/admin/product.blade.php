<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')

    <style>
        .div_center {
            text-align: center;
            padding-top: 20px;
        }

        label {
            display: inline-block;
            width: 200px;
        }

        .product_div {
            padding: 5px;
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
                    <h1>Add Product</h1>
                <form action="{{url('/add_product')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="product_div">

                    <label for="title">Product Title :</label>
                    <input type="text" name="title" placeholder="Enter title" required>
                    </div>

                    <div class="product_div">
                    <label for="description">Product Description :</label>
                    <input type="text" name="description" placeholder="Enter description" required>
                    </div>

                    <div class="product_div">
                    <label for="Quantity">Product Quantity :</label>
                    <input type="number" name="quantity" min="0" placeholder="Enter quantity" required>
                    </div>

                    <div class="product_div">
                    <label for="price">Product Price :</label>
                    <input type="number" name="price" placeholder="Enter price" required>
                    </div>

                    <div class="product_div">
                    <label for="price">Discount Price :</label>
                    <input type="number" name="discount_price" placeholder="Enter discounted price" required>
                    </div>

                    <div class="product_div">
                    <label for="price">Category :</label>
                   <select name="category" required >
                    <option value="" selected="">Add Catagory Here</option>
                    @foreach ($category as $category)
                    <option value="{{$category->category_name}}">{{$category->category_name}}</option>
                        
                    @endforeach
                   </select>
                    </div>

                    <div class="product_div">
                    <label for="image">Product Image Here :</label>
                    <input type="file" name="image" required>
                    </div>
                    
                    <input type="submit" value="Add Product" class="btn btn-primary">

                </form>

                </div>

          </div>
         </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    @include('admin.script')
  </body>
</html>
