
<div class="modal fade" id="businessmodal" tabindex="-1" role="dialog" aria-labelledby="rfqModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="rfqModalLabel">New Business </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="businessForm">
            <div class="form-group">
                <label for="bussinessType">Business Logo</label>
                <input type="file" class="form-control" placeholder="Enter Name" name="bussinessLogo">
            </div>
            <div class="form-group">
                <label for="bussinessType">Bussiness Type</label>
                <select class="form-control" id="bussinessType" name="bussinessType">
                    <option value="">SELECT</option>
                    <option value="1">Food Place</option>
                    <option value="2">Retail Store</option>
                    <option value="3">Tourist Spot</option>
                    <option value="4">Services</option>
                </select>
            </div>
          <div class="row">
              <div class="col-md-12">
                  <label for="">Business Name</label>
                  <input type="text" id="businessName" name="businessName" class="form-control">
              </div>
          </div>
          <div class="row">
              <div class="col-md-12">
                  <label for="">Business Description</label>
                  <input type="text" id="businessDescription" name="businessDescription" class="form-control">
              </div>
          </div>
          <div class="row">
              <div class="col-md-12">
                  <label for="">Business Location</label>
                  <input type="text" id="businessLocation" name="businessLocation" class="form-control">
              </div>
          </div>
          <div class="row">
              <div class="col-md-12">
                  <label for="">Business Email/Website</label>
                  <input type="text" id="businessEmail" name="businessEmail" class="form-control">
              </div>
          </div>
          <div class="row">
              <div class="col-md-12">
                  <label for="">Business Contact Number</label>
                  <input type="text" id="businessContact" name="businessContact" class="form-control">
              </div>
          </div>
         </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-success" onclick="saveBusiness()">Save</button>
      </div>
    </div>
  </div>
</div>

<script>

function saveBusiness(){

    let bussinessType = $("#bussinessType").val();
    let businessName = $("#businessName").val();
    let businessDescription = $("#businessDescription").val();


    if(bussinessType == '' || businessName == '' || businessDescription == ''){
      alert("All fields are required");
      return false;
    }
  
    const formData = new FormData($("#businessForm")[0]);

    $.ajax({
      url: '<?php echo base_url(); ?>business_directory/saveBusiness',
      type: 'POST',
      data: formData,
      processData: false,
      contentType: false,
      dataType: 'json',
      success: function(response) {
        if(response.status == 'success'){
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
  });
}

</script>