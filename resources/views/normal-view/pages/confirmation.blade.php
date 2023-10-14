@extends('normal-view.layout.dashboard')

@section('title')
    Announcement
@endsection

@section('content')
    <div class="container mx-auto p-4">
        <div class="flex items-center justify-center mt-10">
            <div class="max-w-4xl bg-white shadow-lg rounded-lg overflow-hidden p-2">
                <div class="bg-cover bg-center h-64 p-4" style="background-image: url('/images/bg2.png')"></div>
                <div class="p-5">
                    <p class="md:text-4xl text-center font-extrabold text-green-900">
                        You have successfully set your appointment!
                    </p>
                </div>
                <hr class="mb-5">
                    <p class="text-center mt-3">
                       Please check your notification for the approval of your appointment. Thank you!
                    </p>

            </div>
        </div>
    </div>
@endsection
