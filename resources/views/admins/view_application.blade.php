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
                <h5>View Application</h5><a class="float-end" href="{{ route('admin.manageApplications')}}">Back</a>
                <label class="text-muted">Name:</label>
                <p>{{ $student->name }}</p>
                <label class="text-muted">Student ID:</label>
                <p>{{ $student->studentID }}</p>
                <label class="text-muted">Batch:</label>
                <p>{{ $student->batch }}</p>
                <label class="text-muted">Program:</label>
                <p>{{ $student->program }}</p>

                <h5>Application Details</h5>
                <label class="text-muted">Intake:</label>
                <p>{{ $application->intake }}</p>
                <label class="text-muted">Checkin Date:</label>
                <p>{{ $application->checkin_date }}</p>
                <hr />
                <p>{{ $application->status }}</p>
                <hr />

             
                @if($application->status == "APPROVED")
                    <form method="post" action="{{ route('admin.checkoutStudent',['application' => $application])}}">
                    @method('put')
                    @csrf
                        <div>
                            <button class="mx-1 float-end btn btn-danger" type="submit" name="checkout" value="checkout" >Checkout</button>
                        </div>
                    </form>
                @endif
                

                <form id="myForm" action="{{ route('admin.updateApplication',['application' => $application->id]) }}" method="post">
                    @method('put')
                    @csrf
                    <div>
                        <label class="text-muted">Select Room:</label>
                        <select class="form-control" name="roomNumber" id="roomNumber">
                            <option value="">--Select Room--</option>
                            @foreach( $rooms as $room )
                                <option value="{{ $room->roomNumber }}">{{ $room->roomNumber }}</option>
                            @endforeach
                        </select>
                    </div>
                    <br />
                    <div>
                        
                        <input type="hidden" name="applicationID" value="{{ $application->id }}" />
                        <button id="reject" class="mx-1 float-end btn btn-danger" type="submit" name="reject" value="reject">Reject</button>
                        <button id="approve" class="mx-1 float-end btn" type="submit" name="approve" value="approve" disabled>Approve</button>
                    </div>
                    
                    
                </form>
            </div>
        </div>
    </div>

    <script>
        // Get references to the dropdown and button elements
        var dropdown = document.getElementById("roomNumber");
        var button = document.getElementById("approve");

        // Add an event listener to the dropdown to check when an option is selected
        dropdown.addEventListener("change", function () {
            // Check if a valid option is selected (value is not an empty string)
            if (dropdown.value !== "") {
                button.removeAttribute("disabled"); // Enable the button
                button.classList.add("btn-primary");
            } else {
                button.setAttribute("disabled", "true"); // Disable the button
                button.classList.remove("btn-primary");
            }
        });
        // Assuming you have a boolean variable to determine whether to hide the form
        //var hideForm = ; // Change this to your desired boolean value

        // Get a reference to the form element
        var form = document.getElementById("myForm");

        // Check the boolean value and hide or show the form accordingly

        if ("{{ $application->status }}" == "APPROVED" || "{{ $application->status }}" == "REJECTED" || "{{ $application->status }}" == "CHECKED OUT") {
            form.style.display = "none"; // Hide the form
        } else {
            form.style.display = "block"; // Show the form
        }

    </script>
</body>
</html>
