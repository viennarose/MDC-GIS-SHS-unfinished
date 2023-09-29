@extends('admin.layout.base')

@section('content-header')
    <h2 class="text-2xl font-semibold text-gray-800 mb-4">Appointments</h2>
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
        <span class="text-bold text-2xl">Total Entries: {{ $appointments->count() }}</span>
        <a data-toggle="modal" data-target="#createModal"
            class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            Add Appointment </a>
            @include('admin.pages.appointments.create-appointment')
    </div>
    <div class="overflow-x-auto">
        <table class="min-w-full border border-gray-300">
            <thead>
                <tr>
                    <th class="px-4 py-2 bg-gray-100 border-b border-gray-300">ID No.</th>
                    <th class="px-4 py-2 bg-gray-100 border-b border-gray-300">Name</th>
                    <th class="px-4 py-2 bg-gray-100 border-b border-gray-300">Date</th>
                    <th class="px-4 py-2 bg-gray-100 border-b border-gray-300">Time</th>
                    <th class="px-4 py-2 bg-gray-100 border-b border-gray-300">Reason</th>
                    <th class="px-4 py-2 bg-gray-100 border-b border-gray-300">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($appointments as $appointment)
                    <tr class="hover:bg-gray-100 {{ $loop->iteration % 2 === 0 ? 'bg-gray-100' : '' }}">
                        <td class="px-4 py-2 border-b border-gray-300">{{ $appointment->id }}</td>
                        <td class="px-4 py-2 border-b border-gray-300">{{ $appointment->fullname }}</td>
                        <td class="px-4 py-2 border-b border-gray-300">{{ $appointment->date }}</td>

                        <td class="px-4 py-2 border-b border-gray-300">{{ $appointment->time}}
                        </td>
                        <td class="px-4 py-2 border-b border-gray-300">{{ $appointment->reason }}</td>
                        <td class="px-4 py-2 border-b border-gray-300">
                            <div class="flex justify-between items-center">
                                <span>
                                    <a data-toggle="modal" data-target="#editModal{{ $appointment->id }}"
                                        class="px-4 py-2 text-black rounded-full hover:bg-yellow-600 bg-yellow-500">Update</a>
                                </span>
                                @include('admin.pages.appointments.update-appointments')
                                <span>
                                    <form action="/admin/appointment/delete" method="POST">
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
        @if ($appointments->count() === 0)
            <p class="text-center mt-3">
                No appointments found. Please add one!
            </p>
        @endif
        {{-- <div class="my-4">
            {{ $appointments->links('admin.layout.pagination') }}
        </div> --}}
    </div>
</div>
@endsection
