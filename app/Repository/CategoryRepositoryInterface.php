<?php
namespace App\Repository;
use Illuminate\Http\Request;
interface CategoryRepositoryInterface
{
    

    public function store(Request $request);

    public function destroy($id);
}
