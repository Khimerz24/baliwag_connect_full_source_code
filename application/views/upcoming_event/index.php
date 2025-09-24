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
               <h1 class="h3 mb-2 text-gray-800">Event Calendar</h1>
               <p class="mb-4">Create and manage community events
               </p>
               <!-- DataTales Example -->
               <div class="card shadow mb-4">
                  <div class="card-header py-3">
                     <h6 class="m-0 font-weight-bold text-primary"></h6>

                  </div>

                  <div class="px-4 py-3">
                     <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="btn-group" role="group">
                           <button type="button" class="btn btn-light text-primary border" value="all" onclick="options(this)">All</button>
                           <button type="button" class="btn btn-light text-primary border" value="1" onclick="options(this)">Published</button>
                           <button type="button" class="btn btn-light text-primary border" value="2" onclick="options(this)">Archived</button>
                           <button type="button" class="btn btn-light text-primary border" value="3" onclick="options(this)">Canceled</button>
                        </div>
                        <div>
                           <button class="btn btn-primary" onclick="userModal()">New Event</button>
                        </div>
                     </div>

                  </div>
                  <div class="card-body">
                     <div class="table-responsive">
                        <table class="upcomingEventsTable table-bordered" id="upcomingEventsTable" width="100%" cellspacing="0">
                           <thead>
                              <tr>
                                 <th style="text-align: center;">Event Logo</th>
                                 <th style="text-align: center;">Event Name</th>
                                 <th style="text-align: center;">Date</th>
                                 <th style="text-align: center;">Location</th>
                                 <th style="text-align: center;">Organizer</th>
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
   <button type="button" class="btn btn-success swalDefaultSuccess">
      Launch Success Toast
   </button>
   <div id="showEventModal"></div>
   <div id="showUpdateModal"></div>

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
         // console.log('Selected status:', status);
         var base_url = "<?= base_url(); ?>";
         $.ajax({
            url: '<?php echo base_url(); ?>upcoming_event/getUpcomingEvent',
            type: 'POST',
            data: {
               status: status
            },
            dataType: 'json',
            success: function(response) {
               const result = response.data;
               console.log(result);

               const table = $('#upcomingEventsTable').DataTable();
               table.clear().draw();

               for (let i = 0; i < result.length; i++) {
                  table.row.add([
                     `<img src="${base_url + result[i].logo}" width="100" height="100">`,
                     result[i].event_name,
                     result[i].date,
                     result[i].location,
                     result[i].organizer,
                     result[i].status,
                     result[i].action,
                  ]).draw(false);
               }
            }
         });
      }

      function userModal() {
         $.ajax({
            url: '<?php echo base_url(); ?>upcoming_event/getEventModal',
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

      function archieve(id) {

         if (confirm("Are you sure you want to archive this event?")) {
            $.ajax({
               url: '<?php echo base_url(); ?>upcoming_event/archieveEvent',
               type: 'POST',
               data: {
                  id: id
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
                     $('#close').click();
                     getUser();

                  } else {
                     Swal.fire({
                        toast: true,
                        position: 'top-end',
                        icon: 'error',
                        title: response.message,
                        showConfirmButton: false,
                        timer: 2000
                     });
                     $('#close').click();
                  }
               }
            })
         }
      }

      function cancel(id) {

         if (confirm("Are you sure you want to archive this event?")) {
            $.ajax({
               url: '<?php echo base_url(); ?>upcoming_event/cancelEvent',
               type: 'POST',
               data: {
                  id: id
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

      function republished(id) {

         if (confirm("Are you sure you want to archive this event?")) {
            $.ajax({
               url: '<?php echo base_url(); ?>upcoming_event/republished',
               type: 'POST',
               data: {
                  id: id
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
                     options("all");
                  }
               }
            })
         }
      }

      function update(id) {
         // console.log(id);
         $.ajax({
            url: '<?php echo base_url(); ?>upcoming_event/getEventUpdateModal',
            type: 'POST',
            data: {
               id: id
            },
            dataType: 'json',
            success: function(response) {
               const result = response.data;
               console.log(result);
               $("#showUpdateModal").html(result);
               $("#updateModal").modal('show');
            }
         })
      }
   </script>
</body>

</html>