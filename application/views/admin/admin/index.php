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
</style>
<!-- 
   <pre>
   <?php print_r($this->session->all_userdata()); ?>
   </pre> -->

<body>
    <div class="navbar" style="background-color: #05158F;">
        <a href="<?php echo base_url() ?>landing">
       
            <img src="<?php echo base_url('assets/img/logo.png'); ?>" alt="" style=" height: 50px;">
        
    </a>
    </div>
    <div class="container vh-100 d-flex justify-content-center align-items-center">
        <div class="row justify-content-center w-100">
            <div class="col-md-10 col-lg-8">
                <div class="top-row d-flex justify-content-center align-items-center position-relative"
                    style="background-color: #05158F; height: 70px;">
                    <h3 class="mb-0 text-white fw-bold">Admin</h3>
                   
                </div>
                <div class="card">
                    <div class="card-body login-card-body">
                        <form id="adminFormlogin">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" id="username" name="username"
                                    placeholder="Username">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                    </div>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="Password">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-primary w-100" onclick="loginAdmin()">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
</body>
<script>

    function loginAdmin() {
        event.preventDefault();

        let username = $('#username').val();
        let password = $('#password').val();

        if (!username || !password) {
            alert('Please enter all fields');
            return;
        }

        let formData = new FormData($('#adminFormlogin')[0]);

        for (var pair of formData.entries()) {
            console.log(pair[0] + ', ' + pair[1]);
        }
        $.ajax({
            url: '<?php echo base_url(); ?>admin/loginUser',
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
                        window.location.href = "<?php echo base_url('dashboard'); ?>";
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
                    $('#adminFormlogin')[0].reset();
                }
            }
        })
    }

</script>

</html>