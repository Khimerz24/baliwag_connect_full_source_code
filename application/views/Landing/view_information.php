<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/all.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100..900;1,100..900&family=Style+Script&display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100..900;1,100..900&family=Style+Script&display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Raleway:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100..900;1,100..900&family=Style+Script&display=swap"
        rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js"></script>
    <link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/img/main-logo.png">
    <title>Home - Baliwag Connect</title>
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
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.2);
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
    }
</style>

<body>
    <div class="top-nav-image-container position-relative" style="height: 150px; overflow: hidden;">
        <img src="<?php echo base_url('assets/img/top-nav-image.png'); ?>" alt="Top Nav" class="w-100 h-100"
            style="object-fit: cover;" />
        <div class="position-absolute d-flex align-items-center justify-content-center justify-content-md-start px-3"
            style="top: 0; left: 0; right: 0; bottom: 0;">
            <img src="<?php echo base_url('assets/img/logo.png'); ?>" alt="Logo" class="img-fluid"
                style="max-width: 400px;" />
        </div>
    </div>

    <?php $this->load->view('template/navbar'); ?>
    <section>

        <div class="baliw-offers-container p-3 mt-4" style="background: linear-gradient(135deg, #0318B1, #5AC855);">
            <h3 class="text-center text-white">
                <?php
            echo $information[0]->bussiness_category == 1 ? "Food Place" : ($information[0]->bussiness_category == 2 ? "Retail Store" : ($information[0]->bussiness_category == 3 ? "Tourist Spot" : "Services")); ?>
            </h3>
        </div>
        <div class="container outerpadding p-4 ">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb" style="background-color: transparent; padding-left: 0;">
                    <li class="breadcrumb-item"><a href="<?php echo base_url('landing/common_bussiness'); ?>">Business
                            Directory</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                        <?php echo $information[0]->bussiness_name; ?>
                    </li>
                </ol>
            </nav>
            <div class="d-flex align-items-center justify-content-center px-4">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-6 d-flex justify-content-center">
                        <div class="logo-containers overflow-hidden">
                            <img src="<?php echo base_url($information[0]->bussiness_logo_path); ?>" alt="Logo" />
                        </div>
                    </div>
                    <div class="col-lg-6 d-flex align-items-center justify-content-center mt-4 mt-lg-0">
                        <div class="description-container">
                            <h1 class="font-weight-bold mb-3">
                                <?php echo $information[0]->bussiness_name; ?>
                            </h1>
                            <p class="text-muted mb-3">
                                <?php echo $information[0]->bussiness_description; ?>
                            </p>
                            <div class="extra-content">
                                <p class="mb-2"><i class="fas fa-map-marker-alt text-success mr-2"></i>
                                    <?php echo $information[0]->bussiness_address; ?>
                                </p>
                                <p class="mb-2"><i class="fas fa-envelope text-success mr-2"></i>
                                    <?php echo $information[0]->bussiness_email; ?>
                                </p>
                                <p class="mb-0"><i class="fas fa-phone text-success mr-2"></i>
                                    <?php echo $information[0]->bussiness_phone_number; ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- <div class=" my-4 px-4 text-center">
                        <img class="photo rounded img-fluid shadow"
                        
                            src="<?php echo empty($details[0]->event_photo) ? base_url('assets/images/no-photo.png') : base_url($details[0]->event_photo); ?>" 
                            alt="Logo" />
                     </div>
                     <?php if (!empty($details[0]->event_photo_2)): ?>
                        <div class=" my-4 px-4 text-center">
                        <img class="photo rounded img-fluid shadow" src="<?php echo base_url($details[0]->event_photo_2); ?>" alt="Logo" />
                    </div>
                    <?php endif; ?>

                    <?php if (!empty($details[0]->event_photo_3)): ?>
                     <div class=" my-4 px-4 text-center">
                            <img class=" photo rounded img-fluid shadow" src="<?php echo base_url($details[0]->event_photo_3); ?>" alt="Logo" />
                        </div>
                    <?php endif; ?> -->
                </div>
            </div>
        </div>
    </section>
    <!-- <section>
      <div class="container emergency-container pb-4" style="width:50%;">
         <div class="row p-4">
            <div class="col-md-12 mb-md-0 mb-4">
               <div class="emergency-contact text-white text-center p-4 h-100 rounded bg-success">

                  <h5 class="mb-4">CONTACT TOURISM</h5>
                  <p>TELEPHONE NO: (044) 766 1402</p>
                  <p>MOBILE NO: 09057415884</p>
                  <p>EMAIL : baliwagtourism@gmail.com</p>
                  <p>FB PAGE : Turismo ng Baliwag</p>
               </div>
            </div>
         </div>
      </div>
   </section> -->
    <hr />
    <?php $this->load->view('template/feedback'); ?>
    <?php $this->load->view('template/emergency_hotline'); ?>
    <?php $this->load->view('template/footer'); ?>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
    <script>
        $(document).ready(function () {

            let button = $('#options').val(1);
            let idFromIndex = $('#idFromIndex').val();
            console.log(button);

            options(button, idFromIndex);

        })

        function options(button, idFromIndex) {

            const base_url = "<?php echo base_url(); ?>";
            let options = $('#options').val();

            $.ajax({
                url: '<?php echo base_url('Landing/ getCommonBussiness'); ?>',
                method: 'POST',
                data: {
                category: options,
                idFromIndex: idFromIndex
            },
                dataType: 'JSON',
                success: function (response) {
                    let data = response.data;
                    console.log(data);

                    $('.business-container').empty();

                    $.each(data, function (index, item) {
                        let html = `
                           <div class="container offers-container pt-4">
                           <div class="row">
                              <div class="col-md-4 d-flex justify-content-center p-4">
                                 <img class="thick-blue-border" style="max-width: 50%;" src="${base_url + item.bussiness_logo_path}" alt="">
                              </div>
                              <div class="col-md-8 p-4">
                                 <div class="title">
                                 <h1 class="text-center text-md-left">${item.bussiness_name}</h1>
                                 </div>
                                 <div class="info">
                                 <p class="text-center text-md-left">${item.bussiness_description}</p>
                                 </div>
                                 <div class="info d-flex justify-content-center">
                                 <button class="btn text-white text-center" style="background-color: #05158F;" onclick="viewInformation(${item.id})">View Information</button>
                                 </div>
                              </div>
                           </div>
                           </div>
                        `;

                        // Append it to a container div with class .business-container (you can change the selector)
                        $('.business-container').append(html);
                    });
                }

         })

      }

        function viewInformation(id) {

            $.ajax({
                url: '<?php echo base_url('Landing/ viewBusinessInformation'); ?>',
                method: 'POST',
                data: {
                id: id
            },
                success: function (response) {
                    console.log(response);
                }
         })

      }
    </script>
</body>

</html>