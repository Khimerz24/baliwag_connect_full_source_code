<div class="modal fade" id="eventModal" tabindex="-1" role="dialog" aria-labelledby="rfqModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document"> <!-- XL for wide form -->
        <div class="modal-content">
            <!-- <div class="modal-header" style="background-color:#05158F;">
                <h5 class="modal-title text-white" id="rfqModalLabel">Events Application Form</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div> -->
            <div class="modal-body p-0">
                <div class="container-fluid p-0">
                    <div class="baliw-offers-container p-3" style="background-color: #05158F;">
                        <h4 class="text-white text-center">Event Application Form</h4>
                    </div>
                    <div class="inner-container p-4">
                        <form id="applicationForm">
                            <div class="form-group">
                                <label for="search">Event Logo</label>
                                <input type="file" class="form-control" placeholder="Enter Name" name="eventLogo">
                            </div>
                            <div class="form-group">
                                <label for="search">Event Name</label>
                                <input type="text" class="form-control" placeholder="Enter Name" name="eventName">
                            </div>
                            <div class="form-group">
                                <label for="search">Event Description</label>
                                <input type="text" class="form-control" placeholder="Enter Description" name="eventDescription">
                            </div>
                            <div class="form-group">
                                <label for="search">Event Date</label>
                                <input type="date" class="form-control" name="eventDate">
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="search">Email</label>
                                        <input type="text" class="form-control" placeholder="Enter Email" name="eventEmail">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="search">Phone Number</label>
                                        <input type="text" class="form-control" placeholder="Enter Phone Number" name="eventPhoneNumber">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="search">Event place address</label>
                                <input type="text" class="form-control" placeholder="Enter Address" name="eventAddress">
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="joinable">is the event joinable by participant?</label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="joinable" id="joinableYes" value="1">
                                        <label class="form-check-label" for="joinableYes">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="joinable" id="joinableNo" value="0">
                                        <label class="form-check-label" for="joinableNo">No</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="search">Reason for Applying</label>
                                <input type="text" class="form-control" placeholder="Enter Reason" name="reasonForApplication">
                            </div>
                            <div class="form-group">
                                <label for="search">Upload Photo to Display</label>
                                <input type="file" class="form-control" name="eventPhoto">
                            </div>
                            <div class="form-group">

                                <input type="file" class="form-control" name="eventPhoto2">
                            </div>
                            <div class="form-group">

                                <input type="file" class="form-control" name="eventPhoto3">
                            </div>
                            <hr>
                            <div class="form-group title">
                                APPLICANT INFORMATION
                            </div>
                             <div class="row">
                        <div class="col-md-12">
                           <div class="form-group">
                              <label>Full Name</label>
                              <input type="text" class="form-control" name="eventFirstName" placeholder="Enter Owner First Name">
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-12">
                           <div class="form-group">
                              <label>Middle Name</label>
                              <input type="text" class="form-control" name="eventMiddleName" placeholder="Enter Owner Middle Name">
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-8">
                           <div class="form-group">
                              <label>Last Name</label>
                              <input type="text" class="form-control" name="eventLastName" placeholder="Enter Owner Last Name">
                           </div>
                        </div>
                        <div class="col-md-4">
                           <label>Gender</label>
                           <div class="form-group">
                              <div class="form-check form-check-inline">
                                 <input class="form-check-input" type="radio" name="gender" value="Male">
                                 <label class="form-check-label">Male</label>
                              </div>
                              <div class="form-check form-check-inline">
                                 <input class="form-check-input" type="radio" name="gender" value="Female">
                                 <label class="form-check-label">Female</label>
                              </div>
                           </div>
                        </div>
                     </div>
                            <div class="form-group">
                                <label for="search">Email Address</label>
                                <input type="text" class="form-control" placeholder="Enter Email" name="eventOwnerEmail">
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="search">Age</label>
                                        <input type="text" class="form-control" placeholder="Enter Age" name="ownerAge">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="search">Birthdate</label>
                                        <input type="date" class="form-control" placeholder="Enter Birthdate" name="birthDate">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="search">Birth Place</label>
                                        <input type="text" class="form-control" placeholder="Enter Birthplace" name="birthPlace">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="residence">Residence of Baliwag?</label>
                                <div class="form-group">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="residence" id="residenceYes" value="yes">
                                        <label class="form-check-label" for="residenceYes">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="residence" id="residenceNo" value="no">
                                        <label class="form-check-label" for="residenceNo">No</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="search">Upload Valid Id</label>
                                        <input type="file" class="form-control" placeholder="Enter" name="validId">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="search">I.D Number</label>
                                        <input type="text" class="form-control" placeholder="Enter Id Number" name="idNumber">
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="form-group text-right">
                            <button class="btn text-white" style="background-color: #05158F;" onclick="submitApplication()">Submit Application</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function submitApplication() {
        let form = $("#applicationForm")[0];
        let formData = new FormData(form);

        let isValid = true;
        let missingFields = [];

        for (let [key, value] of formData.entries()) {
            if (key === "eventPhoto2" || key === "eventPhoto3") {
                continue;
            }
            if (
                (value instanceof File && value.size === 0) ||
                (typeof value === 'string' && value.trim() === '')
            ) {
                isValid = false;
                missingFields.push(key);

                $(`[name="${key}"]`).addClass('is-invalid');
            } else {
                $(`[name="${key}"]`).removeClass('is-invalid');
            }
        }

        if (!isValid) {
            alert("Please fill in all required fields:\n" + missingFields.join(", "));
            return;
        }

        $.ajax({
            url: '<?php echo base_url(); ?>event/createAdminApplication',
            type: 'POST',
            data: formData,
            dataType: 'json',
            contentType: false,
            processData: false,
            success: function(response) {
                let result = response.data;
                console.log(result);
                if (response.status === 'success') {
                    Swal.fire({
                        toast: true,
                        position: 'top-end',
                        icon: 'success',
                        title: response.message,
                        showConfirmButton: false,
                        timer: 2000
                    });
                    $('#eventModal').modal('hide');
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
                    $('#eventModal').modal('hide');
                    options("all");
                }
            }
        });
    }
</script>