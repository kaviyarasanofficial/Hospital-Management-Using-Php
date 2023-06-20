<!DOCTYPE html>
<html>
<head>
  <title>Patient Registration Form</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  
</head>
<body>
  <div class="container">
    <form id="registrationForm" action="enroll.php" method="post">
      <div class="form-group">
        <label for="name" >Name:</label>
        <input type="text" class="form-control" id="name" name="name">
      </div>
      <div class="form-group">
        <label for="mobile">Mobile Number:</label>
        <input type="text" class="form-control" id="mobile" name="mobile">
      </div>
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" class="form-control" id="email" name="email">
      </div>
      <button type="submit" class="btn btn-primary">Register</button>
    </form>
  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <!-- <script>
    $(document).ready(function() {
      $("#registrationForm").submit(function(e) {
        e.preventDefault();

        // Get form inputs
        var name = $("#name").val();
        var mobile = $("#mobile").val();
        var email = $("#email").val();

        // Regular expressions for validations
        var alphabetsRegex = /^[A-Za-z]+$/;
        var numbersRegex = /^[0-9]+$/;
        var emailRegex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/

        // Perform validations
        if (!alphabetsRegex.test(name)) {
          alert("Please enter a valid name with alphabets only.");
          return;
        }

        if (!numbersRegex.test(mobile)) {
          alert("Please enter a valid mobile number with numbers only.");
          return;
        }

        if (!emailRegex.test(email)) {
          alert("Please enter a valid email with numbers only.");
          return;
        }
        // Additional validations for email can be added here

        // Proceed with form submission if validations pass
        alert("Registration successful!");
        // Add your AJAX code or other logic for form submission here
      });
    });
  </script> -->




</body>
</html>
