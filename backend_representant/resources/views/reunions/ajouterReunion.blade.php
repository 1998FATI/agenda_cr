<div class="modal fade" id="addReunionModal" tabindex="-1" aria-labelledby="addReunionModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addReunionModalLabel">Ajouter une Réunion</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addReunionForm" method="POST" action="{{ route('reunions.store') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="objet" class="form-label">Objet</label>
                        <input type="text" id="objet" name="objet" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="details" class="form-label">Details</label>
                        <input type="text" id="details" name="details" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="organ_id" class="form-label">Type d'Organ</label>
                        <select id="organ_id" name="id_organs" class="form-select" required>
                            @foreach ($organs as $organ)
                                <option value="{{ $organ->id }}">{{ $organ->libelle }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="date" class="form-label">Date</label>
                        <input type="date" id="date" name="date_reunion" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="salle" class="form-label">Salle</label>
                        <input type="number" id="salle" name="salle" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-warning">Ajouter</button>
                </form>
            </div>
        </div>
    </div>
</div>
