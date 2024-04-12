@extends('layouts.app')
@section('title', '| Types')

@section('content')
  <div class="container py-3">
    <div class="d-flex justify-content-between py-4">
        <h1 class="fw-bold fs-2">Types</h1>
        <a href="{{ route('admin.types.create') }}">
            <button class="btn btn-success">Add Types</button>
        </a>
    </div>
    <table class="table text-center">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tipologia</th>
                <th>Colore</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @forelse ($types as $type)
            <tr>
                <td>{{ $type->id }}</td>
                <td>{{ $type->label }}</td>
                <td>{{ $type->color }}</td>
                <td class="d-flex align-items-center justify-content-center">
                    <a href="{{ route('admin.types.edit', $type) }}">
                        <i class="fa-solid fa-pencil text-success p-2 fs-5"></i>
                    </a>
                    <button type="button" class="btn p-0" data-bs-toggle="modal" data-bs-target="#delete-{{ $type->id }}-type">
                        <i class="fa-solid fa-trash text-danger p-2 fs-5"></i>
                    </button>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="n">Nessun risultato</td>
            </tr>
            @endforelse
        </tbody>
    </table>
  </div>
@endsection

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('modal')
        <div class="modal fade" id="delete-{{ $type->id }}-type" tabindex="-1"
            aria-labelledby="delete-{{ $type->id }}-type" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="delete-{{ $type->id }}-type">
                            Eliminare {{ $type->label }} ?</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Se confermi non potrai tornare indietro.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                        <form action="{{ route('admin.types.destroy', $type) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection