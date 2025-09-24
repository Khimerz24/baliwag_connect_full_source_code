<footer>
    <style>
        footer .footer-links a {
            text-decoration: none !important;
        }

        footer .footer-links a:hover {
            text-decoration: underline !important;
        }

        @media (max-width: 767.98px) {
            .footer-image-container {
                height: auto !important;
                padding: 50px 0;
                background-color: #05158F;
                /* Fallback for mobile */
            }

            .logo-container {
                position: static !important;
            }

            .footer-image-container>img {
                display: none;
                /* Hide image on mobile to fix layout */
            }
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <div class="citbau footer-image-container position-relative" style="height: 450px; overflow: hidden;">
        <img src="<?php echo base_url('assets/img/footer-image.png'); ?>" alt="" class="w-100 h-100"
            style="object-fit: cover;">
        <div class="container logo-container position-absolute d-flex justify-content-center align-items-center text-white px-3"
            style="top: 0; left: 0; right: 0; bottom: 0;">
            <div class="row w-100">
                <div
                    class="col-md-6 footer-links mb-5 mb-md-0 d-flex flex-column justify-content-center align-items-center align-items-md-start text-center text-md-left">
                    <span class="mb-3 text-white"><a href="<?php echo base_url()?>landing"
                            class="text-white">Home</a></span>
                    <span class="mb-3 text-white"><a href="<?php echo base_url() ?>landing/event"
                            class="text-white">Event List</a></span>
                    <span class="mb-3 text-white"> <a href="<?php echo base_url() ?>landing/common_bussiness"
                            class="text-white">Business Directory</a></span>
                    <span class="mb-3 text-white"><a href="<?php echo base_url() ?>landing/announcement"
                            class="text-white">Announcements</a></span>
                    <span class="mb-3 text-white"><a href="<?php echo base_url() ?>landing/bussiness_application"
                            class="text-white">Event Application</a> </span>
                    <span class="mb-3 text-white"><a href="<?php echo base_url() ?>landing/about"
                            class="text-white">About Us</a></span>
                    <span class="mb-3 text-white"><a href="<?php echo base_url() ?>landing/faqs"
                            class="text-white">FAQs</a></span>
                    <span class="mb-3 text-white"><a href="<?php echo base_url() ?>landing/contact"
                            class="text-white">Contact Us</a></span>
                </div>
                <div class="col-md-6 d-flex justify-content-center align-items-center">
                    <img src="<?php echo base_url('assets/img/main-logo.png'); ?>" alt="Logo" class="img-fluid"
                        style="max-width: 200px;">
                </div>
            </div>
        </div>
    </div>
    <div class="text-center text-white py-3" style="background-color: #05158F;">
        © 2025 Baliwag City, Bulacan. All rights reserved.
    </div>
</footer>