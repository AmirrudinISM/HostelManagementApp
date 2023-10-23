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
                <form class="row g-3" action="{{ route('admin.saveRoom') }}" method="post">
                    @csrf
                    @method('post')
                    <h4 class="text-muted">Create Room</h4>
                    <div>
                        <label for="roomNumber" class="form-label">Room Number:</label>
                        <div>
                            <input class="form-control" type="text" id="roomNumber" name="roomNumber" />
                        </div>
                        <span class="text-danger">@error('roomNumber'){{$message}} @enderror</span>
                    </div>
                    <div>
                        <label for="capacity" class="form-label">Capacity</label>
                        <div>
                            <input class="form-control" type="number" id="capacity" name="capacity" min="1" value="o" />
                        </div>
                        <span class="text-danger">@error('capacity'){{$message}} @enderror</span>
                    </div>
                    <div>
                        <label for="level" class="form-label">Level</label>
                        <div>
                            <input class="form-control" type="text" id="level" name="level"/>
                        </div>
                        <span class="text-danger">@error('level'){{$message}} @enderror</span>
                    </div>
                    <div class="col-12">
                        <a href="{{route('admin.dashboard')}}" class="float-none">Cancel</a>
                        <button type="submit" class="btn btn-primary float-end">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
