<?php

namespace App\Http\Controllers;

use Stripe;
use Session;
use Stripe\Charge;
use App\Models\Cart;
use App\Models\Comment;
use App\Models\Order;
use App\Models\User;


use App\Models\Product;
use App\Models\Reply;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{

    public function index() {
        $product = Product::paginate(9);
        $comment = Comment::orderby('id', 'desc')->get();
        $reply = Reply::orderby('id', 'desc')->get();
        return view('home.userpage', compact('product', 'comment', 'reply'));
    }

    public function redirect() {
        $usertype = Auth::user()->usertype;

        if($usertype == '1') {

            $total_product = product::all()->count();
            $total_order = order::all()->count();
            $total_customer = user::all()->count();

            $order = order::all();

            $total_revenue = 0;

            foreach ($order as $order) 
            {
                $total_revenue = $total_revenue  + $order->price;
            }

            $total_delivered = order::where('delivery_status', '=','Delivered')->get()->count();

            $total_processing = order::where('delivery_status', '=', 'processing')->get()->count();
            

            return view('admin.home', compact('total_product', 'total_order', 'total_customer', 'total_revenue', 'total_delivered', 'total_processing'));


        } else {
            $product = Product::paginate(9);
            $comment = Comment::orderby('id', 'desc')->get();
            $reply = Reply::orderby('id', 'desc')->get();
      
            return view('home.userpage', compact('product', 'comment', 'reply'));
        }
    }

    // showing all the product details 

    public function product_details($id) {

        $product = product::find($id);

        return view('home.product_details', compact('product'));
    }

    //addto cart

    public function add_cart(Request $request, $id) {
        
        if (Auth::id()) 
        {
            
            $user = Auth::user();
            $product = product::find($id);
            $cart = new Cart;

            $cart->name = $user->name;
            $cart->email = $user->email;
            $cart->address = $user->address;
            $cart->phone = $user->phone;
            $cart->user_id = $user->id;
            $cart->product_title = $product->title;
            

            if ($product->discount_price!=null) {

                $cart->price = $product->discount_price * $request->quantity;

            } else {
                $cart->price = $product->price * $request->quantity;
            }
            $cart->product_id = $product->id;
            $cart->image = $product->image;
            $cart->quantity = $request->quantity;

            $cart->save();

            return redirect()->back();

        } else 
        {
            return redirect('login');
        }
    }

    // show cart itmes

    public function show_cart() {

        if(Auth::id())
        {
            $id = Auth::user()->id;
            $cart = cart::where('user_id', '=', $id)->get();
            return view('home.showcart', compact('cart'));
        } else 
        {
            return redirect('login');
        }
        
    }

    public function remove_cart($id) {
        $cart = cart::find($id);
        $cart->delete();

        return redirect()->back();
    }

    
    public function cash_order() {

        $user = Auth::user();

        $user_id = $user->id;

        $data = cart::where('user_id', '=', $user_id)->get();

        foreach($data as $data) {
            
            $order = new order;

            $order->name = $data->name;
            $order->email = $data->email;
            $order->phone = $data->phone;
            $order->address = $data->address;
            $order->user_id = $data->user_id;

            $order->product_title = $data->product_title;
            $order->price = $data->price;
            $order->quantity = $data->quantity;
            $order->image = $data->image;
            $order->product_id = $data->product_id;

            $order->payment_status = 'cash on delivery';
            $order->delivery_status = 'processing';

            $order->save();

            // deleting cart after placing order

            $cart_id = $data->id;
            $cart = cart::find($cart_id);
            $cart->delete();

        }

        return redirect()->back()->with('message', 'We have Received your Order. We will connect with you soon...');
    }
 

    // stripe payment form

    public function stripe_payment($total_price) {

        return view('home.stripe', compact('total_price'));
    }




      // stripe payment logic

    public function stripePost(Request $request, $total_price)

    {
        

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

    

        Stripe\Charge::create ([

                "amount" => $total_price * 100,

                "currency" => "usd",

                "source" => $request->stripeToken,

                "description" => "Thank you for your payment" 

        ]);



        $user = Auth::user();

        $user_id = $user->id;

        $data = cart::where('user_id', '=', $user_id)->get();

        foreach($data as $data) {
            
            $order = new order;

            $order->name = $data->name;
            $order->email = $data->email;
            $order->phone = $data->phone;
            $order->address = $data->address;
            $order->user_id = $data->user_id;

            $order->product_title = $data->product_title;
            $order->price = $data->price;
            $order->quantity = $data->quantity;
            $order->image = $data->image;
            $order->product_id = $data->product_id;

            $order->payment_status = 'Paid';
            $order->delivery_status = 'processing';

            $order->save();

            // deleting cart after placing order

            $cart_id = $data->id;
            $cart = cart::find($cart_id);
            $cart->delete();

        }

      

        Session::flash('success', 'Payment successful!');

              

        return back();

    }

    

    // show all orders of a particular customer

    public function show_order() {

        if(Auth::id()) {

            $user = Auth::user();
            $user_id = $user->id;

            $order = order::where('user_id','=', $user_id)->get();
            return view('home.show_order', compact('order'));
        } else {
            return redirect('login');
        }
    }

    // cancel order by user

    public function cancel_order($id) {

        $order = order::find($id);

        $order->delivery_status = 'you cancelled this order';
        
        $order->save();

        return redirect()->back()->with('message', 'Order Cancelled successfully');

    }

    // add commment

    public function add_comment(Request $request) {

        if(Auth::id()) {
            $comment = new Comment();

            $comment->name = Auth::user()->name;
            $comment->comment = $request->comment;
            $comment->user_id = Auth::user()->id;

            $comment->save();
            return redirect()->back()->with('message', 'comment sent successfully');

        } else {

            return redirect('login');
        }

    }

    
    // add reply method

    public function add_reply(Request $request) {

        // check if the the user has loggged in

        if(Auth::id()) {

            $reply = new Reply();

            $reply->name = Auth::user()->name;
            $reply->comment_id = $request->commentId;
            $reply->reply = $request->reply;
            $reply->user_id = Auth::user()->id;

            $reply->save();

            return redirect()->back()->with('message', 'reply send successfully');

        } else {

           return redirect('login');
        }
    }


    
}
