<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use Auth;
use Session;

class UserController extends Controller
{
    
    public function getSignUp(){
        return view('users.signup');
    }
    
    public function postSignUp(Request $request){
        $this->validate($request,[
            'name' =>'required|max:50',
            'email' =>'email|required|unique:users',
            'password' =>'required|min:4'
        ]);
        
        $user = new User([
            'name'=>$request->input('name'),
            'email'=>$request->input('email'),
            'password'=>bcrypt($request->input('password'))
        ]);
        $user->save();

        //signup then auto signin
        Auth::login($user);
        
        if(Session::has('oldUrl')){
            $oldUrl = Session::get('oldUrl');
            Session::forget('oldUrl');
            return redirect()->to($oldUrl);
        }

        return redirect()->route('user.profile');
    }

    public function getSignIn(){
        return view('users.signin');
    }

    public function postSignIn(Request $request){
        $this->validate($request,[
            'email' =>'email|required',
            'password' =>'required|min:4'
        ]);
        
        if(Auth::attempt(['email'=>$request->input('email'),'password'=>$request->input('password')])){
            if(Session::has('oldUrl')){
                $oldUrl = Session::get('oldUrl');
                Session::forget('oldUrl');
                return redirect()->to($oldUrl);
            }
            return redirect()->route('user.profile');
        }
        
        return redirect()->back();
        

    }

    public function getProfile(){
        $orders = Auth::user()->orders;
        /*用transform處理encode的cart 可以省去用迴圈還處理每筆的cart*/
        $orders->transform(function($order,$key){
            $order->cart = json_decode($order->cart,true);
            return $order;
        });
        return view('users.profile',['orders'=>$orders]);
    }

    public function getLogout(){
        Auth::logout();
        return redirect()->route('product.index');
    }
}
