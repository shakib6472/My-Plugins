<?php

wp_head();
// Example usage to display the saved data
$page_title = get_option('page_titel_input');
$make_profile = get_option('make_profile');
$favorite_frame = get_option('favorite_frame');
$give_photo = get_option('give_photo');
$choose_frame = get_option('choose_frame');
$cover_image_t = get_option('cover_image_t');
$favorite_cover = get_option('favorite_cover');
$wish_card = get_option('wish_card');
$wish_upload = get_option('wish_upload');
$copyright = get_option('copyright');
$left_top_icon = get_option('left_top_icon');
$right_logo = get_option('right_logo');
$option_1 = get_option('option_1');
$option_2 = get_option('option_2');
$cover_1 = get_option('cover_1');
$cover_2 = get_option('cover_2');
$last_frame = get_option('last_frame');
$footer_logo = get_option('footer_logo');


// Display in your theme's template files as needed

?>

<head>
    <title>
        <?php echo $page_title; ?>
    </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.min.css">

    <link rel="shortcut icon" href="/frontend/img/favicon.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tiro+Bangla&display=swap" rel="stylesheet">


    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />


    <!-- Add this within the <head> tag of your HTML file -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.5/FileSaver.min.js"></script>
    <!-- Add this within the <head> tag of your HTML file -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.3.2/html2canvas.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
    <script>
        var app = angular.module('angularApp', []);
        document.addEventListener('contextmenu', function (e) {
            e.preventDefault();
        });
    </script>
    <style>
        body {

            font-family: 'Tiro Bangla', serif !important;

        }
    </style>

    <style>
        .uil {
            font-size: 18px;
        }
    </style>
</head>

<body ng-app="angularApp">

    <div class="page-loader">
        <div class="loader"></div>
    </div>


    <nav class="navbar navbar-expand-sm">
        <div class="container">
            <!-- Logo -->
            <a class="navbar-brand" href="/">
                <img src="<?php echo $left_top_icon; ?>" class="" alt="Logo" height="60">
            </a>


            <!-- Navbar Items -->
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav">

                </ul>
            </div>

            <!-- Big Button -->
            <a class="navbar-brand ms-auto" href="https://sadathossain.net/readercamp/" target="_blank">
                <img src="<?php echo $right_logo; ?>" alt="Logo" height="40">
            </a>
        </div>
    </nav>


    <style>
        .profile-content {
            position: relative;
            overflow: auto;
        }

        .profile {
            width: 435px;
            padding-top: 435px;
            /* background-image: url(/images/fb-profile.png);*/
            background-repeat: no-repeat;
            background-position: center center;
            background-size: cover;
            position: relative;
            overflow: hidden;
        }

        .name {
            font-family: 'Tiro Bangla', serif;
            font-size: 25px;
            position: absolute;
            right: 10px;
            bottom: 0px;
            max-width: 78%;
            font-weight: 600;
            width: 70%;
            text-align: end;
            line-height: 40px;
        }

        .profile-picture {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            /* object-fit: cover;*/
        }

        .wish_text {
            font-family: 'Tiro Bangla', serif;
            font-size: 17px;
            position: absolute;
            right: 10px;
            bottom: 37px;
            /* max-width: 75%; */
            font-weight: 500;
            width: 36%;
            text-align: end;
            line-height: 17px;
            color: #fcfcfc;
        }

        #preview {
            display: none;
        }

        .transition-effect {
            transition: all 0.3s ease;
        }

        .img-thumbnail {
            cursor: pointer;
        }

        .cropper-container {
            width: 100% !important;
            overflow: hidden;
        }

        /* css for mobile*/
        @media (max-width: 767px) {
            .profile {
                width: 300px;
                padding-top: 300px;
                background-repeat: no-repeat;
                background-position: center center;
                background-size: cover;
                position: relative;
            }
        }
    </style>
    <section class="bg-light">
        <div class="container">
            <div class="row ">
                <div class="col-md-9 mx-auto">
                    <div class="row">
                        <div class="sub-header">
                            <?php echo "<div> $make_profile </div>"; ?>

                        </div>
                        <div class="col-md-6 margin-bottom mx-auto">

                            <h2 class="" style="    font-size: 22px;
    color: black;">
                                <span>
                                    <?php echo $favorite_frame; ?>
                                </span>
                            </h2>
                            <form action="https://prothomalo25.com/celebrities" method="POST"
                                enctype="multipart/form-data" class="mt-4">
                                <input type="hidden" name="_token" value="ZaFkQh2tHIeDbvIBWOiXgXNKAHcoUuDWfAN6DuQe"
                                    autocomplete="off"> <input type="hidden" name="_method" value="POST">
                                <div class="mb-3">
                                    <label>
                                        <?php echo $give_photo; ?>
                                    </label>
                                    <input type="file" class="form-control" name="image" id="profileImg" required>
                                </div>

                                <div class="mb-3">
                                    <label>
                                        <?php echo $choose_frame; ?>
                                    </label>
                                    <div class="row">
                                        <div class="col-6">
                                            <img src="<?php echo $option_1; ?>" class="w-100 img-thumbnail"
                                                onclick="changeFbProfilePicture('1')" alt="   " id="border1"
                                                loading="lazy">
                                        </div>
                                        <div class="col-6">
                                            <img src="<?php echo $option_2; ?>" class="w-100 img-thumbnail"
                                                onclick="changeFbProfilePicture('2')" alt="   " id="border2"
                                                loading="lazy">
                                        </div>
                                    </div>
                                </div>




                            </form>

                        </div>
                        <div class="col-md-6 margin-bottom mx-auto">
                            <div class="card">
                                <div class="card-body">
                                    <div class="profile-content">

                                        <center>
                                            <div class="profile" id="profile">
                                                <img src="" class="profile-picture" alt="" id="preview">
                                                <img src="<?php echo $option_1; ?>" id="fb-profile"
                                                    class="profile-picture transition-effect" alt="" loading="lazy">
                                            </div>
                                        </center>
                                    </div>

                                    <button type="button" class="btn btn-primary btn-big btn-main-color mt-3 w-100"
                                        id="download_profile">
                                        <i class="uil uil-folder-download"></i> ডাউনলোড করুন
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="modal" id="profileCropModal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <img id="livePreview" src="" alt="Preview" class="img-fluid w-100" loading="lazy">
                        <button id="cropButton" class="btn btn-primary btn-big btn-main-color mt-3 w-100"><i
                                class="uil uil-crop-alt"></i> ক্রপ করুন </button>
                    </div>

                </div>
            </div>
        </div>


    </section>


    <section class="">
        <div class="container">
            <div class="row align-items-center text-center">
                <h5 style="    margin-bottom: 0px;">
                    <?php echo $cover_image_t; ?>
                </h5>
                <p class="mb-3">
                    <?php echo $favorite_cover; ?>
                </p>
                <div class="col-md-6 margin-bottom mx-auto text-center">
                    <img src="<?php echo $cover_1; ?>" alt=" " loading="lazy" class="img-fluid w-100">
                    <a href="<?php echo $cover_1; ?>" class="btn btn-primary btn-big btn-main-color mt-3" download><i
                            class="uil uil-folder-download"></i> ডাউনলোড করুন</a>
                </div>

                <div class="col-md-6 margin-bottom mx-auto text-center">
                    <img src="<?php echo $cover_2; ?>" alt=" " loading="lazy" class="img-fluid w-100">
                    <a href="<?php echo $cover_2; ?>" class="btn btn-primary btn-big btn-main-color mt-3" download><i
                            class="uil uil-folder-download"></i> ডাউনলোড করুন</a>
                </div>

            </div>
        </div>
    </section>

    <style>
        .invitation-content {
            position: relative;
            overflow: auto;
        }

        .invitation {
            width: 435px;
            padding-top: 435px;
            background-image: url(<?php echo $last_frame; ?>);
            background-repeat: no-repeat;
            background-position: center center;
            background-size: cover;
            position: relative;
        }

        .name {
            font-family: 'Tiro Bangla', serif;
            font-size: 25px;
            position: absolute;
            right: 10px;
            bottom: 0px;
            max-width: 78%;
            font-weight: 600;
            width: 70%;
            text-align: end;
            line-height: 40px;
        }


        .profile-pic {
            position: absolute;
            top: 68px;
            left: 88px;
            border-radius: 50%;
            object-fit: cover;
            width: 246px;
            height: 246px;
        }

        .profile-pic-over {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            /* object-fit: cover;*/
        }

        .wish_text {
            font-family: 'Tiro Bangla', serif;
            font-size: 17px;
            position: absolute;
            right: 10px;
            bottom: 37px;
            /* max-width: 75%; */
            font-weight: 500;
            width: 36%;
            text-align: end;
            line-height: 17px;
            color: #fcfcfc;
        }
    </style>

    <section class="" style="    background: #8A2BE1;color: #fff; text-align:center">
        <div class="container">
            <div class="col-md-12">

                <h5><span class="text-white">
                        <?php echo $wish_card; ?>
                    </span></h5>
            </div>
        </div>
    </section>
    <section class="bg-white" ng-controller="myCtrl">
        <div class="container">
            <div class="row ">
                <div class="col-md-9 mx-auto">
                    <div class="row">

                        <div class="col-md-6 margin-bottom mx-auto">


                            <h2 class="" style="    font-size: 22px;
    color: black;">
                                <span>
                                    <?php echo $wish_upload; ?>
                                </span>
                            </h2>

                            <form action="https://prothomalo25.com/celebrities" method="POST"
                                enctype="multipart/form-data" class="mt-4">
                                <input type="hidden" name="_token" value="ZaFkQh2tHIeDbvIBWOiXgXNKAHcoUuDWfAN6DuQe"
                                    autocomplete="off"> <input type="hidden" name="_method" value="POST">
                                <div class="mb-3">
                                    <label>আপনার ছবি দিন</label>
                                    <input type="file" class="form-control" name="image" id="imgInp" required>
                                </div>
                                <div class="mb-3">
                                    <label>আপনার নাম লিখুন (বাংলায়)</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        placeholder="নাম (বাংলায়)" ng-model="name" required>
                                </div>
                                <div class="mb-3">
                                    <label>শুভেচ্ছাবার্তা লিখুন(বাংলায়)</label>
                                    <textarea type="text" class="form-control" id="wish_text" name="wish_text"
                                        placeholder="শুভেচ্ছাবার্তা লিখুন(বাংলায়)" rows="5" ng-model="wish_text"
                                        ng-maxlength="300" required></textarea>
                                    <div>{{ BanglaNumber(300 - wish_text.length) }} টি অক্ষর ব্যবহার করতে পারবেন</div>

                                </div>



                            </form>

                        </div>
                        <div class="col-md-6 margin-bottom mx-auto">
                            <div class="card">
                                <div class="card-body">
                                    <div class="invitation-content">

                                        <div class="invitation" id="invitation">
                                            <img src="" class="profile-pic" alt="" id="blah">
                                            <img src="<?php echo $last_frame; ?>"  class="profile-pic-over" alt="" id="blah-over">
                                            <p class="wish_text" ng-bind="wish_text"></p>
                                            <p class="name" ng-bind="name"></p>
                                        </div>
                                    </div>

                                    <button type="button" class="btn btn-primary btn-big btn-main-color mt-3 w-100"
                                        id="download">
                                        <i class="uil uil-folder-download"></i> ডাউনলোড করুন
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="modal" id="greetingModal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <img id="greetingLivePreview" src="" alt="Preview" class="img-fluid w-100" loading="lazy">
                        <button id="greetingCropButton" class="btn btn-primary btn-big btn-main-color mt-3 w-100"><i
                                class="uil uil-crop-alt"></i> ক্রপ করুন</button>
                    </div>

                </div>
            </div>
        </div>


    </section>






    <section class="bg-light footer-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <a href="https://sadathossain.net/readercamp/" target="_blank">
                        <img src="<?php echo $footer_logo ?>" width="250"></a>
                </div>
                <div class="col-md-6">
                    <?php echo $copyright; ?>

                </div>
            </div>
        </div>
    </section>

    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.0/FileSaver.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.min.js"></script>
    <script>
        var border1 = document.getElementById("border1");
        border1.style.border = "5px solid #8A2BE188";
        profileImg.onchange = evt => {
            const [file] = profileImg.files
            if (file) {
                document.getElementById("preview").style.display = "block";
                preview.src = URL.createObjectURL(file)
            }
        }
        $("#download_profile").on("click", function () {
            //simple http request
            // try {
            //     var xmlHttp = new XMLHttpRequest();
            //     xmlHttp.open("GET", "/profile-generate/profile", false); // false for synchronous request
            //     xmlHttp.send(null);
            //     //console.log(xmlHttp.responseText)
            // } catch (e) {
            //     //console.log(e);
            // }

            const profileContainer = document.getElementById("profile");


            html2canvas(profileContainer).then(canvas => {
                const link = document.createElement('a');
                link.download = 'profile.png';
                link.href = canvas.toDataURL('image/png').replace('image/png', 'image/octet-stream');
                link.click();
            });

            // html2canvas(profileContainer).then(canvas => {
            //     canvas.toBlob(function (blob) {
            //         window.saveAs(blob, 'profile.jpg');
            //     });
            // });
        });

        function changeFbProfilePicture(img) {
            //console.log("clicked" + img);
            var src = event.target.src;
            var fbProfile = document.getElementById("fb-profile");
            var border2 = document.getElementById("border2");

            fbProfile.classList.add("transition-effect");
            border1.classList.add("transition-effect");
            border2.classList.add("transition-effect");

            fbProfile.src = src;
            if (img == '1') {
                border1.style.border = "5px solid #8A2BE188";
                border2.style.border = "none";
            } else {
                border1.style.border = "none";
                border2.style.border = "5px solid #8A2BE188";
            }
        }


        //Profile pic crop
        document.addEventListener('DOMContentLoaded', function () {
            const profileImg = document.getElementById('profileImg');
            const image = document.getElementById('livePreview');
            const cropButton = document.getElementById('cropButton');
            const fbProfile = document.getElementById('preview');
            let cropper;

            profileImg.addEventListener('change', function () {
                //show modal with image
                $('#profileCropModal').modal('show');
                const file = profileImg.files[0];
                const reader = new FileReader();

                reader.onload = function (e) {
                    image.src = e.target.result;
                    if (cropper) {
                        cropper.destroy();
                    }
                    cropper = new Cropper(image, {
                        aspectRatio: 1, // You can set the desired aspect ratio
                        viewMode: 1,   // Set the view mode (0, 1, 2, 3)
                    });
                };

                reader.readAsDataURL(file);
            });

            cropButton.addEventListener('click', function () {
                //hide modal with image
                $('#profileCropModal').modal('hide');
                const croppedData = cropper.getCroppedCanvas().toDataURL();
                // Display the cropped image on another element
                fbProfile.src = croppedData;
                // You can also send `croppedData` to your server or perform any further actions with it.
            });
        });
    </script>

    <script>
        imgInp.onchange = evt => {
            const [file] = imgInp.files
            if (file) {
                blah.src = URL.createObjectURL(file)
            }
        }
        $("#download").on("click", function () {
            //           try {
            //              var xmlHttp = new XMLHttpRequest();
            //             xmlHttp.open("GET", "/profile-generate/wish", false); // false for synchronous request
            //             xmlHttp.send(null);
            //console.log(xmlHttp.responseText)
            // return xmlHttp.responseText;
            //         } catch (e) {
            //console.log(e);
            //         }
            const wishcard = document.getElementById("invitation");


            html2canvas(wishcard).then(canvas => {
                const link = document.createElement('a');
                link.download = 'wish.png';
                link.href = canvas.toDataURL('image/png').replace('image/png', 'image/octet-stream');
                link.click();
            });

        });


        // Assuming you have an AngularJS controller like this
        app.controller('myCtrl', function ($scope) {
            $scope.BanglaNumber = function (number) {
                const banglaDigits = ['০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'];
                const numStr = number.toString();
                let banglaStr = '';

                for (let i = 0; i < numStr.length; i++) {
                    const digit = numStr.charAt(i);
                    banglaStr += banglaDigits[parseInt(digit)];
                }

                return banglaStr;
            };
        });

        //crop
        document.addEventListener('DOMContentLoaded', function () {
            const imgInp = document.getElementById('imgInp');
            const image = document.getElementById('greetingLivePreview');
            const greetingCropButton = document.getElementById('greetingCropButton');
            const fbProfile = document.getElementById('blah');
            let cropper;

            imgInp.addEventListener('change', function () {
                //show modal with image
                $('#greetingModal').modal('show');
                const file = imgInp.files[0];
                const reader = new FileReader();

                reader.onload = function (e) {
                    image.src = e.target.result;
                    if (cropper) {
                        cropper.destroy();
                    }
                    cropper = new Cropper(image, {
                        aspectRatio: 1, // You can set the desired aspect ratio
                        viewMode: 1,   // Set the view mode (0, 1, 2, 3)
                    });
                };

                reader.readAsDataURL(file);
            });

            greetingCropButton.addEventListener('click', function () {
                //hide modal with image
                $('#greetingModal').modal('hide');
                const croppedData = cropper.getCroppedCanvas().toDataURL();
                // Display the cropped image on another element
                fbProfile.src = croppedData;
                // You can also send `croppedData` to your server or perform any further actions with it.
            });
        });


        try {
            var xmlHttp = new XMLHttpRequest();
            xmlHttp.open("GET", "/ip-info", false); // false for synchronous request
            xmlHttp.send(null);
            //console.log(xmlHttp.responseText)
            // return xmlHttp.responseText;
        } catch (e) {
            //console.log(e);
        }


    </script>


    <script>
        setTimeout(function () {

            AOS.init();

            var loader = document.querySelector(".page-loader");
            loader.style.display = "none";

        }, 1000);
        /*  window.addEventListener("load", function () {
              var loader = document.querySelector(".page-loader");
              loader.style.display = "none";
          });*/


    </script>


</body>

</html>



<?php
wp_footer();
?>