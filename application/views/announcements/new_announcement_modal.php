<div class="modal fade" id="newAnnouncementModal" tabindex="-1" role="dialog" aria-labelledby="rfqModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="rfqModalLabel">New Announcement</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="newAnnouncementForm">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="">Image Preview</label>
                            <input type="file" id="image" name="image" class="form-control">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <label for="">Title</label>
                            <input type="text" id="Title" name="Title" class="form-control">
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
                            <input type="text" id="Description" name="Description" class="form-control">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" id="close">Close</button>
                <button type="button" class="btn btn-success" onclick="addNewAnnouncement()">Save</button>

            </div>
        </div>
    </div>
</div>
<script>
    function addNewAnnouncement() {
        const formData = new FormData($("#newAnnouncementForm")[0]);
        $.ajax({
            url: '<?php echo base_url(); ?>announcements/saveAnnouncement',
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
                }
            }
        });
    }
</script>