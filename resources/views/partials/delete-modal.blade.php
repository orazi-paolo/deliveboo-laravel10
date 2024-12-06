<div class="modal fade" id="staticBackdrop-{{ $plate->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">
                    {{ Route::is('admin.plates.index') ? 'Deleting' : 'Permanent deleting' }}
                    {{ $plate->name }}
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>
                    Are you sure you want to
                    <span class="text-danger fw-semibold">
                        {{ Route::is('admin.plates.index') ? 'delete' : 'permanent delete' }}
                    </span>
                    <span class="fw-semibold">{{ $plate->name }}</span> ?
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-turquoise" data-bs-dismiss="modal">
                    Close
                </button>
                <form
                    action="{{ route(Route::is('admin.plates.index') ? 'admin.plates.destroy' : 'admin.plates.force-delete', $plate) }}"
                    method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-turquoise delete-btn" type="submit" value="delete"
                        delete-data-name="{{ $plate->name }}">
                        {{ Route::is('admin.plates.index') ? 'Delete' : 'Delete Permanently' }}
                        <i class="bi bi-trash3-fill"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
