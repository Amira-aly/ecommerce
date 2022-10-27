@extends('layouts.master')
@section('content')
<!-- row -->
<div class="card-body">
    <section style="background-color: #eee; ">
        <div class="row p-20">
            <div class="col-lg-4">
                <div class="card mb-4">
                    <div class="card-body text-center">
                        <img src="{{asset('/image/' . $prodect->image)}}"
                             alt="avatar"
                             class="img-fluid" style="width: 100%;">
                        <h5 style="font-family: Cairo" class="my-3"></h5>
                        <p class="text-muted mb-1"></p>
                        <p class="text-muted mb-4">{{$prodect->name}}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card mb-4 pb-20">
                    <div class="card-body">
                        <h5 class="card-title">{{$prodect->name}}</h5>
                        <p class="card-text">{{$prodect->description}}</p>
                        <p class="card-text">Type of{{$prodect->category->name}}</p>
                        <p class="card-text">Shipping country{{$prodect->country->name}}</p>
                        <h1 class="card-text"><small class="text-muted">{{$prodect->price}}$</small></h1>
                    </div>
                    <div class="container">
                    <form action="{{route('product.update',$prodect->id)}}"method="POST" autocomplete="off">
                        @method('PUT')
                        @csrf
                        <input type="hidden" name="price" value="{{$prodect->price}}">
                        <div class="form-group">
                            <select class="custom-select mr-sm-2" name="selling_price" required style="width: auto;">
                                <option selected disabled>Sale</option>
                                <option value="10" {{$prodect->selling_price == 10 ? 'selected':''}}>10%</option>
                                <option value="15" {{$prodect->selling_price == 15 ? 'selected':''}}>15%</option>
                                <option value="20" {{$prodect->selling_price == 20 ? 'selected':''}}>20%</option>
                            </select>
                            <button class="btn btn-primary mt-2" type="submit">Add sale</button>
                        </div>
                    </form>
                    </div>
                    <div>
                    <div class="form-group" style="margin-left: 17px;">
                        <form action="{{route('add_cart',$prodect->id)}}" method="POST" >
                            @csrf
                            <input type="number" value="1" name="quantity" min="1" style="width: 75px;">
                            <input type="submit" class="btn btn-primary mt-2" value="Add To Cart">
                        </form>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- row closed -->

@endsection
