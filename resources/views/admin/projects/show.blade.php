@extends('layouts.app')
@section('title', '| ' . $project->title)

@section('content')
  <div class="container py-3">
    <div class="d-flex justify-content-between py-4">
        <h1 class="fw-bold fs-2">{{ $project->title }}</h1>
        <div>
            <a href="{{ route('admin.projects.edit', $project) }}">
                <button class="btn btn-success">Edit Project</button>
            </a>
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete-{{ $project->id }}-project">
                Delete Project
            </button>
        </div>
    </div>
    <div class="show-container d-flex gap-3">
        <div class="w-50">
            <img class="w-100" @if ( $project->thumb == '' ) src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTIU04WE68MpK7kIJ_kHfCEY5NFXNegUYUJ8-pFSM7uEg&s" @endif src="{{ asset('storage/' . $project->thumb) }}" alt="">
        </div>
        <div class="w-50 d-flex flex-column justify-content-between">
            <div>
                <h5>Descrizione: <p class="d-inline">{{ $project->description }}</p></h5>
                <div class="d-flex">
                    <h5 class="m-0 fw-bold">Tecnologie: </h5>
                    <p class="m-0">{{ $project->getTechnologies() }}</p>
                </div>
                <div class="badge fs-5 p-0 my-2">{!! $project->type->getBadge() !!}</div>
            </div>
            <div class="d-flex justify-content-between align-items-center">
                <h6 class="m-0">Data di pubblicazione: <p class="d-inline m-0">{{ $project->updated_at }}</p></h6>
                <a href="https://github.com/Luca10992?tab=repositories" target="blank">
                    <button class="btn btn-secondary">Vai al progetto</button>
                </a>
            </div>
        </div>
    </div>
  </div>
@endsection

@section('modal')
        <div class="modal fade" id="delete-{{ $project->id }}-project" tabindex="-1"
            aria-labelledby="delete-{{ $project->id }}-project" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="delete-{{ $project->id }}-project">
                            Eliminare {{ $project->title }} ?</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Se confermi non potrai tornare indietro.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                        <form action="{{ route('admin.projects.destroy', $project) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection