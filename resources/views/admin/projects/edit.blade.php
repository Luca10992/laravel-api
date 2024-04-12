@extends('layouts.app')
@section('title', '| Add Project')

@section('content')
  
<div class="container">
    <h1 class="fs-2 fw-bold py-4">Aggiungi progetto</h1>
    <form class="d-flex flex-column gap-3" action="{{ route('admin.projects.update', $project) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <div class="row">
            <div class="col-4">
                <label for="title">Nome Progetto</label>
                <input class="form-control @error ('title') is-invalid @enderror" type="text" name="title" id="title" value="{{ old('title', $project['title']) }}">
                @error ('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-4">
                <label for="type_id">Tipologia Progetto</label>
                <select class="form-select @error ('type_id') is-invalid @enderror" name="type_id" id="type_id">
                    <option class="d-none" selected="">Seleziona la tipologia</option>
                    @foreach ($types as $type)
                    <option {{ $project->type_id == old('type_id', $type->id) ? 'selected' : '' }} value="{{ $type->id }}">{{ $type->label }}</option>
                    @endforeach
                </select>
                @error ('type_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-4">
                <div class="row">
                    @foreach ($technologies as $technology)
                    <div class="col-4">
                        <input {{ in_array($technology->id, old('technologies', $project_technology_id)) ? 'checked' : '' }} type="checkbox" name="technologies[]" id="technology-{{ $technology->id }}" value="{{ $technology->id }}">
                        <label for="technology-{{ $technology->id }}">{{ $technology->label }}</label>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-8">
                <div>
                    <label for="thumb">Anteprima Progetto</label>
                    <input class="form-control" type="file" name="thumb" id="thumb" value="{{ $project->thumb }}">
                </div>
                <div>
                    <label for="description">Descrizione Progetto</label>
                    <textarea class="form-control" type="text" name="description" id="description" rows="7">{{ $project->description }}</textarea>
                </div>
            </div>
            <div class="col-4 p-4">
                <img class="w-100" @if ( $project->thumb == '' ) src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTIU04WE68MpK7kIJ_kHfCEY5NFXNegUYUJ8-pFSM7uEg&s" @endif src="{{ $project->thumb }}" alt="">
            </div>
        </div>
        <div>
            <button class="btn btn-success">Save Project</button>
            <button type="reset" class="btn btn-warning">Reset</button>
        </div>
    </form>
</div>

@endsection