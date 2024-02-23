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
                <form action="{{url('/update_product_confirm', $product->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="product_div">

                    <label for="title">Product Title :</label>
                    <input type="text" name="title" placeholder="Enter title" value="{{$product->title}}" >
                    </div>

                    <div class="product_div">
                    <label for="description">Product Description :</label>
                    <input type="text" name="description" placeholder="Enter description" value="{{$product->description}}">
                    </div>

                    <div class="product_div">
                    <label for="Quantity">Product Quantity :</label>
                    <input type="number" name="quantity" min="0" placeholder="Enter quantity" value="{{$product->quantity}}">
                    </div>

                    <div class="product_div">
                    <label for="price">Product Price :</label>
                    <input type="number" name="price" placeholder="Enter price" value="{{$product->price}}">
                    </div>

                    <div class="product_div">
                    <label for="price">Discount Price :</label>
                    <input type="number" name="discount_price" placeholder="Enter discounted price" value="{{$product->discount_price}}">
                    </div>

                    <div class="product_div">
                    <label for="price">Catagory :</label>
                   <select name="category" >
                    <option value="" selected="">{{$product->category}}</option>
                    @foreach ($category as $category)
                    <option value="{{$category->category_name}}">{{$category->category_name}}</option>
                        
                    @endforeach
                   </select>
                    </div>

                    <div class="product_div">
                    <label for="image">Current Product Image :</label>
                    <img width="80px" src="/product/{{$product->image}}" alt="">
                    </div>

                    <div class="product_div">
                    <label for="image">Change Product Image :</label>
                    <input type="file" name="image" >
                    </div>
                    
                    <input type="submit" value="Update Product" class="btn btn-primary">

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
