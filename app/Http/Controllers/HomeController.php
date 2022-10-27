<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Prodect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $countt = Cart::where('user_id',Auth::user()->id)->count();
        $viewcart = Cart::where('user_id',Auth::user()->id)->paginate(3);
        $Prodect = Prodect::all();
        return view('home',compact('Prodect','countt','viewcart'));
    }
}
