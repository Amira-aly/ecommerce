<?php
namespace App\Repository;

use App\Category;
use App\Country;
use App\Prodect;
use Illuminate\Http\Request;
use App\Repository\ProdectRepositoryInterface;
use Exception;

class ProdectRepository implements ProdectRepositoryInterface
{
    public function store($request)
    {
        try
        {
            $request->validate([
                'name' => 'required',
                'description' => 'required',
                'price' => 'required|numeric',
                'category_id' => 'required',
                'country_id' => 'required',
                'weight' => 'required|numeric',
                'image' => 'required',
            ]);
            $produect = new Prodect();
            $produect->name = $request->name;
            $produect->description = $request->description;
            $produect->price = $request->price;
            $produect->category_id = $request->category_id;
            $produect->country_id = $request->country_id;
            $produect->selling_price = 1;
            $produect->weight = $request->weight;
            //image code
            $allFileData =$request->file("image");
            $file_name = $allFileData->getClientOriginalName();
            $allFileData->move(public_path() . "/image/", $file_name.time());
            $produect->image = $file_name.time();

            $produect->save();
            session()->flash('success', 'You created new Produect successfully');
        }
        catch (Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function update(Request $request ,$id)
    {
        try {
            $Prodect = Prodect::findorfail($id);
            $Prodect->selling_price =$request->selling_price;
            $Prodec = $request->selling_price/100 * $request->price;
            $Prodect->price = $request->price - $Prodec;
            $Prodect->save();
            session()->flash('success', 'You Add sale successfully');

        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function show($id)
    {
        
    }


}
