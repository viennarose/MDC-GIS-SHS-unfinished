@extends('admin.layout.base')

@section('content-header')
    <h2 class="text-2xl text-center font-semibold text-gray-800 mb-4">GUIDANCE OFFICE</h2>
@endsection

@section('content')


    <div class="mt-5">
        <p class="text-xl mb-2 text-center text-bold italic">
            EXIT QUESTIONNAIRE
        </p>
        <form action="{{ route('admin.transfers.update', ['id' => $transfer->id])}}" method="POST"
            class="mx-auto p-4 bg-white shadow-md rounded-lg">
            @csrf
            @method('PUT')

            @csrf
            <p><span class="font-bold">Name: </span> {{ Auth::user()->name }}</p>
            <p><span class="font-bold">Date filled: </span>{{ now()->format('l, F j, Y') }}</p>
            <p><span class="font-bold">ID Number: </span> {{ Auth::user()->id_number }}</p>
            <p><span class="font-bold">Sex: </span> {{ Auth::user()->gender }}</p>
            <div class="row">
                <div class="col-md-4 mb-4 mt-2">
                    <p><span class="font-bold">Last Attendance (Semester & AY): </span><input type="text" name="last_semester" id="last_semester" value="{{$transfer->last_semester}}"
                            class="w-full px-3 py-2 border rounded-lg">

                        @error('last_semester')
                        <div class="text-sm text-red-500 italic">
                            {{ $message }}
                        </div>
                    @enderror </p>
                </div>

                <div class="col-md-4 mb-4 mt-2">
                    <p><span class="font-bold">Course and year: </span><input type="text" name="course_year" id="course_year"
                            class="w-full px-3 py-2 border rounded-lg" value="{{$transfer->course_year}}">

                        @error('course_year')
                        <div class="text-sm text-red-500 italic">
                            {{ $message }}
                        </div>
                    @enderror
                    </p>
                </div>
            </div>

            <hr>

            <p><span class="font-bold">REASONS FOR LEAVING MATER DEI COLLEGE </span> (please check as many as applicable):
                <br>
            <div class="row">
                    <div class="col-md-6">
                        <label>
                            <input type="checkbox" name="reason[]" value="Financial Reason" {{ in_array('Financial Reason', explode(', ', $transfer->reason)) ? 'checked' : '' }}>

                            Financial Reason
                        </label><br>

                        <label>
                            <input type="checkbox" name="reason[]" value="School’s Tuition Fee" {{ in_array('School’s Tuition Fee', explode(', ', $transfer->reason)) ? 'checked' : '' }}>
                            School’s Tuition Fee
                        </label><br>

                        <label>
                            <input type="checkbox" name="reason[]" value="Not Satisfied with the School’s Curriculum" {{ in_array('Not Satisfied with the School’s Curriculum', explode(', ', $transfer->reason)) ? 'checked' : '' }}>
                            Not Satisfied with the School’s Curriculum
                        </label><br>
                        <label>
                            <input type="checkbox" name="reason[]"
                                value="Not Satisfied with the School’s Quality of Instruction " {{ in_array('Not Satisfied with the School’s Quality of Instruction', explode(', ', $transfer->reason)) ? 'checked' : '' }}>
                            Not Satisfied with the School’s Quality of Instruction
                        </label><br>
                        <label>
                            <input type="checkbox" name="reason[]" value="Not Satisfied with the School’s Facilities "{{ in_array('Not Satisfied with the School’s Facilities', explode(', ', $transfer->reason)) ? 'checked' : '' }}>
                            Not Satisfied with the School’s Facilities
                        </label><br>
                        <label>
                            <input type="checkbox" name="reason[]" value="Not Satisfied with the Services and Programs "{{ in_array('Not Satisfied with the Services and Programs', explode(', ', $transfer->reason)) ? 'checked' : '' }}>
                            Not Satisfied with the Services and Programs
                        </label><br>
                        <label>
                            <input type="checkbox" name="reason[]" value="Undecided Course " {{ in_array('Undecided Course', explode(', ', $transfer->reason)) ? 'checked' : '' }}>
                            Undecided Course
                        </label><br>
                    </div>
                    <div class="col-md-6">
                        <label>
                            <input type="checkbox" name="reason[]" value="Parent’s/Financer’s Decision " {{ in_array('Parent’s/Financer’s Decision', explode(', ', $transfer->reason)) ? 'checked' : '' }}>
                            Parent’s/Financer’s Decision
                        </label><br>
                        <label>
                            <input type="checkbox" name="reason[]" value="Failing Grades/Academic Deficiencies " {{ in_array('Failing Grades/Academic Deficiencies', explode(', ', $transfer->reason)) ? 'checked' : '' }}>
                            Failing Grades/Academic Deficiencies
                        </label><br>
                        <label>
                            <input type="checkbox" name="reason[]" value="Change of Career Choice/Goals " {{ in_array('Change of Career Choice/Goals', explode(', ', $transfer->reason)) ? 'checked' : '' }}>
                            Change of Career Choice/Goals
                        </label><br>
                        <label>
                            <input type="checkbox" name="reason[]" value="Health Reasons " {{ in_array('Health Reasons', explode(', ', $transfer->reason)) ? 'checked' : '' }}>
                            Health Reasons
                        </label><br>
                        <label>
                            <input type="checkbox" name="reason[]" value="Moving to Another City/Province " {{ in_array('Moving to Another City/Province', explode(', ', $transfer->reason)) ? 'checked' : '' }}>
                            Moving to Another City/Province
                        </label><br>
                        <label>
                            <input type="checkbox" name="reason[]" value="Moving Abroad " {{ in_array('Moving Abroad', explode(', ', $transfer->reason)) ? 'checked' : '' }}>
                            Moving Abroad
                        </label><br>
                    </div>

                    <label>
                        <input type="checkbox" name="reason[]" value="Other Reasons">
                        Other Reasons (please specify):
                        <input type="text" name="other_reason" placeholder="Specify other reason" value="{{$transfer->other_reason}}">
                    </label><br>

                    <p><span class="font-bold">RECOMMENDATIONS: </span><input type="text" name="recommendations" id="recommendations"
                            class="w-full px-3 py-2 border rounded-lg" value="{{$transfer->recommendations}}">

                        @error('recommendations')
                        <div class="text-sm text-red-500 italic">
                            {{ $message }}
                        </div>
                    @enderror
                    </p>
                    <p><span class="font-bold">NAME OF SCHOOL THAT YOU ARE TRANSFERRING TO:</span> <input type="text" name="transfer_school"
                            id="transfer_school" class="w-full px-3 py-2 border rounded-lg" value="{{$transfer->transfer_school}}">

                        @error('transfer_school')
                        <div class="text-sm text-red-500 italic">
                            {{ $message }}
                        </div>
                    @enderror
                    </p>
                    <p><span class="font-bold">
                        ADDRESS OF SCHOOL: </span><input type="text" name="transfer_school_address" id="transfer_school_address"
                            class="w-full px-3 py-2 border rounded-lg mb-4" value="{{$transfer->transfer_school_address}}">

                        @error('transfer_school_address')
                        <div class="text-sm text-red-500 italic">
                            {{ $message }}
                        </div>
                    @enderror
                    </p>

                <u class="text-center fs-3">{{ Auth::user()->name }}</u>
                <p class="text-center fs-6">       (Signature over Printed Name)</p>
            </div>
            <div class="text-center">
                <button type="submit"
                    class="px-4 py-2 bg-blue-500 text-white w-full rounded hover:bg-blue-600">Submit</button>
            </div>
            <div class="text-center mt-1">
                <a href="/admin/transfers"
                    class="btn px-4 py-2 bg-gray-500 text-white w-full rounded hover:bg-gray-600">Back</a>
            </div>
        </form>
    </div>
@endsection
