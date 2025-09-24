<div class="modal fade" id="updateDetailsModal" tabindex="-1" role="dialog" aria-labelledby="rfqModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="rfqModalLabel">New Business </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="updateDetails">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="">Business Name</label>
                            <select class="form-control" id="businessCategory" name="businessCategory">
                                <option value="1" <?php echo ($details[0]->bussiness_category == 1) ? 'selected' : ''; ?>>Food Place</option>
                                <option value="2" <?php echo ($details[0]->bussiness_category == 2) ? 'selected' : ''; ?>>Retail Store</option>
                                <option value="3" <?php echo ($details[0]->bussiness_category == 3) ? 'selected' : ''; ?>>Tourist Spot</option>
                                <option value="4" <?php echo ($details[0]->bussiness_category == 4) ? 'selected' : ''; ?>>Services</option>
                            </select>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="">Business Name</label>
                            <input type="input" id="businessName" name="businessName" class="form-control" value="<?php echo $details[0]->bussiness_name; ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="">Business Description</label>
                            <input type="input" id="businessDescription" name="businessDescription" class="form-control" value="<?php echo $details[0]->bussiness_description; ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="">Business Email/Website</label>
                            <input type="input" id="businessEmail" name="businessEmail" class="form-control" value="<?php echo $details[0]->bussiness_email; ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="">Business Phone Number</label>
                            <input type="input" id="businessNo" name="businessNo" class="form-control" value="<?php echo $details[0]->bussiness_phone_number; ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="">Business Address</label>
                            <input type="input" id="businessAddress" name="businessAddress" class="form-control" value="<?php echo $details[0]->bussiness_address; ?>">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success" onclick="updateDetails(<?php echo $details[0]->id; ?>)">Save</button>
            </div>
        </div>
    </div>
</div>


<script>
    function updateDetails($id) {
        const id = $id;

        const formData = new FormData($("#updateDetails")[0]);
        formData.append('id', id);

        $.ajax({
            url: '<?php echo base_url(); ?>business_directory/updateDetails',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
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
                    $("#updateDetailsModal").modal("hide");
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
                    $("#updateDetailsModal").modal("hide");
                    options("all");
                }
            }
        });
    }
</script>