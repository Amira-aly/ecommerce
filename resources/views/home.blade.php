@extends('layouts.master')

@section('content')
<div class="container" style="width: 90%">
    <div class="row">

            @foreach($Prodect as $pro)
            <div class="col-md-4">
                <div class="card mb-4 box-shadow">
                    <img class="card-img-top" style="height: 250px; width: 100%;" src="{{asset('/image/' . $pro->image)}}" alt="Card image cap">
                  <div class="card-body">
                    <p class="card-text">{{$pro->description}}</p>
                    <div class="price text-success"><h5 class="mt-4">{{$pro->price}}$</h5></div>
                    <div class="btn-group">
                        <a  href="{{route('product.show',$pro->id)}}" type="button" class="btn btn-sm btn-outline-secondary">View</a>
                    </div>
                    <br>
                    <br>
                    <div class="d-flex justify-content-between align-items-center">

                      <div>
                        <form action="{{route('product.update',$pro->id)}}"method="POST" autocomplete="off">
                            @method('PUT')
                            @csrf
                            <input type="hidden" name="price" value="{{$pro->price}}">
                            <div class="form-group">
                                <select class="custom-select mr-sm-2" name="selling_price" required style="width: auto;">
                                    <option selected disabled>Sale</option>
                                    <option value="10" {{$pro->selling_price == 10 ? 'selected':''}}>10%</option>
                                    <option value="15" {{$pro->selling_price == 15 ? 'selected':''}}>15%</option>
                                    <option value="20" {{$pro->selling_price == 20 ? 'selected':''}}>20%</option>
                                </select>
                                <button class="btn btn-primary mt-2" type="submit">Add sale</button>
                            </div>
                        </form>
                        <br>
                        <div>
                            <form action="{{route('add_cart',$pro->id)}}" method="POST" >
                                @csrf
                                <input type="number" value="1" name="quantity" min="1" style="width: 75px;">
                                <input type="submit" class="btn btn-primary mt-2" value="Add To Cart">
                            </form>
                        </div>
                    </div>
                    </div>
                  </div>
                </div>
            </div>

            @endforeach
        </div>


      </div>

    </div>
  </div>
@endsection
