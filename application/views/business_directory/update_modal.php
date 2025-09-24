
<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="rfqModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="rfqModalLabel">New Business </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="updateLogoForm">
          <div class="row">
              <div class="col-md-12">
                  <label for="">Business Logo</label>
                  <input type="file" id="businessLogo" name="bussinessLogo" class="form-control" value="">
              </div>
          </div>
         </form>
      </div> 
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-success" onclick="updateLogo(<?php echo $id ?>)">Save</button>
      </div>
    </div>
  </div>
</div>


<script>

function updateLogo($id){
    const id = $id;

    const formData = new FormData($("#updateLogoForm")[0]);
    formData.append('id', id);

    $.ajax({
      url: '<?php echo base_url(); ?>business_directory/update',
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
            $("#updateModal").modal("hide");
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