<section id="feedback">
   <div class="container d-flex justify-content-center px-4">
      <div class="feedback-container w-100" style="max-width: 600px;">
         <form id="feedbackForm">
            <label for="">Got a Question?</label>
            <div class="row">
               <div class="col-md-12 mb-3">
                  <select class="form-control" name="subject" required>
                     <option value="">Select Subject</option>
                     <option value="1">BPPLO</option>
                     <option value="2">Tourism</option>
                  </select>
               </div>
            </div>
            <div class="row">
               <div class="col-md-12 mb-3">
                  <input type="text" class="form-control" placeholder="Enter First Name" name="firstName" required>
               </div>
             
            </div>
            <div class="row">
               <div class="col-md-12 mb-3">
                  <input type="text" class="form-control" placeholder="Enter Middle Name" name="middleName" required>
               </div>
              
            </div>
            <div class="row">
               <div class="col-md-12 mb-3">
                  <input type="text" class="form-control" placeholder="Enter Last Name" name="lastName" required>
               </div>
             
            </div>
            <div class="row">
            <div class="col-md-12 mb-3">
                  <input type="email" class="form-control" placeholder="Email" name="email" required>
               </div>
            </div>
            <div class="row">
               <div class="col-12 mb-3">
                  <textarea class="form-control" placeholder="Message" name="message" rows="4" required></textarea>
               </div>
            </div>
         </form>
         <div class="row">
            <div class="col-12">
               <button class="btn btn-primary w-100" onclick="sendFeedback()">Send</button>
            </div>
         </div>
      </div>
   </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
   function sendFeedback() {

      let formdata = new FormData($("#feedbackForm")[0]);

      const subject = formdata.get("subject").trim();
      const firstName = formdata.get("firstName").trim();
      const middleName = formdata.get("middleName").trim();
      const lastName = formdata.get("lastName").trim();
      const email = formdata.get("email").trim();
      const message = formdata.get("message").trim();

      if (!firstName || !middleName || !lastName || !email || !message) {
         alert("Please fill in all the fields.");
         return;
      }

      $.ajax({
         url: '<?php echo base_url(); ?>Landing/sendFeedback',
         data: formdata,
         type: 'POST',
         data: formdata,
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
               $("#feedbackForm")[0].reset();
               window.scrollTo({
                  top: 0,
                  behavior: 'smooth'
               });

            } else {
               Swal.fire({
                  toast: true,
                  position: 'top-end',
                  icon: 'error',
                  title: response.message,
                  showConfirmButton: false,
                  timer: 2000
               });
               $("#feedbackForm")[0].reset();
               window.scrollTo({
                  top: 0,
                  behavior: 'smooth'
               });
            }

         }

      })
   }
</script>