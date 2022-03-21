@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7 col-lg-8">


            @if(Session::has('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ Session::get('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            <h4 class="mb-3">Formulario de editar</h4>

            <form class="needs-validation" action="{{ url('/product/'.$product->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                {{method_field('PATCH')}}

                @include('product.form', ['mode'=>'Editar']);

            </form>


        </div>
    </div>
</div>
@endsection