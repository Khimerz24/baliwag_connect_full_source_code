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
    <title>Forgot Password</title>
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
                        <p class="login-box-msg text-center fs-4 fw-bold">Enter Your Email</p>
                        <form id="verifyForm">
                            <div class="mb-3">
                                <div class="input-group">
                                    <input type="email" class="form-control" id="verifyEmail" name="verifyEmail"
                                        placeholder="Enter Email">
                                </div>
                                
                                
                                <!--para sa ui/ux experience, para lalong ma-enhance
                                para maalam ng user kung ano mangyayari
                                -->
                                
                                <small class="form-text text-muted">Please enter the email address you used to create
                                    your account. We’ll send a verification code to that address so you can securely
                                    reset your password and sign in again.</small>
                            </div>
                            <button class="btn btn-primary w-100" onclick="verify()">Submit</button>
                        </form>
                        <p class="mb-1 text-center mt-3">
                            <a href="<?php echo base_url() ?>login"><i class="fas fa-arrow-left mr-1"></i> Back to Login
                                Page</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="loader_spinner" style="
      display: none;      
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 0, 0.5); /* semi-transparent black */
      backdrop-filter: blur(4px); 
      z-index: 9999;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-direction: column;
      text-align: center;
      color: #fff;
      ">
        <div role="status" class="loader">
            <svg class="icon" viewBox="0 0 256 256">
                <line x1="128" y1="32" x2="128" y2="64" stroke-linecap="round" stroke-linejoin="round"
                    stroke-width="24"></line>
                <line x1="195.9" y1="60.1" x2="173.3" y2="82.7" stroke-linecap="round" stroke-linejoin="round"
                    stroke-width="24"></line>
                <line x1="224" y1="128" x2="192" y2="128" stroke-linecap="round" stroke-linejoin="round"
                    stroke-width="24"></line>
                <line x1="195.9" y1="195.9" x2="173.3" y2="173.3" stroke-linecap="round" stroke-linejoin="round"
                    stroke-width="24"></line>
                <line x1="128" y1="224" x2="128" y2="192" stroke-linecap="round" stroke-linejoin="round"
                    stroke-width="24"></line>
                <line x1="60.1" y1="195.9" x2="82.7" y2="173.3" stroke-linecap="round" stroke-linejoin="round"
                    stroke-width="24"></line>
                <line x1="32" y1="128" x2="64" y2="128" stroke-linecap="round" stroke-linejoin="round"
                    stroke-width="24"></line>
                <line x1="60.1" y1="60.1" x2="82.7" y2="82.7" stroke-linecap="round" stroke-linejoin="round"
                    stroke-width="24"></line>
            </svg>
            <span class="loading-text">Loading...</span>
        </div>
    </div>
    <?php $this->load->view('template/loading_modal'); ?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.min.js">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#loader_spinner').hide();
        });

        function verify() {
            event.preventDefault();

            let verifyEmail = $('#verifyEmail').val();

            if (!verifyEmail) {
                alert('Please enter all fields');
                return;
            }

            let formData = new FormData($('#verifyForm')[0]);

            for (var pair of formData.entries()) {
                console.log(pair[0] + ', ' + pair[1]);
            }

            $.ajax({
                url: '<?php echo base_url(); ?>forgot_password/verify',
                type: 'POST',
                processData: false,
                contentType: false,
                data: formData,
                dataType: 'json',
                beforeSend: function () {
                    $('#loader_spinner').show();
                },
                success: function (response) {
                    if (response.status == 'success') {
                        $('#loader_spinner').hide();
                        window.location.href = "<?php echo base_url('forgot_password/loadVerify'); ?>";
                    } else {
                        $('#loader_spinner').hide();
                        Swal.fire({
                            toast: true,
                            position: 'top-end',
                            icon: 'error',
                            title: response.message,
                            showConfirmButton: false,
                            timer: 2000
                        });
                    }
                },
                // complete: function() {
                //     $('#loader').modal('hide');
                // }
            })
        }
    </script>
</body>

</html>