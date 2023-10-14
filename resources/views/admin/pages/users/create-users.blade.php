<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="createModalLabel">Create User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>


            </div>
            <div class="modal-body">
                <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data"
                    class="max-w-lg mx-auto p-4 bg-white shadow-md rounded-lg">
                    @csrf
                    <hr>
                    <div class="mb-4 mt-2">
                        <label for="name" class="block text-gray-700 font-semibold mb-2">Full Name</label>
                        <input type="text" name="name" id="name" class="w-full px-3 py-2 border rounded-lg"
                            placeholder="Enter your name">

                        @error('name')
                            <div class="text-sm text-red-500 italic">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-4 mt-2">
                        <label for="name" class="block text-gray-700 font-semibold mb-2">ID Number</label>
                        <input type="text" name="id_number" id="id_number" class="w-full px-3 py-2 border rounded-lg"
                            placeholder="Enter your ID Number">

                        @error('id_number')
                            <div class="text-sm text-red-500 italic">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    {{-- <div class="mb-4 mt-2">
                        <label for="image" class="block text-gray-700 font-semibold mb-2">Image</label>
                        <input type="file" name="image" id="image" accept="image/*">

                        @error('image')
                            <div class="text-sm text-red-500 italic">
                                {{ $message }}
                            </div>
                        @enderror
                    </div> --}}
                    <div class="mb-4 mt-2">
                        <label for="title" class="block text-gray-700 font-semibold mb-2">Address</label>
                        <input type="address" name="address" id="address"
                            class="w-full px-3 py-2 border rounded-lg" placeholder="Enter address">

                        @error('address')
                            <div class="text-sm text-red-500 italic">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-4 mt-2">
                        <label for="title" class="block text-gray-700 font-semibold mb-2">Password</label>
                        <input type="password" name="password" id="password"
                            class="w-full px-3 py-2 border rounded-lg" placeholder="Enter password">

                        @error('password')
                            <div class="text-sm text-red-500 italic">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-4 mt-2">
                        <label class="block text-gray-700 font-semibold mb-2">Select User Role</label>
                        <select name="role" id="">
                            <option value="user">User</option>
                            <option value="admin">Admin</option>
                        </select>

                        @error('role')
                            <div class="text-sm text-red-500 italic">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="text-center">
                        <button type="submit"
                            class="px-4 py-2 bg-blue-500 text-white w-full rounded hover:bg-blue-600">Submit</button>
                    </div>
                    <div class="text-center mt-1">
                        <a href="/admin/users"
                            class="btn px-4 py-2 bg-gray-500 text-white w-full rounded hover:bg-gray-600">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
