<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>Manage Rooms</title>
</head>
<body>
    <div class="container-md">
        <h1>Manage Rooms</h1>


        <a href="{{route('admin.createRoom')}}">Create Rooms</a>
        <br />
        <table class="table">
            <thead>
                <tr>
                    <th>Room Number</th>
                    <th>Level</th>
                    <th>Capacity</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rooms as $room)
                <tr>
                    <td>{{ $room->roomNumber }}</td>
                    <td>{{ $room->level }}</td>
                    <td>{{ $room->capacity }}</td>
                    <td><a href="{{ route('admin.editRoom',['room'=> $room]) }}">Edit</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
</body>
</html>
