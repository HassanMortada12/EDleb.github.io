<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Project</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
    crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    
</head>

<body>

<header>
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
        <div class="container">
            <a class="navbar-brand fs-5" href="#">Complete Project</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse fs-5" id="navmenu">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Developer</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php"><span class="text-light">Login</span></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<section class="bg-dark text-light p-5 text-center align-items-center justify-content-center animate__animated animate__fadeIn">
    <div class="container align-items-center justify-content-center">
        <div class="d-sm-flex align-items-center justify-content-center">
            <div class="display-4">
                <h1>Master Your <span class="text-warning">Education</span></h1>
                <button class="btn btn-primary btn-lg"><a  class="text-light" style="text-decoration:none" href="signup.php">Enroll Now</a></button>
            </div>
        </div>
    </div>
</section>

<section class="p-5" style="background-color: #e9f2f9;">
    <div class="container">
        <div class="row">
            <div class="col text-center animate__animated animate__fadeInUp">
                <h2 class="display-4 mb-4">Get Started With Our Courses</h2>
                <p class="lead">Unlock your potential with our wide range of courses. Whether you're interested in web development, business, or engineering, we have something for everyone.</p>
                <a href="#" class="btn btn-primary btn-lg">Explore Courses</a>
            </div>
        </div>
    </div>
</section>

<section class="p-3">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4 animate__animated animate__fadeInLeft">
                <div class="card bg-dark text-light mb-3">
                    <img src="images/abstract-new-app-development-elements-illustrated_23-2148683146.avif" class="card-img-top" style="width: 100%; height: 230px; margin: auto;" alt="Engineering">
                    <div class="card-body text-center">
                        <h5 class="card-title">Engineering</h5>
                        <p class="card-text">The scientist discovers a new type of material or energy and the engineer discovers a new use for it.</p>
                        <a href="#" class="btn btn-primary">Visit Courses</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 animate__animated animate__fadeInUp">
                <div class="card bg-dark text-light mb-3">
                    <img src="images/top-view-dark-laptop-background-template_52683-7081.avif" class="card-img-top" style="width: 100%; height: 230px; margin: auto;" alt="Computer Science">
                    <div class="card-body text-center">
                        <h5 class="card-title">Computer Science</h5>
                        <p class="card-text">Computer Science is no more about computers than astronomy is about telescopes.</p>
                        <a href="#" class="btn btn-primary">Visit Courses</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 animate__animated animate__fadeInRight">
                <div class="card bg-dark text-light mb-3">
                    <img src="images/business-concept-with-team-close-up_23-2149151159.avif" class="card-img-top" style="width: 100%; height: 230px; margin: auto;" alt="Business">
                    <div class="card-body text-center">
                        <h5 class="card-title">Business</h5>
                        <p class="card-text">We're here to make a difference in this world, not just a profit. "Just Kiding"</p>
                        <a href="#" class="btn btn-primary">Visit Courses</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="learn" class="p-5 bg-light animate__animated animate__fadeIn">
    <div class="container">
        <div class="row align-items-center justify-content-between">
            <div class="col-md-6">
                <div class="text-center mb-4">
                    <img src="images/web-design.svg" class="img-fluid" style="width: 50%;" alt="Web Design">
                </div>
            </div>
            <div class="col-md-6">
                <div class="text-center">
                    <h2 class="display-4 mb-4">Learn The Fundamentals</h2>
                    <p class="lead mb-4">Unlock the power of web design and create stunning websites. Dive deep into the core concepts and master the essential skills needed to succeed in the digital world.</p>
                    <a href="#" class="btn btn-primary btn-lg">Explore Courses</a>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="learn" class="p-5 bg-dark text-light animate__animated animate__fadeIn">
    <div class="container">
        <div class="row align-items-center justify-content-between">
            <div class="col-md">
                <h2>Take The Next Step</h2>
                <p class="lead">Explore the world of web development and unleash your creativity. Our courses offer hands-on experience and practical skills to help you succeed in the digital age.</p>
            </div>
            <div class="col-md">
                <img src="images/webdev.svg" class=" img-fluid">
            </div>
        </div>
    </div>
</section>

<footer class="bg-dark text-light text-center p-3 animate__animated animate__fadeIn">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h5>Contact Us</h5>
                <p>Email: info@example.com</p>
                <p>Phone: 123-456-7890</p>
            </div>
            <div class="col-md-4">
                <h5>Follow Us</h5>
                <a href="#" class="btn btn-outline-light me-2"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="btn btn-outline-light me-2"><i class="fab fa-twitter"></i></a>
                <a href="#" class="btn btn-outline-light me-2"><i class="fab fa-instagram"></i></a>
                <a href="#" class="btn btn-outline-light me-2"><i class="fab fa-linkedin-in"></i></a>
            </div>
            <div class="col-md-4">
                <h5>Quick Links</h5>
                <ul class="list-unstyled">
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Courses</a></li>
                    <li><a href="#">FAQs</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                </ul>
            </div>
        </div>
        <hr>
        <p>&copy; 2024 My Project. All rights reserved.</p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
