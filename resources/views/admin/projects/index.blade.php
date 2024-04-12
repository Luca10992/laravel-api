@extends('layouts.app')
@section('title', '| Projects')

@section('content')
  <div class="container py-3">
    <div class="d-flex justify-content-between py-4">
        <h1 class="fw-bold fs-2">Projects</h1>
        <a href="{{ route('admin.projects.create') }}">
            <button class="btn btn-success">Add Project</button>
        </a>
    </div>
    <div class="row g-3">
        @foreach ($projects as $project)
        <div class="col-3">
            <a href="{{ route('admin.projects.show', $project) }}">
                <div class="card h-100">
                    <img class="img-fluid" @if ( $project->thumb == '' ) src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTIU04WE68MpK7kIJ_kHfCEY5NFXNegUYUJ8-pFSM7uEg&s" @endif src="{{ asset('storage/' . $project->thumb) }}" alt="">
                    <div class="card-body">
                        <h5 class="fw-bold">{{ $project->title }}</h5>
                        <div class="d-flex justify-content-between">
                            <p>{!! $project->type->getBadge() !!}</p>
                            <p>{{ $project->updated_at }}</p>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>
    <div class="py-3 d-flex justify-content-center">
        {{ $projects->links() }}
    </div>
  </div>
@endsection