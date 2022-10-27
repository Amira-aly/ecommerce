<?php
namespace App\Repository;

use App\Cart;
use App\Invoicing;
use App\Prodect;
use Illuminate\Http\Request;
use App\Repository\CartRepositoryInterface;
use Exception;
use Illuminate\Support\Facades\Auth;

class CartRepository implements CartRepositoryInterface
{

    public function addToCart(Request $request,$id)
    {

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
            $cart->country_id = $Prodec->country_id;
            $cart->save();
    }

    public function destroy($id)
    {
        Cart::find($id)->delete();
        session()->flash('danger', 'You Deleted your Product ');
    }




}

