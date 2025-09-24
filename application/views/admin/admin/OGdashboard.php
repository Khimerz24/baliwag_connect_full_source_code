<?php $this->load->view('template/head'); ?>

<body id="page-top">
   <!-- Page Wrapper -->
   <div id="wrapper">
      <?php $this->load->view('template/sidebar'); ?>
      <div id="content-wrapper" class="d-flex flex-column">
         <!-- Main Content -->
         <div id="content">
            <?php $this->load->view('template/header'); ?>
            <!-- End of Topbar -->
            <!-- Begin Page Content -->
            <div class="container-fluid">
               <!-- Content Row -->
               <div class="row">
                  <!-- Earnings (Monthly) Card Example -->
                  <div class="col-xl-3 col-md-6 mb-4">
                     <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                           <div class="row no-gutters align-items-center">
                              <div class="col mr-2">
                                 <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Events</div>
                                 <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                       <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                          <?php echo $businessTotal->total; ?>
                                       </div>
                                    </div>
                                    <div class="col">
                                       <div class="progress progress-sm mr-2">
                                          <div class="progress-bar bg-primary" role="progressbar"
                                             style="width: <?php echo $businessTotal->total; ?>%"
                                             aria-valuenow="<?php echo $businessTotal->total; ?>"
                                             aria-valuemin="0"
                                             aria-valuemax="100">
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-auto">
                                 <i class="fas fa-building fa-2x text-gray-300"></i>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- Earnings (Monthly) Card Example -->
                  <div class="col-xl-3 col-md-6 mb-4">
                     <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                           <div class="row no-gutters align-items-center">
                              <div class="col mr-2">
                                 <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Pending Events</div>
                                 <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                       <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $pendingTotal->totalPending; ?></div>
                                    </div>
                                    <div class="col">
                                       <div class="progress progress-sm mr-2">
                                          <div class="progress-bar bg-success" role="progressbar"
                                             style="width: <?php echo $pendingTotal->totalPending; ?>%"
                                             aria-valuenow="<?php echo $pendingTotal->totalPending; ?>"
                                             aria-valuemin="0"
                                             aria-valuemax="100">
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-auto">
                                 <i class="fas fa-clock fa-2x text-gray-300"></i>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- Earnings (Monthly) Card Example -->
                  <div class="col-xl-3 col-md-6 mb-4">
                     <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body">
                           <div class="row no-gutters align-items-center">
                              <div class="col mr-2">
                                 <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Approved Events
                                 </div>
                                 <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                       <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $approvedTotal->totalApproved; ?></div>
                                    </div>
                                    <div class="col">
                                       <div class="progress progress-sm mr-2">
                                          <div class="progress-bar bg-info" role="progressbar"
                                             style="width: <?php echo $approvedTotal->totalApproved; ?>%"
                                             aria-valuenow="<?php echo $approvedTotal->totalApproved; ?>"
                                             aria-valuemin="0"
                                             aria-valuemax="100">
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-auto">
                                 <i class="fas fa-check-circle fa-2x text-gray-300"></i>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- Pending Requests Card Example -->
                  <div class="col-xl-3 col-md-6 mb-4">
                     <div class="card border-left-warning shadow h-100 py-2">
                        <div class="card-body">
                           <div class="row no-gutters align-items-center">
                              <div class="col mr-2">
                                 <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Rejected Events</div>
                                 <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                       <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                          <?php echo $rejectedTotal->totalRejected; ?>
                                       </div>
                                    </div>
                                    <div class="col">
                                       <div class="progress progress-sm mr-2">
                                          <div class="progress-bar bg-warning" role="progressbar"
                                             style="width: <?php echo $rejectedTotal->totalRejected; ?>%"
                                             aria-valuenow="<?php echo $rejectedTotal->totalRejected; ?>"
                                             aria-valuemin="0"
                                             aria-valuemax="100">
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-auto">
                                 <i class="fas fa-times-circle fa-2x text-gray-300"></i>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-3 col-md-6 mb-4">
                     <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body">
                           <div class="row no-gutters align-items-center">
                              <div class="col mr-2">
                                 <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Approved Events
                                 </div>
                                 <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                       <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $eventsTotal->totalEvents; ?></div>
                                    </div>
                                    <div class="col">
                                       <div class="progress progress-sm mr-2">
                                          <div class="progress-bar bg-info" role="progressbar"
                                             style="width: <?php echo $eventsTotal->totalEvents; ?>%"
                                             aria-valuenow="<?php echo $eventsTotal->totalEvents; ?>"
                                             aria-valuemin="0"
                                             aria-valuemax="infinite">
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-auto">
                                 <i class="fas fa-check-circle fa-2x text-gray-300"></i>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- Content Row -->
               <div class="row">
                  <!-- Area Chart -->
                  <div class="col-xl-12 col-lg-7">
                     <div class="card shadow mb-4">
                        <div class="card-header py-3">
                           <h6 class="m-0 font-weight-bold text-primary">Business Categories</h6>
                        </div>
                        <div class="card-body">
                           <h4 class="small font-weight-bold">
                              Retail
                              <span class="float-right">
                                 <?php echo $retailTotal->totalRetail; ?>%
                              </span>
                           </h4>
                           <div class="progress mb-4">
                              <div class="progress-bar bg-danger"
                                 role="progressbar"
                                 style="width: <?php echo $retailTotal->totalRetail; ?>%;"
                                 aria-valuenow="<?php echo $retailTotal->totalRetail; ?>"
                                 aria-valuemin="0"
                                 aria-valuemax="100">
                              </div>
                           </div>
                           <h4 class="small font-weight-bold">
                              Food & Beverages
                              <span class="float-right"><?php echo $foodTotal->totalFood; ?>%</span>
                           </h4>
                           <div class="progress mb-4">
                              <div class="progress-bar bg-warning"
                                 role="progressbar"
                                 style="width: <?php echo $foodTotal->totalFood; ?>%;"
                                 aria-valuenow="<?php echo $foodTotal->totalFood; ?>"
                                 aria-valuemin="0"
                                 aria-valuemax="100">
                              </div>
                           </div>
                           <h4 class="small font-weight-bold">
                              Services
                              <span class="float-right"><?php echo $serviceTotal->totalService; ?>%</span>
                           </h4>
                           <div class="progress mb-4">
                              <div class="progress-bar bg-success"
                                 role="progressbar"
                                 style="width: <?php echo $serviceTotal->totalService; ?>%;"
                                 aria-valuenow="<?php echo $serviceTotal->totalService; ?>"
                                 aria-valuemin="0"
                                 aria-valuemax="100">
                              </div>
                           </div>
                           <h4 class="small font-weight-bold">
                              Tourist
                              <span class="float-right"><?php echo $touristTotal->totalTourist; ?>%</span>
                           </h4>
                           <div class="progress mb-4">
                              <div class="progress-bar bg-info"
                                 role="progressbar"
                                 style="width: <?php echo $touristTotal->totalTourist; ?>%;"
                                 aria-valuenow="<?php echo $touristTotal->totalTourist; ?>"
                                 aria-valuemin="0"
                                 aria-valuemax="100">
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="card-body">
                        <div class="chart-area">
                           <canvas id="myAreaChart"></canvas>
                        </div>
                     </div>
                  </div>
                  <!-- <div class="card shadow mb-4">
                     <div
                         class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                         <h6 class="m-0 font-weight-bold text-primary">Business Applications</h6>
                         <div class="dropdown no-arrow">
                             <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                 data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                 <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                             </a>
                             <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                 aria-labelledby="dropdownMenuLink">
                                 <div class="dropdown-header">Dropdown Header:</div>
                                 <a class="dropdown-item" href="#">Action</a>
                                 <a class="dropdown-item" href="#">Another action</a>
                                 <div class="dropdown-divider"></div>
                                 <a class="dropdown-item" href="#">Something else here</a>
                             </div>
                         </div>
                     </div>
                     
                     <div class="card-body">
                         <div class="chart-pie pt-4 pb-2">
                             <canvas id="myPieChart"></canvas>
                         </div>
                         <div class="mt-4 text-center small">
                             <span class="mr-2">
                                 <i class="fas fa-circle text-primary"></i> Direct
                             </span>
                             <span class="mr-2">
                                 <i class="fas fa-circle text-success"></i> Social
                             </span>
                             <span class="mr-2">
                                 <i class="fas fa-circle text-info"></i> Referral
                             </span>
                         </div>
                     </div>
                     </div>
                     </div> -->
               </div>
            </div>
         </div>
      </div>
   </div>
   <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
   </a>
   <!-- Logout Modal-->
   <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
      aria-hidden="true">
      <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
               <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
               </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
               <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
               <a class="btn btn-primary" href="login.html">Logout</a>
            </div>
         </div>
      </div>
   </div>
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   <!-- Bootstrap core JavaScript-->
   <script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
   <script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
   <!-- Core plugin JavaScript-->
   <script src="<?php echo base_url(); ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>
   <!-- Custom scripts for all pages-->
   <script src="<?php echo base_url(); ?>assets/js/sb-admin-2.min.js"></script>
   <!-- Page level plugins -->
   <script src="<?php echo base_url(); ?>assets/endor/chart.js/Chart.min.js"></script>
   <!-- Page level custom scripts -->
   <script src="<?php echo base_url(); ?>assets/js/demo/chart-area-demo.js"></script>
   <script src="<?php echo base_url(); ?>assets/js/demo/chart-pie-demo.js"></script>
</body>

</html>