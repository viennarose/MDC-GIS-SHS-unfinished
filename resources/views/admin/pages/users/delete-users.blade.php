<div class="modal fade" id="deleteModal{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel{{ $user->id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Confirm Delete</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this user?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary text-dark" data-dismiss="modal">Cancel</button>
                <form method="POST" action="{{ route('users.destroy', ['id' => $user->id]) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger text-dark">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
