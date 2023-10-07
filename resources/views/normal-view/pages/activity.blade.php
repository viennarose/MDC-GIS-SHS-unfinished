@extends('normal-view.layout.base')

@section('title')
Activities
@endsection

@include('normal-view.layout.navbar')

@section('content')
    <div class="container mx-auto p-4">
        <div class="flex items-center justify-center mt-10">
            <div class="max-w-4xl bg-white shadow-lg rounded-lg overflow-hidden p-2">
                <div class="bg-cover bg-center h-64 p-4" style="background-image: url('/images/bg2.png')"></div>
                <div class="p-5">
                    <p class="md:text-4xl text-center font-extrabold text-indigo-900">
                        Activities
                    </p>
                </div>
                <hr class="mb-5">
                @foreach ($activities as $activity)
                    <div class="mt-4">
                        <div class="bg-gray-200 rounded-lg shadow-lg p-6 border border-gray-300">
                            <p class="float-right mt-[-15px] mr-[-10px] text-gray-500 text-xs">
                                {{ $activity->created_at->format('F j, Y - h:i A') }}</p>
                            <h2 class="text-2xl font-semibold text-gray-800 mb-4"><i class="fas fa-bullhorn"></i> |
                                {{ $activity->title }}</h2>
                            <div class="text-gray-600">-{{ $activity->description }}</div>
                            <div class="text-gray-600"><img src="{{ asset('activities/' . $activity->image) }}" alt="Activity Image" class="object-cover w-full h-full"></div>
                        </div>
                    </div>
                @endforeach

                @if ($activities->count() === 0)
                    <p class="text-center mt-3">
                        No activities found yet. Please stay tuned!
                    </p>
                @endif
                <div class="my-4">
                    {{ $activities->links('normal-view.layout.pagination') }}
                </div>
            </div>
        </div>
    </div>
@endsection
