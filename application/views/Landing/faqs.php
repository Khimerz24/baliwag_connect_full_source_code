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

    .contact-container {
        padding: 100px;
    }

    .details-container {
        padding-top: 100px;
        padding-bottom: 100px;
        padding-left: 50px;
        padding-right: 50px;
    }

    @media screen and (max-width: 600px) {
        .services-container {
            width: 80%;
        }

        .announcement-container {
            width: 80%;
        }

        .contact-container {
            padding: 50px;
        }
    }

    .gradient-text {
        background: #0318B1;
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        text-fill-color: transparent;
        display: inline-block;
    }

    .faq-accordion .card {
        border: none;
        margin-bottom: 15px;
        border-radius: 10px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        overflow: hidden;
    }

    .faq-accordion .card-header {
        background-color: #5AC855;
        padding: 0;
        border: none;
    }

    .faq-accordion .btn-link {
        width: 100%;
        text-align: left;
        padding: 1.25rem;
        color: white !important;
        text-decoration: none;
        font-weight: bold;
        font-size: 1.1rem;
        position: relative;
    }

    .faq-accordion .btn-link:hover {
        text-decoration: none;
    }

    .faq-accordion .btn-link::after {
        content: '\f078';
        font-family: 'Font Awesome 5 Free';
        font-weight: 900;
        position: absolute;
        right: 20px;
        top: 50%;
        transform: translateY(-50%);
        transition: transform 0.3s ease;
    }

    .faq-accordion .btn-link[aria-expanded="true"]::after {
        transform: translateY(-50%) rotate(180deg);
    }

    .faq-accordion .card-body {
        background-color: #f8f9fa;
        color: #343a40;
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
                    <div class="text-center text-white">
                        <h1 class="font-weight-bold display-4">BALIWAG CONNECT FAQs</h1>
                        <p class="text-white" style="font-size: 1.2rem;">Find answers to common questions about Baliwag
                            Connect.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container my-5">
            <!--<h2 class="text-center font-weight-bold mb-5 gradient-text">Frequently Asked Questions</h2>-->
            <?php if (empty($faqs)): ?>
            <p class="mx-auto" style="text-align: center;">No FAQs found.</p>
            <?php else: ?>
            <div id="accordionExample" class="faq-accordion">
                <?php foreach ($faqs as $key => $faq) : ?>
                <div class="card">
                    <div class="card-header" id="heading<?= $key ?>">
                        <h5 class="mb-0">
                            <button class="btn btn-link" type="button" data-toggle="collapse"
                                data-target="#collapse<?= $key ?>" aria-expanded="<?= $key === 0 ? 'true' : 'false' ?>"
                                aria-controls="collapse<?= $key ?>">
                                <?php echo $faq->title; ?>
                            </button>
                        </h5>
                    </div>
                    <div id="collapse<?= $key ?>" class="collapse <?= $key === 0 ? 'show' : '' ?>"
                        aria-labelledby="heading<?= $key ?>" data-parent="#accordionExample">
                        <div class="card-body">
                            <?php echo $faq->description; ?>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
        </div>
    </section>
    <?php $this->load->view('template/footer'); ?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
</body>

</html>