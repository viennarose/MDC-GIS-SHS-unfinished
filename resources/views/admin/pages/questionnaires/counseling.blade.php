@extends('admin.layout.base')

@section('content-header')
    <h2 class="text-2xl font-semibold text-gray-800 mb-4">Counseling Forms</h2>
@endsection

@section('content')
    <div class="bg-white rounded-lg shadow-lg p-6">
        <div class="flex justify-between mb-4">
            <span class="text-bold text-2xl">Total Entries: {{ $counselings->count() }}</span>
            <a href="/admin/counselings/create"
                class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Add Form </a>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full border border-gray-300">
                <thead>
                    <tr>
                        <th class="px-4 py-2 bg-gray-100 border-b border-gray-300">ID No.</th>
                        <th class="px-4 py-2 bg-gray-100 border-b border-gray-300">student_name</th>
                        <th class="px-4 py-2 bg-gray-100 border-b border-gray-300">course_year</th>
                        <th class="px-4 py-2 bg-gray-100 border-b border-gray-300">Date</th>
                        <th class="px-4 py-2 bg-gray-100 border-b border-gray-300">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($counselings as $cnslng)
                        <tr class="hover:bg-gray-100 {{ $loop->iteration % 2 === 0 ? 'bg-gray-100' : '' }}">
                            <td class="px-4 py-2 border-b border-gray-300">{{ $cnslng->id }}</td>
                            <td class="px-4 py-2 border-b border-gray-300">{{ $cnslng->student_name }}</td>
                            <td class="px-4 py-2 border-b border-gray-300">{{ $cnslng->course_year }}</td>
                            <td class="px-4 py-2 border-b border-gray-300">{{ $cnslng->created_at->format('F j, Y') }}
                            </td>
                            <td class="px-4 py-2 border-b border-gray-300">
                                <div class="flex justify-between items-center">
                                    <span>
                                        <a href="{{ route('admin.counselings.update', $cnslng->id) }}"
                                            class="px-4 py-2 text-black rounded-full hover:bg-yellow-600 bg-yellow-500">Update</a>
                                    </span>
                                    <span>
                                        <form action="/admin/counseling/delete" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="px-4 py-2 text-white rounded-full hover:bg-red-600 bg-red-700">Delete</button>
                                        </form>
                                    </span>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @if ($counselings->count() === 0)
                <p class="text-center mt-3">
                    No counselings found. Please add one!
                </p>
            @endif
            <div class="my-4">
                {{ $counselings->links('admin.layout.pagination') }}
            </div>
        </div>
    </div>
@endsection
