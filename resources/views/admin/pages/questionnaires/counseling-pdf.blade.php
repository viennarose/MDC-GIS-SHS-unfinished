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
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
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
        }

        .border-dark {
            border: 1px solid #000;
            padding: 10px;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <p class="title">COUNSELING FORM</p>
        <hr>
        <div class="row">
            <div class="col">
                <div class="label">Name of Student</div>
                <div class="content">{{ $counseling->student_name }}</div>
            </div>
            <div class="col">
                <div class="label">Date</div>
                <div class="content">{{ $counseling->date }}</div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="label">Course and Year</div>
                <div class="content">{{ $counseling->course_year }}</div>
            </div>
            <div class="col">
                <div class="label">Department</div>
                <div class="content">{{ $counseling->department }}</div>
            </div>
            <div class="col">
                <div class="label">Contact number</div>
                <div class="content">{{ $counseling->contact_num }}</div>
            </div>
        </div>
        <div class="label">Nature of Visit</div>
        <div class="content">{{ $counseling->visit_nature }}</div>

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
                <div class="label">Counselee</div>
                <div class="content">{{ $counseling->counselee }}</div>
            </div>
            <div class="col">
                <div class="label">Counselor</div>
                <div class="content">{{ $counseling->counselor }}</div>
            </div>
        </div>
        <div style="page-break-before: always;"></div>
        <div class="border-dark">
            <p class="title">COUNSELING SLIP</p>
            <div class="row">
                <div class="col">
                    <div class="label">Name of Student</div>
                    <div class="content">{{ $counseling->student_name }}</div>
                </div>
                <div class="col">
                    <div class="label">Date</div>
                    <div class="content">{{ $counseling->date }}</div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="label">Course and Year</div>
                    <div class="content">{{ $counseling->course_year }}</div>
                </div>
                <div class="col">
                    <div class="label">Department</div>
                    <div class="content">{{ $counseling->department }}</div>
                </div>
                <div class="col">
                    <div class="label">Contact number</div>
                    <div class="content">{{ $counseling->contact_num }}</div>
                </div>
            </div>
            <div class="col">
                <div class="label">Session Ended</div>
                <div class="content">{{ $counseling->session_ended }}</div>
            </div>
        </div>
    </div>
</body>
</html>
