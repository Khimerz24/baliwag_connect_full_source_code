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
</head>
<style>
    * {
        font-family: "roboto", sans-serif;
        color: #05158f;
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
        background-color: #05158f;
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
        border: 5px solid #05158f;
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

    /* design information*/

    .card {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        background-color: #002bb8;
        border-radius: 8px;
        overflow: hidden;
        max-width: 900px;
        color: white;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    }

    .logo-containers {
        background-color: white;
        border-radius: 15px;
        width: 400px;
        height: 400px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 20px;
        flex-shrink: 0;
    }

    .logo-containers img {
        max-width: 90%;
        max-height: 90%;
    }

    .text-container {
        padding: 20px;
        flex: 1;
        min-width: 250px;
    }

    .title {
        background-color: #45c629;
        color: white;
        font-size: 24px;
        font-weight: bold;
        padding: 10px 15px;
        display: inline-block;
        border-radius: 4px;
        margin-bottom: 15px;
    }

    .description {
        font-size: 16px;
        line-height: 1.6;
        color: white;
    }

    .photo {
        width: 80%;

    }

    @media screen and (max-width: 600px) {
        .card {
            flex-direction: column;
            text-align: center;
            padding: 20px;
        }

        .logo-containers {
            margin: 0 auto 20px;
            width: 200px;
            height: 200px;
        }

        .title {
            font-size: 20px;
        }

        .description {
            font-size: 14px;
        }

        .photo {
            width: 100%;

        }
    }
</style>

<body>
    <div class="top-nav-image-container position-relative" style="height: 150px; overflow: hidden;">
        <a href="<?php echo base_url() ?>landing">
            <img src="<?php echo base_url('assets/img/top-nav-image.png'); ?>" alt="Top Nav" class="w-100 h-100"
                style="object-fit: cover;">
            <div class="position-absolute d-flex align-items-center justify-content-center justify-content-md-start px-3"
                style="top: 0; left: 0; right: 0; bottom: 0;">
                <img src="<?php echo base_url('assets/img/logo.png'); ?>" alt="Logo" class="img-fluid"
                    style="max-width: 400px;">
            </div>
        </a>
    </div>
    <?php $this->load->view('template/navbar'); ?>
    <section>
        <div class="container outerpadding p-4 ">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb" style="background-color: transparent; padding-left: 0;">
                    <li class="breadcrumb-item"><a href="<?php echo base_url('landing/event'); ?>">Event List</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                        <?php echo $details[0]->event_name; ?>
                    </li>
                </ol>
            </nav>
            <div class="d-flex align-items-center justify-content-center px-4">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-6 d-flex justify-content-center">
                        <div class="logo-containers overflow-hidden">
                            <img src="<?php echo base_url($details[0]->event_logo); ?>" alt="Logo" class="img-fluid" />
                        </div>
                    </div>
                    <div class="col-lg-6 d-flex align-items-center justify-content-center mt-4 mt-lg-0">

                        <div class="description-container">
                            <h1 class="font-weight-bold mb-3">
                                <?php echo $details[0]->event_name; ?>
                            </h1>
                            <p class="text-muted mb-3">
                                <?php echo $details[0]->event_description; ?>
                            </p>
                            <div class="extra-content">
                                <p class="mb-2"><i class="fas fa-map-marker-alt text-success mr-2"></i>
                                    <?php echo $details[0]->event_address; ?>
                                </p>
                                <p class="mb-2"><i class="fas fa-envelope text-success mr-2"></i>
                                    <?php echo $details[0]->event_email; ?>
                                </p>
                                <p class="mb-0"><i class="fas fa-phone text-success mr-2"></i>
                                    <?php echo $details[0]->event_phone_number; ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mt-5">
                        <h3 class="font-weight-bold mb-4 text-center">Gallery</h3>
                        <div class="row">
                            <div class="col-md-7 mb-3">
                                <img src="<?php echo empty($details[0]->event_photo) ? base_url('assets/images/no-photo.png') : base_url($details[0]->event_photo); ?>"
                                    class="img-fluid rounded shadow"
                                    style="width:100%; height: 400px; object-fit: cover;" alt="Event Photo 1">
                            </div>
                            <div class="col-md-5">
                                <div class="row">
                                    <?php if (!empty($details[0]->event_photo_2)): ?>
                                    <div class="col-12 mb-3">
                                        <img src="<?php echo base_url($details[0]->event_photo_2); ?>"
                                            class="img-fluid rounded shadow"
                                            style="width:100%; height: 194px; object-fit: cover;" alt="Event Photo 2">
                                    </div>
                                    <?php endif; ?>
                                    <?php if (!empty($details[0]->event_photo_3)): ?>
                                    <div class="col-12">
                                        <img src="<?php echo base_url($details[0]->event_photo_3); ?>"
                                            class="img-fluid rounded shadow"
                                            style="width:100%; height: 194px; object-fit: cover;" alt="Event Photo 3">
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <hr>
    <?php $this->load->view('template/feedback'); ?>
    <?php $this->load->view('template/emergency_hotline'); ?>
    <?php $this->load->view('template/footer'); ?>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
    <script>
    </script>
</body>

</html>