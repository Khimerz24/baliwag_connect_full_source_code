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
            <!-- End of Topbar -->
            <!-- Begin Page Content -->
            <div class="container-fluid">
               <!-- Page Heading -->
               <h1 class="h3 mb-2 text-gray-800">Event Management</h1>
               <p class="mb-4">Manage and review event applications
               </p>
               <!-- DataTales Example -->
               <div class="card shadow mb-4">
                  <div class="card-header py-3">
                     <h6 class="m-0 font-weight-bold text-primary">All Events</h6>
                  </div>
                  <div class="px-4 py-3">
                     <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="btn-group d-flex" role="group" style="width: 10px;margin-left: 0px;"">
                        <button type=" button" class="btn btn-light text-primary border flex-fill" value="all" onclick="options(this)">All</button>
                           <button type="button" class="btn btn-light text-primary border flex-fill" value="2" onclick="options(this)">Pending</button>
                           <button type="button" class="btn btn-light text-primary border flex-fill" value="1" onclick="options(this)">Approved</button>
                           <button type="button" class="btn btn-light text-primary border flex-fill" value="4" onclick="options(this)">Archived</button>
                           <button type="button" class="btn btn-light text-primary border flex-fill" value="3" onclick="options(this)">Rejecte</button>
                        </div>
                        <div>
                           <button class="btn btn-primary" onclick="newEventModal()">New Event</button>
                        </div>
                     </div>
                  </div>
                  <div class="card-body">
                     <div class="table-responsive">
                        <table class="upcomingEventTable table-bordered" id="businessDirectory" width="100%" cellspacing="0">
                           <thead>
                              <tr>
                                 <th style="text-align: center;">Business Logo</th>
                                 <th style="text-align: center;">Business Name</th>
                                 <th style="text-align: center;">Owner</th>
                                 <th style="text-align: center;">Date Submitted</th>
                                 <th style="text-align: center;">Status</th>
                                 <th style="text-align: center;">Action</th>
                              </tr>
                           </thead>
                           <tbody>
                              <!-- <tr style="text-align: center;">
                                 <td>test</td>
                                 <td>testt</td>
                                 <td>test</td>
                                 <td>test</td>
                                 <td>test</td>
                                 </tr> -->
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
   <div class="" id="showEventModal"></div>
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

         options("all");

         $(".btn-group .btn").on("click", function() {
            options($(this).val());
         });
      });

      function options(status) {
         var base_url = "<?= base_url(); ?>";
         $.ajax({
            url: '<?php echo base_url(); ?>event/getBusinessDirectory',
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
                     `<img src="${base_url + result[i].event_logo}" width="100" height="100">`,
                     result[i].event_name,
                     result[i].event_owner,
                     result[i].date_submitted,
                     result[i].status,
                     result[i].action
                  ]).draw(false);
               }
            }
         })

      };

      function receiveDirectory($id) {

         if (confirm("Are you sure you want to receive this directory?")) {
            $.ajax({
               url: '<?php echo base_url(); ?>event/receiveDirectory',
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

      function rejectDirectory($id) {

         if (confirm("Are you sure you want to reject this directory?")) {
            $.ajax({
               url: '<?php echo base_url(); ?>event/rejectDirectory',
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


      function archieveDirectory($id) {

         if (confirm("Are you sure you want to archieve this directory?")) {
            $.ajax({
               url: '<?php echo base_url(); ?>event/archieveDirectory',
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

      function viewApplication(id) {

         window.open('<?php echo base_url("event/viewApplication"); ?>/' + id, '_blank');

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
               let path = response.data.event_logo;
               console.log("path: " + path);
               window.open("<?php echo base_url(); ?>" + path, '_blank');
            }
         });

      }

      function viewValidId($id) {

         $.ajax({
            url: '<?php echo base_url(); ?>event/viewValidId',
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

      function newEventModal() {
         $.ajax({
            url: '<?php echo base_url(); ?>event/eventModal',
            type: 'POST',
            dataType: 'json',
            success: function(response) {
               const result = response.data;
               console.log(result);
               $("#showEventModal").html(result);
               $("#eventModal").modal('show');
            }
         })
      }
   </script>
</body>

</html>