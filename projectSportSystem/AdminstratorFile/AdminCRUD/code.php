<?php
session_start();
require 'dbcon.php';

if (isset($_POST['delete_user'])) {
    $user_id = mysqli_real_escape_string($con, $_POST['delete_user']);

    $query = "DELETE FROM user_form WHERE id='$user_id' ";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $_SESSION['message'] = "Student Deleted Successfully";
        header("Location: manageUser.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Student Not Deleted";
        header("Location: managerUser.php");
        exit(0);
    }
}

if (isset($_POST['update_user'])) {
    $user_id = mysqli_real_escape_string($con, $_POST['user_id']);
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $gender = mysqli_real_escape_string($con, $_POST['gender']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $event = mysqli_real_escape_string($con, $_POST['event']);
    // $password = mysqli_real_escape_string($con, $_POST['password']);

    //here
    $query = "UPDATE user_form SET name='$name', email='$email', phone='$phone', gender='$gender', password='$password', event='$event' WHERE id='$user_id' ";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $_SESSION['message'] = "user Updated Successfully";
        header("Location: manageUser.php");
        exit(0);
    } else {
        $_SESSION['message'] = "user Not Updated";
        header("Location: manageUser.php");
        exit(0);
    }
}


if (isset($_POST['save_user'])) {
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $gender = mysqli_real_escape_string($con, $_POST['gender']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $event = mysqli_real_escape_string($con, $_POST['event']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    $query = "INSERT INTO user_form (name,email,phone,gender,password,event) VALUES ('$name','$email','$phone','$gender', '$password','$event')";

    $query_run = mysqli_query($con, $query);
    if ($query_run) {
        $_SESSION['message'] = "Student Created Successfully";
        header("Location: user-create.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Student Not Created";
        header("Location: user-create.php");
        exit(0);
    }
}
