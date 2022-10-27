<?php
namespace App\Http\Controllers;

use App\Cart;
use App\Category;
use App\Country;
use App\Prodect;
use App\Repository\ProdectRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProdectController extends Controller
{
    protected  ProdectRepositoryInterface $prodect;
    public function __construct(ProdectRepositoryInterface $prodect)
    {
        $this->prodect = $prodect;
    }

    public function index()
    {
        $countt = Cart::where('user_id',Auth::user()->id)->count();
        $viewcart = Cart::where('user_id',Auth::user()->id)->paginate(3);
        $Prodect = Prodect::all();
        return view('home',compact('Prodect','countt','viewcart'));
    }

    public function create()
    {
        $Category = Category::all();
        $Country = Country::all();
        $countt = Cart::where('user_id',Auth::user()->id)->count();
        $viewcart = Cart::where('user_id',Auth::user()->id)->paginate(3);
        return view('Product.create',compact('Category','Country','countt','viewcart'));
    }

    public function store(Request $request)
    {
        $prodect = $this->prodect->store($request);
        $countt = Cart::where('user_id',Auth::user()->id)->count();
        $viewcart = Cart::where('user_id',Auth::user()->id)->paginate(3);
        $Prodect = Prodect::all();
        return view('home',compact('Prodect','countt','viewcart'));
    }


    public function show($id)
    {
        $prodect = Prodect::findOrFail($id);
        $countt = Cart::where('user_id',Auth::user()->id)->count();
        $viewcart = Cart::where('user_id',Auth::user()->id)->paginate(3);
        return view('Product.show',compact('prodect','countt','viewcart'));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $prodect = $this->prodect->update($request,$id);
        $countt = Cart::where('user_id',Auth::user()->id)->count();
        $viewcart = Cart::where('user_id',Auth::user()->id)->paginate(3);
        $Prodect = Prodect::all();
        return view('home',compact('Prodect','countt','viewcart'));
    }

    public function destroy($id)
    {
        //
    }
}
