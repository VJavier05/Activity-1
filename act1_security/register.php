<?php
session_start();
require 'db_connect.php'; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="static/core.css" />
    <link rel="stylesheet" href="static/theme-default.css" />
    <link rel="stylesheet" href="static/page-auth.css" />

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>

<div class="container-fluid vh-100">
<?php
    if (isset($_SESSION['error'])) {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">'
            . $_SESSION['error'] .
            '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        unset($_SESSION['error']); // Unset after displaying
    }
    ?>
    <div class="row h-100 start">
        <!-- Left Side (Image) -->
        <div class="col-lg-6 d-none d-lg-block image-side"></div>
        
        <!-- Right Side (Register Form) -->
        <div class="col-lg-6 d-flex align-items-center justify-content-center">
            <div class="w-75">
                <h2 class="mb-4 text-center">Create an Account</h2>
                <form action="register_process.php" method="POST" class="needs-validation" novalidate>
                    
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="sample@email.com" required>
                        <div class="invalid-feedback">Please enter a valid email address.</div>
                    </div>
                
                    <div class="row">
                    <div class="col-md-6 mb-4 form-password-toggle">
                        <label class="form-label" for="password">Password</label>
                        <div class="input-group input-group-merge">
                            <input
                                type="password"
                                class="form-control"
                                id="password"
                                name="password"
                                placeholder="••••••••••"
                                aria-describedby="password"
                                required
                            />

                            <span class="input-group-text cursor-pointer" onclick="togglePasswordVisibility(this)">
                                <i class="bx bx-hide"></i>
                            </span>

                        </div>
                        <div class="invalid-feedback">Please enter Password.</div>


                    </div>

                    <!-- Confirm Password Field -->
                    <div class="col-md-6 mb-4 form-password-toggle">
                        <label class="form-label" for="confirm_password">Confirm Password</label>
                        <div class="input-group input-group-merge">
                            <input
                                type="password"
                                class="form-control"
                                id="confirm_password"
                                name="confirm_password"
                                placeholder="••••••••••"
                                aria-describedby="confirm_password"
                                required
                            />
                            <span class="input-group-text cursor-pointer" onclick="togglePasswordVisibility(this)">
                                <i class="bx bx-hide"></i>
                            </span>

                        </div>
                        <div class="invalid-feedback ">Please enter Password.</div>


                    </div>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Register</button>
                </form>
                <p class="text-center mt-3">
                    <a href="login.php">Already have an account? Login here</a>
                </p>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="static/js/password.js"></script>

<script>
    (function () {
        'use strict';
        var forms = document.querySelectorAll('.needs-validation');

        Array.prototype.slice.call(forms).forEach(function (form) {
            form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    })();
</script>
</body>
</html>
