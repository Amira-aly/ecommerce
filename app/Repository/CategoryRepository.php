<?php
namespace App\Repository;
use App\Category;
use Exception;
use App\Repository\CategoryRepositoryInterface;

class CategoryRepository implements CategoryRepositoryInterface
{

    public function store($request)
    {
        try
        {
            $request->validate([
                'name' => 'required',
            ]);
            $categor = new Category();
            $categor->name = $request->name;
            $categor->save();
            session()->flash('success', 'You created new Category successfully');
        }
        catch (Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        Category::findOrFail($id)->delete();
        session()->flash('danger', 'You Deleted your Category ');
    }
}
