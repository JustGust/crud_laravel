@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

        </div>
        <div class="col-md-7 col-lg-8">
            <h4 class="mb-3">Formulario de registro</h4>

            <form class="needs-validation" action="{{ url('/product') }}" method="post" enctype="multipart/form-data">
                @csrf

                @include('product.form');

            </form>


        </div>
    </div>
</div>
@endsection