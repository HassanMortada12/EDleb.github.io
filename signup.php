<?php
if (isset($_POST["submit"])) {
    $fullName = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["pass"];
    $passwordRepeat = $_POST["pass2"];
    $type="user";
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    $errors = array();

    if (empty($fullName) || empty($email) || empty($password) || empty($passwordRepeat)) {
        array_push($errors, "All fields are required");
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        array_push($errors, "Email is not valid");
    }
    if (strlen($password) < 8) {
        array_push($errors, "Password must be at least 8 characters long");
    }
    if ($password !== $passwordRepeat) {
        array_push($errors, "Password does not match");
    }

    require_once "dbAccess.php";
    $pdo = new PDO(DBCONNSTRING, DBUSER, DBPASS);

    // Use a prepared statement to avoid SQL injection
    $query = "SELECT * FROM users WHERE email = ?";
    $prepareStmt = $pdo->prepare($query);
    $prepareStmt->bindValue(1, $email);
    $prepareStmt->execute();

    $rowCount = $prepareStmt->rowCount();

    if ($rowCount > 0) {
        array_push($errors, "Email already exists!");
    }

    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo "<div class='alert alert-danger'>$error</div>";
        }
    } else {
        $query = "INSERT INTO users (username,password, type, email) VALUES (?,?, ?, ?)";
        $prepareStmt = $pdo->prepare($query);
        $prepareStmt->bindValue(1, $fullName);
        $prepareStmt->bindValue(2, $passwordHash);
        $prepareStmt->bindValue(3, $type);
        $prepareStmt->bindValue(4, $email);

        if ($prepareStmt->execute()) {
            echo "<div class='alert alert-success'>You are registered successfully.</div>";
        } else {
            die("Something went wrong");
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
    crossorigin="anonymous">
    <link rel="stylesheet" href="loginStyles.css"/>
    <title>Signup</title>
</head>
<body>
  <section  class="container mt-3 " >
    <div class="d-sm-flex align-items-center justify-content-center bg-primary-subtle text-dark">

        <form class="container col-sm-8 pt-2"  method="post" action="signup.php">
            <h2 class="text-center fs-1 text-primary-emphasis">Sign Up</h2>
            <div class="mb-3">
                 <label for="exampleFormControlInput1" class="form-label">Name</label>
                 <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Name" name="username">
            </div>

            <div class="mb-3">
                 <label for="exampleFormControlInput1" class="form-label">Email</label>
                 <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Email" name="email">
            </div>

            <div class="mb-3">
                 <label for="exampleFormControlInput2" class="form-label">Password</label>
                 <input type="password" class="form-control" id="exampleFormControlInput2" placeholder="Password" name="pass">
            </div>
            
            <div class="mb-3">
                 <label for="exampleFormControlInput3" class="form-label">Confirm Password</label>
                 <input type="password" class="form-control" id="exampleFormControlInput3" placeholder="Confirm Password"name="pass2">
            </div>

            <div >
                 <a style="text-decoration:none" href="login.php"><span >Already have an account?</span></a>
            </div>

          

            <div class="mb-3 d-sm-flex align-items-center justify-content-center">
                <input class="btn btn-primary btn-lg" type="submit" name="submit">
            </div>
            
        </form>

        <div class="bg-warning-subtle d-sm-flex align-items-center justify-content-center" style="height:93vh; margin:0 ;width:50vh">
         <img src="images/HumanV1-18-512.webp" >
    </div>
    </div>

  

  </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>