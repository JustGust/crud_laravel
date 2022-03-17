@extends('layouts.app')

@section('content')

            <div class="container">
                <h3 class="h3">shopping Demo-1 </h3>
                <div class="row">

                    @foreach( $products as $product)

                    <div class="col-md-3 col-sm-6 mt-3">
                        <div class="product-grid">
                            <div class="product-image">
                                <a href="#">
                                    <img class="pic-1" src="{{ asset('storage').'/'.$product->photo}}">
                                </a>
                                <ul class="social">
                                    <li><a href="" data-tip="Editar"><i class="fa fa-pencil"></i></a></li>
                                    <li><a href="" data-tip="Add to Cart"><i class="fa fa-trash"></i></a></li>
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
            </div>

@endsection