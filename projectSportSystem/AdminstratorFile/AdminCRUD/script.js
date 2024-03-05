function loadCategory() {
  // Create an XMLHttpRequest object
  var xhr = new XMLHttpRequest();
  
  // Set the URL of the page to load
  xhr.open("GET", "subprogram.php", true);
  
  // Define the function to handle the response
  xhr.onreadystatechange = function() {
    if (xhr.readyState == 4 && xhr.status == 200) {
      // Get the response text
      var responseText = xhr.responseText;
      
      // Display the response inside the user-info div
      document.getElementById("user-category").innerHTML = responseText;
    }
  };
  
  // Send the request
  xhr.send();
}