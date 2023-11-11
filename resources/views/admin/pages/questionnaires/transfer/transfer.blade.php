@extends('admin.layout.base')

@section('content-header')
    <h2 class="text-2xl font-semibold text-gray-800 mb-4">transfer Forms</h2>
@endsection

@section('content')
@if (session('message'))
        <div class="bg-green-200 border-l-4 border-r-4 text-center border-green-500 text-green-700 p-4 relative">
            <span class="block sm:inline text-bold"><i class="fas fa-bullhorn"></i> {{ session('message') }}</span>
            <button class="absolute top-0 right-0 mt-4 mr-2 text-md text-green-700 hover:text-green-500 focus:outline-none"
                onclick="this.parentElement.style.display = 'none';">
                <svg class="h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path
                        d="M6.293 6.293a1 1 0 0 1 1.414 0L10 8.586l2.293-2.293a1 1 0 1 1 1.414 1.414L11.414 10l2.293 2.293a1 1 0 0 1-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 1 1-1.414-1.414L8.586 10 6.293 7.707a1 1 0 0 1 0-1.414z" />
                </svg>
            </button>
        </div>
    @endif
    <div class="bg-white rounded-lg shadow-lg p-6">
        <div class="flex justify-between mb-4">
            <span class="text-bold text-2xl">Total Entries: {{ $transfers->count() }}</span>
            <a href="/admin/transfers/create"
                class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Add Form </a>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full border border-gray-300">
                <thead>
                    <tr>
                        <th class="px-4 py-2 bg-gray-100 border-b border-gray-300">ID No.</th>
                        <th class="px-4 py-2 bg-gray-100 border-b border-gray-300">Student name</th>
                        <th class="px-4 py-2 bg-gray-100 border-b border-gray-300">Course and Year</th>
                        <th class="px-4 py-2 bg-gray-100 border-b border-gray-300">Date</th>
                        <th class="px-4 py-2 bg-gray-100 border-b border-gray-300">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transfers as $transfer)
                        <tr class="hover:bg-gray-100 {{ $loop->iteration % 2 === 0 ? 'bg-gray-100' : '' }}">
                            <td class="px-4 py-2 border-b border-gray-300">{{ $transfer->id }}</td>
                            <td class="px-4 py-2 border-b border-gray-300">{{ $transfer->user->name }}</td>
                            <td class="px-4 py-2 border-b border-gray-300">{{ $transfer->course_year }}</td>
                            <td class="px-4 py-2 border-b border-gray-300">{{ $transfer->created_at->format('F j, Y') }}
                            </td>
                            <td class="px-4 py-2 border-b border-gray-300">
                                <div class="flex justify-between items-center">
                                    <span>
                                        <a href="{{ route('admin.transfers.update', $transfer->id) }}"
                                            class="px-4 py-2 text-black rounded-full hover:bg-yellow-600 bg-yellow-500">Update</a>
                                    </span>
                                    <span>
                                        <button type="submit" class="px-4 py-2 text-white rounded-full hover:bg-red-600 bg-red-700"
                                    data-toggle="modal" data-target="#deleteModal">Delete</button>
                                        @include('admin.pages.questionnaires.transfer.transfer-delete')
                                    </span>
                                    <span>
                                        <a href="{{ route('admin.transfers.pdf', $transfer->id) }}"
                                            class="px-4 py-2 text-white rounded-full bg-green-600 hover:bg-green-700">Download</a>
                                    </span>
                                    <span>
                                        <button class="px-4 py-2 text-white rounded-full bg-blue-600 hover:bg-blue-700"
                                            onclick="printtransfer({{ $transfer->id }})">Print</button>
                                    </span>
                                </div>

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
            @if ($transfers->count() === 0)
                <p class="text-center mt-3">
                    No transfers found. Please add one!
                </p>
            @endif
            <div class="my-4">
                {{ $transfers->links('admin.layout.pagination') }}
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script>
    function printtransfer(transferId) {
        const printUrl = "{{ route('admin.transfers.print', ':id') }}".replace(':id', transferId);
        const printWindow = window.open(printUrl, '_blank');
        printWindow.onload = function () {
            printWindow.print();
        };
    }
</script>
@endsection
