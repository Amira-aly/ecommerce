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
            $user = Auth::user();
            $Prodec = Prodect::find($id);
            $cart = new Cart();
            $cart->name = $Prodec->name;
            $cart->email = $user->email;
            $cart->description = $Prodec->description;
            $cart->price = $Prodec->price;
            $cart->quantity = $request->quantity;
            $cart->selling_price = $Prodec->selling_price;
            $cart->weight = $Prodec->weight;
            $cart->image = $Prodec->image;
            $cart->user_id = $user->id;
            $cart->product_id = $Prodec->id;
            $cart->save();
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
        return view('Product.show_cart',compact('countt','viewcart','allProduct'));
    }

    public function destroy($id)
    {
        Cart::find($id)->delete();
        session()->flash('danger', 'You Deleted your Product ');
        $countt = Cart::where('user_id',Auth::user()->id)->count();
        $viewcart = Cart::where('user_id',Auth::user()->id)->paginate(3);
        $allProduct = Cart::where('user_id',Auth::user()->id)->get();
        return view('Product.show_cart',compact('countt','viewcart','allProduct'));
    }
}
