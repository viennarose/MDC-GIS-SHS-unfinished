@extends('admin.layout.base')

@section('content-header')
    <h2 class="text-2xl font-semibold text-gray-800 mb-4">Announcements</h2>
@endsection

@section('content')
    <div class="bg-white rounded-lg shadow-lg p-6">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <div class="flex justify-between mb-4">
            <span class="text-bold text-2xl">Total Entries: {{ $announcements->count() }}</span>
            <a data-toggle="modal" data-target="#createModal"
                class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Add announcement </a>
            @include('admin.pages.announcements.create-announcement')
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full border border-gray-300">
                <thead>
                    <tr>
                        <th class="px-4 py-2 bg-gray-100 border-b border-gray-300">ID</th>
                        <th class="px-4 py-2 bg-gray-100 border-b border-gray-300">Title</th>
                        <th class="px-4 py-2 bg-gray-100 border-b border-gray-300">Description</th>
                        <th class="px-4 py-2 bg-gray-100 border-b border-gray-300">Image</th>
                        <th class="px-4 py-2 bg-gray-100 border-b border-gray-300">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($announcements as $announcement)
                        <tr class="hover:bg-gray-100 {{ $loop->iteration % 2 === 0 ? 'bg-gray-100' : '' }}">
                            <td class="px-4 py-2 border-b border-gray-300">{{ $announcement->id }}</td>
                            <td class="px-4 py-2 border-b border-gray-300">{{ $announcement->title }}</td>
                            <td class="px-4 py-2 border-b border-gray-300">
                                @if ($announcement->image)
                                <div class="rounded-full overflow-hidden w-16 h-16">
                                    <img src="{{ asset('announcements/' . $announcement->image) }}" alt="announcement Image" class="object-cover w-full h-full">
                                </div>
                            @else
                                No Image Available
                            @endif</td>
                            <td class="px-4 py-2 border-b border-gray-300">{{ $announcement->description }}
                    </td>

                    <td class="px-4 py-2 border-b border-gray-300">
                        <div class="flex  items-center">
                            <span>
                                <a data-toggle="modal" data-target="#editModal{{ $announcement->id }}"
                                    class="px-4 py-2 me-2 text-black rounded-full hover:bg-yellow-600 bg-yellow-500">Update</a>
                            </span>
                            @include('admin.pages.announcements.update-announcements')

                            <span>

                                <button type="submit" class="px-4 py-2 text-white rounded-full hover:bg-red-600 bg-red-700"
                                    data-toggle="modal" data-target="#deleteModal">Delete</button>
                                @include('admin.pages.announcements.delete-announcement')
                            </span>
                        </div>
                    </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @if ($announcements->count() === 0)
                <p class="text-center mt-3">
                    No announcements found. Please add one!
                </p>
            @endif
            {{-- <div class="my-4">
            {{ $announcements->links('admin.layout.pagination') }}
        </div> --}}
        </div>
    </div>
@endsection

@section('scripts')

@endsection
