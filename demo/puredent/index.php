<?php
session_start();

if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

$csrf_token = $_SESSION['csrf_token'];

if (empty($_SESSION['order_token'])) {
    $_SESSION['order_token'] = bin2hex(random_bytes(32));
}

$order_token = $_SESSION['order_token'];
session_write_close();
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,viewport-fit=cover">
    <title>Kormesic Smoke Stain Removal & Whitening Toothpaste</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <header class="nav">
        <a class="logo" href="#top">
            <img style="width:100px;" src="images/pure-dent.jpeg">
        </a>
        <!-- <a class="nav-btn" href="#order">Order now →</a> -->
    </header>
    <main id="top">
      <section class="hero">

<?php if (!empty($_GET['order_id'])): ?>

<style>
    .success-message {
        max-width: 600px;
        margin: 30px auto;
        padding: 30px 25px;
        background: #ffffff;
        border: 1px solid #d9f0df;
        border-radius: 12px;
        text-align: center;
        box-shadow: 0 5px 25px rgba(0, 0, 0, 0.08);
        animation: successFadeIn 0.5s ease;
    }

    .success-icon {
        width: 65px;
        height: 65px;
        margin: 0 auto 18px;
        border-radius: 50%;
        background: #28a745;
        color: #ffffff;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 35px;
        font-weight: bold;
    }

    .success-message h2 {
        margin: 0 0 10px;
        color: #222;
        font-size: 25px;
    }

    .success-message p {
        margin: 8px 0;
        color: #666;
        font-size: 16px;
        line-height: 1.7;
    }

    .order-number {
        display: inline-block;
        margin: 15px 0;
        padding: 10px 18px;
        background: #f0fff4;
        border: 1px dashed #28a745;
        border-radius: 6px;
        color: #218838;
        font-size: 18px;
        font-weight: bold;
    }

    .success-message .continue-btn {
        display: inline-block;
        margin-top: 15px;
        padding: 12px 25px;
        background: #28a745;
        color: #ffffff;
        text-decoration: none;
        border-radius: 6px;
        font-size: 16px;
        transition: 0.3s;
    }

    .success-message .continue-btn:hover {
        background: #218838;
    }

    @keyframes successFadeIn {
        from {
            opacity: 0;
            transform: translateY(-15px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>
    <div class="success-message">

        <div class="success-icon">
            ✓
        </div>

        <h2>
            অর্ডার সফলভাবে গ্রহণ করা হয়েছে!
        </h2>

        <p>
            ধন্যবাদ! আপনার অর্ডারটি সফলভাবে গ্রহণ করা হয়েছে।
        </p>

        <div class="order-number">
            Order ID: #<?= htmlspecialchars($_GET['order_id']) ?>
        </div>

        <p>
            আমাদের একজন প্রতিনিধি শীঘ্রই আপনার সাথে
            ফোনে যোগাযোগ করবেন।
        </p>

        <a href="index.php" class="continue-btn">
            আবার অর্ডার করুন
        </a>

    </div>

<?php endif; ?>


        <div class="hero-copy reveal">
            <small class="eyebrow">EVERYDAY Tooth Paste</small>
          <h2>Kormesic Smoke Stain Removal <br><i>& Whitening Toothpaste</i></h2>
          <p style="font-size:16px;padding:10px;">প্রিমিয়াম ওরাল কেয়ার ও ব্রাইট স্মাইল সলিউশন চা, কফি কিংবা ধূমপানের জেদি দাগ দূর করে আপনার হাসিতে ফিরিয়ে আনুন আকর্ষণীয় উজ্জ্বলতা ও আত্মবিশ্বাস। পার্ল পাউডার ও সতেজ মেন্টল সমৃদ্ধ একটি রিফাইন্ড ওরাল কেয়ার ফর্মুলা।</p>





          <div class="actions"><a class="btn" href="#order">Order Now ↗</a><a class="under" href="#video">Watch video ↓</a></div>
          <div class="proof"><span>● ● ●</span><strong>4.9/5</strong> from happy customers</div><br>
        </div>


        <div style="height:450px;" class="hero-art reveal">
          
          <!-- <div class="tube"><span>MAHASHANKAR</span><b>ORAL<br>CARE</b><small>TOOTHPASTE</small></div> -->
            <div class="relative flex justify-center">
                <script>
                    document.addEventListener("DOMContentLoaded", function () {

                        const images = [
                            "images/Paste-1.webp",
                            "images/Paste-2.webp",
                            "images/Paste-3.webp",
                            "images/Paste-4.webp",
                            "images/Paste-5.webp",
                            "images/Paste-6.webp",
                            // "images/Paste-7.webp"
                        ];

                        const mainImage = document.getElementById("main-product-img");
                        const prevBtn = document.getElementById("prev-btn");
                        const nextBtn = document.getElementById("next-btn");

                        const dots = document.querySelectorAll(".slider-dot");
                        const thumbnails = document.querySelectorAll(".thumbnail");

                        let currentIndex = 0;
                        let autoSlide;


                        /*
                        =========================================
                        CHANGE IMAGE
                        =========================================
                        */

                        function showImage(index) {

                            if (index < 0) {
                                index = images.length - 1;
                            }

                            if (index >= images.length) {
                                index = 0;
                            }

                            currentIndex = index;

                            // Fade out
                            mainImage.classList.add("product-image-changing");

                            setTimeout(function () {

                                mainImage.src = images[currentIndex];

                                mainImage.classList.remove("product-image-changing");

                            }, 180);


                            // Update dots
                            dots.forEach(function (dot, i) {

                                dot.classList.toggle(
                                    "active",
                                    i === currentIndex
                                );

                            });


                            // Update thumbnails
                            thumbnails.forEach(function (thumbnail, i) {

                                thumbnail.classList.toggle(
                                    "active",
                                    i === currentIndex
                                );

                            });

                        }


                        /*
                        =========================================
                        NEXT
                        =========================================
                        */

                        function nextImage() {
                            showImage(currentIndex + 1);
                        }


                        /*
                        =========================================
                        PREVIOUS
                        =========================================
                        */

                        function previousImage() {
                            showImage(currentIndex - 1);
                        }


                        /*
                        =========================================
                        BUTTON EVENTS
                        =========================================
                        */

                        nextBtn.addEventListener("click", function () {

                            nextImage();

                            restartAutoSlide();

                        });


                        prevBtn.addEventListener("click", function () {

                            previousImage();

                            restartAutoSlide();

                        });


                        /*
                        =========================================
                        DOT EVENTS
                        =========================================
                        */

                        dots.forEach(function (dot) {

                            dot.addEventListener("click", function () {

                                const index = parseInt(
                                    this.getAttribute("data-index")
                                );

                                showImage(index);

                                restartAutoSlide();

                            });

                        });


                        /*
                        =========================================
                        THUMBNAIL EVENTS
                        =========================================
                        */

                        thumbnails.forEach(function (thumbnail) {

                            thumbnail.addEventListener("click", function () {

                                const index = parseInt(
                                    this.getAttribute("data-index")
                                );

                                showImage(index);

                                restartAutoSlide();

                            });

                        });


                        /*
                        =========================================
                        AUTO SLIDE
                        =========================================
                        */

                        function startAutoSlide() {

                            autoSlide = setInterval(function () {

                                nextImage();

                            }, 4000);

                        }


                        /*
                        =========================================
                        RESTART AUTO SLIDE
                        =========================================
                        */

                        function restartAutoSlide() {

                            clearInterval(autoSlide);

                            startAutoSlide();

                        }


                        /*
                        =========================================
                        START SLIDER
                        =========================================
                        */

                        startAutoSlide();

                    });
                </script>
                <style>
                    /* =========================================
                       PRODUCT IMAGE SLIDER
                    ========================================= */

                    .product-slider {
                        position: relative;
                        overflow: hidden;
                        border-radius: 16px;
                    }

                    #main-product-img {
                        display: block;
                        width: 100%;
                        transition: opacity 0.35s ease, transform 0.35s ease;
                    }


                    /* =========================================
                       PREVIOUS / NEXT BUTTONS
                    ========================================= */

                    .slider-btn {
                        position: absolute;
                        top: 50%;
                        transform: translateY(-50%);

                        width: 42px;
                        height: 42px;

                        border: none;
                        border-radius: 50%;

                        background: rgba(255, 255, 255, 0.90);
                        color: #333;

                        font-size: 24px;
                        line-height: 42px;

                        display: flex;
                        align-items: center;
                        justify-content: center;

                        cursor: pointer;

                        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.20);

                        z-index: 10;

                        transition: all 0.3s ease;
                    }

                    .slider-btn:hover {
                        background: #ffffff;
                        transform: translateY(-50%) scale(1.08);
                    }

                    .slider-prev {
                        left: 15px;
                    }

                    .slider-next {
                        right: 15px;
                    }


                    /* =========================================
                       DOTS
                    ========================================= */

                    .slider-dots {
                        position: absolute;

                        bottom: 15px;
                        left: 50%;

                        transform: translateX(-50%);

                        display: flex;
                        gap: 7px;

                        z-index: 10;
                    }

                    .slider-dot {
                        width: 9px;
                        height: 9px;

                        padding: 0;

                        border: none;
                        border-radius: 50%;

                        background: rgba(255, 255, 255, 0.65);

                        cursor: pointer;

                        transition: all 0.3s ease;
                    }

                    .slider-dot.active {
                        width: 24px;
                        border-radius: 10px;
                        background: #ffffff;
                    }


                    /* =========================================
                       THUMBNAILS
                    ========================================= */

                    .product-thumbnails {
                        display: flex;
                        justify-content: center;

                        gap: 10px;

                        margin-top: 15px;
                    }

                    .thumbnail {
                        width: 58px;
                        height: 58px;

                        padding: 3px;

                        background: #ffffff;

                        border: 2px solid transparent;

                        border-radius: 10px;

                        overflow: hidden;

                        cursor: pointer;

                        transition: all 0.3s ease;
                    }

                    .thumbnail img {
                        width: 100%;
                        height: 100%;

                        object-fit: cover;

                        border-radius: 6px;
                    }

                    .thumbnail:hover {
                        transform: translateY(-2px);
                    }

                    .thumbnail.active {
                        border-color: #d4af37;

                        box-shadow:
                            0 0 0 2px rgba(212, 175, 55, 0.15);
                    }


                    /* =========================================
                       IMAGE ANIMATION
                    ========================================= */

                    .product-image-changing {
                        opacity: 0;
                        transform: scale(1.02);
                    }


                    /* =========================================
                       MOBILE
                    ========================================= */

                    @media (max-width: 575px) {

                        .slider-btn {
                            width: 36px;
                            height: 36px;

                            font-size: 20px;
                        }

                        .slider-prev {
                            left: 10px;
                        }

                        .slider-next {
                            right: 10px;
                        }

                        .product-thumbnails {
                            gap: 6px;
                        }

                        .thumbnail {
                            width: 50px;
                            height: 50px;
                        }

                    }
                </style>
                <div class="relative w-full max-w-3xl">

                    <!-- Product Image Container -->
                    <div
                        class="relative bg-gradient-to-br from-herbal-00 to-herbal-800 p-3.5 rounded-3xl shadow-2xl border-4 border-herbal-gold/40">

                        <!-- Slider -->
                        <div class="product-slider">

                            <img
                                id="main-product-img"
                                src="images/Paste-1.webp"
                                alt="Herbal Hair Oil Bottle"
                                class="w-full h-80 md:h-[420px] object-cover rounded-2xl shadow-inner"
                            >

                            <!-- Previous Button -->
                            <button
                                type="button"
                                id="prev-btn"
                                class="slider-btn slider-prev"
                                aria-label="Previous image"
                            >
                                &#10094;
                            </button>

                            <!-- Next Button -->
                            <button
                                type="button"
                                id="next-btn"
                                class="slider-btn slider-next"
                                aria-label="Next image"
                            >
                                &#10095;
                            </button>

                            <!-- Natural Badge -->
                            <div
                                class="absolute -top-4 -right-4 bg-herbal-gold text-herbal-800 font-semibold p-3 rounded-full text-center shadow-xl border-2 border-white w-20 h-20 flex flex-col justify-center leading-tight"
                            >
                                <span class="text-xs">১০০%</span>
                                <span class="text-sm">ন্যাচারাল</span>
                            </div>

                            <!-- Dots -->
                            <div class="slider-dots" id="slider-dots">
                                <button type="button" class="slider-dot active" data-index="0"></button>
                                <button type="button" class="slider-dot" data-index="1"></button>
                                <button type="button" class="slider-dot" data-index="2"></button>
                                <button type="button" class="slider-dot" data-index="3"></button>
                                <button type="button" class="slider-dot" data-index="4"></button>
                                <button type="button" class="slider-dot" data-index="5"></button>
                                <!-- <button type="button" class="slider-dot" data-index="6"></button> -->
                            </div>

                        </div>

                        <!-- Thumbnails -->
                        <div class="product-thumbnails">

                            <button type="button" class="thumbnail active" data-index="0">
                                <img src="images/Paste-1.webp" alt="Product image 1">
                            </button>

                            <button type="button" class="thumbnail" data-index="1">
                                <img src="images/Paste-2.webp" alt="Product image 2">
                            </button>

                            <button type="button" class="thumbnail" data-index="2">
                                <img src="images/Paste-3.webp" alt="Product image 3">
                            </button>

                            <button type="button" class="thumbnail" data-index="3">
                                <img src="images/Paste-4.webp" alt="Product image 4">
                            </button>

                            <button type="button" class="thumbnail" data-index="4">
                                <img src="images/Paste-5.webp" alt="Product image 5">
                            </button>

                            <button type="button" class="thumbnail" data-index="5">
                                <img src="images/Paste-6.webp" alt="Product image 6">
                            </button>

                            <!-- <button type="button" class="thumbnail" data-index="6">
                                <img src="images/Paste-7.webp" alt="Product image 7">
                            </button> -->

                        </div>

                    </div>

                </div>
            </div>
        </div>





      </section>
      <section class="benefits">
        <div><b>01</b>Daily routine</div>
        <div><b>02</b>Family friendly</div>
        <div><b>03</b>Simple choice</div>
        <div><b>04</b>Doorstep delivery</div>
      </section>




      <section class="section-pampu video-section" id="video">



        <style>
            .section-wrapper {
                position: relative;
                /*min-height: 100vh;*/
                padding: 0 15px;
                overflow: hidden;
            }

            .section-wrapper::before {
                content: "";
                position: fixed;
                inset: 0;


                filter: blur(5px);
                transform: scale(1.05);

                z-index: -2;
            }

            .section-wrapper::after {
                content: "";
                position: fixed;
                inset: 0;

                background: rgba(55, 120, 55, 0.15);

                z-index: -1;
            }

            .content-card {
                width: 100%;
                max-width: 1140px;
                margin: 0 auto;

                background: #ffffff;

                border-radius: 10px;

                padding: 0 85px 20px;

                /*min-height: 388px !important;*/

                position: relative;
            }
            .title-box {
                width: 100%;
                /*max-width: 730px;*/

                margin: 0 auto 40px;

                background: #000000;

                border-radius: 10px;

                padding: 20px 25px 18px;

                text-align: center;
            }

            .title-box h1 {
                color: #00ff32;

                font-size: 21px;
                font-weight: 800;

                line-height: 1.35;

                margin: 0;
            }

            .title-box .english-title {
                display: block;

                font-family: Arial, sans-serif;

                font-size: 20px;
                font-weight: 700;

                line-height: 1.1;

                margin-top: 2px;
            }
            .benefits-box {
                width: 100%;

                border: 1px solid #222;

                border-radius: 5px;

                overflow: hidden;

                background: #fff;
            }
            .benefit-item {
                display: flex;
                align-items: flex-start;

                gap: 8px;

                padding: 8px 13px;

                border-bottom: 1px dashed #d7d7d7;

                color: #000;

                font-size: 22px;
                font-weight: 700;

                line-height: 1.55;
            }

            .benefit-item:last-child {
                border-bottom: none;
            }
            .check-icon {
                flex: 0 0 22px;

                width: 22px;
                height: 22px;

                margin-top: 6px;

                border-radius: 50%;

                background: #009b32;

                color: #ffffff;

                display: flex;
                align-items: center;
                justify-content: center;

                font-family: Arial, sans-serif;

                font-size: 15px;
                font-weight: 900;

                line-height: 1;
            }
            .order-button-wrapper {
                display: flex;
                justify-content: center;

                margin-top: 20px;
            }
            .order-button {
                display: inline-flex;
                align-items: center;
                justify-content: center;

                gap: 5px;

                background: #008d20;

                color: #ffffff;

                text-decoration: underline;

                font-size: 21px;
                font-weight: 700;

                line-height: 1;

                padding: 15px 22px;

                border-radius: 35px;

                border: none;

                cursor: pointer;

                transition:
                    background 0.2s ease,
                    transform 0.2s ease,
                    box-shadow 0.2s ease;
            }

            .order-button:hover {
                background: #006f19;

                transform: translateY(-2px);

                box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            }

            .cart-icon {
                font-size: 22px;

                text-decoration: none;
            }
            @media (max-width: 900px) {

                .content-card {
                    padding: 0 35px 25px;
                }

                .title-box {
                    width: 85%;
                }

                .benefit-item {
                    font-size: 19px;
                }
            }
            @media (max-width: 600px) {

                .section-wrapper {
                    padding: 0;
                    /*min-height: -180vh !important;*/
                }

                .content-card {
                    width: 100%;

                    /*min-height: 100vh;*/

                    border-radius: 0;

                    padding: 0 12px 25px;
                }
                .title-box {
                    width: 100%;

                    margin: 0 auto 25px;

                    padding: 13px 12px 12px;

                    border-radius: 0 0 8px 8px;
                }

                .title-box h1 {
                    font-size: 17px;

                    line-height: 1.4;
                }

                .title-box .english-title {
                    font-size: 16px;

                    margin-top: 2px;
                }
                .benefits-box {
                    border-radius: 4px;
                }
                .benefit-item {
                    gap: 7px;

                    padding: 9px 9px;

                    font-size: 16px;

                    line-height: 1.55;
                }
                .check-icon {
                    flex: 0 0 19px;

                    width: 19px;
                    height: 19px;

                    margin-top: 4px;

                    font-size: 12px;
                }
                .order-button-wrapper {
                    margin-top: 20px;
                }

                .order-button {
                    width: auto;

                    min-width: 210px;

                    padding: 14px 18px;

                    font-size: 18px;
                }

                .cart-icon {
                    font-size: 19px;
                }
            }
            @media (max-width: 380px) {

                .content-card {
                    padding-left: 8px;
                    padding-right: 8px;
                }

                .title-box h1 {
                    font-size: 15px;
                }

                .title-box .english-title {
                    font-size: 14px;
                }

                .benefit-item {
                    font-size: 14px;

                    padding: 8px 7px;

                    line-height: 1.5;
                }

                .check-icon {
                    flex-basis: 17px;

                    width: 17px;
                    height: 17px;

                    font-size: 11px;
                }

                .order-button {
                    min-width: 190px;

                    font-size: 16px;

                    padding: 13px 16px;
                }
            }
        </style>


        <section class="section-wrapper">

            <div class="content-card">
                <div class="title-box">

                    <h1>
                         কেন এটি এলিট ওরাল কেয়ারের জন্য সেরা পছন্দ?
                    </h1>

                </div>
                <div class="benefits-box">

                    <div class="benefit-item">
                        <span class="check-icon">✓</span>
                        <span>এডভান্সড স্টেইন রিমুভাল: নিয়মিত চা, কফি বা তামাকের ব্যবহারে দাঁতের ওপর জমা হওয়া জেদি পিগমেন্ট ও দাগ আলতোভাবে পরিষ্কার করতে সাহায্য করে। </span>
                    </div>


                    <div class="benefit-item">

                        <span class="check-icon">✓</span>

                        <span>
                             পার্ল পাউডার এনরিচড ফর্মুলা: ফাইন পার্ল পাউডার সমৃদ্ধ বিশেষ ফর্মুলা দাঁতের প্রাকৃতিক উজ্জ্বলতা বজায় রাখতে সহায়তা করে।
                        </span>

                    </div>


                    <div class="benefit-item">

                        <span class="check-icon">✓</span>

                        <span>
                             ইন্সট্যান্ট মেন্টল ফ্রেশনেস: রিফ্রেশিং মেন্টল ফ্লেভার যা ব্রাশ করার পর দীর্ঘ সময় মুখে সতেজ ও প্রফুল্ল অনুভূতি ধরে রাখে।
                        </span>

                    </div>


                    <div class="benefit-item">

                        <span class="check-icon">✓</span>

                        <span>
                             জেন্টল ও নিরাপদ ডেইলি কেয়ার: এনামেল বা মাড়ির ক্ষতি না করে প্রতিদিনের ওরাল হাইজিন বজায় রাখতে উপযোগী। 
                        </span>

                    </div>

                </div>

            </div>

        </section>


        <div class="video-card reveal" data-youtube-id="4RiLs2FjyxI" tabindex="0" role="button"><img src="https://img.youtube.com/vi/4RiLs2FjyxI/maxresdefault.jpg" alt="Product video" loading="lazy">
          <div class="video-shade"></div><button class="play" type="button">▶</button>
          <div class="video-label">01 / PRODUCT STORY<br><b>Watch the short video</b></div>
        </div>
      </section>

      <section class="section showcase">
        <div class="show-copy reveal lakhnow">
          <img style="width:100%" src="images/Paste-4.webp">
        </div>


 




        <div class="show-copy reveal"><small class="eyebrow">THE COMBO</small>
          <h3 style="font-size:26px">মূল উপাদান (Key Ingredients):</h3>
          <ul>
            <li><b>✓</b><span><strong>Pearl Powder: দাঁতের উপরিভাগের উজ্জ্বলতা ফিরিয়ে আনতে অত্যন্ত কার্যকরী।</strong></span></li>
            <li><b>✓</b><span><strong>Hydrated Silica & Calcium Carbonate: সূক্ষ্ম পরিষ্কারক উপাদান হিসেবে কাজ করে।</strong></span></li>
            <li><b>✓</b><span><strong>Cash on Delivery</strong></span></li>
          </ul>


          <h3 style="font-size:26px">পণ্য বিবরণী:</h3>
          <ul>
            <li><b>✓</b><span><strong>ব্র্যান্ড: Kormesic</strong></span></li>
            <li><b>✓</b><span><strong>টাইপ: হোয়াইটেনিং ও স্টেইন রিমুভাল টুথপেস্ট</strong></span></li>
            <li><b>✓</b><span><strong>পরিমাণ: ১২০ গ্রাম (4.23 oz)</strong></span></li>
          </ul>

          <p>আপনার হাসিতে আনুন এক্সক্লুসিভ দ্যুতি—আজই অর্ডার করুন!</p>
          <div class="price"><span>Product PRICE<strong>৳ ৮৫০</strong></span><span style="font-size:15px;"><b>+ ৳৬০ delivery</b></span></div><a class="btn" href="#order">[ Order Now / অর্ডার করুন ] →</a>
        </div>
      </section>


      <section class="section reviews">
        <div class="review-head">
          <div class="heading"><small class="eyebrow">CUSTOMER VOICES</small>
            <h2>Real words.<br><i>Real routines.</i></h2>
          </div>
          <div><button class="arrow" id="prev">←</button><button class="arrow" id="next">→</button></div>
        </div>
        <div class="review-window">

          <div class="review-track" id="reviewTrack">
            <article><b class="stars">★★★★★</b>
              <p>“The ordering process was very easy and the product arrived quickly. Everything was packed nicely.”</p>
              <footer><b>R</b><span><strong>Rafi</strong><small>Dhaka</small></span></footer>
            </article>
            <article><b class="stars">★★★★★</b>
              <p>“I ordered the combo for home. The mobile ordering experience was simple and smooth.”</p>
              <footer><b>N</b><span><strong>Nusrat</strong><small>Chattogram</small></span></footer>
            </article>
            <article><b class="stars">★★★★★</b>
              <p>“Clear product information, easy checkout and convenient delivery.”</p>
              <footer><b>S</b><span><strong>Sabbir</strong><small>Gazipur</small></span></footer>
            </article>


            <article><b class="stars">★★★★★</b>
              <p>“I love the product, Clear product information, easy checkout and convenient delivery.”</p>
              <footer><b>S</b><span><strong>Azmir</strong><small>Katabon</small></span></footer>
            </article>
            <article><b class="stars">★★★★★</b>
              <p>“Its really working, Clear product information, easy checkout and convenient delivery.”</p>
              <footer><b>S</b><span><strong>Zakaria</strong><small>Tongi</small></span></footer>
            </article>
            <article><b class="stars">★★★★★</b>
              <p>“White your tooth, Clear product information, easy checkout and convenient delivery.”</p>
              <footer><b>S</b><span><strong>Lanon</strong><small>Dhanmondi</small></span></footer>
            </article>
          </div>

        </div>
      </section>
      <section class="section order" id="order">
        <div class="order-copy reveal"><small class="eyebrow">READY WHEN YOU ARE</small>
          <h2>Bring the fresh<br><i>routine home.</i></h2>
          <p>Fill in your details and our team will confirm your order by phone.</p>
          <div class="summary">
            <div class="mini">
              <div class="">
                  <img style="width:50px" src="images/Paste-1.webp">
              </div><span><b>Kormesic Smoke Stain Removal & Whitening Toothpaste</b><small>Cash on Delivery</small></span>
            </div><strong>৳<span style="font-size:19px" id="">৮৫০</span></strong>
          </div><small style="font-size:13px" class="delivery"><b>60 tk delivery charge included</b></small>
        </div>

        <!-- <track kind="৳" src=""> -->


        <form class="form reveal" id="orderForm" action="submit-order.php" method="POST">
            <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($csrf_token, ENT_QUOTES, 'UTF-8') ?>" />
            <input type="hidden" name="order_token" value="<?= htmlspecialchars($order_token) ?>">
            <input type="hidden" name="delivery_charge" value="60">

          <h3>Your delivery details</h3>
          <label>Full name<input name="billing_first_name" required placeholder="Your full name"></label>
          <label>Phone number<input name="billing_phone" required inputmode="tel" placeholder="01XXXXXXXXX" pattern="01[3-9][0-9]{8}"></label>
          <label>Delivery address<textarea name="billing_address_1" required rows="3" placeholder="House, road, area, district"></textarea></label>
          <div class="form-row">
            <label>Quantity
                <div class="qty">
                    <button type="button" id="minus">−</button>
                    <input id="qty" name="wcf_qty_selection" value="1" readonly>
                    <button type="button" id="plus">+</button>
                </div>
                <p>Delivery Charge: 60 TK</p>
            </label>
                
            <div class="total"><small>TOTAL</small><b>৳<span id="total">960</span></b></div>
          </div><button class="submit" id="submit" type="submit">Place my order <span>→</span></button>
          <p class="secure">🔒 Your information is used only to process your order.</p>
          <p id="message" class="message"></p>
        </form>
      </section>
    </main>
    <footer class="site-footer"><b><a target="_blank" href="https://www.facebook.com/digitalwavetechint/">Developed by <small>Digital Wave Tech</small></a></b><span>Simple daily care. Delivered to your door.</span><a href="#top">Back to top ↑</a></footer>
    <script src="script.js"></script>
  </body>
</html>