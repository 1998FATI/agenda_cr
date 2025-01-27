<div class="modal fade" id="addOrganModal" tabindex="-1" aria-labelledby="addOrganModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addOrganModalLabel">Ajouter un Organ</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addOrganForm" method="POST" action="{{ route('organs.store') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="libelle" class="form-label">libelle</label>
                            <input type="text" id="libelle" name="libelle" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-warning">Ajouter</button>
                    </form>
                </div>
            </div>
        </div>
    </div>