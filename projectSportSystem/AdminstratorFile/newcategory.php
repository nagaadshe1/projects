<?php

include 'dbcon.php';

?>

<!DOCTYPE html>
<html>

<head>
  <title>Add New Category</title>
  <style>
    .container {
      display: flex;
      flex-direction: column;
      /* align-items: center; */
      margin-top: 50px;
      background-color: #f7f7f7;
      padding: 20px;
      /* text-align: center; */
    }

    .form-control {
      text-align: center;
      margin: 10px 0;
      display: flex;
      align-items: center;
      justify-content: center;
      width: 400px;
    }

    .form-control label {
      margin-right: 0px;
      width: 200px;
      text-align: right;
    }

    .form-control input {
      flex: 1;
      padding: 5px;
      border: none;
      border-bottom: 1px solid #ccc;
    }

    .button-container {
      margin-top: 20px;
      display:flexbox;
      justify-content:space-around;
      align-items: center;
      /* Center vertically */
    }

    .button-container input[type="submit"].add-btn {
      background-color: #3498db;
      color: #fff;
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      margin-right: 10px;
    }

    .button-container button.cancel-btn {
      background-color: #e71212;
      color: #fff;
      padding: 10px 5px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      margin-left: 0px;
      /* Add margin to separate from input field */
    }

    /* Change styles for the "Add New Category" button */
    .container button {
      background-color: #3498db;
      color: #fff;
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      transition: all 0.2s ease;
    }

    .container button:hover {
      transform: translateY(-2px);
      box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.2);
    }

    /* Change background color for the entire page */
    body {
      background-color: #f7f7f7;
    }
  </style>
  <script>
    function showForm() {
      document.getElementById("add-category-form").style.display = "block";
    }

    function hideForm() {
      document.getElementById("add-category-form").style.display = "none";
    }
  </script>
</head>

<body>
  <div class="container">
    <button onclick="showForm()">Add New Category</button>
  </div>
  <div id="add-category-form" style="display:none;">
    <form method="POST" action="categories.php">
       <div class="description">
        <p>Please enter a name for the new category:</p>
      </div>
      <div class="form-control">
        <label>Name:</label>
        <input type="text" name="name">
      </div>
      <div class="form-control">
        <label>Description:</label>
        <textarea name="description"></textarea>
      </div>

      <div class="button-container">
        <button type="button" class="cancel-btn" onclick="hideForm()">Cancel</button>
        <input type="submit" class="add-btn"></input>
      </div>
    </form>
  </div>
</body>

</html>