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
                <form action="{{ route('category.store') }}" method="POST">
                    @csrf
                    <legend>Create New Category</legend>
                    <hr />
                    <div class="form-group">
                        <label for="name">Category Name</label>
                        <input id="name" name="name" type="text" class="form-control" value="{{old('name')}}">
                    </div>

                    <button id="btn-submit" class="btn btn-success float-right">Create New Category</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
