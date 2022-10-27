@extends('layouts.master')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card">
            <div class="card-body" >
                <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <legend>Create New Product</legend>
                    <hr />
                    <div class="form-group">
                        <label for="name">Product Name</label>
                        <input id="name" name="name" type="text" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label for="image">Product image</label>
                        <input id="image" name="image" type="file" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label for="description">Product description</label>
                        <input id="description" name="description" type="text" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label for="price">Product price</label>
                        <input id="price" name="price" type="number" min="1" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label for="category_id">Product category</label>
                        <select class="custom-select mr-sm-2" name="category_id">
                            <option selected disabled>Choose a Category</option>
                            @foreach($Category as $cat)
                                <option  value="{{ $cat->id }}">{{ $cat->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="country_id">Product country</label>
                        <select class="custom-select mr-sm-2" name="country_id">
                            <option selected disabled>Choose a Country</option>
                            @foreach($Country as $count)
                                <option  value="{{ $count->id }}">{{ $count->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="weight">Product weight : Weight in grams</label>
                        <input id="weight" name="weight" type="number" min="1"  class="form-control" >
                    </div>

                    <button id="btn-submit" class="btn btn-success float-right">Create New Product</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
