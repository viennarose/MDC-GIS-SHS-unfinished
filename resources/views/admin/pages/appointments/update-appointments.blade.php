<div class="modal fade" id="editModal{{ $appointment->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel{{ $appointment->id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel{{ $appointment->id }}">Edit Appointment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('appointments.update', ['id' => $appointment->id]) }}" method="POST"
                    class="max-w-lg mx-auto p-4 bg-white shadow-md rounded-lg">
                    @csrf

                        @method('PUT')
                    <hr>
                    <div class="mb-4 mt-2">
                        <label for="title" class="block text-gray-700 font-semibold mb-2">Full name</label>
                        <input type="text" name="fullname" id="fullname" value="{{ $appointment->fullname }}" class="w-full px-3 py-2 border rounded-lg"
                            placeholder="Enter your full name">


                        @error('fullname')
                            <div class="text-sm text-red-500 italic">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-4 mt-2">
                        <label for="title" class="block text-gray-700 font-semibold mb-2">Date</label>
                        <input type="date" name="date" id="date" value="{{ $appointment->date }}" class="w-full px-3 py-2 border rounded-lg"
                            placeholder="Enter title">

                        @error('date')
                            <div class="text-sm text-red-500 italic">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-4 mt-2">
                        <label for="title" class="block text-gray-700 font-semibold mb-2">Time</label>
                        <input type="time" name="time" id="time" value="{{ $appointment->time }}" class="w-full px-3 py-2 border rounded-lg"
                            placeholder="Enter Time">

                        @error('time')
                            <div class="text-sm text-red-500 italic">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="remarks" class="block text-gray-700 font-semibold mb-2">Reason</label>
                        <textarea name="reason" id="reason" class="w-full px-3 py-2 border rounded-lg" placeholder="Enter reason">{{ $appointment->reason }}</textarea>

                        @error('reason')
                            <div class="text-sm text-red-500 italic">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="text-center mb-2 flex justify-between items-center">
                        <button type="submit"
                            class="px-4 me-3 py-2 bg-green-500 text-white w-full rounded hover:bg-green-600">Approve Appointment</button>
                        <button type="submit"
                            class="px-4 py-2 bg-red-500 text-white w-full rounded hover:bg-red-600">Cancel Appointment</button>
                    </div>
                    <div class="text-center">
                        <button type="submit"
                            class="px-4 py-2 bg-blue-500 text-white w-full rounded hover:bg-blue-600">Submit</button>
                    </div>
                    <div class="text-center mt-1">
                        <a href="/admin/announcements"
                            class="btn px-4 py-2 bg-gray-500 text-white w-full rounded hover:bg-gray-600">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

