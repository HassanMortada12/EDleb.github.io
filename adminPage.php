<?php
require_once("dbAccess.php");

try {
    session_start();

    if (isset($_SESSION["logged"]) && $_SESSION["type"] == "admin") {
        // Your admin-only code here
    } else {
        header("location: login.php");
   }




    if (isset($_POST['name'], $_POST['department'], $_POST['description'])) {
       
        $pdo = new PDO(DBCONNSTRING, DBUSER, DBPASS);
        extract($_POST);
        extract($_FILES);
        $file=$_FILES["files"];

        $departmentMappings = array(
            "option1" => "Department of Engineering",
            "option2" => "Department of Computer Science",
            "option3" => "Department of Business"
        );
        $selectedValue = $_POST['department'];
        $department = $departmentMappings[$selectedValue];
        
        $uploadedFile = $_FILES['files']['tmp_name'];
        $fileInfo = pathinfo($_FILES['files']['name']);
        $extension = strtolower($fileInfo['extension']);
        echo "<script>alert('$extension')</script>";
        if ($extension == 'mp4') {
            if (!empty($_FILES['files']['name'])) {
                $file = "files/" . $_FILES['files']['name']; // Update variable to $files
                move_uploaded_file($_FILES['files']['tmp_name'], $file);

                $query = "INSERT INTO files (name, department, description, file, type) VALUES (?, ?, ?, ?, ?)";
                $stmt = $pdo->prepare($query);
                $stmt->bindParam(1, $name);
                $stmt->bindParam(2, $department);
                $stmt->bindParam(3, $description);
                $stmt->bindParam(4, $file);  
                $stmt->bindParam(5, $extension);
                $result = $stmt->execute();
                echo "<script>alert('Video uploaded successfully')</script>";
            }
        } else {
            echo "<script>alert('File type not allowed')</script>";
        }
    }
} catch (PDOException $e) {
    die($e->getMessage());
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="loginStyles.css"/>
    <title>Admin</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark py-4">
    <div class="container">
        <?php  
        echo "<a class='navbar-brand fs-3 text-light' href='#'><span class='welcome-text'>Welcome</span> {$_SESSION['user']}</a>";
        ?>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse fs-5" id="navmenu">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link text-light" href="#">Manage</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="#">Courses</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="login.php">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>




    <section class="bg-primary-light text-dark py-5">
        <div class="container-fluid">
            <form class="row g-3" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
                <div class="col-md-6">
                    <label for="inputName" class="form-label">File Name:</label>
                    <input type="text" class="form-control" id="inputName" placeholder="Name" name="name">
                </div>
                <div class="col-md-6">
                    <label for="combo-box" class="form-label">Select Department:</label>
                    <select class="form-select" id="combo-box" name="department">
                        <option value="option1">Department of Engineering</option>
                        <option value="option2">Department of Computer Science</option>
                        <option value="option3">Department of Business</option>
                    </select>
                </div>
                <div class="col-12">
                    <label for="inputDescription" class="form-label">Description</label>
                    <textarea class="form-control" id="inputDescription" rows="3" name="description"></textarea>
                </div>
                <div class="col-12">
                    <label class="form-label">Insert the File:</label>
                    <input class="form-control" type="file" name="files">
                </div>
                <div class="col-12">
                    <button class="btn btn-primary" type="submit">Add File</button>
                </div>
            </form>
        </div>
    </section>

    <section class="bg-dark text-light py-5">
    <div class="container">
        <div class="row g-3">
            <div class="col-md-6">
                <h2>Add Department</h2>
                <form method="post" action="adminPage.php">
                    <div class="mb-3">
                        <label for="departmentName" class="form-label">Department Name</label>
                        <input type="text" class="form-control" id="departmentName" name="departmentName">
                    </div>
                    <div class="mb-3">
                        <label for="departmentDescription" class="form-label">Department Description</label>
                        <textarea class="form-control" id="departmentDescription" rows="3" name="departmentDescription"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Add</button>
                </form>
            </div>
            <div class="col-md-6">
                <h2>Remove Department</h2>
                <form method="post" action="adminPage.php">
                    <div class="mb-3">
                        <label for="departmentToRemove" class="form-label">Select Department to Remove</label>
                        <select class="form-select" id="departmentToRemove" name="departmentToRemove">
                            <option value="department1">Department 1</option>
                            <option value="department2">Department 2</option>
                            <option value="department3">Department 3</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-danger">Remove</button>
                </form>
            </div>
        </div>
    </div>
</section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
