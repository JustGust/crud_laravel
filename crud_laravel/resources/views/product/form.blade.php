@if(count($errors)>0)
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <ul>
        @foreach( $errors->all() as $error)
        <li>{{ $error}}</li>
        @endforeach
    </ul>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="col-12 mt-3">
    <label for="name" class="form-label">Nombre</label>
    <input type="name" name="name" value="{{ isset($product->name)?$product->name:old('name') }}" class="form-control" id="name" placeholder="Ejemplo">
</div>

<div class="col-12 mt-3">
    <label for="description" class="form-label">Descripción</label>
    <textarea name="description" class="form-control" placeholder="Descripción aquí" id="description">{{ isset($product->description)?$product->description:old('description') }}</textarea>
</div>

<div class="col-12 mt-3">
    <label for="value" class="form-label">Valar unitario</label>
    <input type="number" name="value" value="{{ isset($product->value)?$product->value:old('value') }}" class="form-control" id="value" placeholder=" $ 3000">
</div>

<div class="col-12 mt-3">
    <label for="amount" class="form-label">Cantidad en stock</label>
    <input type="number" name="amount" value="{{ isset($product->amount)?$product->amount:old('amount') }}" class="form-control" id="amount" placeholder="0">
</div>

<div class="col-12 mt-3">
    <input type="file" name="photo" class="form-control" id="photo" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
</div>

@if(isset($product->photo))
<div class="mt-3">
    <img src="{{ asset('storage').'/'.$product->photo}}" width="80" height="80" alt="">
</div>
@endif

<button type="submit" class="btn btn-primary mt-3">{{ $mode }}</button>
</div>