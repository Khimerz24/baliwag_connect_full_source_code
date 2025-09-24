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
   <link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/img/main-logo.png">
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
                  <p class="login-box-msg text-center fs-4 fw-bold">Please Check Your Email For Verification Code</p>
                  <form id="verifyForm">
                     <div class="row mb-3">
                        <div class="col-md-12 mb-3 mb-md-0">
                           <div class="input-group">
                              <input type="text" class="form-control" id="verificationCode" name="verificationCode" placeholder="Verification Code">
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
               1. Account Security: You are responsible for maintaining the confidentiality of your login credentials.
               <br>
               2. Authorized Use: You agree to use your account only for lawful purposes and not to share access with others.
               <br>
               3. Termination: We reserve the rig ht to suspend or terminate accounts that violate our policies o r show suspicious activity.
               <br>
               <br>
               Privacy Policy
               <br>
               1. Data Collection: We collect your login credentials, IP address, and device information for authentication and security purposes.
               <br>
               2. Data Usage: Your data is used only to verify your identity and improve user experience.
               <br>
               3. Data Protection: We use industry-standard encryption and security measures to protect your information.
               <br>
               4. Third-Party Access: We do not sell or share your personal data with third parties without your consent.
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
      function verify() {
         event.preventDefault();

         let verificationCode = $('#verificationCode').val();

         if (!verificationCode) {
            alert('Please enter all fields');
            return;
         }

         let formData = new FormData($('#verifyForm')[0]);

         for (var pair of formData.entries()) {
            console.log(pair[0] + ', ' + pair[1]);
         }

         $.ajax({
            url: '<?php echo base_url(); ?>signup/verify',
            type: 'POST',
            processData: false,
            contentType: false,
            data: formData,
            dataType: 'json',
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
                  setTimeout(() => {
                     window.location.href = "<?php echo base_url('login'); ?>";
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
            }
         })
      }
   </script>
</body>

</html>