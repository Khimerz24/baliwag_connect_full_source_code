<ul class="navbar-nav  sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color: #62CA23 !important">
   <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
      <div class="sidebar-brand-text mx-3">Baliwag Connect</div>
   </a>
   <!-- <?php echo $usergroup; ?> -->
   <hr class="sidebar-divider my-0">
   <?php if ($usergroup == 1) { ?>
      <li class="nav-item <?php echo ($this->uri->segment(1) == '' || $this->uri->segment(1) == 'dashboard') ? 'active' : ''; ?>">
         <a class="nav-link" href="<?php echo base_url(); ?>dashboard">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
         </a>
      </li>
      <!--<li class="nav-item <?php echo ($this->uri->segment(1) == 'upcoming_event') ? 'active' : ''; ?>">-->
      <!--   <a class="nav-link" href="<?php echo base_url(); ?>upcoming_event">-->
      <!--      <i class="fas fa-fw fa-table"></i>-->
      <!--      <span>Event Calendar</span></a>-->
      <!--</li>-->
      <li class="nav-item <?php echo ($this->uri->segment(1) == 'business_directory') ? 'active' : ''; ?>">
         <a class="nav-link" href="<?php echo base_url(); ?>business_directory">
            <i class="fas fa-fw fa-briefcase"></i>
            <span>Business Directory</span>
         </a>
      </li>
      <li class="nav-item <?php echo ($this->uri->segment(1) == 'event') ? 'active' : ''; ?>">
         <a class="nav-link" href="<?php echo base_url(); ?>event">
            <i class="fas fa-fw fa-briefcase"></i>
            <span>Event Management</span>
         </a>
      </li>
      <li class="nav-item <?php echo ($this->uri->segment(1) == 'event_applicants') ? 'active' : ''; ?>">
         <a class="nav-link" href="<?php echo base_url(); ?>event_applicants">
            <i class="fas fa-fw fa-user-plus"></i>
            <span>Event Applicants</span>
         </a>
      </li>
      <li class="nav-item <?php echo ($this->uri->segment(1) == 'announcements') ? 'active' : ''; ?>">
         <a class="nav-link" href="<?php echo base_url(); ?>announcements">
            <i class="fas fa-fw fa-bullhorn"></i>
            <span>Announcement</span>
         </a>
      </li>
      <li class="nav-item <?php echo ($this->uri->segment(1) == 'feedback') ? 'active' : ''; ?>">
         <a class="nav-link" href="<?php echo base_url(); ?>feedback">
            <i class="fas fa-fw fa-comment"></i>
            <span>Feedback</span>
         </a>
      </li>
      <li class="nav-item <?php echo ($this->uri->segment(1) == 'contact') ? 'active' : ''; ?>">
         <a class="nav-link" href="<?php echo base_url(); ?>contact">
            <i class="fas fa-fw fa-address-book"></i>
            <span>Contact Us</span>
         </a>
      </li>
      <li class="nav-item <?php echo ($this->uri->segment(1) == 'faqs') ? 'active' : ''; ?>">
         <a class="nav-link" href="<?php echo base_url(); ?>faqs">
            <i class="fas fa-fw fa-question-circle"></i>
            <span>FAQs</span>
         </a>
      </li>
      <li class="nav-item <?php echo ($this->uri->segment(1) == 'user') ? 'active' : ''; ?>">
         <a class="nav-link" href="<?php echo base_url(); ?>user">
            <i class="fas fa-fw fa-user"></i>
            <span>User Log</span>
         </a>
      </li>
      <li class="nav-item <?php echo ($this->uri->segment(1) == 'profile_information') ? 'active' : ''; ?>">
         <a class="nav-link" href="<?php echo base_url(); ?>profile_information">
            <i class="fas fa-fw fa-cog"></i>
            <span>Profile</span>
         </a>
      </li>
   <?php } else if ($usergroup == 2) { ?>
      <li class="nav-item <?php echo ($this->uri->segment(1) == 'upcoming_event') ? 'active' : ''; ?>">
         <a class="nav-link" href="<?php echo base_url(); ?>upcoming_event">
            <i class="fas fa-fw fa-table"></i>
            <span>Event</span></a>
      </li>
      <li class="nav-item <?php echo ($this->uri->segment(1) == 'event') ? 'active' : ''; ?>">
         <a class="nav-link" href="<?php echo base_url(); ?>event">
            <i class="fas fa-fw fa-briefcase"></i>
            <span>Event Management</span>
         </a>
      </li>
      <li class="nav-item <?php echo ($this->uri->segment(1) == 'announcements') ? 'active' : ''; ?>">
         <a class="nav-link" href="<?php echo base_url(); ?>announcements">
            <i class="fas fa-fw fa-bullhorn"></i>
            <span>Announcement</span>
         </a>
      </li>
      <li class="nav-item <?php echo ($this->uri->segment(1) == 'feedback') ? 'active' : ''; ?>">
         <a class="nav-link" href="<?php echo base_url(); ?>feedback">
            <i class="fas fa-fw fa-comment"></i>
            <span>Feedback</span>
         </a>
      </li>
      <li class="nav-item <?php echo ($this->uri->segment(1) == 'contact') ? 'active' : ''; ?>">
         <a class="nav-link" href="<?php echo base_url(); ?>contact">
            <i class="fas fa-fw fa-address-book"></i>
            <span>Contact Us</span>
         </a>
      </li>
      <li class="nav-item <?php echo ($this->uri->segment(1) == 'faqs') ? 'active' : ''; ?>">
         <a class="nav-link" href="<?php echo base_url(); ?>faqs">
            <i class="fas fa-fw fa-question-circle"></i>
            <span>FAQ</span>
         </a>
      </li>
   <?php } else if ($usergroup == 3) { ?>

      <li class="nav-item <?php echo ($this->uri->segment(1) == 'business_directory') ? 'active' : ''; ?>">
         <a class="nav-link" href="<?php echo base_url(); ?>business_directory">
            <i class="fas fa-fw fa-briefcase"></i>
            <span>Business Management</span>
         </a>
      </li>
   <?php } ?>
   <!-- <li class="nav-item">
      <a class="nav-link" href="tables.html">
          <i class="fas fa-fw fa-sign-out-alt"></i>
          <span>Logout</span></a>
      </li> -->
   <hr class="sidebar-divider d-none d-md-block">
   <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
   </div>
</ul>