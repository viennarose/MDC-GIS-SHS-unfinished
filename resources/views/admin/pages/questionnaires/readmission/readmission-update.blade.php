@extends('admin.layout.base')

@section('content-header')
    <h2 class="text-2xl text-center font-semibold text-gray-800 mb-4">GUIDANCE OFFICE</h2>
@endsection

@section('content')


    <div class="mt-5">
        <form action="{{ route('admin.readmissions.update', ['id' => $readmission->id])}}" method="POST"
            class="mx-auto p-4 bg-white shadow-md rounded-lg">
            @csrf
            @method('PUT')

            <p class="text-xl mb-2 text-center text-bold italic">
                RE-ADMISSION FORM
            </p>

            <p>To the teacher:</p><br>
            <p>This is to inform that Mr./Ms. <input type="text" name="student_name" id="student_name" value="{{$readmission->student_name}}"
                placeholder="Enter name of student"> enrolled in <input type="text" name="course_year" id="course_year" value="{{$readmission->course_year}}"
                placeholder="Enter course and year"> has incurred the following absences:

            @error('course_year')
                <div class="text-sm text-red-500 italic">
                    {{ $message }}
                </div>
            @enderror

            @error('student_name')
                <div class="text-sm text-red-500 italic">
                    {{ $message }}
                </div>
            @enderror </p>
            <hr>
            <div class="row">
                <div class="col-md-4 mb-4 mt-2">
                    <label for="date1" class="block text-gray-700 font-semibold mb-2">Date</label>
                    <input type="text" name="date1" id="date" class="w-full px-3 py-2 border rounded-lg"
                        placeholder="Enter Date" value="{{$readmission->date1}}">

                    @error('date1')
                        <div class="text-sm text-red-500 italic">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-md-4 mb-4 mt-2">
                    <label for="reason1" class="block text-gray-700 font-semibold mb-2">Reason</label>
                    <input type="text" name="reason1" id="reason1" class="w-full px-3 py-2 border rounded-lg"
                        placeholder="Enter reason" value="{{$readmission->reason1}}">

                    @error('reason1')
                        <div class="text-sm text-red-500 italic">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-md-4 mb-4 mt-2">
                    <label for="subject_affected1" class="block text-gray-700 font-semibold mb-2">Contact number</label>
                    <input type="text" name="subject_affected1" id="subject_affected1" class="w-full px-3 py-2 border rounded-lg"
                        placeholder="Enter subject" value="{{$readmission->subject_affected1}}">

                    @error('subject_affected1')
                        <div class="text-sm text-red-500 italic">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-4 mt-2">
                    <input type="text" name="date2" id="date" class="w-full px-3 py-2 border rounded-lg"
                        placeholder="Enter Date" value="{{$readmission->date2}}">

                    @error('date2')
                        <div class="text-sm text-red-500 italic">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-md-4 mb-4 mt-2">

                    <input type="text" name="reason2" id="reason2" class="w-full px-3 py-2 border rounded-lg"
                        placeholder="Enter Reason" value="{{$readmission->reason2}}">

                    @error('reason2')
                        <div class="text-sm text-red-500 italic">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-md-4 mb-4 mt-2">

                    <input type="text" name="subject_affected2" id="subject_affected2" class="w-full px-3 py-2 border rounded-lg"
                        placeholder="Enter subject" value="{{$readmission->subject_affected2}}">

                    @error('subject_affected2')
                        <div class="text-sm text-red-500 italic">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-4 mt-2">
                    <input type="text" name="date3" id="date" class="w-full px-3 py-2 border rounded-lg"
                        placeholder="Enter Date" value="{{$readmission->date3}}">

                    @error('date3')
                        <div class="text-sm text-red-500 italic">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-md-4 mb-4 mt-2">

                    <input type="text" name="reason3" id="reason3" class="w-full px-3 py-2 border rounded-lg"
                        placeholder="Enter Reason" value="{{$readmission->reason3}}">

                    @error('reason3')
                        <div class="text-sm text-red-500 italic">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-md-4 mb-4 mt-2">

                    <input type="text" name="subject_affected3" id="subject_affected3" class="w-full px-3 py-2 border rounded-lg"
                        placeholder="Enter subject" value="{{$readmission->subject_affected3}}">

                    @error('subject_affected3')
                        <div class="text-sm text-red-500 italic">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            <p class="text-center">Because of the reasons presented, the student hereby granted:
            </p>
                <div class="col-md-12 mb-4 mt-2 d-flex justify-content-center m-2">
                    <input type="checkbox" id="granted" name="granted" value="1" {{ $readmission->granted === 1 ? 'checked' : '' }}>RE-ADMISSION &nbsp; &nbsp; &nbsp;
                    <input type="checkbox" id="granted" name="granted" value="0" {{ $readmission->granted === 0 ? 'checked' : '' }}>NON-RE-ADMISSION TO CLASSES

                </div>
            <div class="row">
                <div class="col-md-6 mb-4 mt-2">
                    <label for="guidance_sig" class="block text-gray-700 font-semibold mb-2">Guidance Counselor</label>
                    <input type="text" name="guidance_sig" id="guidance_sig" class="w-full px-3 py-2 border rounded-lg" value="{{$readmission->guidance_sig}}"
                        placeholder="Enter Guidance Counselor">

                    @error('guidance_sig')
                        <div class="text-sm text-red-500 italic">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-md-6 mb-4 mt-2">
                    <label for="osad_sig" class="block text-gray-700 font-semibold mb-2">OSAD Coordinator</label>
                    <input type="text" name="osad_sig" id="osad_sig" class="w-full px-3 py-2 border rounded-lg" placeholder="Enter OSAD Coordinator" value="{{$readmission->osad_sig}}">

                    @error('osad_sig')
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
                <a href="/admin/readmission"
                    class="btn px-4 py-2 bg-gray-500 text-white w-full rounded hover:bg-gray-600">Back</a>
            </div>
        </form>
    </div>
@endsection
