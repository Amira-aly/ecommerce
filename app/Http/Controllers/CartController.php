<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Prodect;
use Illuminate\Http\Request;
use App\Repository\CartRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use IntlChar;

class CartController extends Controller
{
    protected CartRepositoryInterface $cart;
    public function __construct(CartRepositoryInterface $cart)
    {
        $this->cart = $cart;
    }

    public function addToCart(Request $request,$id)
    {
        if(Auth::id()){
            $cart = $this->cart->addToCart($request,$id);
            $countt = Cart::where('user_id',Auth::user()->id)->count();
            $viewcart = Cart::where('user_id',Auth::user()->id)->paginate(3);
            $Prodect = Prodect::all();
            return view('home',compact('Prodect','countt','viewcart'));
        }else
        {
            return redirect('login');
        }
    }

    public function showCart()
    {
        $countt = Cart::where('user_id',Auth::user()->id)->count();
        $viewcart = Cart::where('user_id',Auth::user()->id)->paginate(3);
        $allProduct = Cart::where('user_id',Auth::user()->id)->get();
        if($allProduct->country_id=1){
            $Shipping = 3;
        }else{
            $Shipping = 2;
        }
        return view('Product.show_cart',compact('countt','viewcart','allProduct','Shipping'));
    }

    public function destroy($id)
    {
        $cart = $this->cart->destroy($id);
        $countt = Cart::where('user_id',Auth::user()->id)->count();
        $viewcart = Cart::where('user_id',Auth::user()->id)->paginate(3);
        $allProduct = Cart::where('user_id',Auth::user()->id)->get();
        if($allProduct->country_id=1){
            $Shipping = 3;
        }else{
            $Shipping = 2;
        }
        return view('Product.show_cart',compact('countt','viewcart','allProduct','Shipping'));
    }
}
