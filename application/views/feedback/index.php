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
               <h1 class="h3 mb-2 text-gray-800">Feedback</h1>
               <p class="mb-4">Manage and review Feedback
               </p>
               <!-- DataTales Example -->
               <div class="card shadow mb-4">
                  <div class="card-header py-3">
                     <!--<h6 class="m-0 font-weight-bold text-primary">All Feedback</h6>-->

                  </div>

                  <div class="card-body">
                     <div class="table-responsive">
                        <table class="upcomingEventTable table-bordered" id="businessDirectory" width="100%" cellspacing="0">
                           <thead>
                              <tr>
                                 <th style="text-align: center;">Name</th>
                                 <th style="text-align: center;">Subject</th>
                                 <th style="text-align: center;">Email</th>
                                 <th style="text-align: center;">Message</th>
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

         $.ajax({
            url: '<?php echo base_url(); ?>feedback/getFeedbackDetail',
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
                     result[i].name,
                     result[i].subject ? result[i].subject == 2 ? 'Tourism' : result[i].subject : 'BPPLO',
                     result[i].email,
                     result[i].message
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
                  alert(response.message);
               },
               complete: function() {
                  //  options();
                  location.reload();
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
                  alert(response.message);
               },
               complete: function() {
                  //  options();
                  location.reload();
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
               let path = response.data.event_logo_path;
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
   </script>
</body>

</html>