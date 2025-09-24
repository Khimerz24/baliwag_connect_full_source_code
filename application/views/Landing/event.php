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
      <img src="<?php echo base_url('assets/img/top-nav-image.png'); ?>" alt="Top Nav" class="w-100 h-100" style="object-fit: cover;">
      <div class="position-absolute d-flex align-items-center justify-content-center justify-content-md-start px-3" style="top: 0; left: 0; right: 0; bottom: 0;">
         <img src="<?php echo base_url('assets/img/logo.png'); ?>" alt="Logo" class="img-fluid" style="max-width: 400px;">
      </div>
   </div>
   <?php $this->load->view('template/navbar'); ?>
   <section>
      <div class="baliw-offers-container p-3 mt-4" style="background: linear-gradient(135deg, #05158F, #28a745);">
         <h3 class="text-center text-white">LIST OF EVENTS IN BALIWAG</h3>
      </div>

    <div class="row justify-content-center justify-content-md-end pt-4" style="max-width: 1300px;">
         <div class="col-md-4 text-left position-relative">
            <input type="text" id="searchEvent" class="form-control" placeholder="Search Event...">
            <div id="eventSuggestions" class="list-group position-absolute w-100" style="z-index:1000;"></div>
         </div>
         <div class="col-md-2 text-left">
            <select class="form-control" name="options" id="options">
               <option value="" selected disabled>Select Options</option>
               <option value="0">Non - Joinable</option>
               <option value="1">Joinable</option>
               <option value="2">All</option>
            </select>
         </div>
         <div class="col-auto">
            <button class="btn text-white" onclick="options()" style="background-color: #05158F;">Search</button>
         </div>
      </div>
   
    <div class="event-container mx-auto" style="max-width: 1300px;">

   </div>
      
   </section>
   <hr>
   <?php $this->load->view('template/feedback'); ?>
    <?php $this->load->view('template/emergency_hotline'); ?>
   <?php $this->load->view('template/footer'); ?>
   <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
   <script>
      $(document).ready(function() {
         $('#options').val(2);
         let button = $('#options').val();
         options(button);
         
          $('#searchEvent').on('keyup', function () {
            let query = $(this).val();
            if (query.length >= 2) {
               $.ajax({
                  url: "<?php echo base_url('Landing/searchEvent'); ?>", 
                  method: "POST",
                  data: { search: query },
                  dataType: "json",
                  success: function (response) {
                     let suggestions = $("#eventSuggestions");
                     suggestions.empty();

                     if (response.data.length > 0) {
                        $.each(response.data, function (i, item) {
                           suggestions.append(`
                              <a href="javascript:void(0)" 
                                 class="list-group-item list-group-item-action"
                                 onclick="selectEvent(${item.id}, '${item.event_name}')">
                                 ${item.event_name}
                              </a>
                           `);
                        });
                     } else {
                        suggestions.append(`<div class="list-group-item">No results</div>`);
                     }
                  }
               });
            } else {
               $("#eventSuggestions").empty();
            }
         });
      })
      
        function selectEvent(id, name) {
         $("#searchEvent").val(name);
         $("#eventSuggestions").empty();
         viewDetails(id);
      }

      function options(button) {
         console.log(button);
         const base_url = "<?php echo base_url(); ?>";
         let options = $('#options').val();

         $.ajax({
            url: '<?php echo base_url('Landing/getEvents'); ?>',
            method: 'POST',
            data: {
               options: options
            },
            dataType: 'JSON',
            success: function(response) {
               let data = response.data;

               $('.event-container').empty();

               let row = $('<div class="row g-4"></div>');

               if (data.length > 0) {
               
                  $.each(data, function(index, item) {
                        let joinable = item.joinable;
                        let joinButton = '';
                        if (joinable == 1) {
                           joinButton = `
                                 
  <a href="<?= base_url('event_applicant_form') ?>/${item.id}"
                                    class="btn rounded-pill px-4 mr-2"
                                    style="background-color: #05158F; border-color: #05158F; color: white; transition: all 0.2s ease; position: relative;"
                                    onmouseover="this.style.transform='translateY(-1px)'; this.style.boxShadow='0 4px 12px rgba(0, 0, 0, 0.15)'; this.querySelector('span').style.transform='translateX(2px)';"
                                    onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='none'; this.querySelector('span').style.transform='translateX(0)';">
                                        Join Event 
                                    
                              `;
                        }

                        let html = `<div class="col-md-3 mb-4 d-flex">
    <div class="card shadow-sm h-100 w-100 d-flex flex-column">
        <div class="d-flex justify-content-center p-3">
            <img src="${base_url + item.event_logo}" alt="${item.event_name}" class="rounded-circle"
                style="width: 120px; height: 120px; object-fit: contain; border: 3px solid #05158F; background-color: #fff;">
        </div>
        <div class="card-body flex-grow-1">
            <h5 class="card-title font-weight-bold text-center">${item.event_name}</h5>
            <p class="card-text">${item.event_description}</p>
            <small class="card-text d-block">📅️: ${new Date(item.event_date).toLocaleDateString('en-US', { month:
                'long', day: 'numeric', year: 'numeric' })}</small>
            <small class="card-text d-block">📍: ${item.event_address}</small>
        </div>
        <div class="card-footer bg-transparent border-top-0 text-center pb-3">
            <div class="d-flex justify-content-center align-items-center gap-2">
                ${joinButton}
                <a href="javascript:void(0);" class="btn btn-outline-secondary rounded-pill px-4"
                    style="transition: all 0.2s ease;"
                    onmouseover="this.style.transform='translateY(-1px)'; this.style.boxShadow='0 4px 12px rgba(0, 0, 0, 0.1)';"
                    onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='none';"
                    onclick="viewDetails(${item.id})">
                    View Details
                </a>
            </div>
        </div>
        </div>
        </div>`;
                        row.append(html);
                  });
               } else {
            
                  row.append(`
                        <div class="col-12 text-center py-5">
                           <h5>No events found</h5>
                        </div>
                  `);
               }

            
               $('.event-container').append(row);
            }

         })

      }

      function viewDetails(id) {

         window.location.href = "<?php echo base_url('Landing/viewEventDetails/'); ?>" + id;

      }
   </script>
</body>

</html>
<!-- <div class="col-md-3 pt-3">
                              <div class="card mb-3" style="max-width: 540px;">
                              <div class="row no-gutters">
                                 <div class="col-md-4">
                              <img src="${base_url + item.event_logo}" alt="..." class="img-fluid" style="object-fit: cover; width: 100%; height: 100px;">
                              </div>

                                 <div class="col-md-8">
                                    <div class="card-body">
                                    <hb class="card-title"><b>${item.event_name}</b></h5>
                                    <p class="card-text">${item.event_description}</p>
                                       <small class="card-text">  ${new Date(item.event_date).toLocaleDateString('en-US', { 
                                                                                    month: 'long', day: 'numeric', year: 'numeric' 
                                                                                 })}</small>
                                       <small class="card-text"> ${item.event_address}</small>
                                 <div class="info d-flex justify-content-center flex-wrap">
                              ${joinButton}
                              <small class="pt-4"> 
                              <a href="javascript:void(0);" 
                                 class="ml-2" 
                                 style="color: #05158F; text-decoration: none;" 
                                 onclick="viewDetails(${item.id});">
                                 View Details
                              </a>
                              </small>
                              </div>


                                    </div>
                                 </div>
                              </div>
                              </div>
                           </div> -->



<!-- <div class="info d-flex justify-content-center">
      ${joinButton}
      &nbsp;
      <button class="btn text-white text-center" style="background-color: #05158F;" onclick="viewDetails(${item.id});">View Details</button>
</div> -->


<!-- <div class="card h-100">
                                    <div class="row g-0 align-items-center">
                                       <div class="col-md-4 d-flex justify-content-center">
                                          <img src="${base_url + item.event_logo}" 
                                                alt="Event Logo" 
                                                class="img-fluid rounded-start" 
                                                style="max-height:100px; object-fit:contain;">
                                       </div>
                                       <div class="col-md-8">
                                          <div class="card-body">
                                                <h5 class="card-title">${item.event_name}</h5>
                                                <p class="card-text">Description: ${item.event_description}</p>
                                                <p class="card-text">When: 
                                                   ${new Date(item.event_date).toLocaleDateString('en-US', { 
                                                      month: 'long', day: 'numeric', year: 'numeric' 
                                                   })}
                                                </p>
                                                <p class="card-text">Where: ${item.event_address}</p>
                                                <div class="info d-flex justify-content-center flex-wrap">
                                                   ${joinButton}
                                                   <button class="btn text-white text-center ml-2" 
                                                         style="background-color: #05158F;" 
                                                         onclick="viewDetails(${item.id});">
                                                      View Details
                                                   </button>
                                                </div>
                                          </div>
                                       </div>
                                    </div>
                              </div> -->