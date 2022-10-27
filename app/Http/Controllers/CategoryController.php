<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Category;
use Illuminate\Http\Request;
use App\Repository\CategoryRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    protected CategoryRepositoryInterface $category;
    public function __construct(CategoryRepositoryInterface $category)
    {
        $this->category = $category;
    }

    public function index()
    {
        $Category = Category::all();
        $countt = Cart::where('user_id',Auth::user()->id)->count();
        $viewcart = Cart::where('user_id',Auth::user()->id)->paginate(3);
        return view('Category.index',compact('Category','countt','viewcart'));
    }

    public function create()
    {
        $countt = Cart::where('user_id',Auth::user()->id)->count();
        $viewcart = Cart::where('user_id',Auth::user()->id)->paginate(3);
        return view('Category.create',compact('countt','viewcart'));
    }

    public function store(Request $request)
    {
        $category = $this->category->store($request);
        $Category = Category::all();
        $countt = Cart::where('user_id',Auth::user()->id)->count();
        $viewcart = Cart::where('user_id',Auth::user()->id)->paginate(3);
        return view('Category.index',compact('Category','countt','viewcart'));
    }

    public function destroy($id)
    {
        $category = $this->category->destroy($id);
        $Category = Category::all();
        $countt = Cart::where('user_id',Auth::user()->id)->count();
        $viewcart = Cart::where('user_id',Auth::user()->id)->paginate(3);
        return view('Category.index',compact('Category','countt','viewcart'));
    }
}
