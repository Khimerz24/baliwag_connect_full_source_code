<style>
   .navbar-nav .nav-link {
      color: white !important;
      transition: color 0.3s ease, background-color 0.3s ease;
      border-radius: 5px;
   }

   .navbar-nav .nav-link:hover {
      color: #0318B1 !important;
      background-color: rgba(255, 255, 255, 0.2);
   }
</style>
<nav class="navbar navbar-expand-lg navbar-light py-2" style="background-color: #05158F;">
   <div class="container-fluid">

      <a class="navbar-brand p-0" href="<?php echo base_url() ?>landing">
         <img src="<?php echo base_url('assets/img/logo.png'); ?>" alt="Logo" style="height: 50px;">
      </a>

      <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
         aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation"
         style="background-color: white;">
         <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNavDropdown">
         <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
               <a class="nav-link text-white py-2" href="<?php echo base_url() ?>landing">Home</a>
            </li>
            <li class="nav-item">
               <a class="nav-link text-white py-2" href="<?php echo base_url() ?>landing/event">Event List</a>
            </li>
            <li class="nav-item">
               <a class="nav-link text-white py-3" href="<?php echo base_url() ?>landing/common_bussiness">Business
                  Directory</a>
            </li>
            <li class="nav-item">
               <a class="nav-link text-white py-2" href="<?php echo base_url() ?>landing/announcement">Announcements</a>
            </li>
            <li class="nav-item">
               <a class="nav-link text-white py-3" href="<?php echo base_url() ?>landing/bussiness_application">Event
                  Application</a>
            </li>
            <li class="nav-item">
               <a class="nav-link text-white py-2" href="<?php echo base_url() ?>landing/about">About Us</a>
            </li>
            <li class="nav-item">
               <a class="nav-link text-white py-2" href="<?php echo base_url() ?>landing/faqs">FAQs</a>
            </li>
            <li class="nav-item">
               <a class="nav-link text-white py-2" href="<?php echo base_url() ?>landing/contact">Contact Us</a>
            </li>
            <!-- <li class="nav-item">
               <a class="nav-link text-white py-3" href="#feedback">Feedback</a>
            </li> -->
            <li class="nav-item">
               <?php if (!$user_id): ?>
               <a class="nav-link text-white py-2" href="<?php echo base_url() ?>login">Login</a>
               <?php else: ?>
               <a class="nav-link text-white py-3" href="<?php echo base_url() ?>logout/logoutSessionsWeb">Logout</a>
               <?php endif; ?>
            </li>
         </ul>
      </div>
   </div>
</nav>