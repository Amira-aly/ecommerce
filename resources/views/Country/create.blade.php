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
                <form action="{{ route('country.store') }}" method="POST">
                    @csrf
                    <legend>Create New Country</legend>
                    <hr />
                    <div class="form-group">
                        <label for="name">Country Name</label>
                        <input id="name" name="name" type="text" class="form-control" value="{{old('name')}}">
                    </div>
                    <div class="form-group">
                        <label for="price">Country Price</label>
                        <input id="price" name="price" type="number" class="form-control" min="1" value="{{old('price')}}">
                    </div>
                    <div class="form-group">
                        <label for="weight">Country Weight</label>
                        <input id="weight" name="weight" type="number" class="form-control" min="1" value="{{old('weight')}}">
                    </div>

                    <button id="btn-submit" class="btn btn-success float-right">Create New Country</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
