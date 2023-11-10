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
        <p class="title">COUNSELING FORM</p>

        <div class="row">
            <div class="col">
                <div class="label">Name of Student: <span class="text-underline"> {{ $counseling->student_name }}</span></div>

            </div>
            <div class="col">
                <div class="label">Date: <span class="text-underline">{{ $counseling->date }} </span></div>

            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="label">Course and Year: <span class="text-underline"> {{ $counseling->course_year }}</span></div>

            </div>
            <div class="col">
                <div class="label">Department: <span class="text-underline">{{ $counseling->department }} </span></div>

            </div>
            <div class="col">
                <div class="label">Contact number: <span class="text-underline"{{ $counseling->contact_num }}> </span></div>

            </div>
        </div>

        <div>
            <div class="label">Nature of Visit</div>
            <label>
                <input type="checkbox" name="visit_nature" value="Referral"
                    {{ $counseling->visit_nature === 'Referral' ? 'checked' : '' }}>
                Referral
            </label>
            <label>
                <input type="checkbox" name="visit_nature" value="Walk-in"
                    {{ $counseling->visit_nature === 'Walk-in' ? 'checked' : '' }}>
                Walk-in
            </label>
        </div>

        <div class="label">Problem(s)/Concern(s)</div>
        <div class="content">{{ $counseling->concern }}</div>

        <div class="label">Action Taken/Recommendation(s)</div>
        <div class="content">{{ $counseling->action_taken }}</div>

        <div class="row">
            <div class="col">
                <div class="label">Follow up Dates</div>
                <div class="content">{{ $counseling->followup_dates }}</div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                @if ($counseling->counselee)
                    <div class="text-center"><u>{{ $counseling->counselee }}</u></div>
                @else
                    <u>&nbsp;&nbsp;</u>
                @endif

                <div class="label text-center">Counselee</div>
            </div>
            <div class="col">
                @if ($counseling->counselor)
                    <div class="text-center"><u>{{ $counseling->counselor }}</u></div>
                @else
                    <u>&nbsp;&nbsp;</u>
                @endif

                <div class="label text-center">Counselor</div>
            </div>
        </div>
        {{-- <div style="page-break-before: always;"></div> --}}
        <div class="border-dark">
            <p class="title">COUNSELING SLIP</p>
            <div class="row">
                <div class="col">
                    <div class="label">Name of Student: <span
                            class="text-underline">{{ $counseling->student_name }}</span></div>
                </div>
                <div class="col">
                    <div class="label">Date: <span class="text-underline">{{ $counseling->date }}</span></div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="label">Course and Year: <span
                            class="text-underline">{{ $counseling->course_year }}</span></div>
                </div>
                <div class="col">
                    <div class="label">Department: <span
                            class="text-underline">{{ $counseling->department }}</span></div>
                </div>
                <div class="col">
                    <div class="label">Contact number: <span
                            class="text-underline">{{ $counseling->contact_num }}</span></div>
                </div>
            </div>
            <div class="col">
                <div class="label">Session Ended: <span
                        class="text-underline">{{ $counseling->session_ended }}</span></div>
            </div>
        </div>
    </div>
</body>

</html>
