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

    .contact-section .card {
        border: none;
        border-radius: 15px;
        overflow: hidden;
        /* Important for rounded corners on children */
    }

    .contact-info {
        background-color: #59c656;
    }

    .contact-form .form-control {
        border: none;
        border-bottom: 1px solid #ced4da;
        border-radius: 0;
        padding-left: 0;
        box-shadow: none !important;
        /* Override bootstrap focus shadow */
    }

    .contact-form .form-control:focus {
        border-color: #05158F;
    }

    @media screen and (max-width: 600px) {
        .services-container {
            width: 80%;
        }

        .announcement-container {
            width: 80%;
        }
    }

    @media (max-width: 991.98px) {
        .contact-info {
            border-radius: 15px 15px 0 0;
        }
    }
</style>

<body>
    <div class="top-nav-image-container position-relative" style="height: 150px; overflow: hidden;"> <a
            href="<?php echo base_url() ?>landing"> <img src="<?php echo base_url('assets/img/top-nav-image.png'); ?>"
                alt="Top Nav" class="w-100 h-100" style="object-fit: cover;">
            <div class="position-absolute d-flex align-items-center justify-content-center justify-content-md-start px-3"
                style="top: 0; left: 0; right: 0; bottom: 0;"> <img src="<?php echo base_url('assets/img/logo.png'); ?>"
                    alt="Logo" class="img-fluid" style="max-width: 400px;"> </div>
        </a> </div>
    <?php $this->load->view('template/navbar'); ?>
    <section>
        <div class="container-fluid p-0 position-relative" style="height: 350px; overflow: hidden;">
            <img src="<?php echo base_url('assets/img/about_image.jpg'); ?>" alt="Hero Image"
                class="w-100 h-100 position-absolute top-0 start-0"
                style="object-fit: cover; object-position: center; z-index: 1;">
            <!-- Overlay Color -->
            <div class="position-absolute top-0 start-0 w-100 h-100"
                style="background-color: rgba(5, 21, 143, 0.5); z-index: 2;">
            </div>
            <div class="title-poster-container position-relative z-2 h-100 d-flex align-items-center">
                <div class="container">
                    <div class="text-center">
                        <h1 class="font-weight-bold display-4 text-white">Contact Us</h1>
                        <p class="text-white" style="font-size: 1.2rem;">We'd love to hear from you. Reach out with any
                            questions or feedback.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="contact-section py-5" style="background-color: #f8f9fa;">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <div class="card shadow-lg">
                        <div class="row no-gutters">
                            <div class="col-lg-5 contact-info text-white p-5">
                                <h3 class="font-weight-bold mb-4" style="color: #112704;">Get in Touch</h3>
                                <p class="mb-4" style="color: #112704;">We are here to help. Reach out to
                                    us for any inquiries or support.</p>
                                <div class="d-flex align-items-start mb-3">
                                    <i class="fas fa-map-marker-alt fa-fw mt-1 mr-3" style="color: #112704;"></i>
                                    <span style="color: #112704;">Baliwag, Bulacan</span>
                                </div>
                                <div class="d-flex align-items-start mb-3">
                                    <i class="fas fa-phone fa-fw mt-1 mr-3" style="color: #112704;"></i>
                                    <span style="color: #112704;">(044) 766 1402</span>
                                </div>
                                <div class="d-flex align-items-start">
                                    <i class="fas fa-envelope fa-fw mt-1 mr-3" style="color: #112704;"></i>
                                    <span style="color: #112704;">administrator@baliwag.gov.ph</span>
                                </div>
                            </div>
                            <div class="col-lg-7 p-5 contact-form">
                                <h3 class="font-weight-bold mb-4" style="color: #05158F;">Send a Message</h3>
                                <form id="feedbackForm">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="name" placeholder="Name"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="email" class="form-control" name="email"
                                                    placeholder="Email" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <select class="form-control" name="subject" required>
                                            <option value="">Select Subject</option>
                                            <option value="1">BPPLO</option>
                                            <option value="2">Tourism</option>
                                            <option value="general">General Inquiry</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control" placeholder="Message" rows="4" name="message"
                                            required></textarea>
                                    </div>
                                    <button type="button" class="btn btn-primary w-100 mt-3"
                                        style="background-color: #05158F;" onclick="sendFeedback()">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php $this->load->view('template/footer'); ?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
    <script>
        function sendFeedback() {

            let form = $("#feedbackForm")[0];
            let formdata = new FormData(form);

            const subject = formdata.get("subject") ? formdata.get("subject").trim() : "";
            const name = formdata.get("name") ? formdata.get("name").trim() : "";
            const email = formdata.get("email") ? formdata.get("email").trim() : "";
            const message = formdata.get("message") ? formdata.get("message").trim() : "";

            if (!subject || !name || !email || !message) {
                alert("Please fill in all the fields.");
                return;
            }

            $.ajax({
                url: '<?php echo base_url(); ?>Landing/sendFeedback',
                method: 'POST',
                data: formdata,
                dataType: 'json',
                contentType: false,
                processData: false,
                success: function (response) {
                    if (response.status === 'success') {
                        Swal.fire({
                            toast: true,
                            position: 'top-end',
                            icon: 'success',
                            title: response.message,
                            showConfirmButton: false,
                            timer: 2000
                        });
                        form.reset();
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
                        window.scrollTo({
                            top: 0,
                            behavior: 'smooth'
                        });
                    }
                }
            })
        }
    </script>
</body>

</html>