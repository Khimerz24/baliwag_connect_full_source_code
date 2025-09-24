<div class="modal fade" id="eventModal" tabindex="-1" role="dialog" aria-labelledby="rfqModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="rfqModalLabel">New Event</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="eventForm">
          <div class="row">
            <div class="col-md-12">
              <label for="">Event Image</label>
              <input type="file" id="eventImage" name="eventImage" class="form-control">
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <label for="">Event Name</label>
              <input type="text" id="eventName" name="eventName" class="form-control">
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <label for="">Event Date</label>
              <input type="date" id="eventDate" name="eventDate" class="form-control">
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <label for="">Event Location</label>
              <input type="text" id="eventLocation" name="eventLocation" class="form-control">
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <label for="">Event Organizer</label>
              <input type="text" id="eventOrganizer" name="eventOrganizer" class="form-control">
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-success" onclick="saveEvent()">Save</button>
      </div>
    </div>
  </div>
</div>
<script>
  $('#eventModal').on('hide.bs.modal', function() {
    document.activeElement.blur();
  });

  function saveEvent() {

    let eventOrganizer = $("#eventOrganizer").val();
    let eventLocation = $("#eventLocation").val();
    let eventDate = $("#eventDate").val();
    let eventName = $("#eventName").val();

    if (eventOrganizer == '' || eventLocation == '' || eventDate == '' || eventName == '') {
      alert("All fields are required");
      return false;
    }

    const formData = new FormData($("#eventForm")[0]);

    $.ajax({
      url: '<?php echo base_url(); ?>upcoming_event/saveEvent',
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
          $("#eventModal").modal("hide");
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
    });
  }
</script>