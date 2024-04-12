@extends('layouts.app')
@section('title', '| Add technology')

@section('content')
  
<div class="container">
    <h1 class="fs-2 fw-bold py-4">Modifica Tecnologia</h1>
    <form class="row" action="{{ route('admin.technologies.update', $technology) }}" method="POST">
        @csrf
        @method('PATCH')

        <div class="col-12">
            <label for="label">Nome Tecnologia</label>
            <input class="form-control @error ('label') is-invalid @enderror" type="text" name="label" id="label" value="{{ old('label', $technology['label']) }}">
            @error ('label')
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