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
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
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

    button.fc-today-button.fc-button.fc-button-primary {
        display: none;
    }

    button.fc-prev-button.fc-button.fc-button-primary {
        display: none;
    }

    button.fc-next-button.fc-button.fc-button-primary {
        display: none;
    }

    .swiper-slide {
        display: flex;
        justify-content: center;
        align-items: flex-start;
        flex-direction: column;
        height: auto !important;
    }

    .slide-content {
        display: flex;
        flex-direction: column;
        align-items: center;
        width: 100%;
    }

    .event-image {
        width: 100%;
        height: 350px;
        border-radius: 8px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        object-fit: cover;
    }

    .description-container {
        background-color: #fff;
        width: 100%;
        border-radius: 6px;
    }

    .event-bg {
        background: url('assets/img/about_image.jpg') no-repeat center center;
        background-size: cover;
        position: relative;
        padding: 0px 0;
    }

    .event-bg::before {
        content: "";
        position: absolute;
        inset: 0;
        background: rgba(112, 112, 112, 0.5);
        /* dark overlay */
        backdrop-filter: blur(8px);
        /* blur strength */
        -webkit-backdrop-filter: blur(8px);
        /* Safari support */
        z-index: 0;
    }

    .event-bg>* {
        position: relative;
        z-index: 1;
        /* bring content above overlay */
    }

    @media screen and (max-width: 600px) {
        .services-container {
            width: 80%;
        }

        .announcement-container {
            width: 80%;
        }

        .swiper-slide {
            align-items: center;
        }
    }
</style>
<!-- <pre>
   <?php print_r($this->session->all_userdata()) ?>
</pre> -->

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
    <!-- <div class="container-fluid p-0 position-relative" style="height: 700px; overflow: hidden;">
      <img
         src="<?php echo base_url('assets/img/hero_image.png'); ?>"
         alt="Hero Image"
         class="w-100 h-100 position-absolute top-0 start-0"
         style="object-fit: cover; object-position: center; z-index: 1;">
      <div class="title-poster-container position-relative z-2 h-100 d-flex align-items-center">
         <div class="container">
            <div class="row align-items-center">
               <div class="col-md-6 text-white  text-md-start pr-5 ">
                  <h1 class="display-4 fw-bold">
                     Selebrasyon <br>
                     Buntal Hat <br>
                     Festival <br>
                     May 26
                  </h1>
               </div>
               <div class="col-md-6 text-center d-flex justify-content-end pl-5">
                  <img
                     src="<?php echo base_url('assets/img/poster_image.png'); ?>"
                     alt="Poster"
                     class="img-fluid d-none d-md-block"
                     style="transform: rotate(20deg);height: 400px;">
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- HERO SECTION START -->
    <div class="position-relative w-100 overflow-hidden"
        style="min-height:520px; background: url('<?php echo base_url('assets/img/about_image.jpg'); ?>') center center / cover no-repeat;">
        <!-- Gradient Overlay -->
        <div class="position-absolute w-100 h-100"
            style="inset:0; background: linear-gradient(90deg, rgba(19,38,175,0.85) 0%, rgba(58,110,234,0.65) 50%, rgba(42,202,50,0.85) 100%); z-index:1; pointer-events:none;">
        </div>
        <div class="container position-relative py-0" style="z-index:2;">
            <div class="row align-items-center flex-column flex-lg-row" style="min-height:120px;">
                <div
                    class="col-lg-6 d-flex flex-column align-items-center align-items-lg-start text-white text-center text-lg-left py-4 py-lg-5">
                    <h1 class="font-weight-bold mb-2 hero-title" style="font-size:6.5rem; line-height:1.1;">BALIWAG</h1>
                    <h1 class="font-weight-bold mb-2 hero-title" style="font-size:8.5rem; line-height:1.1;">CONNECT</h1>
                    <h1 class="font-weight-bold mb-2 hero-title" style="font-size:2.0rem; line-height:1.1;">Your
                        One-Stop Hub For Baliwag's </h1>
                    <h1 class="font-weight-bold mb-2 hero-title" style="font-size:2.0rem; line-height:1.1;">Events and
                        Business Directory
                        <!--May <span style="font-size:6.5rem; color:#fff;">26</span>-->
                    </h1>
                </div>
                <div class="col-lg-6 d-flex justify-content-center justify-content-lg-end align-items-end py-3 py-lg-5">
                    <img src="<?php echo base_url('assets/img/clock.png'); ?>" alt="Festival Painting"
                        class="img-fluid hero-painting"
                        <!--style="width:420px; max-width:90vw; transform:rotate(15deg); border-radius:8px; transition:transform 0.3s;">
                </div>
            </div>
        </div>
    </div>
    <!-- HERO SECTION END -->
    <style>
        .hero-painting:hover {
            transform: rotate(0deg) !important;
        }

        @media (max-width: 991.98px) {
            .hero-title {
                font-size: 2rem !important;
            }

            .hero-title span {
                font-size: 3rem !important;
            }

            .hero-painting {
                width: 200px !important;
                margin-top: 1.5rem;
            }

            .row.align-items-center.flex-column.flex-lg-row {
                min-height: 420px !important;
            }

            .container.py-5 {
                padding-top: 2rem !important;
                padding-bottom: 2rem !important;
            }
        }

        @media (max-width: 575.98px) {
            .hero-title {
                font-size: 4rem !important;
            }

            .hero-title span {
                font-size: 2rem !important;
            }

            .hero-painting {
                width: 130px !important;
                margin-top: 1.2rem;
                display: none;
            }

            .row.align-items-center.flex-column.flex-lg-row {
                min-height: 320px !important;
            }

            .container.py-5 {
                padding-top: 1rem !important;
                padding-bottom: 1rem !important;
            }
        }
    </style>

    <div class="section">
        <div class="container services-container py-5">
            <div class="row justify-content-center text-center">
                <div class="col-6 col-sm-4 col-md-3 mb-4">
                    <a href="<?php echo base_url('Landing/common_bussiness?type=2'); ?>">
                        <div class="circle bg-success mx-auto d-flex justify-content-center align-items-center ">
                            <span class="text-white text-bold">
                                RETAIL <br>
                                STORES!
                                <br>
                                <div class="container text-success rounded" style="background-color: #fff;">
                                    Visit
                                </div>
                            </span>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-sm-4 col-md-3 mb-4">
                    <a href="<?php echo base_url('Landing/common_bussiness?type=1'); ?>">
                        <div class="circle bg-success mx-auto d-flex justify-content-center align-items-center">
                            <span class="text-white text-bold">FOOD <br>
                                PLACES!
                                <br>
                                <div class="container text-success rounded" style="background-color: #fff;">
                                    Visit
                                </div>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-sm-4 col-md-3 mb-4">
                    <a href="<?php echo base_url('Landing/common_bussiness?type=3'); ?>">
                        <div class="circle bg-success mx-auto d-flex justify-content-center align-items-center">
                            <span class="text-white text-bold">
                                TOURIST <br>
                                SPOT!
                                <br>
                                <div class="container text-success rounded" style="background-color: #fff;">
                                    Visit
                                </div>
                            </span>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-sm-4 col-md-3 mb-4">
                    <a href="<?php echo base_url('Landing/common_bussiness?type=4'); ?>">
                        <div class="circle bg-success mx-auto d-flex justify-content-center align-items-center">
                            <span class="text-white text-bold">
                                OTHER <br>SERVICES!
                                <br>
                                <div class="container text-success rounded" style="background-color: #fff;">
                                    Visit
                                </div>
                            </span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="baliw-offers-container p-3 rounded mx-auto"
        style="background-color: #05158F;max-width: 500px; margin-bottom: -30px; position: relative; z-index: 1;">
        <h3 class="text-white text-center mb-0">ANNOUNCEMENTS</h3>
    </div>
    <section style="background: linear-gradient(180deg, #a4cfa4, #90c890, #7cc17c); padding-bottom: 50px;">
        <div class="mx-auto announcement-container pt-4">
            <div class="row g-0 pt-5">
                <div class="slider-container col-md-8 mx-auto">
                    <div class="swiper">
                        <div class="swiper-wrapper">
                            <?php foreach ($allEventCarousel as $event) { ?>
                            <div class="swiper-slide">
                                <a href="<?php echo base_url('landing/announcement'); ?>">
                                    <div class="slide-content text-center">
                                        <img src="<?= base_url('assets/img/' . $event->image) ?>" alt="..."
                                            class="event-image">
                                        <div class="description-container mt-2">
                                            <h5 class="p-2 mb-0 text-dark">
                                                <?= $event->title; ?>
                                            </h5>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="event-bg mb-5">
        <div class="baliw-offers-container p-3" style="background: linear-gradient(135deg, #05158F, #28a745);">
            <h3 class="text-white text-center">EVENT CALENDAR</h3>
        </div>
        <div class="container py-5">
            <div class="row">
                <?php
            $months = [];
            foreach ($allEvent as $event) {
               $months[$event->month_year][] = $event;
            }

            foreach ($months as $month => $events): ?>
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm ">
                        <div class="card-header text-white text-center" style="background-color:#05158F;">
                            <h5 class="m-0">
                                <?= strtoupper($month); ?>
                            </h5>
                        </div>
                        <div class="card-body">
                            <?php foreach ($events as $event): ?>
                            <div class="d-flex align-items-start mb-3 pb-2">
                                <div class="mt-2 mr-3 d-flex align-items-center justify-content-center">
                                    <?php if (!empty($event->event_logo)): ?>
                                    <img src="<?= base_url($event->event_logo); ?>" alt="Event Photo"
                                        class="rounded event-photo ml-3"
                                        style="width: 100px; height: 100px; object-fit: cover;">
                                    <?php endif; ?>
                                </div>
                                <!-- <div class="mr-2">
                                 <i class="fas fa-calendar-alt fa-2x text-primary"></i>
                              </div> -->
                                <div>
                                    <strong>
                                        <?= $event->event_name; ?>
                                    </strong><br>
                                    <small class="text-muted">
                                        📍
                                        <?= $event->event_address; ?><br>
                                        🗓
                                        <?= date('F j, Y', strtotime($event->event_date)); ?>
                                    </small>
                                </div>

                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <!-- <?php $this->load->view('template/socmed'); ?> -->
    <?php $this->load->view('template/feedback'); ?>
    <?php $this->load->view('template/emergency_hotline'); ?>

    <?php $this->load->view('template/footer'); ?>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            initSwiper();
        });

        window.addEventListener('resize', initSwiper);

        function initSwiper() {
            const swiperConfig = {
                slidesPerGroup: 1,
                spaceBetween: 60,
                loop: true,
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                autoplay: {
                    delay: 3000,
                    disableOnInteraction: false,
                },
                breakpoints: {
                    0: {
                        slidesPerView: 1,
                    },
                    600: {
                        slidesPerView: 2,
                    },
                    992: {
                        slidesPerView: 3,
                    }
                }
            };

            new Swiper('.swiper', swiperConfig);
        }
    </script>
</body>

</html>