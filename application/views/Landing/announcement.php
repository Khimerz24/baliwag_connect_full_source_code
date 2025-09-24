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

    @media screen and (max-width: 600px) {
        .services-container {
            width: 80%;
        }

        .announcement-container {
            width: 80%;
        }
    }

    /* Inverted Announcement Section */
    .inverted-announcement {
        margin-left: auto;
        margin-right: auto;
        position: relative;
        background-color: #fff;
        /* Inverted from green */
        padding: 20px 40px 20px 50px;
        max-width: 1440px;
        /* margin-top: 10px; */
        width: 100%;
    }

    .latest-news-badge {
        display: inline-block;
        position: relative;
        top: -8px;
        margin-left: 15px;
        background: #59c557;
        color: white;
        padding: 8px 16px;
        font-size: 18px;
        font-weight: 700;
        text-transform: uppercase;
        border-radius: 6px;
        letter-spacing: 0.5px;
    }

    .content-layout {
        display: flex;
        flex-direction: row-reverse;
        align-items: center;
        gap: 30px;
        margin-top: 10px;
        padding: 0;
    }

    .media-box {
        flex: 0 0 500px;
        background-color: #05158F;
        /* Inverted from white */
        padding: 0;
        margin: 30px;
    }

    .media-box img {
        max-width: 500px;
        width: 100%;
        height: auto;
        position: relative;
        left: -30px;
        bottom: -30px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        display: block;
    }

    .description-box {
        flex: 1;
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        width: 100%;
    }

    .description-box h3 {
        font-size: 56px;
        margin-bottom: 15px;
        color: #05158F;
        /* Inverted from white */
        text-align: left;
        width: 100%;
    }

    .description-box p {
        font-size: 20px;
        line-height: 1.6;
        margin-bottom: 25px;
        color: #05158F;
        /* Inverted from white */
        width: 100%;
    }

    /* Responsive adjustments */
    @media (max-width: 991.98px) {
        .content-layout {
            flex-direction: column;
            text-align: center;
            margin-top: 20px;
        }

        .media-box {
            flex: 0 0 auto;
            max-width: 500px;
            width: 100%;
            margin: 0 auto 30px;
        }

        .description-box {
            align-items: center;
        }

        .description-box h3,
        .description-box p {
            text-align: center;
        }
    }

    @media (max-width: 767.98px) {
        .inverted-announcement {
            padding: 40px 20px;
        }

        .media-box {
            background-color: transparent;
            margin-bottom: 20px;
            padding: 0;
        }

        .media-box img {
            position: static;
        }
    }

    .cards-section {
        padding: 30px 0 60px 0;
    }

    .cards-section .card {
        border: none;
        border-radius: 12px;
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.12);
        transition: all 0.3s ease;
        height: 100%;
        overflow: hidden;
    }

    .cards-section .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
    }

    .cards-section .row {
        margin-right: -35px;
        margin-left: -35px;
    }

    .cards-section .row>[class*="col-"] {
        padding-right: 35px;
        padding-left: 35px;
        margin-bottom: 50px;
    }

    .cards-section .card-img-top {
        height: 200px;
        object-fit: cover;
        transition: transform 0.3s ease;
    }

    .cards-section .card:hover .card-img-top {
        transform: scale(1.05);
    }

    .cards-section .card-body {
        padding: 24px;
        background-color: white;
    }

    .cards-section .card-title {
        color: #333;
        font-size: 18px;
        font-weight: 600;
        margin-bottom: 8px;
        line-height: 1.4;
    }

    .cards-section .card-text {
        color: #666;
        font-size: 14px;
        line-height: 1.6;
        margin-bottom: 0;
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .cards-section {
            padding: 40px 0;
        }

        .cards-section .card-body {
            padding: 20px;
        }

        .cards-section .card-img-top {
            height: 180px;
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
    <!-- <div class="navbar" style="background-color: #05158F;">
         <img src="<?php echo base_url('assets/img/logo.png'); ?>" alt="" style=" height: 50px;">
         </div> -->
    <?php $this->load->view('template/navbar'); ?>
    <section>
        <div class="baliw-offers-container p-3 mt-4" style="background: linear-gradient(135deg, #0318B1, #5AC855);">
            <h3 class="text-white text-center">ANNOUNCEMENTS</h3>
        </div>
        <?php if (!empty($announcement) && count($announcement) > 0): ?>
        <?php 
            // Reverse the array to ensure the latest announcement is displayed first.
            // This assumes the original array is sorted from oldest to newest.
            $sorted_announcements = array_reverse($announcement);
            $latest = $sorted_announcements[0]; 
        ?>
        <div class="inverted-announcement">
            <div class="content-layout">
                <div class="media-box">
                    <img src="<?php echo base_url('assets/img/' . $latest->image); ?>"
                        alt="<?php echo $latest->title; ?>">
                </div>
                <div class="description-box">
                    <h3>
                        <?php echo $latest->title; ?> <span class="latest-news-badge">Latest</span>
                    </h3>
                    <p>
                        <?php echo $latest->description; ?>
                    </p>
                </div>
            </div>
        </div>
        <hr>
        <div class="container">
            <h4 class="mt-4" style="color: #a7b0b8; text-transform: uppercase; font-weight: 600;">Recent Announcements:
            </h4>
            <section class="cards-section">
                <div class="row justify-content-center">
                    <?php foreach (array_slice($sorted_announcements, 1) as $list): ?>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="card">
                            <img src="<?php echo base_url('assets/img/' . $list->image); ?>"
                                alt="<?php echo $list->title; ?>" class="card-img-top">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <?php echo $list->title; ?>
                                </h5>
                                <p class="card-text">
                                    <?php echo $list->description; ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </section>
        </div>
        <?php else: ?>
        <p>No announcements available.</p>
        <?php endif; ?>
        <hr>
        <?php $this->load->view('template/feedback'); ?>
        <?php $this->load->view('template/emergency_hotline'); ?>
        <?php $this->load->view('template/footer'); ?>
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
        <script>
            $('.month-card').click(function () {
                const month = $(this).text();
                alert("cliked " + month);
            });
        </script>
        <!-- <script>  
         $(function () {
           var calendarEl = $('#calendar');
         
           var calendar = new FullCalendar.Calendar(calendarEl, {
             initialView: 'dayGridMonth',
             height: 'auto',
             headerToolbar: {
               left: 'prev,next today',
               center: 'title',
               right: 'dayGridMonth,timeGridWeek,timeGridDay'
             },
             events: [
               {
                 title: 'Event 1',
                 start: '2025-07-13',
                 backgroundColor: '#007bff',
                 borderColor: '#007bff'
               },
               {
                 title: 'Event 2',
                 start: '2025-07-15',
                 end: '2025-07-17',
                 backgroundColor: '#28a745',
                 borderColor: '#28a745'
               }
             ]
           });
         
           calendar.render();
         });
         </script> -->
</body>

</html>