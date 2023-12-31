<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Http\Request;

class AdminController extends Controller
{



    // return update view 

    public function update_product($id) {

        $product = product::find($id);
        $category = category::all();

       // return view('admin.update_product',compact('product'));
       return view('admin.update_product', compact('product','category'));
    }


    public function view_category(Category $category) {
        $data = category::all();

        return view('admin.category', compact('data'));
    }

    public function add_category(Request $request) {

        $data = new Category();

        $data->category_name = $request->category;

        $data->save();
        return redirect()->back()->with('message', 'Category Added Successfully');

    }

    // delete category 

    public function delete_category($id) {
            $data = category::find($id);
            $data->delete();
            return redirect()->back()->with('message', 'Category Deleted Successfully');
    }

    // show add product page

    public function view_product() {
        $category = category::all();
        return view('admin.product', compact('category'));
    }

    public function add_product(Request $request) {
        $product = new product;
        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->discount_price = $request->discount_price;
        $product->category = $request->category;
        
        $image = $request->image;

        $imagename = time().'.'.$image->getClientOriginalExtension();

        $request->image->move('product', $imagename);

        $product->image = $imagename;
        $product->save();

        return redirect()->back()->with('message', 'Product Added Successfully');

    }

    public function show_product() {

        $product = Product::all();

        return view('admin.show_product', compact('product'));

    }

    public function delete_product($id) {

        $product = product::find($id);
        $imagePath = $product->get_image_path();
        unlink($imagePath);
        $product->delete();

        return redirect()->back()->with('message', 'Product Deleted successfully');
    }


    // actual update of the product

    public function update_product_confirm(Request $request, $id) {

        $product = product::find($id);

        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->discount_price = $request->discount_price;

        $currentCategory = $request->category;

        if($currentCategory) {
            $product->category = $request->category;
        }
        

        $image = $request->image;
        $oldImage = $product->get_image_path();
        if($image) {

        $imagename = time().'.'.$image->getClientOriginalExtension();

        $request->image->move('product', $imagename);

        $product->image = $imagename;

        unlink($oldImage);

        }

        $product->save();

        return redirect()->back()->with('message', 'Product Updated Successfully');
    }


    // show order view on admin pannel 
 
    public function order() {

        $order = order::all();

        return view('admin.order', compact('order'));
    }

    // update order

    public function deliver($id) {

        $order = order::find($id);

        $order->delivery_status = 'Delivered';

        $order->payment_status = 'Paid';

        $order->save();

        return redirect()->back();
    }

    
}
