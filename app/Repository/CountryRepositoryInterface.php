<?php
namespace App\Repository;
use Illuminate\Http\Request;
interface CountryRepositoryInterface
{
    public function index();

    public function store(Request $request);

    public function destroy($id);
}
