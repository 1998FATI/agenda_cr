@foreach ($reunions as $reunion)
    <div class="modal fade" id="editModal{{ $reunion->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $reunion->id }}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel{{ $reunion->id }}">Modifier la Réunion</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('reunions.update', $reunion->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="objet{{ $reunion->id }}" class="form-label">Objet</label>
                            <input type="text" id="objet{{ $reunion->id }}" name="objet" class="form-control" value="{{ $reunion->objet }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="details{{ $reunion->id }}" class="form-label">Détails</label>
                            <input type="text" id="details{{ $reunion->id }}" name="details" class="form-control" value="{{ $reunion->details }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="organ_id{{ $reunion->id }}" class="form-label">Type d'Organ</label>
                            <select id="organ_id{{ $reunion->id }}" name="id_organs" class="form-select" required>
                                @foreach ($organs as $organ)
                                    <option value="{{ $organ->id }}" @if($organ->id == $reunion->id_organs) selected @endif>{{ $organ->libelle }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="date{{ $reunion->id }}" class="form-label">Date</label>
                            <input type="date" id="date{{ $reunion->id }}" name="date_reunion" class="form-control" value="{{ $reunion->date_reunion }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="salle{{ $reunion->id }}" class="form-label">Salle</label>
                            <input type="number" id="salle{{ $reunion->id }}" name="salle" class="form-control" value="{{ $reunion->salle }}" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach
