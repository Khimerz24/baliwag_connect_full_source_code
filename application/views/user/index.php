<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="">
      <meta name="author" content="">
      <title>Baliwag Connect - Dashboard</title>
      <link href="<?php echo base_url(); ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
      <link
         href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
         rel="stylesheet">
      <link href="<?php echo base_url(); ?>assets/css/sb-admin-2.min.css" rel="stylesheet">
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
   </head>
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
                  <h1 class="h3 mb-2 text-gray-800">User</h1>
                  <p class="mb-4">Manage system users and permission
                  </p>
                  <!-- DataTales Example -->
                  <div class="card shadow mb-4">
                     <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">All Users</h6>
                        
                     </div>
                     <div class="px-4 py-3 text-right">
                        <button class="btn btn-primary" onclick ="userModal()">New User</button>
                     </div>
                     <div class="card-body">
                        <div class="table-responsive">
                           <table class="upcomingEventTable table-bordered" id="dataTable" width="100%" cellspacing="0">
                              <thead>
                                 <tr>
                                    <th style="text-align: center;">Role</th>
                                    <th style="text-align: center;">Name</th>
                                    <th style="text-align: center;">Email</th>
                                    <th style="text-align: center;">User Name</th>
                                    <th style="text-align: center;">Last Login</th>
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
      <div id="showUserModal">

      </div>
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
         $(document).ready(function () {
            getUser();
         });
         
         function getUser(){
            $.ajax({
                 url: '<?php echo base_url(); ?>user/getUser',
                 type: 'POST',
                 dataType: 'json',
                 success: function (response) {
                    const result = response.data;
                    const table = $('#dataTable').DataTable();
                    table.clear().draw();
                    for (let i = 0; i < result.length; i++) {
                        table.row.add([
                            result[i].userGroup,
                            result[i].name,
                            result[i].email,
                            result[i].userName,
                            result[i].lastLogin
                        ]).draw(false);
                    }
                 }
             })
         }

         function userModal(){
            $.ajax({
                 url: '<?php echo base_url(); ?>user/getUserModal',
                 type: 'POST',
                 dataType: 'json',
                 success: function (response) {
                    const result = response.data;
                    console.log(result);
                     $("#showUserModal").html(result);
                     $("#userModal").modal('show');
                 }
             })
         }
      </script>
   </body>
</html>