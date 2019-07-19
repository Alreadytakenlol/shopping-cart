<?php

namespace App\Http\Controllers;
use App\Cart;
use App\Product;
use Illuminate\Http\Request;
use Auth;
use Session;
use Stripe\Stripe;
use Stripe\Charge;
use App\Order;

class ProductController extends Controller
{
    public function getIndex(){
        $products = Product::all();
        return view('shop.index', ['products' => $products]);
    }

    public function getAddToCart(Request $request,$id){
        $product = Product::find($id);
        $oldCart = Session::has('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->add($product,$product->id);

        $request->session()->put('cart',$cart);
        //dd($request->session()->get('cart'));
        return redirect()->route('product.index');
    }

    public function getReduceByOne($id)
    {
        $oldCart = Session::has('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->reduceByOne($id);

        if(count($cart->items)>0){
            Session::put('cart',$cart);
        }else{
            Session::forget('cart');
        }
        
        return redirect()->route('product.shoppingCart');
    }

    public function getRemoveItem($id)
    {
        $oldCart = Session::has('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        
        if(count($cart->items)>0){
            Session::put('cart',$cart);
        }else{
            Session::forget('cart');
        }
        
        return redirect()->route('product.shoppingCart');
    }

    public function getCart(){
        if(!Session::has('cart')){
            return view('shop.shopping-cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        //dd($cart);
        return view('shop.shopping-cart',['products'=>$cart->items,'totalPrice'=>$cart->totalPrice]);
    }

    public function getProduct($id){
        $product = Product::find($id);

        return view('shop.product',['product'=>$product]);
    }

    public function getChooseMethod(){
        if(!Session::has('cart')){
            return view('shop.shopping-cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        
        $total = $cart->totalPrice;
        return view('shop.choosemethod',['total'=>$total]);
    }

    public function getStripe(){
        if(!Session::has('cart')){
            return view('shop.shopping-cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        
        //dd(Auth::user());
        $total = $cart->totalPrice;
        return view('shop.stripe',['total'=>$total]);
    }

    
    public function getCheckout(){
        if(!Session::has('cart')){
            return view('shop.shopping-cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        
        $total = $cart->totalPrice;
        return view('shop.checkout',['total'=>$total]);
    }

    public function postStripePayment(Request $request){
        
        if(!Session::has('cart')){
            return view('shop.shopping-cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        
        Stripe::setApiKey('sk_test_T1kQALLymzpM9ver6OsXvMdo00azuX6Lte');
        try{
            $charge = Charge::create([
                'amount' => $request->get('total'),
                'currency' => 'usd',
                'description' => 'ReturnWord',
                'source' => $request->get('stripeToken'),
                /*'receipt_email' => $request->get('email'),
                'metadata' => [
                    'order_id'=>2456,
                ]*/
            ]);
        }catch(\Exception $e){
            $err = $e->getJsonBody();
            $err = $err["error"];
            return redirect()->back()->with('error_message',$err["message"]);
        }
        //save your customer order to database
        
        $serializedata=json_encode($cart);
        $order = new Order();
        $order->cart = $serializedata;
        $order->name = $request->get('name');
        $order->address = $request->get('address');
        $order->payment_id = $charge->id;
        
        Auth::user()->orders()->save($order);
        /*echo $request->get('fortest')."<br/>";
        dd($request);*/
        
        Session::forget('cart');
        return redirect()->route('product.index')->with('success_message','Thanks you,the purchase has been accepted');
    }

}
