<?php
namespace App\Repository;
use App\Country;
use App\Repository\CountryRepositoryInterface;
use Exception;

class CountryRepository implements CountryRepositoryInterface
{

    public function index()
    {
        $country = Country::all();
    }

    public function store($request)
    {
        try
        {
            $request->validate([
                'name' => 'required',
                'price' => 'required|numeric',
                'weight' => 'required|numeric',
            ]);
            $country = new Country();
            $country->name = $request->name;
            $country->price = $request->price;
            $country->weight = $request->weight;
            $country->save();
            session()->flash('success', 'You created new Country successfully');
        }
        catch (Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        Country::findOrFail($id)->delete();
        session()->flash('danger', 'You Deleted your Country');
    }
}
