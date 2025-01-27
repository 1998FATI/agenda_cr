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
    <h3 class="mb-4 text-secondary">Liste des Réunions</h3>
    <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#addReunionModal">
    <i class="fas fa-plus"></i>    Ajouter Nouvelle Réunion
    </button>   
    <br>
    <table class="table table-striped table-hover">
        <thead class="bg-primary text-white">
            <tr>
                <th>#</th>
                <th>Nom de l'organe</th>
                <th>Objet</th>
                <th>Date</th>
                <th>Salle</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($reunions as $reunion)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $reunion->organ->libelle }}</td>
                    <td>{{ $reunion->objet }}</td>
                    <td>{{ $reunion->date_reunion }}</td>
                    <td>{{ $reunion->salle }}</td>
                    <td>
                       <!-- Bouton Modifier -->
                       <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#editModal{{ $reunion->id }}">
                       <i class="fas fa-edit "></i>  Modifier
                        </button>

                        <!-- Bouton Supprimer -->
                        <button type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $reunion->id }}">
                               <i class="fas fa-trash "></i>   Supprimer
                        </button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">Aucune réunion trouvée.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    <!-- Modal pour ajouter une réunion -->
   @include('reunions.ajouterReunion')
    <!-- Modal pour modifier une réunion -->
   @include('reunions.modifierReunion')
    <!-- Modal pour supprimer une réunion -->
   @include('reunions.deleteReunion')
</div>
@endsection
