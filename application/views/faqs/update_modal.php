<div class="modal fade" id="faqsModal" tabindex="-1" role="dialog" aria-labelledby="rfqModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="rfqModalLabel">Add New User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="faqs">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="">Title</label>
                            <input type="text" name="title" class="form-control" value="<?php echo $faqs->title; ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="">Description</label>
                            <textarea type="text" name="description" class="form-control"><?php echo $faqs->description; ?></textarea>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" id="close">Close</button>
                <button type="button" class="btn btn-success" onclick="saveFaqs(<?php echo $faqs->id; ?>)">Save</button>

            </div>
        </div>
    </div>
</div>
<script>
    function saveFaqs($id) {
        const formData = new FormData($("#faqs")[0]);
        formData.append('id', $id);
        $.ajax({
            url: '<?php echo base_url(); ?>faqs/saveFaqs',
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
                    setTimeout(function() {
                        location.reload();
                    }, 2000);


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
                    setTimeout(function() {
                        location.reload();
                    }, 2000);
                }
            }
        });
    }
</script>