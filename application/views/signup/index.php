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
    <title>Create Account</title>
</head>
<style>
    * {
        font-family: 'Raleway', sans-serif;
        color: #05158F;
    }

    .loading-text {
        color: white;
    }

    .custom-control-input:checked~.custom-control-label::before {
        color: #fff;
        border-color: #05158F;
        background-color: #05158F;
    }
</style>

<body>
    <a href="<?php echo base_url() ?>landing">
        <div class="navbar" style="background-color: #05158F;">
            <img src="<?php echo base_url('assets/img/logo.png'); ?>" alt="" style=" height: 50px;">
        </div>
    </a>
    <!-- <nav class="navbar navbar-expand-lg navbar-light bg-light">
         <a class="navbar-brand" href="#">Navbar</a>
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ml-auto">
               <li class="nav-item active">
                  <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="#">Features</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="#">Pricing</a>
               </li>
               <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                  Dropdown link
                  </a>
                  <div class="dropdown-menu">
                     <a class="dropdown-item" href="#">Action</a>
                     <a class="dropdown-item" href="#">Another action</a>
                     <a class="dropdown-item" href="#">Something else here</a>
                  </div>
               </li>
            </ul>
         </div>
         </nav> -->
    <div class="container vh-100 d-flex justify-content-center align-items-center">
        <div class="row justify-content-center w-100">
            <div class="col-md-10 col-lg-8">
                <div class="top-row" style="background-color: #05158F;height: 50px;">
                </div>
                <div class="card">
                    <div class="card-body login-card-body">
                        <p class="login-box-msg text-center fs-4 fw-bold">Create Account</p>
                        <form id="signupForm" onsubmit="return createAccount()">
                            <div class="row mb-3">
                                <div class="col-md-6 mb-3 mb-md-0">
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="firstName" name="firstName"
                                            placeholder="First name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="lastName" name="lastName"
                                        placeholder="Last name">
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" id="userName" name="userName"
                                    placeholder="User name">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="input-group">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Email"
                                        required>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                        </div>
                                    </div>
                                </div>
                                <small class="form-text text-muted">Please use a real email address. A verification code
                                    will be sent to it.</small>
                            </div>
                            <div class="input-group mb-3">
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="Create Password">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="input-group mb-3">
                           <input type="password" class="form-control" placeholder="Re-type password">
                           <div class="input-group-append">
                              <div class="input-group-text">
                              </div>
                           </div>
                        </div> -->
                            <div class="form-group my-3">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="agreeTerms"
                                        name="agreeTerms">
                                    <label class="custom-control-label small text-muted" for="agreeTerms">
                                        By registering, you agree to the <a href="#" data-toggle="modal"
                                            data-target="#exampleModal">Terms, Conditions, and Policies.</a>
                                    </label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Create Account</button>

                        </form>
                        <p class="mb-1 text-center mt-3">
                            <a href="<?php echo base_url() ?>login"><i class="fas fa-arrow-left mr-1"></i> Already have
                                an account? Login
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
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#firstName, #lastName').on('input', function () {
                $(this).val($(this).val().replace(/[^a-zA-Z\s]/g, ''));
            });
        });

        function createAccount() {
            event.preventDefault();

            let firstName = $('#firstName').val();
            let lastName = $('#lastName').val();
            let userName = $('#userName').val();
            let email = $('#email').val();
            let password = $('#password').val();

            if (!firstName || !lastName || !userName || !email || !password) {
                alert('Please enter all fields');
                return;
            }

            if (!$('#agreeTerms').is(':checked')) {
                alert('You must agree to the Terms, Conditions, and Policies to create an account.');
                return;
            }
            let formData = new FormData($('#signupForm')[0]);

            for (var pair of formData.entries()) {
                console.log(pair[0] + ', ' + pair[1]);
            }

            $.ajax({
                url: '<?php echo base_url(); ?>signup/signupUser',
                type: 'POST',
                processData: false,
                contentType: false,
                data: formData,
                dataType: 'json',
                beforeSend: function () {
                    $('#loader').modal('show');
                },
                success: function (response) {
                    if (response.status == 'success') {
                        window.location.href = "<?php echo base_url('signup/verification'); ?>";
                    } else {
                        alert(response.message || "Login failed");
                    }
                },
                complete: function () {
                    $('#loader').modal('hide');
                }
            })
        }
    </script>
</body>

</html>