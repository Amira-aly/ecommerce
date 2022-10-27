<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Country;
use App\Repository\CountryRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CountryController extends Controller
{
    protected  CountryRepositoryInterface $country;
    public function __construct(CountryRepositoryInterface $country)
    {
        $this->country = $country;
    }

    public function index()
    {
        $country = $this->country->index();
        $countt = Cart::where('user_id',Auth::user()->id)->count();
        $viewcart = Cart::where('user_id',Auth::user()->id)->paginate(3);
        return view('Country.index',compact('country'));
    }

    public function create()
    {
        $countt = Cart::where('user_id',Auth::user()->id)->count();
        $viewcart = Cart::where('user_id',Auth::user()->id)->paginate(3);
        return view('Country.create',compact('countt','viewcart'));
    }

    public function store(Request $request)
    {
        $country = $this->country->store($request);
        $country = Country::all();
        $countt = Cart::where('user_id',Auth::user()->id)->count();
        $viewcart = Cart::where('user_id',Auth::user()->id)->paginate(3);
        return view('Country.index',compact('country','countt','viewcart'));
    }

    public function destroy($id)
    {
        $country = $this->country->destroy($id);
        $country = Country::all();
        $countt = Cart::where('user_id',Auth::user()->id)->count();
        $viewcart = Cart::where('user_id',Auth::user()->id)->paginate(3);
        return view('Country.index',compact('country','countt','viewcart'));
    }
}
