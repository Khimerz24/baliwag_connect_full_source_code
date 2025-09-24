<?php $this->load->view('template/head'); ?>
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
                  <div class="card shadow mb-4">
                     <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Profile Information</h6>
                        <span>
                        <!--Update your personal information and profile picture-->
                        </span>
                     </div>
                     <div class="card-body">
                        <div class="row d-flex align-items-center">
                            <div class="col-md-2">
                                <div class="d-flex justify-content-center align-items-center rounded-circle bg-secondary text-white" style="width: 150px; height: 150px; font-size: 40px;">
                                A
                                </div>
                            </div>
                            <div class="col-md-3">
                                 <span><?php echo $adminData[0]->name  ?> <br>
                                 System Admin
                                </span>
                         
                            </div>
                        </div>
                        <hr>

                        <form id="editInformation">

                       
                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label for="exampleInputEmail1">First Name</label>
                                 <input type="text" class="form-control" name="firstName" aria-describedby="emailHelp" placeholder="Enter First Name" value="<?php echo $adminData[0]->first_name; ?>">

                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label for="exampleInputEmail1">Last Name</label>
                                 <input type="email" class="form-control" name="lastName" aria-describedby="emailHelp" placeholder="Enter Last Name" value="<?php echo $adminData[0]->last_name; ?>">
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label for="exampleInputEmail1">Email</label>
                                 <input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Enter Email" value="<?php echo $adminData[0]->email; ?>">
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label for="exampleInputEmail1">User Name</label>
                                 <input type="email" class="form-control" name="userName" aria-describedby="emailHelp" placeholder="Enter Email" value="<?php echo $adminData[0]->user_name; ?>">
                              </div>
                           </div>
                           <!-- <div class="col-md-6">
                              <div class="form-group">
                                 <label for="exampleInputEmail1">Phone Number</label>
                                 <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Phone Number">
                              </div>
                           </div> -->
                        </div>
                        <!-- <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label for="exampleSelect1">User Group</label>
                                 <select class="form-control" id="exampleSelect1">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                 </select>
                              </div>
                           </div>
                        </div> -->
                        </form>
                        <div class="button-container text-right">
                           <!-- <button class="btn btn-primary">Reset</button> -->
                           <button class="btn btn-success" onclick= "saveEditInformation()">Save Changes</button>
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
      <input type="hidden" value="<?php echo $adminData[0]->id; ?>" id="userId">
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

         $(document).ready(function () {
             $('#dataTable').DataTable();
             $.ajax({
                 url: '<?php echo base_url(); ?>user/getUser',
                 type: 'POST',
                 dataType: 'json',
                 success: function (response) {
                    const result = response.data;
                     console.log(result);
                 }
             })
         });

         function saveEditInformation(){
             
            let formData = new FormData($('#editInformation')[0]);
             formData.append('userId', $('#userId').val());
            $.ajax({
               url: '<?php echo base_url(); ?>profile_information/updateUser',
               type: 'POST',
               data: formData,
               dataType: 'json',
               contentType: false,
               processData: false,
           
               success: function (response) {
                  const result = response.data;
                  if(response.status == 'success'){
                     Swal.fire({
                    toast: true,
                    position: 'top-end',
                    icon: 'success',
                    title: response.message,
                    showConfirmButton: false,
                    timer: 2000
                    });
                    setTimeout(function(){ 
                       window.location.href = "<?php echo base_url('admin'); ?>"; 
                    }, 2000);
                  }else{
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
      </script>
   </body>
</html>