<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initital-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>Hostel Application</title>
</head>
<body style="background-color:#8888FF;">
    <div class="d-flex justify-content-center my-5">
        <div class="card col-md-6">
            <div class="card-body">
                <form class="row g-3" action="" method="post">
                    @csrf
                    @method('post')
                    <h4 class="text-muted">Hostel Application</h4>
                    <div>
                        <label for="checkinDate" class="form-label">Check-in Date:</label>
                        <div>
                            <input class="form-control" type="date" id="checkinDate" name="checkinDate"/>
                        </div>
                        <span class="text-danger">@error('checkinDate'){{$message}} @enderror</span>
                    </div><div>
                        <label for="intake" class="form-label">Intake</label>
                        <div>
                            <input class="form-control" type="month" id="intake" name="intake" min="2020-01" value="" />
                        </div>
                        <span class="text-danger">@error('intake'){{$message}} @enderror</span>
                    </div>




                    <div class="col-12">
                        <button type="submit" class="btn btn-primary float-end">Apply</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
