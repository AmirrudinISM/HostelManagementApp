<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initital-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>Register</title>
</head>
<body>
    <div class="container mx-auto">
        <div class="col-12">
            <h1>Register</h1>
        </div>

        <div class="card col-md-6">
            <div class="card-body">
                <form class="row g-3" action="{{route('student.write')}}" method="post">
                    @csrf
                    @method('post')
                    <div>
                        <label for="inputEmail" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" id="inputEmail">
                    </div>

                    <div>
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="password">
                    </div>

                    <div>
                        <label for="reconfirmPassword" class="form-label">Reconfirm Password</label>
                        <input type="password" name="reconfirmPassword" class="form-control" id="reconfirmPassword">
                    </div>

                    <div>
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" id="name">
                    </div>

                    <div>
                        <label for="nric" class="form-label">NRIC</label>
                        <input type="text" name="nric" class="form-control" id="nric">
                    </div>

                    <div>
                        <label for="studentID" class="form-label">Student ID</label>
                        <input type="text" name="studentID" class="form-control" id="studentID">
                    </div>

                    <div>
                        <label for="program" class="form-label">Select Program:</label>
                        <div>
                            <select name="program" id="program" class="form-control">
                                <option>--- Please select ---</option>
                                <optgroup label="Diploma">
                                    <option value="DCNET">DCNET</option>
                                    <option value="DIT">DIT</option>
                                </optgroup>
                                <optgroup label="Bachelors">
                                    <option value="BNS">BNS</option>
                                    <option value="BSE">BSE</option>
                                    <option value="BGD">BGD</option>
                                    <option value="BCE">BCE</option>
                                    <option value="BIMD">BIMD</option>
                                </optgroup>
                                
                            </select>
                        </div>
                        
                    </div>

                    <div>
                        <label for="batch" class="form-label">Batch</label>
                        <div>
                            <input class="form-control" type="month" id="batch" name="batch" min="2018-03" value="" />
                        </div>
                    
                    </div>
                    <div>
                        <label for="phoneNumber" class="form-label">Phone Number:</label>
                        <input type="tel" name="phoneNumber" class="form-control" id="phoneNumber">
                    </div>
                    <div>
                        <label for="address" class="form-label">Address:</label>
                        <input type="text" name="address" class="form-control" id="address">
                    </div>

                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Sign in</button>
                    </div>
                </form>
            </div>
        </div>

    </div>


</body>
</html>
