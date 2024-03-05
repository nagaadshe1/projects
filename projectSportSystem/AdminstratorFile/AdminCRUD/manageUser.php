<?php
session_start();
require 'dbcon.php';
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="ahmed.css">

    <title>Adminstrator</title>
</head>

<body>

    <div class="container">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 style="color:white;font-size:x-large">Manage Participants
                            <a href="user-create.php" class="btn btn-primary float-end">Add Participant</a>
                            <a href="../home.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>gender</th>
                                    <th>password</th>
                                    <th>event</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = "SELECT * FROM user_form";
                                $query_run = mysqli_query($con, $query);

                                if (mysqli_num_rows($query_run) > 0) {
                                    foreach ($query_run as $user_form) {
                                ?>
                                        <tr>
                                            <td><?= $user_form['id']; ?></td>
                                            <td><?= $user_form['name']; ?></td>
                                            <td><?= $user_form['email']; ?></td>
                                            <td><?= $user_form['phone']; ?></td>
                                            <td><?= $user_form['gender']; ?></td>
                                            <td><?= $user_form['password']; ?></td>
                                            <td><?= $user_form['event']; ?></td>
                                            <td>
                                                <a href="student-view.php?id=<?= $user_form['id']; ?>" class="btn btn-info btn-sm">View</a>
                                                <a href="student-edit.php?id=<?= $user_form['id']; ?>" class="btn btn-success btn-sm">Edit</a>
                                                <form action="code.php" method="POST" class="d-inline">
                                                    <button type="submit" name="delete_user" value="<?= $user_form['id']; ?>" class="btn btn-danger btn-sm">Delete</button>
                                                </form>
                                            </td>

                                        </tr>
                                <?php
                                    }
                                } else {
                                    echo "<h5> No Record Found </h5>";
                                }
                                ?>

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>