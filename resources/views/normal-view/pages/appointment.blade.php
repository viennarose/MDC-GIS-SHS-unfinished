@extends('normal-view.layout.base')

@include('normal-view.layout.navbar')

@section('title')
    Set an Appointment
@endsection

@section('content')
<div class="container mx-auto md:p-10">
    <div class="flex items-center justify-center mt-10">
        <div class="max-w-[700px] bg-white shadow-lg rounded-lg overflow-hidden px-20">
            <div class="p-4">
                @if (session('message'))
                    <div
                        class="bg-green-200 border-l-4 border-r-4 text-center border-green-500 text-green-700 p-4 relative">
                        <span class="block sm:inline text-bold"><i class="fas fa-paper-plane"></i>
                            {{ session('message') }}</span>
                        <button
                            class="absolute top-0 right-0 mt-4 mr-2 text-md text-green-700 hover:text-green-500 focus:outline-none"
                            onclick="this.parentElement.style.display = 'none';">
                            <svg class="h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path
                                    d="M6.293 6.293a1 1 0 0 1 1.414 0L10 8.586l2.293-2.293a1 1 0 1 1 1.414 1.414L11.414 10l2.293 2.293a1 1 0 0 1-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 1 1-1.414-1.414L8.586 10 6.293 7.707a1 1 0 0 1 0-1.414z" />
                            </svg>
                        </button>
                    </div>
                @endif
                <h1 class="text-4xl font-bold mb-4 mt-5 text-indigo-900 text-center">
                    Set an Appointment
                </h1>
                {{-- <p class="text-center">
                    Lorem ipsum dolor sit amet consectetur, adipisicing
                    elit.
                </p> --}}

                    @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif

            </div>
            <form class="px-6 py-4" action="{{ route('appointment.set') }}" method="POST">
                @csrf
                <div class="grid md:grid-cols-1 gap-4">
                    <div class="mb-4">
                        <label for="fullname" class="block text-gray-700 font-bold mb-2">Full Name</label>
                        <input type="text" id="fullname" name="fullname" placeholder="Full Name"
                            class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-blue-500" />
                        @error('fullname')
                            <div class="text-sm text-red-500 italic">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                </div>
                <div class="grid md:grid-cols-2 gap-4">
                    <div class="mb-4">
                        <label for="time" class="block text-gray-700 font-bold mb-2">Time</label>
                        <input type="time" id="time" name="time" placeholder="Time" min="{{ now()->format('H:i') }}" step="1"
                            class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-blue-500" />
                        @error('time')
                            <div class="text-sm text-red-500 italic">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="email" class="block text-gray-700 font-bold mb-2">Date</label>
                        <input type="date" name="date" id="date" placeholder="Date"  min="{{ now()->format('Y-m-d') }}"
                            class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-blue-500" />
                        @error('date')
                            <div class="text-sm text-red-500 italic">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="mb-4">
                    <label for="reason" class="block text-gray-700 font-bold mb-2">Reason</label>
                    <textarea id="reason" name="reason" placeholder="Type your reason here"
                        class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-blue-500"></textarea>
                    @error('reason')
                        <div class="text-sm text-red-500 italic">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="flex justify-center">
                    {{-- <div class="mb-4 flex items-center">
                        <input type="checkbox" id="agreeTerms" class="form-checkbox h-5 w-5 text-indigo-600" />
                        <p for="agreeTerms" class="ml-2 text-gray-700">
                            I have read and understand the Terms of
                            <a href="#" class="text-blue-500">Service and Privacy Policy</a>
                        </p>
                    </div> --}}
                    <div class="flex items-center">
                        <button type="submit"
                            class="bg-sky-500 hover:bg-sky-600 text-white font-bold py-2 px-10 rounded focus:outline-none focus:shadow-outline"
                            style="border-radius: 20px;">
                            Submit
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
    $(document).ready(function () {
    // Get the time input element
    var timeInput = document.getElementById('time');

    // Attach an input event listener
    timeInput.addEventListener('input', function () {
        var selectedTime = this.value; // Get the selected time
        var currentTime = new Date().toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });

        // Compare the selected time to the current time
        if (selectedTime < currentTime) {
            // Disable the input if it's before the current time
            this.setCustomValidity('Selected time must be after the current time.');
        } else {
            // Clear any previous validation message
            this.setCustomValidity('');
        }
    });
});

</script>
@endsection
