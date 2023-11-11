<!DOCTYPE html>
<html lang="en">

<head>
    <title>GUIDANCE OFFICE</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 900px;
            margin: 0 auto;
            padding: 10px;
            background-color: #fff;
        }

        .title {
            font-size: 24px;
            font-weight: bold;
            text-align: center;
            margin-bottom: 20px;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
            margin-bottom: 10px;
        }

        .col {
            flex: 1;
            margin-right: 10px;
        }

        .label {
            font-weight: bold;
            margin-bottom: 5px;
        }

        .content {
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 10px;
        }

        .border-dark {
            border: 1px solid #000;
            padding: 10px;
            margin-top: 10px;
        }

        .text-underline {
            text-decoration: underline;
            font-weight: 100;
        }

        label {
            display: inline-block;
            margin-right: 15px;
        }

        input[type="checkbox"] {
            margin-right: 5px;
        }

        .text-center {
            text-align: center;
        }

        .header-img {
            max-width: 50%;
            height: auto;
            margin: 10px auto;
            display: block;
        }
    </style>
</head>

<body>
    <div class="mt-5">
        <p class="text-xl mb-2 text-center text-bold italic">
            EXIT QUESTIONNAIRE
        </p>
        <div class="mx-auto p-4 bg-white shadow-md rounded-lg">
            <p><span class="font-bold">Name: </span> {{ Auth::user()->name }}</p>
            <p><span class="font-bold">Date filled: </span>{{ now()->format('l, F j, Y') }}</p>
            <p><span class="font-bold">ID Number: </span> {{ Auth::user()->id_number }}</p>
            <p><span class="font-bold">Sex: </span> {{ Auth::user()->gender }}</p>
            <div class="row">
                <div class="col">
                    <p><span class="font-bold">Last Attendance (Semester & AY): </span><input type="text" name="last_semester" id="last_semester" value="{{$transfer->last_semester}}" class="w-full px-3 py-2 border rounded-lg"></p>
                </div>
                <div class="col">
                    <p><span class="font-bold">Course and year: </span><input type="text" name="course_year" id="course_year" class="w-full px-3 py-2 border rounded-lg" value="{{$transfer->course_year}}"></p>
                </div>
            </div>

            <hr>

            <p><span class="font-bold">REASONS FOR LEAVING MATER DEI COLLEGE </span> (please check as many as applicable):<br>
            <div class="row">
                <div class="col">
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
                <div class="col">
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


            </div>

            <label>
                <input type="checkbox" name="reason[]" value="Other Reasons">
                Other Reasons (please specify):
                <input type="text" name="other_reason" placeholder="Specify other reason" value="{{$transfer->other_reason}}">
            </label><br>

            <p><span class="font-bold">RECOMMENDATIONS: </span><input type="text" name="recommendations" id="recommendations" class="w-full px-3 py-2 border rounded-lg" value="{{$transfer->recommendations}}"></p>
            <p><span class="font-bold">NAME OF SCHOOL THAT YOU ARE TRANSFERRING TO:</span> <input type="text" name="transfer_school" id="transfer_school" class="w-full px-3 py-2 border rounded-lg" value="{{$transfer->transfer_school}}"></p>
            <p><span class="font-bold">ADDRESS OF SCHOOL: </span><input type="text" name="transfer_school_address" id="transfer_school_address" class="w-full px-3 py-2 border rounded-lg mb-4" value="{{$transfer->transfer_school_address}}"></p>

            <u style="text-align: center">{{ Auth::user()->name }}</u>
            <p style="text-align: center">       (Signature over Printed Name)</p>
        </div>
    </div>
</body>

</html>
