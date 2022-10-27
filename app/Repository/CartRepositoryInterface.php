<?php
namespace App\Repository;
use Illuminate\Http\Request;
interface CartRepositoryInterface
{
    public function addToCart(Request $request,$id);

    public function destroy($id);
}
