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
    <link
        href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100..900;1,100..900&family=Style+Script&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Raleway:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100..900;1,100..900&family=Style+Script&display=swap"
        rel="stylesheet">
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
            <img src="<?php echo base_url('assets/img/top-nav-image.png'); ?>" alt="Top Nav" class="w-100 h-100"
                style="object-fit: cover;">
            <div class="position-absolute d-flex align-items-center justify-content-center justify-content-md-start px-3"
                style="top: 0; left: 0; right: 0; bottom: 0;">
                <img src="<?php echo base_url('assets/img/logo.png'); ?>" alt="Logo" class="img-fluid"
                    style="max-width: 400px;">
            </div>
        </a>
    </div>
    <!-- <div class="navbar" style="background-color: #05158F;">
         <img src="<?php echo base_url('assets/img/logo.png'); ?>" alt="" style=" height: 50px;">
         </div> -->
    <?php $this->load->view('template/navbar'); ?>
    <section>
        <div class="container-fluid p-0 position-relative" style="height: 350px; overflow: hidden;">
            <img src="<?php echo base_url('assets/img/bussiness_application_image.jpg'); ?>" alt="Hero Image"
                class="w-100 h-100 position-absolute top-0 start-0"
                style="object-fit: cover; object-position: top-top-center; z-index: 1;">
            <!-- Overlay Color -->
            <div class="position-absolute top-0 start-0 w-100 h-100"
                style="background-color: rgba(5, 21, 143, 0.5); z-index: 2;">
            </div>
            <div class="title-poster-container position-relative z-2 h-100 d-flex align-items-center">
                <div class="container">
                    <div class="text-center text-white">
                        <h1>Event Application</h1>
                        <p class="text-white">After signing in, you can submit your own
                            event and we’ll happily review it for inclusion.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="bg-application-container " style="background-color:rgb(224, 224, 224);padding: 100px;">
            <!-- <div class="application-form_container  d-flex justify-content-center pb-4" >
               <a href="<?php echo base_url('application_form'); ?>" class="text-decoration-none w-100" style="max-width: 600px;">
                  <div class="d-flex align-items-center shadow-sm rounded overflow-hidden">
                     <div class="bg-success d-flex justify-content-center align-items-center"
                        style="width: 70px; height: 80px;">
                        <i class="fas fa-folder fa-lg text-white"></i>
                     </div>
                     <div class="text-white px-3 py-3 flex-grow-1" style="background-color: #05158F;">
                        <h6 class="mb-1 fw-bold">Business Application Form</h6>
                        <small class="text-white">Please click the icon to fill up</small>
                     </div>
                  </div>
               </a>
            </div> -->
            <div class="application-form_container  d-flex justify-content-center">
                <a href="<?php echo base_url('event_application_form'); ?>" class="text-decoration-none w-100"
                    style="max-width: 600px;">
                    <div class="d-flex align-items-center shadow-sm rounded overflow-hidden">
                        <div class="bg-success d-flex justify-content-center align-items-center"
                            style="width: 70px; height: 80px;">
                            <i class="fas fa-folder fa-lg text-white"></i>
                        </div>
                        <div class="text-white px-3 py-3 flex-grow-1" style="background-color: #1C2FB8;">
                            <h6 class="mb-1 fw-bold">Event Application Form</h6>
                            <small class="text-white">Please click the icon to fill out</small>
                        </div>
                    </div>
                </a>
            </div>
        </div>

    </section>
    <div class="container mt-4">
        <?php $this->load->view('template/feedback'); ?>
    </div>
  
  <div class="container mt-4">
        <?php $this->load->view('template/emergency_hotline'); ?>
    </div>
    <?php $this->load->view('template/footer'); ?>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
    <script>
        $('.month-card').click(function () {
            const month = $(this).text();
            alert("cliked " + month);
        });
    </script>
    <!-- <script>  
         $(function () {
           var calendarEl = $('#calendar');
         
           var calendar = new FullCalendar.Calendar(calendarEl, {
             initialView: 'dayGridMonth',
             height: 'auto',
             headerToolbar: {
               left: 'prev,next today',
               center: 'title',
               right: 'dayGridMonth,timeGridWeek,timeGridDay'
             },
             events: [
               {
                 title: 'Event 1',
                 start: '2025-07-13',
                 backgroundColor: '#007bff',
                 borderColor: '#007bff'
               },
               {
                 title: 'Event 2',
                 start: '2025-07-15',
                 end: '2025-07-17',
                 backgroundColor: '#28a745',
                 borderColor: '#28a745'
               }
             ]
           });
         
           calendar.render();
         });
         </script> -->
</body>

</html>