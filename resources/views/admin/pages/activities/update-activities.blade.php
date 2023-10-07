<div class="modal fade" id="editModal{{ $activity->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel{{ $activity->id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel{{ $activity->id }}">Edit Activity</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('activities.update', ['id' => $activity->id]) }}" method="POST" class="max-w-lg mx-auto p-4 bg-white shadow-md rounded-lg" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <hr>
                    <div class="mb-4 mt-2">
                        <label for="title" class="block text-gray-700 font-semibold mb-2">Full Name</label>
                        <input type="text" name="title" id="title" value="{{ $activity->title }}" class="w-full px-3 py-2 border rounded-lg" placeholder="Enter your full name">
                        @error('title')
                            <div class="text-sm text-red-500 italic">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-4 mt-2">
                        <label for="image" class="block text-gray-700 font-semibold mb-2">Image</label>
                        <div class="rounded-full overflow-hidden w-16 h-16 mx-auto">
                            @if ($activity->image)
                                <img src="{{ asset('activities/' . $activity->image) }}" alt="Current Activity Image" class="object-cover w-full h-full">
                            @else
                                No Image Available
                            @endif
                        </div>
                        <input type="file" name="image" id="image" accept="image/*">
                        @error('image')
                            <div class="text-sm text-red-500 italic">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-4 mt-2">
                        <label for="description" class="block text-gray-700 font-semibold mb-2">Description</label>
                        <input type="text" name="description" id="description" value="{{ $activity->description }}" class="w-full px-3 py-2 border rounded-lg" placeholder="Enter description">
                        @error('description')
                            <div class="text-sm text-red-500 italic">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="text-center">
                        <button type="submit" class="px-4 py-2 bg-blue-500 text-white w-full rounded hover:bg-blue-600">Submit</button>
                    </div>
                    <div class="text-center mt-1">
                        <a href="/admin/announcements" class="btn px-4 py-2 bg-gray-500 text-white w-full rounded hover:bg-gray-600">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
