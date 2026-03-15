<?php 
include 'public.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <base href="<?PHP echo BASE_URL; ?>">
    <meta charset="utf-8">
    <title><?php echo isset($title) ? $title : 'CRM By Deepak Kumar'; ?></title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="<?PHP echo BASE_URL; ?>assets/img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <!-- Icon Font Stylesheet -->
    <link href="<?PHP echo BASE_URL; ?>assets/fontawesome-icons/css/all.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="<?PHP echo BASE_URL; ?>assets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="<?PHP echo BASE_URL; ?>assets/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css"
        rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?PHP echo BASE_URL; ?>assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="<?PHP echo BASE_URL; ?>assets/css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-fluid position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner"
            class="d-none show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sign In Start -->
        <div class="container-fluid">
            <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                    <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h3>Log In</h3>
                        </div>
                        <form id="loginForm">

                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="email" required>
                                <label>Email address</label>
                            </div>

                            <div class="form-floating mb-4">
                                <input type="password" class="form-control" id="password" required>
                                <label>Password</label>
                            </div>

                            <div class="text-danger mb-3" id="errorMsg"></div>

                            <button type="submit" class="btn btn-primary py-3 w-100 mb-4">
                                Sign In
                            </button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Sign In End -->
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Template Javascript -->
    <script>
    $(document).ready(function() {

        $("#loginForm").on("submit", function(e) {
            e.preventDefault();

            $.ajax({
                url: "scripts/auth/Auth.php", // adjust path if needed
                type: "POST",
                dataType: "json",
                data: {
                    action: "login",
                    email: $("#email").val(),
                    password: $("#password").val()
                },
                beforeSend: function() {
                    $("#errorMsg").html("Please wait...");
                },
                success: function(response) {
                        // console.log(response);return false;
                    if (response.status === true) {

                        // Redirect from JSON response
                        window.location.href = response.data.redirect;

                    } else {

                        $("#errorMsg").html(response.message);
                    }
                },
                error: function() {
                    $("#errorMsg").html("Server error. Try again.");
                }
            });

        });

    });
    </script>
</body>

</html>