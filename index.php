<!DOCTYPE html>
<html>
<head>
  <title>Patient Registration Form</title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/light.css">
  <!-- <script src="script.js"></script> -->
</head>
<body>
  <form id="registrationForm" method="POST">
    <label for="mobile">Mobile Number:</label>
    <input type="text" name="mobile" id="mobile" required>

    <label for="email">Email ID:</label>
    <input type="email" name="email" id="email" required>
    <br>
    <input type="submit" value="Register">
  </form>
  <br>
  <div id="message"></div>

  <h2>Registered Patients</h2>
  <table id="patientsTable">
    <thead>
      <tr>
        <th>Mobile</th>
        <th>Email</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody></tbody>
  </table>

  <script>
    $(document).ready(function() {
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
              $('#message').css('color', 'red');
            } else {
              // Proceed with registration and store data into the database
              $.ajax({
                url: 'store_data.php',
                type: 'POST',
                data: { mobile: mobile, email: email },
                success: function() {
                  $('#message').html('Patient registered successfully!');
                  $('#message').css('color', 'green');
                  $('#registrationForm')[0].reset();
                  loadPatientsData();
                }
              });
            }
          }
        });
      });

      function loadPatientsData() {
        $.ajax({
          url: 'get_data.php',
          type: 'GET',
          success: function(response) {
            $('#patientsTable tbody').html(response);
          }
        });
      }

      $(document).on('click', '.delete-btn', function() {
        var phoneNumber = $(this).attr('data-mobile');

        // Perform AJAX request to delete patient data
        $.ajax({
          url: 'delete_data.php',
          type: 'POST',
          data: { phoneNumber: phoneNumber },
          success: function() {
            loadPatientsData(); // Reload the patient data table
            $('#message').html('Patient data deleted successfully!');
          }
        });
      });

      loadPatientsData();
    });
  </script>
</body>
</html>
