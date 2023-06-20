<!DOCTYPE html>
<html>
<head>
  <title>Patient Registration Form</title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="script.js"></script>
</head>
<body>
  <form id="registrationForm" method="POST">
    <label for="mobile">Mobile Number:</label>
    <input type="text" name="mobile" id="mobile" required>

    <label for="email">Email ID:</label>
    <input type="email" name="email" id="email" required>

    <input type="submit" value="Register">
  </form>

  <div id="message"></div>

  <script>$(document).ready(function() {
    $('#registrationForm').submit(function(event) {
      event.preventDefault();
  
      var mobile = $('#mobile').val();
      var email = $('#email').val();
  
      // Perform AJAX request to check if patient exists
      $.ajax({
        url: 'check_duplicate.php',
        type: 'POST',
        data: { mobile: mobile, email: email },
        success: function(response) {
          if (response === 'exists') {
            $('#message').html('Patient with the provided mobile number or email ID already exists.');
          } else {
            // Proceed with registration and store data into the database
            $.ajax({
              url: 'store_data.php',
              type: 'POST',
              data: { mobile: mobile, email: email },
              success: function() {
                $('#message').html('Patient registered successfully!');
                $('#registrationForm')[0].reset();
              }
            });
            

          }
        }
      });
    });
  });
  </script>
</body>
</html>
