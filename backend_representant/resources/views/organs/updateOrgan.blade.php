@foreach ($organs as $organ)
    <div class="modal fade" id="editModal{{ $organ->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $organ->id }}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel{{ $organ->id }}">Modifier l'Organ</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('organs.update', $organ->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="mb-3"> 
                            <label for="libelle{{ $organ->id }}" class="form-label">Libelle</label>
                            <input type="text" id="libelle{{ $organ->id }}" name="libelle" class="form-control" value="{{ $organ->libelle }}" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach
