<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>Admin Dashboard</title>
</head>
<body>
    <div class="container col-md-8">
        <h1>Admin Dashboard</h1>
        <p>{{ Session::get('email') }}</p>
        <br />
        <a href="/logout">Logout</a>
        <br />
        <a href="/admin/manage_rooms">Manage Rooms</a>
        <br />
        <a href="/admin/manage_applications">Manage Applications</a>
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Student ID</th>
                    <th>Program</th>
                    <th>Room</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($applications as $application)
                <tr>
                    <td>{{ $application->name }}</td>
                    <td>{{ $application->studentID }}</td>
                    <td>{{ $application->program }}</td>
                    <td>{{ $application->roomNumber }}</td>
                    <td><a href="{{ route('admin.viewApplication', ['application' => $application->id]) }}">View</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
        
    </div>
    
</body>
</html>
