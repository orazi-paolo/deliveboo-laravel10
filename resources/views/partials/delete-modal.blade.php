<div class="modal fade" id="staticBackdrop-{{ Route::is('admin.plates.index') ? $plate->id : $purchase->id }}"
    data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">
                    <span class="text-danger">
                        Deleting
                    </span>
                    {{ Route::is('admin.plates.index') ? $plate->name : $purchase->name . ' purchase' }}
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>
                    Are you sure you want to
                    <span class="text-danger fw-semibold">
                        delete
                    </span>
                    <span
                        class="fw-semibold">{{ Route::is('admin.plates.index') ? $plate->name : $purchase->name . ' purchase' }}</span>
                    ?
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-turquoise" data-bs-dismiss="modal">
                    Close
                </button>
                <form
                    action="{{ route(Route::is('admin.plates.index') ? 'admin.plates.destroy' : 'admin.purchases.destroy', Route::is('admin.plates.index') ? $plate : $purchase) }}"
                    method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-turquoise delete-btn" type="submit" value="delete"
                        delete-data-name="{{ Route::is('admin.plates.index') ? $plate->name : $purchase->name }}">
                        Delete
                        <i class="bi bi-trash3-fill"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
