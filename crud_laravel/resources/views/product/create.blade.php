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

                <div class="col-12 mt-3">
                    <label for="name" class="form-label">Nombre</label>
                    <input type="name" name="name" class="form-control" id="name" placeholder="Ejemplo">
                </div>

                <div class="col-12 mt-3">
                    <label for="description" class="form-label">Descripción</label>
                    <textarea name="description" class="form-control" placeholder="Descripción aquí" id="description"></textarea>
                </div>

                <div class="col-12 mt-3">
                    <label for="value" class="form-label">Valar unitario</label>
                    <input type="number" name="value" class="form-control" id="value" placeholder=" $ 3000">
                </div>

                <div class="col-12 mt-3">
                    <label for="amount" class="form-label">Cantidad en stock</label>
                    <input type="number" name="amount" class="form-control" id="amount" placeholder="0">
                </div>

                <div class="col-12 mt-3">
                    <input type="file" name="photo" class="form-control" id="photo" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                </div>
             
                <button type="submit" class="btn btn-primary mt-3">Guardar</button>
        </div>

        </form>


    </div>
</div>
</div>
@endsection