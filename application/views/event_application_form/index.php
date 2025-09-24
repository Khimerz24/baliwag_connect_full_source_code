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
    .access-denied-container {
        text-align: center;
        color: white;
        background: rgba(5, 21, 143, 0.9);
        padding: 40px 50px;
        border-radius: 15px;
        max-width: 600px;
        margin: 50px auto;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
    }

    .lock-icon {
        font-size: 50px;
        margin-bottom: 20px;
        color: white;
    }

    .access-denied-title {
        font-weight: bold;
        color: white;
        margin-bottom: 15px;
        font-family: 'Montserrat', sans-serif;
    }

    .access-denied-subtitle {
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
    <?php if (!empty($user_id)): ?>
    <section class="py-4" style="background-color: #E8F3E8;">
        <div class="container" style="max-width: 1000px;">
            <nav aria-label="breadcrumb" class="pt-3">
                <ol class="breadcrumb" style="background-color: transparent; padding-left: 0;">
                    <li class="breadcrumb-item"><a
                            href="<?php echo base_url('landing/bussiness_application'); ?>">Event
                            Application</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Event Application</li>
                </ol>
            </nav>
        </div>
        <div class="container p-0 rounded" style="max-width: 1000px;">
            <div class="form-container">
                <div class="form-header">
                    Event Application Form
                </div>
                <div class="form-content">
                    <!-- Tabs -->
                    <ul class="nav nav-tabs" id="appFormTabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="tab1-tab" data-toggle="tab" href="#tab1" role="tab">Event
                                Info</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="tab2-tab" data-toggle="tab" href="#tab2" role="tab">Event Media</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="tab3-tab" data-toggle="tab" href="#tab3" role="tab">Applicant
                                Info</a>
                        </li>
                    </ul>

                    <form id="applicationForm">
                        <div class="tab-content mt-4" id="appFormTabsContent">

                            <!-- TAB 1 -->
                            <div class="tab-pane fade show active" id="tab1" role="tabpanel">
                                <h3 class="section-title">EVENT INFORMATION</h3>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label class="form-label">Event Name<span class="required">*</span></label>
                                        <input type="text" class="form-control" name="eventName"
                                            placeholder="Enter Event Name" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Event Date<span class="required">*</span></label>
                                        <input type="date" class="form-control" name="eventDate" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-12">
                                        <label class="form-label">Event Description<span
                                                class="required">*</span></label>
                                        <textarea class="form-control" name="eventDescription"
                                            placeholder="Enter a brief description of the event" rows="3"
                                            required></textarea>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label class="form-label">Email<span class="required">*</span></label>
                                        <input type="email" class="form-control" name="eventEmail"
                                            placeholder="Enter Email" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Phone Number<span class="required">*</span></label>
                                        <input type="tel" class="form-control" name="eventPhoneNumber"
                                            placeholder="Enter Phone Number" maxlength="11" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-12">
                                        <label class="form-label">Event Address<span class="required">*</span></label>
                                        <input type="text" class="form-control" name="eventAddress"
                                            placeholder="Enter Full Address" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label class="form-label">Is the event joinable?<span
                                                class="required">*</span></label>
                                        <div class="mt-2 pt-1">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="joinable" value="1"
                                                    required>
                                                <label class="form-check-label">Yes</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="joinable" value="0"
                                                    required>
                                                <label class="form-check-label">No</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Event Logo<span class="required">*</span></label>
                                        <div class="upload-area" onclick="document.getElementById('eventLogo').click()">
                                            <div class="upload-icon">📷</div>
                                            <div class="upload-text">Upload Logo</div>
                                        </div>
                                        <input type="file" id="eventLogo" name="eventLogo" accept="image/*"
                                            style="display: none;" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-12">
                                        <label class="form-label">Reason for Applying<span
                                                class="required">*</span></label>
                                        <input type="text" class="form-control" name="reasonForApplication"
                                            placeholder="Enter Reason" required>
                                    </div>
                                </div>
                            </div>

                            <!-- TAB 2 -->
                            <div class="tab-pane fade" id="tab2" role="tabpanel">
                                <h3 class="section-title">EVENT MEDIA</h3>
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <label class="form-label">Upload Photos for Gallery<span
                                                class="required">*</span></label>
                                        <div class="upload-area mb-3"
                                            onclick="document.getElementById('eventPhoto1').click()">
                                            <div class="upload-icon">🖼️</div>
                                            <div class="upload-text">Upload Main Photo</div>
                                        </div>
                                        <input type="file" id="eventPhoto1" name="eventPhoto" accept="image/*"
                                            style="display: none;" required>

                                        <div class="upload-area mb-3"
                                            onclick="document.getElementById('eventPhoto2').click()">
                                            <div class="upload-icon">🖼️</div>
                                            <div class="upload-text">Upload Second Photo (Optional)</div>
                                        </div>
                                        <input type="file" id="eventPhoto2" name="eventPhoto2" accept="image/*"
                                            style="display: none;">

                                        <div class="upload-area"
                                            onclick="document.getElementById('eventPhoto3').click()">
                                            <div class="upload-icon">🖼️</div>
                                            <div class="upload-text">Upload Third Photo (Optional)</div>
                                        </div>
                                        <input type="file" id="eventPhoto3" name="eventPhoto3" accept="image/*"
                                            style="display: none;">
                                    </div>
                                </div>
                            </div>

                            <!-- TAB 3 -->
                            <div class="tab-pane fade" id="tab3" role="tabpanel">
                                <h3 class="section-title">APPLICANT INFORMATION</h3>
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
                                <div class="row mb-3">
                                    <div class="col-12">
                                        <label class="form-label">Email Address<span class="required">*</span></label>
                                        <input type="email" class="form-control" name="eventOwnerEmail"
                                            placeholder="Enter Email Address" required>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-4">
                                        <label class="form-label">Age<span class="required">*</span></label>
                                        <input type="number" class="form-control" name="ownerAge"
                                            placeholder="Enter Age" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Birthdate<span class="required">*</span></label>
                                        <input type="date" class="form-control" name="birthDate" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Birth Place<span class="required">*</span></label>
                                        <input type="text" class="form-control" name="birthPlace"
                                            placeholder="Enter Birth Place" required>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label class="form-label">Residence of Baliwag?<span
                                                class="required">*</span></label>
                                        <div class="mt-2 pt-1">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="residence"
                                                    value="yes" required>
                                                <label class="form-check-label">Yes</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="residence" value="no"
                                                    required>
                                                <label class="form-check-label">No</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <div class="col-md-6">
                                        <label class="form-label">Upload Valid I.D.<span
                                                class="required">*</span></label>
                                        <div class="upload-area" onclick="document.getElementById('validId').click()">
                                            <div class="upload-icon">🆔</div>
                                            <div class="upload-text">Upload ID</div>
                                        </div>
                                        <input type="file" id="validId" name="validId" accept="image/*"
                                            style="display: none;" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">I.D. Number<span class="required">*</span></label>
                                        <input type="text" class="form-control" name="idNumber"
                                            placeholder="Enter ID Number" required>
                                    </div>
                                </div>

                                <div class="text-center mt-4">
                                    <button type="button" class="submit-btn" onclick="submitApplication()">Submit
                                        Application</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <?php else: ?>
    <section class="py-5" style="background-color: #E8F3E8;">
        <div class="container">
            <div class="access-denied-container">
                <div class="lock-icon">
                    <i class="fas fa-lock text-white"></i>
                </div>
                <h2 class="access-denied-title">ACCESS RESTRICTED</h2>
                <p class="access-denied-subtitle">
                    You need to be logged in first to access this form. Please sign in to continue and submit an event.
                </p>
                <a href="<?php echo base_url('login'); ?>" class="login-btn">
                    <i class="fas fa-sign-in-alt mr-2"></i>
                    Login Now
                </a>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <?php $this->load->view('template/footer'); ?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
    <script>
        $(document).ready(function () {
            $('input[name="eventName"], input[name="eventDescription"]').on('input', function () {
                // Allow letters, numbers, and spaces, and remove other special characters.
                $(this).val($(this).val().replace(/[^a-zA-Z0-9\s]/g, ''));
            });

            $('input[name="eventOwner"]').on('input', function () {
                // Allow only letters and spaces
                $(this).val($(this).val().replace(/[^a-zA-Z\s]/g, ''));
            });

            $('input[name="ownerAge"]').on('input', function () {
                // Allow only numbers
                $(this).val($(this).val().replace(/[^0-9]/g, ''));
            }).on('blur', function () {
                var age = parseInt($(this).val(), 10);
                if ($(this).val() && (age < 11 || age > 99)) {
                    Swal.fire({
                        toast: true,
                        position: 'top-end',
                        icon: 'error',
                        title: 'Age must be between 11 and 99.',
                        showConfirmButton: false,
                        timer: 2500
                    });
                    $(this).val(''); // Clear the invalid value
                }
            });

            // Email validation
            function validateEmail(email) {
                var re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                return re.test(String(email).toLowerCase());
            }

            $('input[name="eventEmail"], input[name="eventOwnerEmail"]').on('blur', function () {
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

            // Set the minimum date for the eventDate input to today
            var today = new Date().toISOString().split('T')[0];
            $('input[name="eventDate"]').attr('min', today);

            $('input[name="eventPhoneNumber"]').on('input', function () {
                // Allow only numbers
                $(this).val($(this).val().replace(/[^0-9]/g, ''));
            });

            // Age and Birthdate calculation and validation
            var todayForAge = new Date();

            // Set max date for birthdate: 11 years ago from today (for minimum age of 11)
            var maxDate = new Date(todayForAge.getFullYear() - 11, todayForAge.getMonth(), todayForAge.getDate());
            $('input[name="birthDate"]').attr('max', maxDate.toISOString().split('T')[0]);

            // Set min date for birthdate: 100 years ago from today + 1 day (for maximum age of 99)
            var minDate = new Date(todayForAge.getFullYear() - 100, todayForAge.getMonth(), todayForAge.getDate() + 1);
            $('input[name="birthDate"]').attr('min', minDate.toISOString().split('T')[0]);

            $('input[name="birthDate"]').on('change', function () {
                var birthDate = $(this).val();
                if (birthDate) {
                    var today = new Date();
                    var birthDateObj = new Date(birthDate);
                    var age = today.getFullYear() - birthDateObj.getFullYear();
                    var m = today.getMonth() - birthDateObj.getMonth();
                    if (m < 0 || (m === 0 && today.getDate() < birthDateObj.getDate())) {
                        age--;
                    }
                    $('input[name="ownerAge"]').val(age);
                } else {
                    $('input[name="ownerAge"]').val('');
                }
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

        function submitApplication() {
            event.preventDefault();
            let form = $("#applicationForm")[0];
            let formData = new FormData(form);

            let isValid = true;
            let missingFields = [];

            // Email validation function
            function validateEmail(email) {
                var re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                return re.test(String(email).toLowerCase());
            }

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
                    // Additional validation for specific fields
                    if ((key === 'eventEmail' || key === 'eventOwnerEmail') && !validateEmail(value)) {
                        isValid = false;
                        $(`[name="${key}"]`).addClass('is-invalid');
                        Swal.fire({
                            toast: true,
                            position: 'top-end',
                            icon: 'error',
                            title: 'Please enter a valid email for ' + $(`[name="${key}"]`).prev('label').text(),
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
                url: '<?php echo base_url(); ?>event_application_form/createApplication',
                type: 'POST',
                data: formData,
                dataType: 'json',
                contentType: false,
                processData: false,
                success: function (response) {
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
                },
                complete: function () {
                    setInterval(function () {
                        window.location.href = "<?php echo base_url('landing'); ?>";
                    }).delay(2000);
                }
            });
        }
    </script>

</body>

</html>