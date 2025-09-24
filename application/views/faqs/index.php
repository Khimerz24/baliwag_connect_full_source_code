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
                    <h1 class="h3 mb-2 text-gray-800">FAQs</h1>
                    <p class="mb-4">Manage website FAQs
                    </p>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <!--<h6 class="m-0 font-weight-bold text-primary">All FAQs</h6>-->

                        </div>
                        <div class="px-4 py-3 text-right">
                            <button class="btn btn-primary" onclick="faqsModal()">New FAQ</button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="upcomingEventTable table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center;width: 20%;">Title</th>
                                            <th style="text-align: center;">Description</th>
                                            <th style="text-align: center;width: 10%;">Status</th>
                                            <th style="text-align: center;width: 10%;">Action</th>
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
    <div id="showNewFaqsModal">
        <div id="showFaqsModal">

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
            $(document).ready(function() {
                getFaqs();
            });

            function getFaqs() {
                $.ajax({
                    url: '<?php echo base_url(); ?>faqs/getFaqs',
                    type: 'POST',
                    dataType: 'json',
                    success: function(response) {
                        const result = response.data;
                        const table = $('#dataTable').DataTable();
                        table.clear().draw();
                        for (let i = 0; i < result.length; i++) {
                            table.row.add([
                                result[i].title,
                                result[i].description,
                                result[i].status,
                                result[i].action,
                                //  result[i].last_login
                            ]).draw(false);
                        }
                    }
                })
            }


            function faqsModal() {
                $.ajax({
                    url: '<?php echo base_url(); ?>faqs/faqsModal',
                    type: 'POST',
                    dataType: 'json',
                    success: function(response) {
                        const result = response.data;
                        console.log(result);
                        $("#showNewFaqsModal").html(result);
                        $("#newFaqs").modal('show');
                    }
                })
            }

            function update($id) {
                $.ajax({
                    url: '<?php echo base_url(); ?>faqs/update',
                    type: 'POST',
                    data: {
                        id: $id
                    },
                    dataType: 'json',
                    success: function(response) {
                        const result = response.data;
                        console.log(result);
                        $("#showFaqsModal").html(result);
                        $("#faqsModal").modal('show');
                    }
                })
            }

            function removeFaqs($id) {
                if (confirm("Are you sure you want to remove this faq?")) {
                    $.ajax({
                        url: '<?php echo base_url(); ?>faqs/removeFaqs',
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
                                getFaqs();
                            } else {
                                Swal.fire({
                                    toast: true,
                                    position: 'top-end',
                                    icon: 'error',
                                    title: response.message,
                                    showConfirmButton: false,
                                    timer: 2000
                                });
                                getFaqs();
                            }
                        }
                    })
                }
            }
        </script>
</body>

</html>