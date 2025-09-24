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
   <link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/img/main-logo.png">
   <title>Home - Baliwag Connect</title>
</head>
<style>
   * {
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

   .social-media {
      transition: transform 0.5s ease-in-out;
   }

   .social-media:hover {
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

   button.fc-next-button.fc-button.fc-button-primary {
      display: none;
   }

   @media screen and (max-width: 600px) {
      .services-container {
         width: 80%;
      }

      .announcement-container {
         width: 80%;
      }
   }
</style>

<body>
   <div class="top-nav-image-container position-relative" style="height: 150px; overflow: hidden;">
      <a href="<?php echo base_url() ?>landing">
         <img src="<?php echo base_url('assets/img/top-nav-image.png'); ?>" alt="Top Nav" class="w-100 h-100" style="object-fit: cover;">
         <div class="position-absolute d-flex align-items-center justify-content-center justify-content-md-start px-3" style="top: 0; left: 0; right: 0; bottom: 0;">
            <img src="<?php echo base_url('assets/img/logo.png'); ?>" alt="Logo" class="img-fluid" style="max-width: 400px;">
         </div>
      </a>
   </div>
   <!-- <div class="navbar" style="background-color: #05158F;">
         <img src="<?php echo base_url('assets/img/logo.png'); ?>" alt="" style=" height: 50px;">
         </div> -->
   <?php $this->load->view('template/navbar'); ?>
   <section>
      <!-- <div class="baliw-offers-container p-3 mt-4" style="background-color: #05158F;"> -->
      <div class="baliw-offers-container p-3 mt-4" style="background: linear-gradient(135deg, #0318B1, #5AC855);">
         <h3 class="text-center text-white">BUSINESSES</h3>
      </div>

      <div class="row justify-content-center justify-content-md-end pt-4" style="max-width: 1300px;">
         <div class="col-md-4 text-left position-relative">
            <input type="text" id="searchBusiness" class="form-control" placeholder="Search Business...">
            <div id="suggestions" class="list-group position-absolute w-100" style="z-index:1000;"></div>
         </div>

         <div class="col-md-2 text-left">
            <select class="form-control" name="options" id="options">
               <option value="" selected disabled>Select Business</option>
               <option value="1">Food Place</option>
               <option value="2">Retail Store</option>
               <option value="3">Tourist Spot</option>
               <option value="4">Services</option>
               <option value="5">All</option>
            </select>
         </div>
         <div class="col-auto">
            <button class="btn text-white" onclick="options()" style="background-color: #05158F;">Search</button>
         </div>
      </div>
      <div class="business-container mx-auto" style="max-width: 1300px;"></div>
   </section>
   <hr>
   <?php $this->load->view('template/feedback'); ?>
    <?php $this->load->view('template/emergency_hotline'); ?>
   <pre>
         <?php print_r($typeFromAnotherPage); ?>
      </pre>
   <input type="hidden" id="idFromIndex" value="<?php echo ($typeFromAnotherPage); ?>">
   <?php $this->load->view('template/footer'); ?>
   <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
   <script>
      $(document).ready(function() {
         $('#options').val(5);
         let button = $('#options').val();
         let idFromIndex = $('#idFromIndex').val();

         options(button, idFromIndex);
         
          $('#searchBusiness').on('keyup', function () {
         let query = $(this).val();
         if (query.length >= 2) {
            $.ajax({
               url: "<?php echo base_url('Landing/searchBusiness'); ?>", 
               method: "POST",
               data: { search: query },
               dataType: "json",
               success: function (response) {
                  let suggestions = $("#suggestions");
                  suggestions.empty();

                  if (response.data.length > 0) {
                     $.each(response.data, function (i, item) {
                        suggestions.append(`
                           <a href="javascript:void(0)" 
                              class="list-group-item list-group-item-action"
                              onclick="selectBusiness(${item.id}, '${item.bussiness_name}')">
                              ${item.bussiness_name}
                           </a>
                        `);
                     });
                  } else {
                     suggestions.append(`<div class="list-group-item">No results</div>`);
                  }
               }
            });
         } else {
            $("#suggestions").empty();
         }
      });
      });

    function selectBusiness(id, name) {
       $("#searchBusiness").val(name);
       $("#suggestions").empty();
       viewInformation(id);
    }

      function options(button, idFromIndex) {
         console.log(button);
         const base_url = "<?php echo base_url(); ?>";
         let options = $('#options').val();

         $.ajax({
            url: '<?php echo base_url('Landing/getCommonBussiness'); ?>',
            method: 'POST',
            data: {
               category: options,
               idFromIndex: idFromIndex
            },
            dataType: 'JSON',
            success: function(response) {
                  let data = response.data;
                  console.log(data);

                  $('.business-container').empty();

                  let row = $('<div class="row g-4 justify-content-center"></div>');

                  if (data.length > 0) {
                     $.each(data, function(index, item) {
                        let html = `
                               <div class="col-md-3 pt-3 d-flex justify-content-center ">
                                 <div class="card h-100" style="width: 16rem;">
                                    <div class="d-flex justify-content-center mt-3">
                                    
                                          <img src="${base_url + item.bussiness_logo_path}" 
                                             alt="${item.bussiness_name}" 
                                             class="rounded-circle" 
                                             style="width: 100px; height: 100px; object-fit: contain;">
                                    </div>
                                    <div class="card-body">
                                          <h5 class="card-title font-weight-bold mb-3">${item.bussiness_name}</h5>
                                          <p class="card-text">${item.bussiness_description}</p>
                                    </div>

                                    <div class="card-footer text-center">
                                          <a href="javascript:void(0)" 
                                             onclick="viewInformation(${item.id})" 
                                             class="card-link" 
                                             style="color:#05158F; font-weight:500;">
                                             View Info
                                          </a>
                                    </div>
                                 </div>
                              </div>
                        `;
                        row.append(html);
                     });
                  } else {

                     row.append(`
                        <div class="col-12 text-center py-5">
                              <h5>No result found</h5>
                        </div>
                     `);
                  }

               $('.business-container').append(row);
                 
               }
         })

      }

      function viewInformation(id) {
         window.location.href = "<?php echo base_url('Landing/viewBusinessInformation/'); ?>" + id;
      }
   </script>
</body>

</html>

<!-- <div class="container offers-container pt-4">
   <div class="row">
      <div class="col-md-4 d-flex justify-content-center p-4">
         <img class="thick-blue-border" style="max-width: 100%;" src="${base_url  + item.bussiness_logo_path}" alt="">
      </div>
      <div class="col-md-8 p-4">
         <div class="title">
         <h3 class="text-center text-md-left">${item.bussiness_name}</h3>
         </div>
         <div class="info">
         <p class="text-center text-md-left">${item.bussiness_description}</p>
         </div>
         <div class="info d-flex justify-content-center">
         <button class="btn text-white text-center" style="background-color: #05158F;" onclick="viewInformation(${item.id})">View Information</button>
         </div>
      </div>
   </div>
</div> -->