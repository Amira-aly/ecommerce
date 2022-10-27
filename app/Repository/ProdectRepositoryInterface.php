<?php
namespace App\Repository;
use Illuminate\Http\Request;
interface ProdectRepositoryInterface
{
    public function store(Request $request);

    public function update(Request $request ,$id);

    public function show($id);



}
