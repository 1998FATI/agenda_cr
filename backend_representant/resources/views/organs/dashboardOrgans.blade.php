@extends('layouts.app')

@section('content')
@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Succès !</strong> {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger alert-dismissible fade show " role="alert">
        <strong>Erreur  !</strong> {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif


<div class="container">
    <h3 class="mb-4 text-secondary">Liste des Organes</h3>
    <form action="{{route('organs.form')}}" method="post">
     <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#addOrganModal">
     <i class="fas fa-plus"></i>  Ajouter Nouvel Organ 
    </button>
    </form>
    <br>
    <table class="table table-striped table-hover">
        <thead class="bg-primary text-white">
            <tr>
                <th>#</th>
                <th>Libelle</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($organs as $organ)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $organ->libelle }}</td>
                    <td>
                        <!-- Icône Modifier -->
                        <button type="button" title="Modifier" class="btn btn-sm btn-outline-primary"data-bs-toggle="modal" data-bs-target="#editModal{{ $organ->id }}">
                        <i class="fas fa-edit "></i>Modifier
                        </button>

                        <!-- Icône Supprimer -->
                        <button type="button" title="Supprimer" class="btn btn-sm btn-outline-danger"data-bs-toggle="modal" data-bs-target="#deleteModal{{ $organ->id }}">
                        <i class="fas fa-trash "></i>Supprimer
                        </button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">Aucune Organ trouvé.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    @include('organs.ajouterOrgans')
    @include('organs.updateOrgan')
    @include('organs.deleteOrgan')
</div>
@endsection


