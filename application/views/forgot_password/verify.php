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
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100..900;1,100..900&family=Style+Script&display=swap" rel="stylesheet">
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
                        <p class="login-box-msg text-center fs-4 fw-bold">Verify Code</p>
                        <form id="verifyForm">
                            <div class="row mb-3">
                                <div class="col-md-12 mb-3 mb-md-0">
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="verifyCode" name="verifyCode" placeholder="Enter Code">
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-primary w-100" onclick="verify()">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php $this->load->view('template/loading_modal'); ?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.min.js">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#loader_spinner').hide();
        });

        function verify() {
            event.preventDefault();

            let verifyCode = $('#verifyCode').val();

            if (!verifyCode) {
                alert('Please enter all fields');
                return;
            }

            let formData = new FormData($('#verifyForm')[0]);

            for (var pair of formData.entries()) {
                console.log(pair[0] + ', ' + pair[1]);
            }

            $.ajax({
                url: '<?php echo base_url(); ?>forgot_password/verifyCode',
                type: 'POST',
                processData: false,
                contentType: false,
                data: formData,
                dataType: 'json',
                beforeSend: function() {
                    $('#loader_spinner').show();
                },
                success: function(response) {
                    if (response.status == 'success') {
                        Swal.fire({
                            toast: true,
                            position: 'top-end',
                            icon: 'success',
                            title: response.message,
                            showConfirmButton: false,
                            timer: 2000
                        });
                        const code = response.code;
                        setInterval(function() {
                            window.location.href = "<?php echo base_url('forgot_password/loadForgotPass?code=') ?>" + code;
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