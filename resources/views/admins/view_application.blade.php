<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initital-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>Hostel Application</title>
</head>
<body class="container" style="background-color:#8888FF;">
    <div class="d-flex justify-content-center my-5">
        <div class="card col-md-6">
            <div class="card-body">
                <h5>View Application</h5>
                <label class="text-muted">Name:</label>
                <p>{{ $queryResult[0]->name }}</p>
                <label class="text-muted">Student ID:</label>
                <p>{{ $queryResult[0]->studentID }}</p>
                <label class="text-muted">Batch:</label>
                <p>{{ $queryResult[0]->batch }}</p>
                <label class="text-muted">Program:</label>
                <p>{{ $queryResult[0]->program }}</p>

                <h5>Application Details</h5>
                <label class="text-muted">Intake:</label>
                <p>{{ $queryResult[0]->intake }}</p>
                <label class="text-muted">Checkin Date:</label>
                <p>{{ $queryResult[0]->checkin_date }}</p>
                <hr />
                
                <form action="{{ route('admin.updateApplication',['application' => $queryResult[0]->id]) }}" method="post">
                    @method('put')
                    @csrf
                    <div>
                        <label class="text-muted">Select Room:</label>
                        <select class="form-control" name="roomNumber">
                            <option>--Select Room--</option>
                            @foreach( $allRooms as $room )
                                <option value="{{ $room->roomNumber }}">{{ $room->roomNumber }}</option>
                            @endforeach
                        </select>
                    </div>
                    <br />
                    <input class="btn btn-primary" type="submit" name="approve" value="approve" />
                    <input class="btn btn-danger" type="submit" name="reject" value="reject" />
                </form>
            </div>
        </div>
    </div>
</body>
</html>
