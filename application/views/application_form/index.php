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
      <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100..900;1,100..900&family=Style+Script&display=swap" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Raleway:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100..900;1,100..900&family=Style+Script&display=swap" rel="stylesheet">
      <link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.css" rel="stylesheet">
      <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
      <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js"></script>
      <title>Home - Baliwag Connect</title>
   </head>
   <style>
      *{
      font-family: 'roboto', sans-serif;
      color: #05158F;
      }
      .title-poster-container::before {
      position: absolute;
      inset: 0;
      background: rgba(0, 0, 0, 0.4);
      z-index: 1;
      }
      .title-poster-container .container {
      position: relative;
      z-index: 2;
      }
      .circle {
      width: 180px;
      height: 180px;
      border-radius: 50%;
      background-color: #05158F;
      transition: transform 0.5s ease-in-out;
      }
      .circle:hover {
      transform: scale(1.1);
      cursor: pointer;
      }
      .social-media{
      transition: transform 0.5s ease-in-out;
      }
      .social-media:hover{
      transform: scale(1.1);
      cursor: pointer;
      }
      .thick-blue-border {
      border: 5px solid #05158F;
      border-radius: 0.5rem; 
      }
      button.fc-today-button.fc-button.fc-button-primary {
      display: none;
      }
      button.fc-prev-button.fc-button.fc-button-primary {
      display: none;
      }
      button.fc-next-button.fc-button.fc-button-primary{
      display: none;
      }
      @media screen and (max-width: 600px) {
      .services-container {
      width: 80%;
      }
      .announcement-container{
      width: 80%;
      }
      }
   </style>
   <body>
      <div class="top-nav-image-container position-relative" style="height: 150px; overflow: hidden;">
         <img src="<?php echo base_url('assets/img/top-nav-image.png'); ?>" alt="Top Nav" class="w-100 h-100" style="object-fit: cover;">
         <div class="position-absolute d-flex align-items-center justify-content-center justify-content-md-start px-3" style="top: 0; left: 0; right: 0; bottom: 0;">
            <img src="<?php echo base_url('assets/img/logo.png'); ?>" alt="Logo" class="img-fluid" style="max-width: 400px;">
         </div>
      </div>
      <!-- <div class="navbar" style="background-color: #05158F;">
         <img src="<?php echo base_url('assets/img/logo.png'); ?>" alt="" style=" height: 50px;">
         </div> -->
      <?php $this->load->view('template/navbar'); ?>
      <section>
         <div class="container offers-container my-4  p-0 rounded" style="max-width: 1000px; background-color:rgb(213, 213, 213);">
            <div class="baliw-offers-container p-3 " style="background-color: #05158F;">
               <h3 class="text-white text-center">Business Application Forms</h3>
            </div>
            <div class="inner-container p-4">
               <div class="form-group title">
                  BUSSINESS INFORMATION
               </div>
               <form id="applicationForm">
               <div class="form-group">
                  <label for="search">Bussiness Logo</label>
                  <input type="file" class="form-control" placeholder="Enter Name" name="bussinessLogo">
               </div>
               <div class="form-group">
                  <label for="search">Bussiness Name</label>
                  <input type="text" class="form-control" placeholder="Enter Name" name="bussinessName">
               </div>
               <div class="form-group">
                  <label for="bussinessType">Bussiness Type</label>
                  <select class="form-control" id="bussinessType" name="bussinessType">
                     <option value="">SELECT</option>
                     <option value="1">Food Place</option>
                     <option value="2">Retail Store</option>
                     <option value="3">Tourist Spot</option>
                     <option value="4">Services</option>
                  </select>
               </div>
               <div class="form-group">
                  <label for="search">Bussiness Description</label>
                  <input type="text" class="form-control" placeholder="Enter Description" name="bussinessDescription">
               </div>
               <div class="row">
                  <div class="col-md-6">
                     <div class="form-group">
                        <label for="search">Bussiness Email</label>
                        <input type="text" class="form-control" placeholder="Enter Email" name="bussinessEmail">
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group">
                        <label for="search">Phone Number</label>
                        <input type="text" class="form-control" placeholder="Enter Number" name="bussinessPhoneNumber">
                     </div>
                  </div>
               </div>
               <div class="form-group">
                  <label for="search">Address</label>
                  <input type="text" class="form-control" placeholder="Search" name="bussinessAddress">
               </div>
               <div class="form-group">
                  <label for="search">Upload Bussiness Permit</label>
                  <input type="file" class="form-control" placeholder="Search" name="bussinessPermit">
               </div>
               <hr>
               <div class="form-group title">
                  OWNER'S INFORMATION
               </div>
               <div class="form-group">
                  <label for="search">Owner</label>
                  <input type="text" class="form-control" placeholder="Enter Owner Name" name="bussinessOwner">
               </div>
               <div class="form-group">
                  <label for="search">Email</label>
                  <input type="text" class="form-control" placeholder="Enter Email" name="bussinessOwnerEmail">
               </div>
               <div class="row">
                  <div class="col-md-4">
                     <div class="form-group">
                        <label for="search">Age</label>
                        <input type="text" class="form-control" placeholder="Enter Age" name="ownerAge">
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="form-group">
                        <label for="search">Birthdate</label>
                        <input type="date" class="form-control" placeholder="Enter Birthdate" name="birthDate">
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="form-group">
                        <label for="search">Birth Place</label>
                        <input type="text" class="form-control" placeholder="Enter Birthplace" name="birthPlace">
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-4">
                     <div class="form-group">
                        <label for="search">Nationality</label>
                        <input type="text" class="form-control" placeholder="Enter Nationality" name="nationality">
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="form-group">
                        <label for="residence">Residence</label>
                        <div class="form-check form-check-inline">
                           <input class="form-check-input" type="radio" name="residence" id="residenceYes" value="yes">
                           <label class="form-check-label" for="residenceYes">Yes</label>
                        </div>
                        <div class="form-check form-check-inline">
                           <input class="form-check-input" type="radio" name="residence" id="residenceNo" value="no">
                           <label class="form-check-label" for="residenceNo">No</label>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="form-group">
                        <label for="search">Postal Code</label>
                        <input type="text" class="form-control" placeholder="Enter Postal Code" name="postalCode">
                     </div>
                  </div>
               </div>
               <div class="form-group">
                  <label for="search">Upload Valid Id</label>
                  <input type="file" class="form-control" placeholder="Enter" name="validId">
               </div>
            
               </form>
               <div class="form-group text-center">
                  <button class="btn text-white" style="background-color: #05158F;" onclick="submitApplication()">Submit Application</button>
               </div>
            </div>
         </div>
      </section>
      <?php $this->load->view('template/footer'); ?>
      <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
      <script>
       function submitApplication() {
            let form = $("#applicationForm")[0];
            let formData = new FormData(form);

            let isValid = true;
            let missingFields = [];

        
            for (let [key, value] of formData.entries()) {
                if (
                    (value instanceof File && value.size === 0) ||  
                    (typeof value === 'string' && value.trim() === '') 
                ) {
                    isValid = false;
                    missingFields.push(key);

                    $(`[name="${key}"]`).addClass('is-invalid');
                } else {
                    $(`[name="${key}"]`).removeClass('is-invalid');
                }
            }

            if (!isValid) {
                alert("Please fill in all required fields:\n" + missingFields.join(", "));
                return; 
            }

            $.ajax({
                url: '<?php echo base_url(); ?>application_form/createApplication',
                type: 'POST',
                data: formData,
                dataType: 'json',
                contentType: false,
                processData: false,
                success: function (response) {
                    let result = response.data;
                    if (response.status === 'success') {
                        alert(response.message);
                        window.location.href = "<?php echo base_url('landing'); ?>";
                    } else {
                        alert(response.message);
                    }
                }
            });
        }

      </script>

   </body>
</html>