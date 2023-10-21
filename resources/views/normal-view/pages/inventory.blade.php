@extends('normal-view.layout.base')

@section('content-header')
    <h2 class="text-2xl text-center font-semibold text-gray-800 mb-4">Student Inventory</h2>
@endsection

@section('content')


    <div class="mt-5">
        <form action="{{ route('counselings.create') }}" method="POST"
            class="mx-auto p-4 bg-white shadow-md rounded-lg">
            @csrf

            <p class="text-xl mb-2 text-center text-bold italic">
                COUNSELING FORM
            </p>
            <hr>
            <div class="row">
                <div class="col-md-8 mb-4 mt-2">
                    <label for="student_name" class="block text-gray-700 font-semibold mb-2">Name of Student</label>
                    <input type="text" name="student_name" id="student_name" class="w-full px-3 py-2 border rounded-lg"
                        placeholder="Enter name of student">

                    @error('student_name')
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
                <label for="action_taken" class="block text-gray-700 font-semibold mb-2">Action Taken/Recommendation(s)</label>
                <textarea name="action_taken" id="action_taken" class="w-full px-3 py-2 border rounded-lg" placeholder="Enter action_taken"></textarea>

                @error('action_taken')
                    <div class="text-sm text-red-500 italic">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="row">
                <div class="col-md-4 mb-4 mt-2">
                    <label for="followup_dates" class="block text-gray-700 font-semibold mb-2">Follow up Dates</label>
                    <input type="date" name="followup_dates" id="followup_dates" class="w-full px-3 py-2 border rounded-lg">

                    @error('followup_dates')
                        <div class="text-sm text-red-500 italic">
                            {{ $message }}
                        </div>
                    @enderror
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

            {{-- <div class="border border-dark p-3 mb-2">
                <h6>COUNSELING SLIP</h6>
                <div class="row">
                    <div class="col-md-8 mb-4 mt-2">
                        <label for="student_name" class="block text-gray-700 font-semibold mb-2">Name of Student</label>
                        <input type="text" name="student_name" id="student_name" class="w-full px-3 py-2 border rounded-lg"
                            placeholder="Enter name of student">

                        @error('student_name')
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

            </div> --}}
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
