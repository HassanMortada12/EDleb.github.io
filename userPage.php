<?php
try {
session_start(); 

  if (isset($_SESSION["logged"]) && $_SESSION["type"] == "user") {
      // Your admin-only code here
  } else {
      header("location: login.php");
 }


 if (isset($_POST["submit"])) {
     $department = $_POST["department"];
     //echo  $department;
     $_SESSION["department"]= $department;
     header("location: courses.php");
}

}catch (PDOException $e) {
  die($e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
    crossorigin="anonymous">

    <style>
        body {
            background: linear-gradient(to right, #4b6cb7, #182848); /* Gradient background */
            font-family: Arial, sans-serif;
            animation: changeBackground 20s ease-in-out infinite alternate; /* Background animation */
            position: relative; /* Set body to relative positioning */
            min-height: 100vh; /* Set body to at least full viewport height */
        }

        @keyframes changeBackground {
            0% {
                background-position: 0% 50%;
            }
            100% {
                background-position: 100% 50%;
            }
        }

        .navbar {
            background-color: rgba(0, 0, 0, 0.5) !important; /* Transparent black navbar */
        }

        .navbar-brand {
            color: #fff; /* White text for navbar brand */
            font-size: 24px;
        }

        .form-control {
            border-radius: 20px; /* Rounded search input */
        }

        .card {
            border-radius: 20px; /* Rounded corners for cards */
            background-color: rgba(255, 255, 255, 0.1); /* Transparent white card background */
            color: #fff; /* White text for card content */
            margin-bottom: 20px;
        }

        .card-title {
            margin-bottom: 15px;
            font-size: 20px;
        }

        .btn-primary {
            border-radius: 20px; /* Rounded buttons */
            background-color: #007bff; /* Blue button color */
            border-color: #007bff; /* Blue button border color */
            transition: background-color 0.3s ease; /* Smooth transition */
        }

        .btn-primary:hover {
            background-color: #0056b3; /* Darker blue on hover */
        }

        .card-img-top {
            border-top-left-radius: 20px; /* Rounded corners for card image */
            border-top-right-radius: 20px;
        }

        /* Center text and buttons in card */
        .card-body {
            text-align: center;
        }

        /* Footer styling */
        .footer {
            position: fixed; /* Fixed position */
            bottom: 0; /* Align to bottom of viewport */
            width: 100%; /* Full width */
            background-color: #343a40; /* Dark background color */
            padding: 20px 0; /* Padding top and bottom */
            color: #fff; /* White text color */
        }
    </style>
</head>
<body>

<nav class="navbar bg-dark text-light ">
  <div class="container">
  <?php  
        echo "<a class='navbar-brand fs-3 text-light' href='#'><span class='welcome-text'>Welcome</span> {$_SESSION['user']}</a>";
        ?>
    <form class="d-flex" role="search">
      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
  </div>
</nav>

<?php
  require_once("dbAccess.php");
  try {
    $pdo = new PDO(DBCONNSTRING, DBUSER, DBPASS);
    $query = "SELECT DISTINCT department
    FROM files;";
    $result = $pdo->query($query);
    $departments = $result->fetchAll(PDO::FETCH_ASSOC);

    echo "<div class='container mt-4'>";
    echo "<div class='row row-cols-1 row-cols-md-3 g-4'>"; // Use Bootstrap grid classes for a 3-column layout

    foreach ($departments as $department) {
      echo "
      <div class='col'>
         <div class='card'>
              <img src='images/abstract-new-app-development-elements-illustrated_23-2148683146.avif' class='card-img-top' width='150px' height='170px' alt='...'>
          <div class='card-body'>
              <h5 class='card-title'>" . $department['department'] . "</h5>
              <form action='userPage.php' method='post' > 
                  <input type='hidden' name='department' value='" . $department['department'] . "'> <!-- Use a hidden input to submit the department name -->
                  <input type='submit' class='btn btn-primary' value='Visit Courses' name='submit'>
              </form>
          </div>
      </div>
  </div>";
  
}

echo "</div>"; // Close row
echo "</div>"; // Close container

  
  } catch (PDOException $e) {
    die($e->getMessage());
  }
?>

<footer class="footer">
    <div class="container text-center">
        <div class="row">
            <div class="col-md-4">
                <h5>About Us</h5>
                <p>A brief description of your website or organization.</p>
                <p>Contact us: example@example.com</p>
            </div>
            <div class="col-md-4">
                <h5>Useful Links</h5>
                <ul class="list-unstyled">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Services</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </div>
            <div class="col-md-4">
                <h5>Follow Us</h5>
                <ul class="list-unstyled">
                    <li><a href="#"><i class="fab fa-facebook"></i> Facebook</a></li>
                    <li><a href="#"><i class="fab fa-twitter"></i> Twitter</a></li>
                    <li><a href="#"><i class="fab fa-instagram"></i> Instagram</a></li>
                </ul>
            </div>
        </div>
        <hr>
        <p class="text-muted">&copy; 2024 YourWebsiteName. All rights reserved.</p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

