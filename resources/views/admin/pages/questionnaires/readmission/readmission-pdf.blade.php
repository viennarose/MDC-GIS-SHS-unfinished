<!DOCTYPE html>
<html>

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
    <div class="container">
        <img src="{{ public_path('images/header.png') }}" alt="Header Photo" class="header-img"
            style="max-width: 50%; height: auto; margin: 20px auto; display: block;">
        <hr>
        <p class="title">READMISSION FORM</p>


        <p>To the teacher:</p><br>
        <p>This is to inform that Mr./Ms. {{ $readmission->student_name }}  &nbsp; enrolled in {{ $readmission->course_year }} has incurred the following absences:

        <hr>
        <div class="row">
            <div class="col-md-4 mb-4 mt-2">
                <label for="date1" class="block text-gray-700 font-semibold mb-2">Date</label>
                {{ $readmission->date1 }}
            </div>
            <div class="col-md-4 mb-4 mt-2">
                <label for="reason1" class="block text-gray-700 font-semibold mb-2">Reason</label>
                {{ $readmission->reason1 }}
            </div>
            <div class="col-md-4 mb-4 mt-2">
                <label for="subject_affected1" class="block text-gray-700 font-semibold mb-2">Contact number</label>
                {{ $readmission->subject_affected1 }}
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 mb-4 mt-2">
                {{ $readmission->date2 }}
            </div>
            <div class="col-md-4 mb-4 mt-2">
                {{ $readmission->reason2 }}
            </div>
            <div class="col-md-4 mb-4 mt-2">
                {{ $readmission->subject_affected1 }}
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 mb-4 mt-2">
                {{ $readmission->date2 }}
            </div>
            <div class="col-md-4 mb-4 mt-2">
                {{ $readmission->reason2 }}
            </div>
            <div class="col-md-4 mb-4 mt-2">
                {{ $readmission->subject_affected1 }}
            </div>
        </div>

        <p class="text-center">Because of the reasons presented, the student hereby granted:
        </p>
            <div class="col-md-12 mb-4 mt-2 d-flex justify-content-center m-2">
                <label>
                    <input type="checkbox" name="granted" value="1"
                        {{ $readmission->granted === 1 ? 'checked' : '' }}>
                        RE-ADMISSION
                </label>
                <label>
                    <input type="checkbox" name="granted" value="0"
                        {{ $readmission->granted === 0 ? 'checked' : '' }}>
                        NON-RE-ADMISSION TO CLASSES
                </label>
            </div>
    </div>
        <div class="row">
            <div class="col">
                @if ($readmission->guidance_sig)
                    <div class="text-center"><u>{{ $readmission->guidance_sig }}</u></div>
                @else
                    <u>&nbsp;&nbsp;</u>
                @endif

                <div class="label text-center">Guidance Counselor</div>
            </div>
            <div class="col">
                @if ($readmission->osad_sig)
                    <div class="text-center"><u>{{ $readmission->osad_sig }}</u></div>
                @else
                    <u>&nbsp;&nbsp;</u>
                @endif

                <div class="label text-center">OSAD Coordinator</div>
            </div>
        </div>
    </div>
</body>

</html>
