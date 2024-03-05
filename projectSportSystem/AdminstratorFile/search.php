<?php

include 'dbcon.php';

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Search Data</title>
  <!-- bootstrap css  -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>


  <div class="table">
    <table class="table">



      <?php
      if (isset($_POST['submit'])) {
        $search = $_POST['search'];
        $sql = "SELECT * from user_form where id='$search' or name='$search'";
        $result = mysqli_query($con, $sql);

        if (mysqli_num_rows($result) > 0) {
          echo '
    <thead>
      <tr>
        <th>S1 No</th>
        <th>name</th>
        <th>email</th>
        <th>phone</th>
        <th>gender</th>
        <th>password</th>
        <th>Event</th>
      </tr>
    </thead> 
    <tbody>';

          // Process the records here
          while ($row = mysqli_fetch_assoc($result)) {
            echo '<tr>
        <td>' . $row['id'] . '</td>
        <td>' . $row['name'] . '</td>
        <td>' . $row['email'] . '</td>
        <td> ' . $row['phone'] . '</td>
        <td> ' . $row['gender'] . '</td>
        <td> ' . $row['password'] . '</td>
        <td> ' . $row['event'] . '</td>
      </tr>';
          }

          echo '</tbody>';
        } else {
          echo "<h2 class='text-danger'>User not found</h2>";
        }
      }
      ?>



    </table>
  </div>
  </div>
</body>

</html>