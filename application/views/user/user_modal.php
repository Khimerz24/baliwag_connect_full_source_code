<div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="rfqModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="rfqModalLabel">Add New User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="newUser">
          <div class="row">
            <div class="col-md-12">
              <label for="">User Group</label>
              <select name="userGroup" class="form-control">
                <option value="">Select User Group</option>
                <option value="1">Super Admin</option>
                <option value="2">Tourism</option>
                <option value="3">Bussiness(BPLO)</option>
              </select>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <label for="">First Name</label>
              <input type="text" name="firstName" class="form-control">
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <label for="">Last Name</label>
              <input type="text" name="lastName" class="form-control">
            </div>
          </div>
          <!-- <div class="row">
                <div class="col-md-12">
                    <label for="">User Group</label>
                    <input type="text" name="userGroup" class="form-control">
                </div>
            </div> -->
          <div class="row">
            <div class="col-md-12">
              <label for="">Username</label>
              <input type="text" name="userName" class="form-control">
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <label for="">Password</label>
              <input type="password" name="password" class="form-control">
            </div>
          </div>

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="close">Close</button>
        <button type="button" class="btn btn-success" onclick="saveUser()">Save</button>

      </div>
    </div>
  </div>
</div>
<script>
  function saveUser() {
    const formData = new FormData($("#newUser")[0]);

    $.ajax({
      url: '<?php echo base_url(); ?>user/saveUser',
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
    });
  }
</script>