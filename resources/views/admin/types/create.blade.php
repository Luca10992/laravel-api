@extends('layouts.app')
@section('title', '| Add Type')

@section('content')
  
<div class="container">
    <h1 class="fs-2 fw-bold py-4">Aggiungi tipologia</h1>
    <form class="row" action="{{ route('admin.types.store') }}" method="POST">
        @csrf

        <div class="col-10">
            <label for="label">Nome Tipologia</label>
            <input class="form-control @error ('label') is-invalid @enderror" type="text" name="label" id="label" >
            @error ('label')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-2">
            <label for="color">Colore Tipologia</label>
            <input class="form-control my-2 @error ('color') is-invalid @enderror" type="color" name="color" id="color">
            @error ('color')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <button class="btn btn-success">Add Type</button>
            <button type="reset" class="btn btn-warning">Reset</button>
        </div>
    </form>
</div>

@endsection