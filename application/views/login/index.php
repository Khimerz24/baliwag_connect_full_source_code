<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100..900;1,100..900&family=Style+Script&display=swap"
        rel="stylesheet">
    <title>Login</title>
</head>
<style>
    * {
        font-family: 'Raleway', sans-serif;
        color: #05158F;
    }

    .loading-text {
        color: white;
    }
</style>

<body>
    <a href="<?php echo base_url() ?>landing">
        <div class="navbar" style="background-color: #05158F;">
            <img src="<?php echo base_url('assets/img/logo.png'); ?>" alt="" style=" height: 50px;">
        </div>
    </a>
    <div class="container vh-100 d-flex justify-content-center align-items-center">
        <div class="row justify-content-center w-100">
            <div class="col-md-10 col-lg-8">
                <div class="top-row d-flex justify-content-center align-items-center position-relative"
                    style="background-color: #05158F; height: 70px;">
                    <h3 class="mb-0 text-white fw-bold">Login</h3>
                    <!--<a href="<?php echo base_url() ?>landing" class="position-absolute"-->
                    <!--    style="right: 20px; font-size: 1.5rem;">-->
                    <!--    <i class="fas fa-times text-white"></i>-->
                    <!--</a>-->
                </div>
                <div class="card">
                    <div class="card-body login-card-body">
                        <form id="signinForm">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="User name" id="username"
                                    name="userName">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                    </div>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input type="password" class="form-control" placeholder="Password" id="password"
                                    name="password">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-primary w-100" onclick="signin()">Sign in</button>
                        </form>
                        <p class="mb-1 text-center mt-3">
                            <a href="<?php echo base_url() ?>forgot_password">Forgot Password</a>
                        </p>
                        <p class="mb-1 text-center ">
                            <a href="<?php echo base_url() ?>signup">No account yet? Create account</a>
                        </p>
                        <p class="mb-1 text-center small text-muted ">
                            <a href="" data-toggle="modal" data-target="#exampleModal">
                                By registering, you agree to the Terms, Conditions, and Policies.
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header justify-content-center">
                    <h5 class="modal-title text-center" id="exampleModalLabel">Terms, Conditions and Policies.</h5>
                    <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"> -->
                    <!-- <span aria-hidden="true">&times;</span> -->
                    </button>
                </div>
                <div class="modal-body">
                    By logging into this website, you agree to the following terms:
                    <br>
                    1. Account Security: You are responsible for maintaining the confidentiality of your login
                    credentials.
                    <br>
                    2. Authorized Use: You agree to use your account only for lawful purposes and not to share access
                    with others.
                    <br>
                    3. Termination: We reserve the rig ht to suspend or terminate accounts that violate our policies o r
                    show suspicious activity.
                    <br>
                    <br>
                    Privacy Policy
                    <br>
                    1. Data Collection: We collect your login credentials, IP address, and device information for
                    authentication and security purposes.
                    <br>
                    2. Data Usage: Your data is used only to verify your identity and improve user experience.
                    <br>
                    3. Data Protection: We use industry-standard encryption and security measures to protect your
                    information.
                    <br>
                    4. Third-Party Access: We do not sell or share your personal data with third parties without your
                    consent.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                </div>
            </div>
        </div>
    </div>
    <?php $this->load->view('template/loading_modal'); ?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
    <script>
        function signin() {
            event.preventDefault();

            let username = $('#username').val();
            let password = $('#password').val();

            if (!username || !password) {
                alert('Please enter all fields');
                return;
            }

            let formData = new FormData($('#signinForm')[0]);

            for (var pair of formData.entries()) {
                console.log(pair[0] + ', ' + pair[1]);
            }

            $.ajax({
                url: '<?php echo base_url(); ?>signin/signin',
                type: 'POST',
                processData: false,
                contentType: false,
                data: formData,
                dataType: 'json',
                success: function (response) {
                    if (response.status == 'success') {
                        Swal.fire({
                            toast: true,
                            position: 'top-end',
                            icon: 'success',
                            title: response.message,
                            showConfirmButton: false,
                            timer: 2000
                        });
                        setInterval(function () {
                            window.location.href = "<?php echo base_url('landing'); ?>";
                        }, 2000);
                    } else {
                        Swal.fire({
                            toast: true,
                            position: 'top-end',
                            icon: 'error',
                            title: response.message,
                            showConfirmButton: false,
                            timer: 2000
                        });
                        $('#signinForm')[0].reset();
                    }
                }
            })
        }
    </script>
</body>

</html>