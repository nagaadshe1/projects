<?php
session_start();
include 'dbcon.php';
// Check if user is not logged in, redirect to login page
?>

<!DOCTYPE html>
<html>

<head>
  <title>Admin Panel - View Categories</title>
  <style>
    header {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 1rem;
    }

    .header-left {
      margin: 0;
      font-size: 1rem;
    }

    .header-right {
      margin: 0;
    }


    /* Style the logout button */
    .logout-btn {
      background-color: #FF4500;
      color: #FFFFFF;
      border: none;
      border-radius: 4px;
      font-size: 16px;
      padding: 10px 20px;
      cursor: pointer;
      transition: all 0.3s ease;
    }

    .logout-btn:hover {
      background-color: #2E8B57;
    }


    .btn i {
      margin-right: 0.5rem;
    }

    /* Define the color for "Sport" and "Arena" */
    .sport {
      color: #000;
      /* orange-red */
    }

    .arena {
      color: #3c90eb;
      /* black */
    }

    /* Define the color for the page name */
    h1 {
      color: #000;
      /* sea green */
    }
  </style>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
</head>

<body>
  <header class="header">
    <div class="header-left">
      <h1><span class="sport">Sport</span><span class="arena">Arena</span> Management</h1>
    </div>
    <div class="header-right">
      <span>Welcome, <?php echo isset($_SESSION['username']) ? $_SESSION['username'] : ''; ?> admin!</span>
     <a href="home.php"> <button class="logout-btn">Back <i class="fas fa-sign-out-alt"></i></button></a>
    </div>
  </header>



  <?php
  // Connect to the database
  $conn = mysqli_connect('localhost', 'root', '', 'test');

  // Check if the form is submitted
  // Check if the form is submitted
  if (isset($_POST['name'])) {
    $name = $_POST['name'];
    $description = $_POST['description'];

    // Insert the new category to the database
    $sql = "INSERT INTO events (name, description) VALUES ('$name', '$description')";
    if (mysqli_query($conn, $sql)) {
      $message = "New category added successfully";
    } else {
      $message = "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Display the message if there is one
    if (isset($message)) {
      echo $message;
    }
  }
  // Query to get all categories
  $query = "SELECT * FROM events";
  $result = mysqli_query($conn, $query);

  // displaying all categories in a table
  ?>
  <h2>All Categories</h2>
  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Description</th>
        <th>Created At</th>
      </tr>
    </thead>
    <tbody>
      <?php while ($row = mysqli_fetch_assoc($result)) : ?>
        <tr>
          <td><?php echo $row["id"]; ?></td>
          <td><?php echo $row["name"]; ?></td>
          <td><?php echo $row["description"]; ?></td>
          <td><?php echo $row["created_at"]; ?></td>
        </tr>
      <?php endwhile; ?>
    </tbody>
  </table>

  <style>
    table {
      border-collapse: collapse;
      width: 100%;
    }

    th,
    td {
      text-align: left;
      padding: 5px;
    }

    th {
      background-color: #4CAF50;
      color: white;
    }