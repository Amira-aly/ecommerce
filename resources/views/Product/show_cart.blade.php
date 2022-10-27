@extends('layouts.master')
@section('content')
<div class="container" style="width: 90%">
<table id="cart" class="table table-hover table-condensed">
    <thead>
        <tr>
            <th style="width:50%">Product</th>
            <th style="width:10%">Price</th>
            <th style="width:8%">Quantity</th>
            <th style="width:22%" class="text-center">Subtotal</th>
            <th style="width:10%"></th>
        </tr>
    </thead>
    <tbody>


            @foreach($allProduct as $cart)
            @php $total = $cart->price * $cart->quantity @endphp
                <tr >
                    <td data-th="Product">
                        <div class="row">
                            <div class="col-sm-3 hidden-xs"><img src="{{asset('/image/' . $cart->image)}}" width="100" height="100" class="img-responsive"/></div>
                            <div class="col-sm-9">
                                <h4 class="nomargin">{{ $cart->name }}</h4>
                            </div>
                        </div>
                    </td>
                    <td data-th="Price">${{ $cart->price }}</td>
                    <td data-th="Quantity">
                        <input type="number" value="{{ $cart->quantity }}" class="form-control quantity update-cart" />
                    </td>
                    <td data-th="Subtotal" class="text-center">${{ $cart->price * $cart->quantity }}</td>
                    <td class="actions" data-th="">
                        <form action="{{route('cart.destroy',$cart->id)}}" method="POST">
                            {{ method_field('Delete') }}
                            @csrf
                            <button class="btn btn-danger btn-sm remove-from-cart"><i class="fa fa-trash-o"></i>Delete</button>
                        </form>
                    </td>
                </tr>


                <h3 colspan="5" type="hidden" class="text-right" value="{{$cart->price * $cart->quantity}}"></h3>

            @endforeach

    </tbody>
    <tfoot>
        <tr>
            <td colspan="5" class="text-right"><h3><strong>Total ${{ $total }}</strong></h3></td>
        </tr>
        <tr>
            <td colspan="5" class="text-right">
                <a href="{{ url('/') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a>
                <button class="btn btn-success">Checkout</button>
            </td>
        </tr>
    </tfoot>
</table>
</div>
@endsection


