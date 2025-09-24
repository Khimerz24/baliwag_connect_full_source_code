<!DOCTYPE html>
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
               <h1 class="h3 mb-2 text-gray-800">Announcements</h1>
               <p class="mb-4">Manage the display announcementt
               </p>
               <!-- DataTales Example -->
               <div class="card shadow mb-4">
                  <div class="card-header py-3">
                     <h6 class="m-0 font-weight-bold text-primary">All Announcemnts</h6>
                  </div>
                  <div class="px-4 py-3 text-right">
                     <button class="btn btn-primary" onclick="newAnnouncement()">New Announcements</button>
                  </div>
                  <div class="card-body">
                     <div class="table-responsive">
                        <table class="upcomingEventTable table-bordered" id="dataTable" width="100%" cellspacing="0">
                           <thead>
                              <tr>
                                 <th style="text-align: center;">Image</th>
                                 <th style="text-align: center;">Title</th>
                                 <th style="text-align: center;">Description</th>
                                 <th style="text-align: center;">Status</th>
                                 <th style="text-align: center;">Action</th>
                                 <!-- <th style="text-align: center;">Last Login</th> -->
                                 <!-- <th>Status</th> -->
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
   <div id="showAnnouncementrModal"></div>
   <div id="showUserModal"></div>
   <?php $this->load->view('template/loading_modal'); ?>
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
   <script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
   <script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
   <script src="<?php echo base_url(); ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>
   <script src="<?php echo base_url(); ?>assets/js/sb-admin-2.min.js"></script>
   <!-- <script src="<?php echo base_url(); ?>assets/endor/chart.js/Chart.min.js"></script> -->
   <!-- <script src="<?php echo base_url(); ?>assets/js/demo/chart-area-demo.js"></script>
         <script src="<?php echo base_url(); ?>assets/js/demo/chart-pie-demo.js"></script> -->
   <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
   <script>
      $(document).ready(function() {

         getAnnouncement();

      });

      function getAnnouncement() {

         const base_url = "<?= base_url(); ?>";

         $.ajax({
            url: '<?php echo base_url(); ?>announcements/getAnnouncement',
            type: 'POST',
            dataType: 'json',
            success: function(response) {
               const result = response.data;
               const table = $('#dataTable').DataTable();
               table.clear().draw();
               for (let i = 0; i < result.length; i++) {
                  table.row.add([
                     `<img src="${base_url}assets/img/${result[i].image}" width="100" height="100">`,
                     result[i].title,
                     result[i].description,
                     result[i].status,
                     result[i].action
                  ]).draw(false);

               }
            }
         })
      }

      function update(id) {
         $.ajax({
            url: '<?php echo base_url(); ?>announcements/getAnnouncementModal',
            type: 'POST',
            data: {
               id: id
            },
            dataType: 'json',
            success: function(response) {
               const result = response.data;
               $("#showUserModal").html(result);
               $("#getAnnouncementModal").modal('show');
            }
         })
      }

      function newAnnouncement() {
         $.ajax({
            url: '<?php echo base_url(); ?>announcements/newAnnouncementModal',
            type: 'POST',
            dataType: 'json',
            success: function(response) {
               const result = response.data;
               $("#showAnnouncementrModal").html(result);
               $("#newAnnouncementModal").modal('show');
            }
         })
      }

      function expired(id) {
         if (confirm("Are you sure you want to mark this announcement as expired?")) {
            $.ajax({
               url: '<?php echo base_url(); ?>announcements/expired',
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
                     getAnnouncement();
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

      function repost(id) {
         if (confirm("Are you sure you want to repost this announcement?")) {
            $.ajax({
               url: '<?php echo base_url(); ?>announcements/repost',
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
                     getAnnouncement();
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
   </script>
</body>

</html>