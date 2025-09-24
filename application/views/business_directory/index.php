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
               <h1 class="h3 mb-2 text-gray-800">Business Directory</h1>
               <p class="mb-4">Manage and review business applications
               </p>
               <!-- DataTales Example -->
               <div class="card shadow mb-4">
                  <div class="card-header py-3">
                     <h6 class="m-0 font-weight-bold text-primary">All Businesses</h6>

                  </div>

                  <div class="px-4 py-3">
                     <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="btn-group" role="group">
                           <button type="button" class="btn btn-light text-primary border" value="all" onclick="options(this)">All</button>
                           <button type="button" class="btn btn-light text-primary border" value="1" onclick="options(this)">Active</button>
                           <!--<button type="button" class="btn btn-light text-primary border" value="2" onclick="options(this)">Pending</button>-->
                           <button type="button" class="btn btn-light text-primary border" value="0" onclick="options(this)">Removed</button>
                        </div>
                        <div>
                           <button class="btn btn-primary" onclick="businessModal()">New Business</button>
                        </div>
                     </div>
                  </div>
                  <div class="card-body">
                     <div class="table-responsive">
                        <table class="upcomingEventTable table-bordered" id="businessDirectory" width="100%" cellspacing="0">
                           <thead>
                              <tr>
                                 <th style="text-align: center;">Logo</th>
                                 <th style="text-align: center;">Category</th>
                                 <th style="text-align: center;">Business Name</th>
                                 <th style="text-align: center;">Business Description</th>
                                 <th style="text-align: center;">Address</th>
                                 <th style="text-align: center;">Email/Website</th>
                                 <th style="text-align: center;">Contact</th>
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
   <div class="" id="showbusinessModal"></div>
   <div class="" id="showupdateModal"></div>
   <div class="" id="showupdateDetailsModal"></div>

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
            url: '<?php echo base_url(); ?>Business_directory/getBusinessDirectory',
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
                     `<img src="${base_url + result[i].logo}" width="100" height="100">`,
                     result[i].bussiness_category,
                     result[i].bussiness_name,
                     result[i].bussiness_description,
                     result[i].location,
                     result[i].email,
                     result[i].contact,
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
               url: '<?php echo base_url(); ?>Business_directory/receiveDirectory',
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
                     $("#businessmodal").modal("hide");
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
               url: '<?php echo base_url(); ?>Business_directory/rejectDirectory',
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
                     $("#businessmodal").modal("hide");
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
      //          url: '<?php echo base_url(); ?>Business_directory/viewApplication',
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

         window.open('<?php echo base_url("Business_directory/viewApplication"); ?>/' + id, '_blank');

      }

      function viewPermit($id) {

         $.ajax({
            url: '<?php echo base_url(); ?>Business_directory/viewPermit',
            type: 'POST',
            data: {
               id: $id
            },
            dataType: 'json',
            success: function(response) {
               let path = response.data.bussiness_permit_path;
               console.log("path: " + path);
               window.open("<?php echo base_url(); ?>" + path, '_blank');
            }
         });

      }

      function viewValidId($id) {

         $.ajax({
            url: '<?php echo base_url(); ?>Business_directory/viewValidId',
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

      function businessModal() {
         $.ajax({
            url: '<?php echo base_url(); ?>Business_directory/businessModal',
            type: 'POST',
            dataType: 'json',
            success: function(response) {
               const result = response.data;
               console.log(result);
               $("#showbusinessModal").html(result);
               $("#businessmodal").modal('show');
            }
         })
      }

      function update($id) {

         $.ajax({
            url: '<?php echo base_url(); ?>Business_directory/updateModal',
            type: 'POST',
            data: {
               id: $id
            },
            dataType: 'json',
            success: function(response) {
               const result = response.data;
               //   console.log(result);
               $("#showupdateModal").html(result);
               $("#updateModal").modal('show');
            }
         })
      }


      function updateDetailsss($id) {

         $.ajax({
            url: '<?php echo base_url(); ?>Business_directory/updateDetailsModals',
            type: 'POST',
            data: {
               id: $id
            },
            dataType: 'json',
            success: function(response) {
               const result = response.data;
               //   console.log(result);
               $("#showupdateDetailsModal").html(result);
               $("#updateDetailsModal").modal('show');
            }
         })
      }

      function remove($id) {
         if (confirm("Are you sure you want to remove this directory?")) {
            $.ajax({
               url: '<?php echo base_url(); ?>Business_directory/remove',
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
                     $("#businessmodal").modal("hide");
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
   </script>
</body>

</html>