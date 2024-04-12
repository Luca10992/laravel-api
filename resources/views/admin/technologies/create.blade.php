@extends('layouts.app')
@section('title', '| Add Technology')

@section('content')
  
<div class="container">
    <h1 class="fs-2 fw-bold py-4">Aggiungi Tecnologia</h1>
    <form class="row" action="{{ route('admin.technologies.store') }}" method="POST">
        @csrf

        <div class="col-10">
            <label for="label">Nome Tecnologia</label>
            <input class="form-control @error ('label') is-invalid @enderror" type="text" name="label" id="label" >
            @error ('label')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <button class="btn btn-success">Add Technology</button>
            <button type="reset" class="btn btn-warning">Reset</button>
        </div>
    </form>
</div>

@endsection