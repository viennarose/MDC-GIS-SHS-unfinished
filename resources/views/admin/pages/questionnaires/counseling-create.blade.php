@extends('admin.layout.base')

@section('content-header')
    <h2 class="text-2xl text-center font-semibold text-gray-800 mb-4">GUIDANCE OFFICE</h2>
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

    <div class="mt-5">
        <form action="{{ route('counselings.create') }}" method="POST"
            class="max-w-lg mx-auto p-4 bg-white shadow-md rounded-lg">
            @csrf

            <p class="text-xl mb-2 text-center text-bold italic">
                COUNSELING FORM
            </p>
            <hr>
            <div class="row">
                <div class="col-md-8 mb-4 mt-2">
                    <label for="name_of_student" class="block text-gray-700 font-semibold mb-2">Name of Student</label>
                    <input type="text" name="name_of_student" id="name_of_student" class="w-full px-3 py-2 border rounded-lg"
                        placeholder="Enter name of student">

                    @error('name_of_student')
                        <div class="text-sm text-red-500 italic">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-md-4 mb-4 mt-2">
                    <label for="date" class="block text-gray-700 font-semibold mb-2">Date</label>
                    <input type="date" name="date" id="date" class="w-full px-3 py-2 border rounded-lg">

                    @error('date')
                        <div class="text-sm text-red-500 italic">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-4 mt-2">
                    <label for="course_year" class="block text-gray-700 font-semibold mb-2">Course and Year</label>
                    <input type="text" name="course_year" id="course_year" class="w-full px-3 py-2 border rounded-lg"
                        placeholder="Enter course and year">

                    @error('course_year')
                        <div class="text-sm text-red-500 italic">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-md-4 mb-4 mt-2">
                    <label for="department" class="block text-gray-700 font-semibold mb-2">Department</label>
                    <input type="text" name="department" id="department" class="w-full px-3 py-2 border rounded-lg"
                        placeholder="Enter department">

                    @error('department')
                        <div class="text-sm text-red-500 italic">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-md-4 mb-4 mt-2">
                    <label for="contact_num" class="block text-gray-700 font-semibold mb-2">Contact number</label>
                    <input type="number" name="contact_num" id="contact_num" class="w-full px-3 py-2 border rounded-lg"
                        placeholder="Enter number">

                    @error('contact_num')
                        <div class="text-sm text-red-500 italic">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

                <div class="col-md-12 mb-4 mt-2">
                    <label for="visit_nature" class="block text-gray-700 font-semibold mb-2">Nature of Visit</label>
                    <input type="checkbox" id="visit_nature" name="visit_nature" value="Walk in">Walk in
                    <input type="checkbox" id="visit_nature" name="visit_nature" value="Referral">Referral

                </div>

            <div class="mb-4">
                <label for="concern" class="block text-gray-700 font-semibold mb-2">Problem(s)/Concern(s)</label>
                <textarea name="concern" id="concern" class="w-full px-3 py-2 border rounded-lg" placeholder="Enter concern"></textarea>

                @error('concern')
                    <div class="text-sm text-red-500 italic">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="concern" class="block text-gray-700 font-semibold mb-2">Action Taken/Recommendation(s)</label>
                <textarea name="concern" id="concern" class="w-full px-3 py-2 border rounded-lg" placeholder="Enter concern"></textarea>

                @error('concern')
                    <div class="text-sm text-red-500 italic">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-md-4 mb-4 mt-2">
                <label for="followup_dates" class="block text-gray-700 font-semibold mb-2">Follow up Dates</label>
                <input type="date" name="followup_dates" id="followup_dates" class="w-full px-3 py-2 border rounded-lg">

                @error('followup_dates')
                    <div class="text-sm text-red-500 italic">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="row">
                <div class="col-md-6 mb-4 mt-2">
                    <label for="counselee" class="block text-gray-700 font-semibold mb-2">Counselee</label>
                    <input type="text" name="counselee" id="counselee" class="w-full px-3 py-2 border rounded-lg"
                        placeholder="Enter Counselee">

                    @error('counselee')
                        <div class="text-sm text-red-500 italic">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-md-6 mb-4 mt-2">
                    <label for="counselor" class="block text-gray-700 font-semibold mb-2">Counselor</label>
                    <input type="text" name="counselor" id="counselor" class="w-full px-3 py-2 border rounded-lg" placeholder="Enter Counselor">

                    @error('counselor')
                        <div class="text-sm text-red-500 italic">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            <div class="border border-dark p-3">
                <h6>COUNSELING SLIP</h6>
                <div class="row">
                    <div class="col-md-8 mb-4 mt-2">
                        <label for="name_of_student" class="block text-gray-700 font-semibold mb-2">Name of Student</label>
                        <input type="text" name="name_of_student" id="name_of_student" class="w-full px-3 py-2 border rounded-lg"
                            placeholder="Enter name of student">

                        @error('name_of_student')
                            <div class="text-sm text-red-500 italic">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-4 mb-4 mt-2">
                        <label for="date" class="block text-gray-700 font-semibold mb-2">Date</label>
                        <input type="date" name="date" id="date" class="w-full px-3 py-2 border rounded-lg">

                        @error('date')
                            <div class="text-sm text-red-500 italic">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 mb-4 mt-2">
                        <label for="course_year" class="block text-gray-700 font-semibold mb-2">Course and Year</label>
                        <input type="text" name="course_year" id="course_year" class="w-full px-3 py-2 border rounded-lg"
                            placeholder="Enter course and year">

                        @error('course_year')
                            <div class="text-sm text-red-500 italic">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-4 mb-4 mt-2">
                        <label for="department" class="block text-gray-700 font-semibold mb-2">Department</label>
                        <input type="text" name="department" id="department" class="w-full px-3 py-2 border rounded-lg"
                            placeholder="Enter department">

                        @error('department')
                            <div class="text-sm text-red-500 italic">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-4 mb-4 mt-2">
                        <label for="contact_num" class="block text-gray-700 font-semibold mb-2">Contact number</label>
                        <input type="number" name="contact_num" id="contact_num" class="w-full px-3 py-2 border rounded-lg"
                            placeholder="Enter number">

                        @error('contact_num')
                            <div class="text-sm text-red-500 italic">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4 mb-4 mt-2">
                    <label for="session_ended" class="block text-gray-700 font-semibold mb-2">Session Ended</label>
                    <input type="number" name="session_ended" id="session_ended" class="w-full px-3 py-2 border rounded-lg"
                        placeholder="Enter number">

                    @error('session_ended')
                        <div class="text-sm text-red-500 italic">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="text-center">
                <button type="submit"
                    class="px-4 py-2 bg-blue-500 text-white w-full rounded hover:bg-blue-600">Submit</button>
            </div>
            <div class="text-center mt-1">
                <a href="/admin/counselings"
                    class="btn px-4 py-2 bg-gray-500 text-white w-full rounded hover:bg-gray-600">Back</a>
            </div>
        </form>
    </div>
@endsection
