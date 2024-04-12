@extends('layouts.app')
@section('title', '| Add Type')

@section('content')
  
<div class="container">
    <h1 class="fs-2 fw-bold py-4">Modifica tipologia</h1>
    <form class="row" action="{{ route('admin.types.update', $type) }}" method="POST">
        @csrf
        @method('PATCH')

        <div class="col-10">
            <label for="label">Nome Tipologia</label>
            <input class="form-control @error ('label') is-invalid @enderror" type="text" name="label" id="label" value="{{ old('label', $type['label']) }}">
            @error ('label')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-2">
            <label for="color">Colore Tipologia</label>
            <input class="form-control my-2" type="color" name="color" id="color" value="{{ old('color', $type['color']) }}">
            @error ('color')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <button class="btn btn-success">Save</button>
            <button type="reset" class="btn btn-warning">Reset</button>
        </div>
    </form>
</div>

@endsection