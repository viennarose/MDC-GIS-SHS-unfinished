@extends('admin.layout.base')

@section('content-header')
    <h2 class="text-2xl font-semibold text-gray-800 mb-4">Feedbacks</h2>
@endsection

@section('content')
    <div class="bg-white rounded-lg shadow-lg p-6">
        <div class="flex justify-between mb-4">
            <span class="text-bold text-2xl">Total Entries: {{ $feedbacks->count() }}</span>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full border border-gray-300">
                <thead>
                    <tr>
                        <th class="px-4 py-2 bg-gray-100 border-b border-gray-300">ID No.</th>
                        <th class="px-4 py-2 bg-gray-100 border-b border-gray-300">Full Name</th>
                        <th class="px-4 py-2 bg-gray-100 border-b border-gray-300">Feedback</th>
                        <th class="px-4 py-2 bg-gray-100 border-b border-gray-300">Date</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($feedbacks as $feedback)
                        <tr class="hover:bg-gray-100 {{ $loop->iteration % 2 === 0 ? 'bg-gray-100' : '' }}">
                            <td class="px-4 py-2 border-b border-gray-300">{{ $feedback->id }}</td>
                            <td class="px-4 py-2 border-b border-gray-300">{{ $feedback->user->name }}</td>
                            <td class="px-4 py-2 border-b border-gray-300">{{ $feedback->feedback }}</td>
                            <td class="px-4 py-2 border-b border-gray-300">{{ $feedback->created_at->format('F j, Y') }} -
                                <span class="italic text-gray-500">{{ $feedback->created_at->diffForHumans() }}</span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @if ($feedbacks->count() === 0)
                <p class="text-center mt-3">
                    No one is Feedbacking us. Please wait for a while.
                </p>
            @endif
            {{-- <div class="my-4">
                {{ $feedbacks->links('admin.layout.pagination') }}
            </div> --}}
        </div>
    </div>
@endsection
