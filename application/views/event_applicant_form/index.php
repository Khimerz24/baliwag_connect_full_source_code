<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100..900;1,100..900&family=Style+Script&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100..900;1,100..900&family=Style+Script&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Raleway:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100..900;1,100..900&family=Style+Script&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet"> 
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js"></script>
    <link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/img/main-logo.png">
    <title>Home - Baliwag Connect</title>
</head>
<style>
    * {
        font-family: 'roboto', sans-serif;
        color: #05158F;
    }

    .loading-text {
        color: white;
    }

    .title-poster-container::before {
        position: absolute;
        inset: 0;
        background: rgba(0, 0, 0, 0.4);
        z-index: 1;
    }

    .title-poster-container .container {
        position: relative;
        z-index: 2;
    }

    .circle {
        width: 180px;
        height: 180px;
        border-radius: 50%;
        background-color: #05158F;
        transition: transform 0.5s ease-in-out;
    }

    .circle:hover {
        transform: scale(1.1);
        cursor: pointer;
    }

    .social-media {
        transition: transform 0.5s ease-in-out;
    }

    .social-media:hover {
        transform: scale(1.1);
        cursor: pointer;
    }

    .thick-blue-border {
        border: 5px solid #05158F;
        border-radius: 0.5rem;
    }

    button.fc-today-button.fc-button.fc-button-primary {
        display: none;
    }

    button.fc-prev-button.fc-button.fc-button-primary {
        display: none;
    }

    button.fc-next-button.fc-button.fc-button-primary {
        display: none;
    }

    @media screen and (max-width: 600px) {
        .services-container {
            width: 80%;
        }

        .announcement-container {
            width: 80%;
        }
    }

    .blur-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.6);
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 1050;
        backdrop-filter: blur(5px);
        -webkit-backdrop-filter: blur(5px);
    }

    .overlay-content {
        text-align: center;
        color: white;
        background: rgba(5, 21, 143, 0.85);
        padding: 40px 50px;
        border-radius: 15px;
        max-width: 550px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
    }

    .lock-icon {
        font-size: 50px;
        margin-bottom: 20px;
        color: white;
    }

    .overlay-title {
        font-weight: bold;
        color: white;
        margin-bottom: 15px;
        font-family: 'Montserrat', sans-serif;
    }

    .overlay-subtitle {
        color: #f0f0f0;
        margin-bottom: 30px;
        font-size: 1.1rem;
        line-height: 1.6;
    }

    .login-btn {
        background-color: #28a745;
        color: white;
        padding: 12px 30px;
        border-radius: 5px;
        text-decoration: none;
        font-weight: bold;
        transition: background-color 0.3s;
        border: none;
    }

    .login-btn i {
        color: white;
    }

    .login-btn:hover {
        background-color: #218838;
        color: white;
        text-decoration: none;
    }

    .content-blurred {
        filter: blur(5px);
        pointer-events: none;
        user-select: none;
    }

    .form-container {
        background: #f8f9fa;
        border-radius: 20px;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        max-width: 800px;
        margin: 0rem auto;
    }

    .form-header {
        background: #0318b1;
        color: white;
        padding: 20px;
        text-align: center;
        font-size: 20px;
        font-weight: 600;
        letter-spacing: 0.5px;
    }

    .form-content {
        padding: 40px;
    }

    .section-title {
        color: #666;
        font-size: 18px;
        font-weight: 600;
        margin-bottom: 30px;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .form-label {
        color: #0318b1;
        font-weight: 600;
        margin-bottom: 8px;
    }

    .required {
        color: #dc3545;
    }

    .form-control {
        border: 2px solid #ddd;
        border-radius: 8px;
        padding: 12px 16px;
        font-size: 16px;
        transition: border-color 0.2s ease;
    }

    .form-control:focus {
        border-color: #0318b1;
        box-shadow: 0 0 0 0.2rem rgba(26, 35, 126, 0.15);
    }

    .form-check-input {
        margin-top: 0.25rem;
    }

    .form-check-label {
        color: #333;
        margin-left: 8px;
    }

    .upload-area {
        border: 2px dashed #ddd;
        border-radius: 8px;
        padding: 30px;
        text-align: center;
        background: #f8f9fa;
        transition: all 0.2s ease;
        cursor: pointer;
    }

    .upload-area:hover {
        border-color: #0318b1;
        background: #f0f0f0;
    }

    .upload-icon {
        width: 60px;
        height: 60px;
        background: #e0e0e0;
        margin: 0 auto 15px;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        color: #999;
    }

    .upload-text {
        color: #666;
        font-size: 16px;
    }

    .submit-btn {
        background: #0318b1;
        border: none;
        border-radius: 8px;
        padding: 12px 40px;
        font-size: 16px;
        font-weight: 600;
        color: white;
        transition: all 0.2s ease;
        width: 100%;
    }

    .submit-btn:hover {
        background: #303f9f;
        transform: translateY(-1px);
    }

    .row.mb-3 {
        margin-bottom: 24px !important;
    }
</style>

<body>
    <div class="top-nav-image-container position-relative" style="height: 150px; overflow: hidden;">
        <img src="<?php echo base_url('assets/img/top-nav-image.png'); ?>" alt="Top Nav" class="w-100 h-100"
            style="object-fit: cover;">
        <div class="position-absolute d-flex align-items-center justify-content-center justify-content-md-start px-3"
            style="top: 0; left: 0; right: 0; bottom: 0;">
            <img src="<?php echo base_url('assets/img/logo.png'); ?>" alt="Logo" class="img-fluid"
                style="max-width: 400px;">
        </div>
    </div>
    <!-- <div class="navbar" style="background-color: #05158F;">
         <img src="<?php echo base_url('assets/img/logo.png'); ?>" alt="" style=" height: 50px;">
         </div> -->
    <?php $this->load->view('template/navbar'); ?>
    <div style="position: relative;">
        <div id="main-content">
            <section class="py-4" style="background-color: #E8F3E8;">
                <div class="container" style="max-width: 1000px;">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb" style="background-color: transparent; padding-left: 0;">
                            <li class="breadcrumb-item"><a href="<?php echo base_url('landing/event'); ?>">Event
                                    List</a></li>
                            <li class="breadcrumb-item active" aria-current="page" > Participant's Application</li>
                        </ol>
                    </nav>
                </div>
                <div class="container offers-container  p-0 rounded"
                    style="max-width: 1000px;">
                    <div class="form-container">
                        <!-- Header -->
                        <div class="form-header">
                            EVENT PARTICIPANT'S APPLICATION
                        </div>

                        <!-- Form Content -->
                        <div class="form-content">
                            <h3 class="section-title">PARTICIPANT INFORMATION</h3>
                            
                            <form id="applicantForm">
                                <!-- Name and Gender -->
                                <div class="row mb-3">
                                    <div class="col-md-8">
                                        <label class="form-label">Full Name<span class="required">*</span></label>
                                        <input type="text" class="form-control" name="applicantName" placeholder="Enter Full Name" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Gender<span class="required">*</span></label>
                                        <div class="mt-2 pt-1">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="gender" id="male" value="Male" required>
                                                <label class="form-check-label" for="male">Male</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="gender" id="female" value="Female" required>
                                                <label class="form-check-label" for="female">Female</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Email -->
                                <div class="row mb-3">
                                    <div class="col-12">
                                        <label class="form-label">Email<span class="required">*</span></label>
                                        <input type="email" class="form-control" name="applicantEmail" placeholder="Enter Email Address" required>
                                    </div>
                                </div>

                                <!-- Age, Birthday, Place of Birth -->
                                <div class="row mb-3">
                                    <div class="col-md-4">
                                        <label class="form-label">Age<span class="required">*</span></label>
                                        <input type="number" class="form-control" name="applicantAge" placeholder="Enter Age" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Birthday<span class="required">*</span></label>
                                        <input type="date" class="form-control" name="applicantBirthDate" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Place of Birth<span class="required">*</span></label>
                                        <input type="text" class="form-control" name="applicantBirthPlace" placeholder="Enter Birth Place" required>
                                    </div>
                                </div>

                                <!-- Address -->
                                <div class="row mb-3">
                                    <div class="col-12">
                                        <label class="form-label">Address<span class="required">*</span></label>
                                        <input type="text" class="form-control" name="applicantAddress" placeholder="Enter Full Address" required>
                                    </div>
                                </div>

                                <!-- Reason for Applying -->
                                <div class="row mb-3">
                                    <div class="col-12">
                                        <label class="form-label">Reason for Applying<span class="required">*</span></label>
                                        <input type="text" class="form-control" name="reasonOfApplication" placeholder="Enter Reason" required>
                                    </div>
                                </div>

                                <!-- Upload ID and ID Number -->
                                <div class="row mb-4">
                                    <div class="col-md-6">
                                        <label class="form-label">Upload Valid I.D.<span class="required">*</span></label>
                                        <div class="upload-area" onclick="document.getElementById('idUpload').click()">
                                            <div class="upload-icon">📷</div>
                                            <div class="upload-text">Upload a Photo</div>
                                        </div>
                                        <input type="file" id="idUpload" name="validId" accept="image/*" style="display: none;" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">I.D. Number<span class="required">*</span></label>
                                        <input type="text" class="form-control" name="idNumber" placeholder="Enter ID Number" required>
                                    </div>
                                </div>

                                <!-- Submit Button -->
                                <div class="text-center mt-4">
                                    <button type="button" class="submit-btn" onclick="submitApplicant()">Submit Application</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>

            <div id="loader_spinner" style="
            display: none;      
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5); /* semi-transparent black */
            backdrop-filter: blur(4px); 
            z-index: 9999;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            text-align: center;
            color: #fff;
            ">
                <div role="status" class="loader">
                    <svg class="icon" viewBox="0 0 256 256">
                        <line x1="128" y1="32" x2="128" y2="64" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="24"></line>
                        <line x1="195.9" y1="60.1" x2="173.3" y2="82.7" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="24"></line>
                        <line x1="224" y1="128" x2="192" y2="128" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="24"></line>
                        <line x1="195.9" y1="195.9" x2="173.3" y2="173.3" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="24"></line>
                        <line x1="128" y1="224" x2="128" y2="192" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="24"></line>
                        <line x1="60.1" y1="195.9" x2="82.7" y2="173.3" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="24"></line>
                        <line x1="32" y1="128" x2="64" y2="128" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="24"></line>
                        <line x1="60.1" y1="60.1" x2="82.7" y2="82.7" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="24"></line>
                    </svg>
                    <span class="loading-text">Loading...</span>
                </div>
            </div>
            <!-- <pre>
      <?php print_r($event_id); ?>
   </pre> -->
            <input type="text" hidden value="<?php echo $event_id; ?>" id="event_id">
            <?php $this->load->view('template/loading_modal'); ?>
        </div>
        <?php if (empty($user_id)): ?>
        <div class="blur-overlay" id="blurOverlay">
            <div class="overlay-content">
                <div class="lock-icon">
                    <i class="fas fa-lock text-white"></i>
                </div>
                <h2 class="overlay-title">ACCESS RESTRICTED</h2>
                <p class="overlay-subtitle">
                    You need to be logged in first to access this form. Please sign in to continue and join events.
                </p>
                <a href="<?php echo base_url('login'); ?>" class="login-btn">
                    <i class="fas fa-sign-in-alt mr-2"></i>
                    Login Now
                </a>
            </div>
        </div>
        <?php endif; ?>
    </div>

    <?php $this->load->view('template/footer'); ?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
    <script>
        $(document).ready(function () {
            <?php if (empty($user_id)): ?>
                $('#main-content').addClass('content-blurred');
            <?php endif; ?>
            $('#loader_spinner').hide();

            // --- VALIDATIONS & AUTO-COMPUTATION ---

            // Full name validation
            $('input[name="applicantName"]').on('input', function () {
                // Allow only letters and spaces
                $(this).val($(this).val().replace(/[^a-zA-Z\s]/g, ''));
            });

            // Email validation function
            function validateEmail(email) {
                var re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                return re.test(String(email).toLowerCase());
            }

            // Email validation on blur
            $('input[name="applicantEmail"]').on('blur', function () {
                var email = $(this).val();
                if (email && !validateEmail(email)) {
                    Swal.fire({
                        toast: true,
                        position: 'top-end',
                        icon: 'error',
                        title: 'Please enter a valid email address.',
                        showConfirmButton: false,
                        timer: 2500
                    });
                }
            });

            // Reason for Applying: no special characters
            $('input[name="reasonOfApplication"]').on('input', function () {
                $(this).val($(this).val().replace(/[^a-zA-Z0-9\s]/g, ''));
            });

            // ID Number: no special characters
            $('input[name="idNumber"]').on('input', function () {
                $(this).val($(this).val().replace(/[^a-zA-Z0-9]/g, ''));
            });

            // Age and Birthdate calculation and validation
            var todayForAge = new Date();

            // Set max date for birthdate: 11 years ago from today (for minimum age of 11)
            var maxDate = new Date(todayForAge.getFullYear() - 11, todayForAge.getMonth(), todayForAge.getDate());
            $('input[name="applicantBirthDate"]').attr('max', maxDate.toISOString().split('T')[0]);

            // Set min date for birthdate: 100 years ago from today + 1 day (for maximum age of 99)
            var minDate = new Date(todayForAge.getFullYear() - 100, todayForAge.getMonth(), todayForAge.getDate() + 1);
            $('input[name="applicantBirthDate"]').attr('min', minDate.toISOString().split('T')[0]);

            $('input[name="applicantBirthDate"]').on('change', function () {
                var birthDate = $(this).val();
                if (birthDate) {
                    var today = new Date();
                    var birthDateObj = new Date(birthDate);
                    var age = today.getFullYear() - birthDateObj.getFullYear();
                    var m = today.getMonth() - birthDateObj.getMonth();
                    if (m < 0 || (m === 0 && today.getDate() < birthDateObj.getDate())) {
                        age--;
                    }
                    $('input[name="applicantAge"]').val(age);
                } else {
                    $('input[name="applicantAge"]').val('');
                }
            });

            // Manual age input validation
            $('input[name="applicantAge"]').on('input', function () {
                // Allow only numbers
                var sanitized = $(this).val().replace(/[^0-9]/g, '');
                $(this).val(sanitized);
            });

            // Add indicator and preview for file uploads
            $('input[type="file"]').on('change', function (e) {
                const $input = $(this);
                const $uploadArea = $input.prev('.upload-area');

                // Store original HTML content if not already stored
                if (!$uploadArea.data('original-html')) {
                    $uploadArea.data('original-html', $uploadArea.html());
                }

                const file = e.target.files[0];

                if (file && file.type.startsWith('image/')) {
                    const reader = new FileReader();

                    reader.onload = function (event) {
                        // Create an image element for the preview
                        const $previewImg = $('<img>', {
                            src: event.target.result,
                            alt: 'Image Preview',
                            css: {
                                'max-height': '120px', // Set a max-height for consistency
                                'max-width': '100%',
                                'object-fit': 'contain',
                                'border-radius': '4px'
                            }
                        });

                        // Replace the content of the upload area with the preview
                        $uploadArea.html($previewImg).css({
                            'padding': '10px',
                            'border-color': '#28a745',
                            'background-color': '#f0fff5'
                        });
                    };

                    reader.readAsDataURL(file);
                } else {
                    // Revert to original content if no file is selected or it's not an image
                    if ($uploadArea.data('original-html')) {
                        $uploadArea.html($uploadArea.data('original-html'));
                    }
                    $uploadArea.css({
                        'padding': '',
                        'border-color': '',
                        'background-color': ''
                    });
                }
            });
        });

        function submitApplicant() {
            let event_id = $('#event_id').val();
            let form = $("#applicantForm")[0];
            let formData = new FormData(form);
            formData.append('eventId', event_id);
            let isValid = true;
            let missingFields = [];

            // Email validation function for submission
            function validateEmail(email) {
                var re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                return re.test(String(email).toLowerCase());
            }

            for (let [key, value] of formData.entries()) {
                if (
                    (value instanceof File && value.size === 0) ||
                    (typeof value === 'string' && value.trim() === '')
                ) {
                    isValid = false;
                    missingFields.push(key);

                    $(`[name="${key}"]`).addClass('is-invalid');
                } else {
                    // Additional validation for specific fields
                    if (key === 'applicantEmail' && !validateEmail(value)) {
                        isValid = false;
                        $(`[name="${key}"]`).addClass('is-invalid');
                        Swal.fire({
                            toast: true,
                            position: 'top-end',
                            icon: 'error',
                            title: 'Please enter a valid email address.',
                            showConfirmButton: false,
                            timer: 2500
                        });
                    } else {
                        $(`[name="${key}"]`).removeClass('is-invalid');
                    }
                }
            }

            if (!isValid) {
                if (missingFields.length > 0) {
                    alert("Please fill in all required fields.");
                }
                return; // Stop submission if validation fails
            }

            $.ajax({
                url: '<?php echo base_url(); ?>event_applicant_form/createApplicant',
                type: 'POST',
                data: formData,
                dataType: 'json',
                contentType: false,
                processData: false,
                beforeSend: function () {
                    $('#loader_spinner').show();
                },
                success: function (response) {
                    let result = response.data;
                    if (response.status === 'success') {
                        $('#loader_spinner').hide();
                        Swal.fire({
                            toast: true,
                            position: 'top-end',
                            icon: 'success',
                            title: response.message,
                            showConfirmButton: false,
                            timer: 2000
                        });
                        setInterval(function () {
                            window.location.href = "<?php echo base_url('landing'); ?>";
                        }, 2000);
                    } else {
                        $('#loader_spinner').hide();
                        alert(response.message);
                    }
                }
            });
        }
    </script>
</body>

</html>