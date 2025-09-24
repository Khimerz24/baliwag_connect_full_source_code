<div class="modal fade" id="getAnnouncementModal" tabindex="-1" role="dialog" aria-labelledby="rfqModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="rfqModalLabel">Update Announcement</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="updateAnnouncementForm">
          <div class="row">
            <div class="col-md-12">
              <label for="">Image Preview</label>


              <?php if (!empty($details->image)): ?>
                <div class="mb-2">
                  <img src="<?= base_url('assets/img/' . $details->image) ?>"
                    alt="Previous Image"
                    style="max-width: 150px; border:1px solid #ccc; padding:5px;">
                </div>
              <?php endif; ?>

              <input type="hidden" name="old_image" value="<?= $details->image ?>">

              <input type="file" id="image" name="image" class="form-control">
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <label for="">Title</label>
              <input type="text" id="updateTitle" name="updateTitle" class="form-control" value="<?php echo $details->title; ?>">
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
              <label for="">Description</label>
              <input type="text" id="updateDescription" name="updateDescription" class="form-control" value="<?php echo $details->description; ?>">
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="close">Close</button>
        <button type="button" class="btn btn-success" onclick="saveUpdate(<?php echo $details->id; ?>)">Save</button>

      </div>
    </div>
  </div>
</div>
<script>
  function saveUpdate($id) {
    const formData = new FormData($("#updateAnnouncementForm")[0]);
    formData.append('id', $id);
    $.ajax({
      url: '<?php echo base_url(); ?>announcements/updateAnnouncementForm',
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
          $('#close').click();
        }
      }
    });
  }
</script>