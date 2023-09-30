<div class="modal fade" id="updateStatusModal" tabindex="-1" role="dialog" aria-labelledby="updateStatusModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateStatusModalLabel">Approve Appointment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to approve this appointment?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary text-dark" data-dismiss="modal">Cancel</button>
                <form method="POST" action="{{ route('appointments.updateStatus', ['id' => $appointment->id]) }}">
                    @csrf
                    @method('PUT')
                    <button type="submit" class="btn btn-info text-dark">Approve</button>
                </form>
            </div>
        </div>
    </div>
</div>
