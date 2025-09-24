<?php $this->load->view('template/head'); ?>
<style>
   tbody td {
      text-align: center;
   }
</style>

<body id="page-top">
   <!-- Page Wrapper -->
   <div id="wrapper">
      <!-- Sidebar -->
      <?php $this->load->view('template/sidebar'); ?>
      <!-- End of Sidebar -->
      <!-- Content Wrapper -->
      <div id="content-wrapper" class="d-flex flex-column">
         <!-- Main Content -->
         <div id="content">
            <!-- Topbar -->
            <?php $this->load->view('template/header'); ?>
            <!-- <style>
               .loader {
                     display: flex;
                     align-items: center;
                     }
               
                     .icon {
                     height: 4rem;
                     width: 4rem;
                     animation: spin 1s linear infinite;
                     stroke: rgb(247, 247, 247);
                     }
               
                     .loading-text {
                     font-size: 0.75rem;
                     line-height: 1rem;
                     font-weight: 500;
                     color: rgb(255, 255, 255);
                     }
               
                     @keyframes spin {
                     to {
                        transform: rotate(360deg);
                     }
                  }
               </style> -->
            <!-- End of Topbar -->
            <!-- Begin Page Content -->
            <div class="container-fluid">
               <!-- Page Heading -->
               <h1 class="h3 mb-2 text-gray-800">Event Applicants</h1>
               <p class="mb-4">Manage and review event applications
               </p>
               <!-- DataTales Example -->
               <div class="card shadow mb-4">
                  <div class="card-header py-3">
                     <!--<h6 class="m-0 font-weight-bold text-primary">All Events</h6>-->
                  </div>
                  <div class="px-4 py-3">
                     <div class="btn-group d-flex" role="group" style="width: 10px;margin-left: 0px;"">
                        <button type=" button" class="btn btn-light text-primary border flex-fill" value="all" onclick="options(this)">All</button>
                        <button type="button" class="btn btn-light text-primary border flex-fill" value="2" onclick="options(this)">Pending</button>
                        <button type="button" class="btn btn-light text-primary border flex-fill" value="1" onclick="options(this)">Approved</button>
                        <button type="button" class="btn btn-light text-primary border flex-fill" value="3" onclick="options(this)">Rejected</button>
                     </div>
                  </div>
                  <div class="card-body">
                     <div class="table-responsive">
                        <table class="upcomingEventTable table-bordered" id="businessDirectory" width="100%" cellspacing="0">
                           <thead>
                              <tr>
                                 <th style="text-align: center;">Event Name</th>
                                 <th style="text-align: center;">Applicant Name</th>
                                 <th style="text-align: center;">Gender</th>
                                 <th style="text-align: center;">Email</th>
                                 <th style="text-align: center;">Age</th>
                                 <th style="text-align: center;">Birth Date</th>
                                 <th style="text-align: center;">Birth Place</th>
                                 <th style="text-align: center;">Address</th>
                                 <th style="text-align: center;">Reason of Application</th>
                                 <th style="text-align: center;">Id Number</th>
                                 <th style="text-align: center;">Participant Code</th>
                                 <th style="text-align: center;">Status</th>
                                 <th style="text-align: center;">Action</th>
                              </tr>
                           </thead>
                           <tbody>
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   </div>
   <!-- <div class="modal fade" id="loader" tabindex="-1" role="dialog" aria-hidden="true" 
      data-backdrop="static" data-keyboard="false">
       <div class="modal-dialog modal-sm modal-dialog-centered" style="display: flex; justify-content: center;">
          <div class="d-flex align-items-center justify-content-center" style="height: 100%;">
          <div aria-label="Loading..." role="status" class="loader">
                <svg class="icon" viewBox="0 0 256 256">
                   <line x1="128" y1="32" x2="128" y2="64" stroke-linecap="round" stroke-linejoin="round" stroke-width="24"></line>
                   <line x1="195.9" y1="60.1" x2="173.3" y2="82.7" stroke-linecap="round" stroke-linejoin="round" stroke-width="24"></line>
                   <line x1="224" y1="128" x2="192" y2="128" stroke-linecap="round" stroke-linejoin="round" stroke-width="24"></line>
                   <line x1="195.9" y1="195.9" x2="173.3" y2="173.3" stroke-linecap="round" stroke-linejoin="round" stroke-width="24"></line>
                   <line x1="128" y1="224" x2="128" y2="192" stroke-linecap="round" stroke-linejoin="round" stroke-width="24"></line>
                   <line x1="60.1" y1="195.9" x2="82.7" y2="173.3" stroke-linecap="round" stroke-linejoin="round" stroke-width="24"></line>
                   <line x1="32" y1="128" x2="64" y2="128" stroke-linecap="round" stroke-linejoin="round" stroke-width="24"></line>
                   <line x1="60.1" y1="60.1" x2="82.7" y2="82.7" stroke-linecap="round" stroke-linejoin="round" stroke-width="24"></line>
                </svg>
                <span class="loading-text">Loading...</span>
                </div>
          </div>
       </div>
      </div> -->
   <div id="loader_spinner" style="
      display: none;      
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 0, 0.5); /* semi-transparent black */
      backdrop-filter: blur(4px); 
      z-index: 9999;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-direction: column;
      text-align: center;
      color: #fff;
      ">
      <div role="status" class="loader">
         <svg class="icon" viewBox="0 0 256 256">
            <line x1="128" y1="32" x2="128" y2="64" stroke-linecap="round" stroke-linejoin="round" stroke-width="24"></line>
            <line x1="195.9" y1="60.1" x2="173.3" y2="82.7" stroke-linecap="round" stroke-linejoin="round" stroke-width="24"></line>
            <line x1="224" y1="128" x2="192" y2="128" stroke-linecap="round" stroke-linejoin="round" stroke-width="24"></line>
            <line x1="195.9" y1="195.9" x2="173.3" y2="173.3" stroke-linecap="round" stroke-linejoin="round" stroke-width="24"></line>
            <line x1="128" y1="224" x2="128" y2="192" stroke-linecap="round" stroke-linejoin="round" stroke-width="24"></line>
            <line x1="60.1" y1="195.9" x2="82.7" y2="173.3" stroke-linecap="round" stroke-linejoin="round" stroke-width="24"></line>
            <line x1="32" y1="128" x2="64" y2="128" stroke-linecap="round" stroke-linejoin="round" stroke-width="24"></line>
            <line x1="60.1" y1="60.1" x2="82.7" y2="82.7" stroke-linecap="round" stroke-linejoin="round" stroke-width="24"></line>
         </svg>
         <span class="loading-text">Loading...</span>
      </div>
   </div>
   </div>
   <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
   </a>
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
   <?php $this->load->view('template/loading_modal'); ?>
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
   <script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
   <script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
   <script src="<?php echo base_url(); ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>
   <script src="<?php echo base_url(); ?>assets/js/sb-admin-2.min.js"></script>
   <script src="<?php echo base_url(); ?>assets/endor/chart.js/Chart.min.js"></script>
   <script src="<?php echo base_url(); ?>assets/js/demo/chart-area-demo.js"></script>
   <script src="<?php echo base_url(); ?>assets/js/demo/chart-pie-demo.js"></script>
   <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
   <script>
      $(document).ready(function() {
         $('#loader_spinner').hide();

         options("all");

         $(".btn-group .btn").on("click", function() {
            options($(this).val());
         });
      });

      function options(status) {

         $.ajax({
            url: '<?php echo base_url(); ?>event_applicants/getApplicants',
            type: 'POST',
            data: {
               status: status
            },

            dataType: 'json',

            success: function(response) {
               const result = response.data;
               console.log(result);
               const table = $('#businessDirectory').DataTable();
               table.clear().draw();
               for (let i = 0; i < result.length; i++) {
                  table.row.add([
                     result[i].event_name,
                     result[i].applicant_name,
                     result[i].applicant_gender,
                     result[i].applicant_email,
                     result[i].applicant_age,
                     result[i].applicant_birth_date,
                     result[i].applicant_birth_place,
                     result[i].applicant_address,
                     result[i].reason_of_application,
                     result[i].id_number,
                     result[i].participant_code ? result[i].participant_code : 'Not Available',
                     result[i].status,
                     result[i].action,
                  ]).draw(false);
               }
            }
         })

      };

      function approvedApplicant($id, $email) {

         if (confirm("Are you sure you want to receive this directory?")) {
            $.ajax({
               url: '<?php echo base_url(); ?>event_applicants/approvedApplicant',
               type: 'POST',
               data: {
                  id: $id,
                  email: $email
               },
               dataType: 'json',
               beforeSend: function() {
                  $('#loader_spinner').show();
               },
               success: function(response) {
                  if (response.status == 'success') {
                     $('#loader_spinner').hide();
                     Swal.fire({
                        toast: true,
                        position: 'top-end',
                        icon: 'success',
                        title: response.message,
                        showConfirmButton: false,
                        timer: 2000
                     });
                     options("all");
                  } else {
                     $('#loader_spinner').hide();
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

      }

      function rejectApplicant($id) {

         if (confirm("Are you sure you want to reject this directory?")) {
            $.ajax({
               url: '<?php echo base_url(); ?>event_applicants/rejectApplicant',
               type: 'POST',
               data: {
                  id: $id
               },
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
                     options("all");
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

      }

      // function viewApplication($id){

      //    $.ajax({
      //          url: '<?php echo base_url(); ?>event/viewApplication',
      //          type: 'POST',
      //          data : {
      //             id: $id
      //          },
      //          dataType: 'json',
      //          success: function (response) {
      //             // alert(response.message);
      //          }

      //    })
      // }

      function viewApplication(id) {

         window.open('<?php echo base_url("event_applicants/viewApplication"); ?>/' + id, '_blank');

      }

      function viewPermit($id) {

         $.ajax({
            url: '<?php echo base_url(); ?>event/viewPermit',
            type: 'POST',
            data: {
               id: $id
            },
            dataType: 'json',
            success: function(response) {
               let path = response.data.event_logo_path;
               console.log("path: " + path);
               window.open("<?php echo base_url(); ?>" + path, '_blank');
            }
         });

      }

      function viewValidId($id) {

         $.ajax({
            url: '<?php echo base_url(); ?>event_applicants/viewValidId',
            type: 'POST',
            data: {
               id: $id
            },
            dataType: 'json',
            success: function(response) {
               let path = response.data.valid_id_path;
               console.log("path: " + path);
               window.open("<?php echo base_url(); ?>" + path, '_blank');
            }
         })
      }
   </script>
</body>

</html>