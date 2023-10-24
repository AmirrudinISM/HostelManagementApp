<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>Student Dashboard</title>
</head>
<body>
    <div class="container-md">
        <header>

        </header>
        <h1>Student Dashboard</h1>
        <p>{{ Session::get('email') }}</p>
        <p>{{ Session::get('student_id') }}</p>
        <br />
        <a href="/apply_hostel">Apply hostel</a>
        <br />
        <a href="/logout">Logout</a>

        <table class="table">
            <thead>
                <tr>
                    <th>Check-in Date</th>
                    <th>Submitted Date</th>
                    <th>Status</th>
                    <th>Room</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($applications as $application)
                <tr>
                    <td>{{ $application->checkin_date }}</td>
                    <td>{{ $application->created_at }}</td>
                    <td>{{ $application->status }}</td>
                    <td>{{ $application->roomNumber }}</td>
                    <td><button class="btn btn-danger" ></button></td>
                    
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
</body>
</html>
