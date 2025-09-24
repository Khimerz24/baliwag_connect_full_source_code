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
      <div class="container-fluid p-0 position-relative" style="height: 700px; overflow: hidden;">
         <img
            src="<?php echo base_url('assets/img/about_image.jpg'); ?>"
            alt="Hero Image"
            class="w-100 h-100 position-absolute top-0 start-0"
            style="object-fit: cover; object-position: center; z-index: 1;">
         <!-- Overlay Color -->
         <div class="position-absolute top-0 start-0 w-100 h-100"
            style="background-color: rgba(5, 21, 143, 0.5); z-index: 2;">
         </div>
         <div class="title-poster-container position-relative z-2 h-100 d-flex align-items-center px-2">
            <div class="container">
               <div class="row">
                  <div class="col-md-8 d-flex flex-column justify-content-center align-items-center">
                     <div class="text-center text-white">
                        <h1>ABOUT BALIWAG</h1>
                     </div>
                     <div class="text-center text-white">
                        <p class="text-white" style="font-size: 1.2rem; line-height: 1.6;">Baliwag, a progressive municipality in Bulacan, is known for its flourishing industries, skilled manpower, and rich cultural heritage. The town takes pride in popular traditions and landmarks such as the famous Baliwag Lechon, the well-loved Baliwag Transit, and the country’s longest Lenten Procession. It is also the birthplace of Mariano Ponce, a patriot, physician, and propagandist of the Philippine Revolution, and Gliceria Rustia-Tantoco, a pioneering Filipino businesswoman. With a strong commitment to food security, Baliwag dedicates 75% of its land to agriculture and upholds the principle of Serbisyong May Malasakit. Visit Baliwag and experience its beauty, history, and hospitality.</p>
                     </div>
                  </div>
                  <div class="col-md-4 d-none d-md-block">
                     <img src="<?php echo base_url('assets/img/main-logo.png'); ?>" alt="">
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   <section class="position-relative">
      <div class="bg-white text-center py-5 px-5">
         <h1 class="text-success" style="font-weight: 750">MOMMY SONIA ESTRELLA</h1>
         <h3 class="fw-bold" style="color: #05158F;">MAYOR OF BALIWAG</h3>
      </div>
      <div class="bg-success py-5"></div>
      <div style="background-color: #05158F;" class="py-5"></div>
      <img src="<?php echo base_url('assets/img/mayor.png'); ?>"
         alt="Mayor"
         class="position-absolute d-none d-md-block"
         style="bottom: 0; right: 15%; max-height: 140%; z-index: 2;">
   </section>
   <section>
      <div class="container vision-container pb-2">
         <div class="row p-4">
            <div class="col-md-6 mb-md-0 mb-4">
               <div class="emergency-contact text-white text-center p-4 h-100 rounded" style="background: linear-gradient(135deg, #0318B1, #010A4B);;">
                  <div class="rounded-circle bg-white text-dark d-flex justify-content-center align-items-center mx-auto mb-3" style="width: 60px; height: 60px;">
                     <i class="fas fa-eye"></i>
                  </div>
                  <h5 class="mb-2 text-white">VISION</h5>
                  <p class="text-white" style="font-size: 1.2rem; line-height: 1.6;">Baliwag envisions itself as a progressive and culturally vibrant city — a hub for trade, commerce, education, and technological advancement — where empowered, God-centered, and healthy citizens thrive in a sustainable environment. Through proactive and transparent governance, Baliwag promotes e-governance, inclusive growth, and strong community engagement supported by digital innovations like centralized platforms for events and business services.</p>
               </div>
            </div>
            <div class="col-md-6 mb-md-0 mb-4">
               <!-- <div class="emergency-hotline p-4" style="background-color: #05158F; border-radius: 10px 10px 0 0;">
                     <h5 class="mb-0 text-white text-center">Emergency Hotlines</h5>
                     </div> -->
               <div class="emergency-contact text-white text-center p-4 h-100 " style="background: linear-gradient(135deg, #0318B1, #010A4B);">
                  <div class="rounded-circle bg-white text-dark d-flex justify-content-center align-items-center mx-auto mb-3" style="width: 60px; height: 60px;">
                     <i class="fas fa-book-open"></i>
                  </div>
                  <h5 class="mb-2 text-white">MISSION</h5>
                 <p class="text-white" style="font-size: 1.2rem; line-height: 1.6;">The City Government of Baliwag is committed to implementing innovative and responsive programs that foster a fully functional e-government, promote local economic development, and encourage active civic participation. Through tools such as centralized digital platforms for event management and business directories, Baliwag aims to support small enterprises, improve access to services, and strengthen the sense of community while upholding professionalism, sustainability, and excellence in public service.</p>
               </div>
            </div>
         </div>
      </div>
   </section>
   <?php $this->load->view('template/feedback'); ?>
    <?php $this->load->view('template/emergency_hotline'); ?>
   <?php $this->load->view('template/footer'); ?>
   <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
   <script>
      $('.month-card').click(function() {
         const month = $(this).text();
         alert("cliked " + month);
      });
   </script>
</body>

</html>