<div class="modal fade" id="editModal{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel{{ $user->id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel{{ $user->id }}">Edit user</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('users.update', ['id' => $user->id]) }}" method="POST" class="max-w-lg mx-auto p-4 bg-white shadow-md rounded-lg" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <hr>
                    <div class="mb-4 mt-2">
                        <label for="name" class="block text-gray-700 font-semibold mb-2">Full Name</label>
                        <input type="text" name="name" id="name" value="{{ $user->name }}" class="w-full px-3 py-2 border rounded-lg" placeholder="Enter your full name">
                        @error('name')
                            <div class="text-sm text-red-500 italic">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-4 mt-2">
                        <label for="name" class="block text-gray-700 font-semibold mb-2">Id Number</label>
                        <input type="text" name="id_number" id="id_number" value="{{ $user->id_number }}" class="w-full px-3 py-2 border rounded-lg" placeholder="Enter your full id_number">
                        @error('id_number')
                            <div class="text-sm text-red-500 italic">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- <div class="mb-4 mt-2">
                        <label for="image" class="block text-gray-700 font-semibold mb-2">Image</label>
                        <div class="rounded-full overflow-hidden w-16 h-16 mx-auto">
                            @if ($user->image)
                                <img src="{{ asset('users/' . $user->image) }}" alt="Current user Image" class="object-cover w-full h-full">
                            @else
                                No Image Available
                            @endif
                        </div>
                        <input type="file" name="image" id="image" accept="image/*">
                        @error('image')
                            <div class="text-sm text-red-500 italic">{{ $message }}</div>
                        @enderror
                    </div> --}}
                    <div class="mb-4 mt-2">
                        <label for="address" class="block text-gray-700 font-semibold mb-2">Address</label>
                        <input type="text" name="address" id="address" value="{{ $user->address }}" class="w-full px-3 py-2 border rounded-lg" placeholder="Enter address">
                        @error('address')
                            <div class="text-sm text-red-500 italic">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-4 mt-2">
                        <label for="password" class="block text-gray-700 font-semibold mb-2">Password</label>
                        <input type="password" name="password" id="password" value="{{ $user->password }}" class="w-full px-3 py-2 border rounded-lg" placeholder="Enter password">
                        @error('password')
                            <div class="text-sm text-red-500 italic">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-4 mt-2">
                        <label class="block text-gray-700 font-semibold mb-2">Select User Role</label>
                        <select name="role" id="">
                            @php
                            $userRole = $user->getRoleNames()->first();
                            @endphp

                            <option value="user" {{ $userRole === 'user' ? 'selected' : '' }}>User</option>
                            <option value="admin" {{ $userRole === 'admin' ? 'selected' : '' }}>Admin</option>
                        </select>

                        @error('role')
                            <div class="text-sm text-red-500 italic">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="text-center">
                        <button type="submit" class="px-4 py-2 bg-blue-500 text-white w-full rounded hover:bg-blue-600">Submit</button>
                    </div>
                    <div class="text-center mt-1">
                        <a href="/admin/users" class="btn px-4 py-2 bg-gray-500 text-white w-full rounded hover:bg-gray-600">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
