@extends('layouts.app')

@section('content')

<div class="container">
    <h3 class="h3">Lista de productos </h3>

    @if(Session::has('message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ Session::get('message') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif



    <div class="row">

        @foreach( $products as $product)

        <div class="col-md-3 col-sm-6 mt-3">
            <div class="product-grid">
                <div class="product-image">
                    <a href="#">
                        <img class="pic-1" src="{{ asset('storage').'/'.$product->photo}}">
                    </a>
                    <ul class="social">
                        <form action="{{ url('/product/'.$product->id) }}" method="post">
                            @csrf
                            {{ method_field('DELETE') }}
                            <button type="submit" onclick="return confirm('¿Deseas eliminar este registro?')" class="butt btn btn-outline-light"><i class="fa fa-trash"></i></button>

                            <button type="button" class="btn btn-outline-light" onclick="location.href='{{ url('/product/'.$product->id.'/edit') }}'"><i class="fa fa-pencil"></i></button>
                        </form>


                    </ul>
                    <span class="product-new-label">Rebaja</span>
                    <span class="product-discount-label">0%</span>
                </div>

                <div class="product-content">
                    <h3 class="title"><a href="#">{{$product->name}}</a></h3>
                    <div class="price">${{$product->value}}
                        <span>${{$product->value}}</span>
                    </div>
                    <p>Cantidad en stock: {{$product->amount}}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="mt-3">
        {!! $products->links() !!}
    </div>

</div>

@endsection