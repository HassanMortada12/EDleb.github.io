<?php
if (isset($_POST["login"])) {
    require_once "dBAccess.php";
    $pdo = new PDO(DBCONNSTRING, DBUSER, DBPASS);

    $email = $_POST["email"];
    $password = $_POST["password"];

    // Use prepared statements to prevent SQL injection
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        session_start();
        $_SESSION['user'] =$user['username'];
        $_SESSION["logged"] = true;
        $_SESSION["type"] = $user['type'];

        if ($user['type'] == "user") {
            header("Location: userPage.php");
            die();
        } else {
            header("Location: adminPage.php");
            die();
        }
    } else {
        $loginFailed = true;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Login</title>
    <style>
        body {
            background: linear-gradient(to right, #8A2BE2, #4169E1); /* Gradient background */
            font-family: Arial, sans-serif;
            height: 100vh;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .card {
            border-radius: 20px; /* Rounded corners */
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1); /* Shadow */
            background-color: #fff; /* White background */
            padding: 20px;
            transition: all 0.3s ease; /* Smooth transition */
        }
        .card:hover {
            transform: translateY(-5px); /* Move up on hover */
        }
        .form-control {
            border-radius: 10px; /* Rounded input fields */
            border-color: #ddd; /* Light gray border */
        }
        .btn-primary {
            border-radius: 10px; /* Rounded button */
            background-color: #6A5ACD; /* Purple primary color */
            border-color: #6A5ACD; /* Purple border color */
            transition: background-color 0.3s ease; /* Smooth transition */
        }
        .btn-primary:hover {
            background-color: #483D8B; /* Darker purple on hover */
        }
    </style>
</head>
<body>

<?php
// Check if login failed before echoing the JavaScript alert
if (isset($loginFailed) && $loginFailed) {
    echo "<script>
        // Function to create and add the alert dynamically
        function showAlert() {
            var alertDiv = document.createElement('div');
            alertDiv.classList.add('alert', 'alert-danger');
            alertDiv.setAttribute('role', 'alert');
            alertDiv.innerHTML = '<strong>Oops!</strong> Email or password is incorrect.';

            // Insert the alert before the login form
            var loginForm = document.querySelector('form');
            loginForm.parentNode.insertBefore(alertDiv, loginForm);
        }

        // Call the function to show the alert
        showAlert();
    </script>";
}
?>

    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title text-center mb-4">Login</h2>
                <form method="post" action="login.php">
                    <div class="mb-3">
                         <label for="email" class="form-label">Email</label>
                         <input type="email" class="form-control" id="email" placeholder="Email" name="email" required autocomplete="off">
                    </div>

                    <div class="mb-3">
                         <label for="password" class="form-label">Password</label>
                         <input type="password" class="form-control" id="password" placeholder="Password" name="password" required autocomplete="off">
                    </div>

                    <div class="mb-3 text-center">
                        <button class="btn btn-primary btn-lg" type="submit" name="login">Login</button>
                    </div>
                </form>
                <p class="text-center">Don't have an account? <a href="signup.php">Sign Up</a></p>
            </div>
        </div>
    </div>

    <script>
        // Function to create and add the alert dynamically
        function showAlert() {
            var alertDiv = document.createElement('div');
            alertDiv.classList.add('alert', 'alert-danger');
            alertDiv.setAttribute('role', 'alert');
            alertDiv.innerHTML = '<strong>Oops!</strong> Email or password is incorrect.';

            // Insert the alert before the login form
            var loginForm = document.querySelector('form');
            loginForm.parentNode.insertBefore(alertDiv, loginForm);
        }

        // Call the function to show the alert
        showAlert();
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
