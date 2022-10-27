@extends('layouts.master')
@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <div  class="col-12" style="display: inline-flex;">
                        <div class="col-5" style="display: inline"><h6>All Category</h6></div>
                        <div class="col-6" style="text-align: right; display: inline; margin-top: 10px;">
                            <a href="{{ route('category.create') }}" class="btn btn-primary btn-sm ">
                                Add Category
                            </a>
                        </div>

                    </div>
                </div>

                <div class="card-body">
                    <div class=" justify-content-center">
                        <div class="card" >

                            <div class="card-col-2">
                                <div class="card-body">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Category Name</th>
                                            <th>Processes</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($Category as $Cat)
                                            <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$Cat->name}}</td>
                                            <td>
                                                <form action="{{route('category.destroy',$Cat->id)}}" method="POST">
                                                    {{method_field('delete')}}
                                                    {{csrf_field()}}
                                                <button type="submit" class="btn btn-danger btn-sm" role="button" aria-pressed="true">Delete</button>
                                                </form>
                                            </td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
