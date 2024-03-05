<?php
session_start();
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Student Create</title>
</head>

<body>

    <div class="container mt-5">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4> Add Participant
                            <a href="../home.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="code.php" method="POST" id="myForm" onsubmit="submitForm(event)">

                            <div class="mb-3">
                                <label> Name</label>
                                <input type="text" name="name" required class="form-control" oninput="validateInput(this)">
                                <span id="error-message"></span>
                            </div>
                            <div class="mb-3">
                                <label> Email</label>
                                <input type="email" name="email" required class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Phone</label>
                                <input type="phone" name="phone" required class="form-control">
                            </div>
                            <div class="mb-3" style="display: inline-block; margin-right: 100px;">
                                <div for="male" style="display: inline-block; margin-right: -1px;">Gender:</div>
                                <input type="radio" id="male" name="gender" value="male">
                                <label for="male">Male</label>


                                <input type="radio" id="female" name="gender" value="female">
                                <label for="female">Female</label>
                            </div>
                            <div class="mb-3">
                                <label>password</label>
                                <input type="password" name="password" required class="form-control" oninput="validateInput(this)">
                                <span id="error-message"></span>
                            </div>

                            <div class="mb-3">
                                <label>Events</label>
                                <input type="text" name="event" required class="form-control" oninput="validateInput(this)">
                                <span id="error-message"></span>
                            </div>

                            <div class="mb-3">
                                <button type="submit" name="save_user" class="btn btn-primary">Save Student</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- custom js file  -->
    <script>
        function validateInput(inputField) {
            // Check if the input contains any non-text characters
            if (/[^a-zA-Z]/.test(inputField.value)) {
                // If it does, display an error message
                document.getElementById("error-message").innerHTML = "Please enter text only.";
                inputField.setCustomValidity("Please enter text only.");
            } else {
                // If it doesn't, clear the error message
                document.getElementById("error-message").innerHTML = "";
                inputField.setCustomValidity("");
            }

            // Check if all form fields are valid
            var formIsValid = document.getElementById("myForm").checkValidity();
            if (formIsValid) {
                // If they are, enable the submit button
                document.getElementById("submit-button").disabled = false;
            } else {
                // If not, disable the submit button
                document.getElementById("submit-button").disabled = true;
            }
        }
    </script>


    <?php

    $con = mysqli_connect("localhost", "root", "", "test");

    if (!$con) {
        die('Connection Failed' . mysqli_connect_error());
    }

    ?>
</body>

</html>