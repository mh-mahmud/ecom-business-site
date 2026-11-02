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

<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pritha Enterprise - Premium Herbal Hair Oil</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts Hind Siliguri -->
    <!-- <link href="https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@400;500;600;700&display=swap" rel="stylesheet"> -->
    
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        herbal: {
                            50: '#f1f8f3',
                            100: '#e0f0e4',
                            200: '#c2e2cb',
                            600: '#2d6a4f',
                            700: '#1b4332',
                            800: '#081c15',
                            gold: '#c59b27',
                            goldHover: '#a37e1a',
                            goldLight: '#fef9ec',
                            accent: '#d4af37'
                        }
                    },
                    fontFamily: {
                        sans: ['Hind Siliguri', 'sans-serif'],
                    }
                }
            }
        }
    </script>

    <style>
        body {
            font-family: sans-serif;
            font-size: 16px;
            scroll-behavior: smooth;
        }

        .bg-pattern {
            background-image: radial-gradient(#2d6a4f 0.5px, transparent 0.5px), radial-gradient(#2d6a4f 0.5px, #f1f8f3 0.5px);
            background-size: 20px 20px;
            background-position: 0 0, 10px 10px;
            opacity: 0.12;
        }

        @keyframes softPulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.02); }
        }

        .animate-soft-pulse {
            animation: softPulse 2.5s infinite ease-in-out;
        }

        /* Medium Font Weights Standard enforcement */
        p, span, label, input, textarea, button, li {
            font-weight: 500;
        }

        h1, h2, h3, h4, h5, h6 {
            font-weight: 600;
        }

        /* Video Glow Effect */
        .video-glow {
            box-shadow: 0 0 35px rgba(212, 175, 55, 0.25);
        }
    </style>
</head>
<body class="bg-gray-50 text-gray-800 antialiased pb-20 md:pb-0">

    <div class="bg-gradient-to-r from-herbal-800 via-herbal-700 to-herbal-800 text-white text-center py-2.5 px-4 shadow-md sticky top-0 z-50 border-b border-herbal-gold/30">
        <div class="max-w-6xl mx-auto flex flex-col sm:flex-row justify-between items-center text-sm font-medium gap-2 sm:gap-0">
            <span class="flex items-center gap-2">
                <i class="fa-solid fa-leaf text-herbal-gold animate-bounce"></i> 
                ১০০% অর্গানিক ও কেমিক্যালমুক্ত হারবাল হেয়ার অয়েল! সীমিত সময়ের অফার!
            </span>
            <!-- <div class="flex items-center gap-2 bg-black/40 px-3.5 py-1 rounded-full border border-herbal-gold/30">
                <span class="text-xs sm:text-sm font-medium">অফারের সময় বাকি:</span>
                <span id="countdown" class="font-semibold text-herbal-gold font-mono text-base">04:35:12</span>
            </div> -->
        </div>
    </div>

    <header class="bg-white/95 backdrop-blur-md border-b border-gray-200 py-3.5 px-4 shadow-sm sticky top-[42px] z-40">
        <div class="max-w-6xl mx-auto flex justify-between items-center">
            <a href="#" class="flex items-center gap-3">
                <!-- <div class="w-30 h-30 rounded-full bg-herbal-700 flex items-center justify-center text-herbal-gold text-xl font-bold shadow-md"> -->
                    <img width="80%" src="images/logo.png" alt="pritha logo">
                <!-- </div> -->
                <!-- <div class="flex flex-col">
                    <span class="text-herbal-800 font-semibold text-xl leading-tight tracking-wide">Pritha <span class="text-herbal-gold">Enterprise</span></span>
                    <span class="text-xs text-gray-500 font-medium">100% Organic Herbal Care</span>
                </div> -->
            </a>

            <div class=" items-center gap-5">
                <!-- <a href="tel:01819396959" class="text-herbal-800 flex items-center gap-2 text-base font-semibold hover:text-herbal-600 transition">
                    <i class="fa-solid fa-phone-volume text-herbal-gold text-lg"></i>
                    <span>01819 396959</span>
                </a> -->
                <a href="#order-form" class="bg-gradient-to-r from-herbal-gold to-yellow-500 text-herbal-800 font-semibold px-6 py-2.5 rounded-full shadow-md hover:shadow-lg transition transform hover:scale-105 text-base">
                    অর্ডার করুন
                </a>
            </div>
        </div>
    </header>

    <section class="relative bg-gradient-to-b from-herbal-50 via-white to-herbal-100/40 py-10 md:py-16 px-4 overflow-hidden">

        <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-10 items-center relative z-10">
            <div class="space-y-6 text-center md:text-left">
                <!-- Badges -->
                <div class="flex flex-wrap justify-center md:justify-start gap-2">
                    <span class="inline-flex items-center gap-1.5 bg-herbal-100 text-herbal-800 border border-herbal-600/30 px-3 py-1 rounded-full text-sm font-medium">
                        <i class="fa-solid fa-shield-halved text-herbal-gold"></i> ১০০% অর্গানিক
                    </span>
                    <span class="inline-flex items-center gap-1.5 bg-herbal-100 text-herbal-800 border border-herbal-600/30 px-3 py-1 rounded-full text-sm font-medium">
                        <i class="fa-solid fa-ban text-red-500"></i> প্যারাবেন মুক্ত
                    </span>
                    <span class="inline-flex items-center gap-1.5 bg-herbal-100 text-herbal-800 border border-herbal-600/30 px-3 py-1 rounded-full text-sm font-medium">
                        <i class="fa-solid fa-check text-green-600"></i> কেমিক্যাল ফ্রী
                    </span>
                </div>
                
                <h1 class="text-3xl md:text-4xl font-semibold leading-relaxed text-herbal-800">মহাশংকর হেয়ার অয়েল
                </h1>


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

                
                <p style="font-family: sans-serif;" class="text-gray-700 text-base md:text-lg leading-relaxed font-medium">
                    চুল পড়া, খুশকি, রুক্ষতা কিংবা চুল ভেঙে যাওয়ার মতো সমস্যায় নিয়মিত চুলের যত্ন নেওয়া গুরুত্বপূর্ণ।
                    <br><br>
                    তাই প্রয়োজন এমন একটি হেয়ার অয়েল, যেখানে রয়েছে নির্বাচিত ভেষজ উপাদানের সুন্দর সমন্বয় এবং যত্ন নিয়ে তৈরি
                    <br><br> করার একটি বিশেষ প্রক্রিয়া। মহাশংকর হেয়ার অয়েল সেই যত্নেরই একটি ফর্মুলা।
                </p>

                <!-- Pricing Box -->
                <!-- <div class="p-5 bg-white rounded-2xl border border-herbal-600/20 shadow-lg inline-block w-full max-w-md">
                    <div class="flex items-center justify-between border-b border-gray-200 pb-3 mb-3">
                        <span class="text-sm font-medium text-gray-600">বিশেষ স্পেশাল অফার মূল্য:</span>
                        <span class="bg-red-600 text-white text-xs font-semibold px-3 py-1 rounded-full animate-pulse">৫০% ছাড়</span>
                    </div>
                    <div class="flex items-center justify-center md:justify-start gap-4">
                        <span class="text-gray-400 line-through text-lg font-medium">৳১,৭০০</span>
                        <span class="text-herbal-700 text-3xl font-semibold">৳৮৫০</span>
                        <span class="text-sm text-gray-600 font-medium">(১টি বোতল - ২০০ মি.লি.)</span>
                    </div>
                </div> -->

                <div class="p-5 bg-white rounded-2xl border border-herbal-600/20 shadow-lg inline-block w-full ">
                    <div class="flex items-center justify-between border-b border-gray-400 pb-3 mb-5">
                        <p style="font-size:24px;font-family: sans-serif;" class=" font-medium text-gray-600">🌿 আমাদের বিশেষ উপাদান মহাশংকর হেয়ার অয়েলে রয়েছে মোট ২১টি নির্বাচিত ভেষজ উপাদান। <br><br>এর মধ্যে রয়েছে—</p style="font-size:24px">
                    </div>

                <div style="font-size:18px" class="grid grid-cols-2 gap-3 text-gray-700 pt-1 text-left max-w-md mx-auto md:mx-0 font-medium">
                    <div class="flex items-center gap-2"><i class="fa-solid fa-circle-check text-herbal-800 text-base"></i> ক্যাস্টর অয়েল</div>
                    <div class="flex items-center gap-2"><i class="fa-solid fa-circle-check text-herbal-800 text-base"></i> কৃষ্ণ তিলের তেল</div>
                    <div class="flex items-center gap-2"><i class="fa-solid fa-circle-check text-herbal-800 text-base"></i> ভার্জিন নারিকেল তেল</div>
                    <div class="flex items-center gap-2"><i class="fa-solid fa-circle-check text-herbal-800 text-base"></i> রক্ত চন্দন</div>
                    <div class="flex items-center gap-2"><i class="fa-solid fa-circle-check text-herbal-800 text-base"></i> আমলকী</div>
                    <div class="flex items-center gap-2"><i class="fa-solid fa-circle-check text-herbal-800 text-base"></i> বহেরা</div>
                    <div class="flex items-center gap-2"><i class="fa-solid fa-circle-check text-herbal-800 text-base"></i> জবা ফুল</div>
                    <div class="flex items-center gap-2"><i class="fa-solid fa-circle-check text-herbal-800 text-base"></i> রোজমেরি এক্সট্র্যাক্ট</div>
                    <div class="flex items-center gap-2"><i class="fa-solid fa-circle-check text-herbal-800 text-base"></i> এবং আরও নির্বাচিত ভেষজ উপাদান</div>
                </div><br><br>
                <p>প্রতিটি উপাদান চুল ও স্কাল্পের নিয়মিত যত্নের কথা মাথায় রেখে ফর্মুলায় যুক্ত করা হয়েছে।</p>
                </div>

                <!-- Highlights -->


                <div class="pt-2">
                    <a href="#order-form" class="inline-block w-full sm:w-auto bg-gradient-to-r from-herbal-700 to-herbal-600 hover:from-herbal-800 hover:to-herbal-700 text-white font-semibold text-base md:text-lg px-8 py-3.5 rounded-xl shadow-xl transform hover:scale-105 transition duration-300 text-center animate-soft-pulse">
                        <i class="fa-solid fa-basket-shopping mr-2 text-herbal-gold"></i> এখনই ক্যাশ অন ডেলিভারিতে অর্ডার করুন
                    </a>
                </div>
            </div>

            <!-- Product Image Container -->
            <!-- <div class="relative flex justify-center">
                <div class="relative w-full max-w-md bg-gradient-to-br from-herbal-00 to-herbal-800 p-3.5 rounded-3xl shadow-2xl border-4 border-herbal-gold/40">
                    <img id="main-product-img" src="images/main-img.webp" alt="Herbal Hair Oil Bottle" class="w-full h-80 md:h-[420px] object-cover rounded-2xl shadow-inner">
                    
                    <div class="absolute -top-4 -right-4 bg-herbal-gold text-herbal-800 font-semibold p-3 rounded-full text-center shadow-xl border-2 border-white w-20 h-20 flex flex-col justify-center leading-tight">
                        <span class="text-xs">১০০%</span>
                        <span class="text-sm">ন্যাচারাল</span>
                    </div>
                </div>
            </div> -->


            <div class="relative flex justify-center">
                <script>
                    document.addEventListener("DOMContentLoaded", function () {

                        const images = [
                            "images/main-img.webp",
                            "images/slide-1.webp",
                            "images/slide-2.webp"
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
                                src="images/main-img.webp"
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
                                <!-- <button type="button" class="slider-dot" data-index="3"></button>
                                <button type="button" class="slider-dot" data-index="4"></button> -->
                            </div>

                        </div>

                        <!-- Thumbnails -->
                        <div class="product-thumbnails">

                            <button type="button" class="thumbnail active" data-index="0">
                                <img src="images/main-img.webp" alt="Product image 1">
                            </button>

                            <button type="button" class="thumbnail" data-index="1">
                                <img src="images/slide-1.webp" alt="Product image 2">
                            </button>

                            <button type="button" class="thumbnail" data-index="2">
                                <img src="images/slide-2.webp" alt="Product image 3">
                            </button>

                        </div>

                    </div>

                </div>

            </div>

        </div>
    </section>

    <section class="py-14 px-4 bg-herbal-800 text-white relative overflow-hidden">
        <div class="max-w-5xl mx-auto relative z-10">

            <div style="border:1px solid #f1f1f1" class="rounded-2xl border-herbal-600/20 inline-block w-full p-10 mx-auto mb-10">
                ☀️ কীভাবে তৈরি হয়?<br><br>
                মহাশংকর হেয়ার অয়েল দ্রুত তৈরি করা হয় না।

                ভেষজ উপাদানগুলোকে এক মাসেরও বেশি সময় সূর্যের প্রাকৃতিক তাপে বিশেষ পদ্ধতিতে প্রসেস করা হয়।
                <br><br>
                আগুনের সরাসরি তাপ নয়—
                সময় নিয়ে ধীরে ধীরে প্রস্তুত করা হয় এই হেয়ার অয়েল।
            </div>

            <div style="border:1px solid #f1f1f1" class="rounded-2xl border-herbal-600/20 inline-block w-full p-10 mx-auto mb-10">
                🚫 কী নেই এতে?

                <p>মহাশংকর হেয়ার অয়েলের ফর্মুলেশনে নেই—</p>

                ❌ Mineral Oil <br>
                ❌ Paraffin <br>
                ❌ Synthetic Fragrance <br>
                ❌ Artificial Colour <br><br>

                <p>অপ্রয়োজনীয় উপাদান এড়িয়ে আমরা গুরুত্ব দিয়েছি ভেষজ উপাদান ও সঠিক ফর্মুলেশনে।</p><br>

                <p>💚 নিয়মিত ব্যবহারে কী কী উপকার পেতে পারেন?</p><br>

                <p>মহাশংকর হেয়ার অয়েল আপনার নিয়মিত Hair Care Routine-এর অংশ হিসেবে ব্যবহার করতে পারেন।</p><br>

                প্রধান উপকারিতা:- <br><br>
                🌿 চুল পড়া দ্রুত কমাতে সাহায্য করে <br>
                🌿 নতুন চুল গজানোর উপযোগী স্কাল্প তৈরি করে <br>
                🌿 চুলের দুর্বল গোড়া মজবুত করে <br>
                🌿 খুশকি ও স্ক্যাল্পের শুষ্কতা কমাতে সাহায্য করে <br>
                🌿 চুল নরম, সিল্কি ও উজ্জ্বল করে <br>
                🌿 রুক্ষ ও প্রাণহীন চুলে প্রাণ ফিরিয়ে আনে <br>
                🌿 অকাল পাকা প্রতিরোধে সহায়ক <br><br>

                <p>👩‍🦰 কারা ব্যবহার করতে পারেন?</p> <br>

                <p>যারা চুলের নিয়মিত যত্নের জন্য একটি ভেষজ হেয়ার অয়েল খুঁজছেন।</p>

                ✓ নারী ও পুরুষ <br>
                ✓ বিভিন্ন ধরনের চুলের জন্য <br>
                ✓ নিয়মিত Hair Care Routine-এর জন্য <br><br>

                আপনার চুলের ধরন যেমনই হোক, নিয়মিত যত্নই সবচেয়ে গুরুত্বপূর্ণ।

            </div>

            <div style="border:1px solid #f1f1f1" class="rounded-2xl border-herbal-600/20 inline-block w-full p-10 mx-auto mb-10">

                <h1>💎 কেন মহাশংকর?</h1>

                <p>
                বাজারে অনেক ধরনের হেয়ার অয়েল পাওয়া যায়।
                মহাশংকর হেয়ার অয়েল তৈরির সময় আমরা গুরুত্ব দিয়েছি— <br><br>

                ১. নির্বাচিত উপাদান <br>

                ২১টি ভেষজ উপাদানের সমন্বয়। <br>

                ২. বিশেষ প্রস্তুত প্রক্রিয়া, দীর্ঘ সময় সূর্যের প্রাকৃতিক তাপে প্রসেস করা।<br>

                ৩. পরিষ্কার ফর্মুলেশন <br><br>

                Mineral Oil, Paraffin ও Synthetic Fragrance ছাড়া তৈরি। <br>

                একটি বোতলে সহজ, পরিচ্ছন্ন ও যত্নশীল হেয়ার কেয়ার।
                </p><br>

                <p>🌿 আপনার চুলের যত্নে মহাশংকর</p><br>

                সুন্দর চুলের জন্য প্রয়োজন নিয়মিত যত্ন। <br>

                আর সেই যত্নে যদি আপনি বেছে নিতে চান— <br>

                ২১টি ভেষজ উপাদানের সমন্বয়ে তৈরি একটি বিশেষ হেয়ার অয়েল, <br>

                তাহলে বেছে নিতে পারেন— <br> 

                মহাশংকর হেয়ার অয়েল <br>
                🛍️ আজই অর্ডার করুন <br>

                আপনার Hair Care Routine শুরু হোক মহাশংকর দিয়ে।

                🚚 সারা বাংলাদেশে Home Delivery
                💳 Cash on Delivery Available

                প্রোডাক্ট হাতে পেয়ে দেখে তারপর পেমেন্ট করুন।

                👇 অর্ডার করতে নিচের ফর্মে আপনার

                নাম + মোবাইল নম্বর + সম্পূর্ণ ঠিকানা

                দিয়ে অর্ডার সম্পন্ন করুন।
            </div>
            
            <div class="text-center max-w-2xl mx-auto mb-10">
                <span class="bg-herbal-gold/20 text-herbal-gold border border-herbal-gold/30 px-3.5 py-1 rounded-full text-xs sm:text-sm font-medium tracking-wide uppercase">
                    <i class="fa-solid fa-video mr-1"></i> সরাসরি ব্যবহার পদ্ধতি ও রিভিউ
                </span>
                <h2 class="text-2xl md:text-3xl font-semibold text-white mt-3 leading-snug">
                    ভিডিওতে দেখুন আমাদের হারবাল অয়েলের ম্যাজিক্যাল কার্যকারিতা
                </h2>
                <p class="text-gray-300 text-sm md:text-base mt-2 font-medium">
                    কিভাবে নিয়মিত ব্যবহার করবেন এবং গ্রাহকরা কেন এই তেলটি পছন্দ করছেন তা এক নজরে দেখে নিন।
                </p>
            </div>

            <!-- Customized Video Player Showcase -->
            <div class="relative max-w-3xl mx-auto rounded-3xl overflow-hidden shadow-2xl border-2 border-herbal-gold/40 bg-black video-glow">
                <div class="relative aspect-video w-full flex items-center justify-center bg-gray-900 group">
                    
                    <!-- HTML5 Video element -->
                    <video id="herbalVideo" class="w-full h-full object-cover" poster="https://images.unsplash.com/photo-1522337360788-8b13dee7a37e?auto=format&fit=crop&w=1200&q=80" playsinline>
                        <source src="https://commondatastorage.googleapis.com/gtv-videos-bucket/sample/BigBuckBunny.mp4" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>

                    <!-- Overlay Play/Pause Button -->
                    <div id="videoOverlay" onclick="togglePlay()" class="absolute inset-0 bg-black/40 flex flex-col items-center justify-center cursor-pointer transition duration-300 group-hover:bg-black/30">
                        <div class="w-20 h-20 bg-herbal-gold hover:bg-yellow-500 text-herbal-800 rounded-full flex items-center justify-center text-3xl shadow-2xl transition transform group-hover:scale-110">
                            <i id="playIcon" class="fa-solid fa-play ml-1"></i>
                        </div>
                        <span class="mt-3 text-white text-sm font-medium bg-black/60 px-4 py-1.5 rounded-full border border-white/20">
                            প্লে করতে ক্লিক করুন
                        </span>
                    </div>

                    <!-- Video Controls Bar -->
                    <div class="absolute bottom-0 inset-x-0 bg-gradient-to-t from-black/90 via-black/50 to-transparent p-4 flex items-center justify-between text-white text-xs md:text-sm font-medium opacity-90">
                        <button onclick="togglePlay()" class="hover:text-herbal-gold transition flex items-center gap-2">
                            <i id="bottomPlayIcon" class="fa-solid fa-play"></i>
                            <span>ভিডিও প্লেয়ার</span>
                        </button>
                        <div class="flex items-center gap-3">
                            <span class="text-xs text-herbal-gold"><i class="fa-solid fa-circle text-[8px] animate-ping mr-1"></i> HD কোয়ালিটি</span>
                            <button onclick="toggleMute()" class="hover:text-herbal-gold transition">
                                <i id="muteIcon" class="fa-solid fa-volume-high"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Video Highlights Footer -->
                <div class="bg-herbal-700/80 p-4 grid grid-cols-3 gap-2 text-center text-xs sm:text-sm font-medium border-t border-herbal-gold/20">
                    <div class="flex items-center justify-center gap-1.5">
                        <i class="fa-solid fa-check-double text-herbal-gold"></i>
                        <span>সহজ প্রয়োগবিধি</span>
                    </div>
                    <div class="flex items-center justify-center gap-1.5 border-x border-herbal-600">
                        <i class="fa-solid fa-star text-herbal-gold"></i>
                        <span>বাস্তব ব্যবহারকারীদের অভিজ্ঞতা</span>
                    </div>
                    <div class="flex items-center justify-center gap-1.5">
                        <i class="fa-solid fa-thumbs-up text-herbal-gold"></i>
                        <span>১০০% প্রাকৃতিক ফলাফল</span>
                    </div>
                </div>
            </div>

            <!-- Call to action below video -->
            <div class="text-center mt-8">
                <a href="#order-form" class="inline-flex items-center gap-2 bg-herbal-gold hover:bg-yellow-500 text-herbal-800 font-semibold px-8 py-3.5 rounded-xl shadow-lg transition transform hover:scale-105 text-base">
                    <i class="fa-solid fa-bag-shopping"></i> অফার লুফে নিতে অর্ডার করুন
                </a>
            </div>

        </div>
    </section>

    <section class="py-14 px-4 bg-white">
        <div class="max-w-6xl mx-auto">
            <div class="text-center max-w-2xl mx-auto mb-10">
                <span class="text-herbal-600 font-semibold text-sm tracking-wider uppercase">মূল উপকারিতা</span>
                <h2 class="text-2xl md:text-3xl font-semibold text-herbal-800 mt-1">
                    কেন নিয়মিত আমাদের হারবাল তেল ব্যবহার করবেন?
                </h2>
                <div class="w-16 h-1 bg-herbal-gold mx-auto mt-3 rounded-full"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Benefit 1 -->
                <div class="bg-herbal-50/70 p-6 rounded-2xl border border-herbal-100 hover:border-herbal-600/30 transition shadow-sm hover:shadow-md text-center">
                    <div class="w-14 h-14 bg-herbal-700 text-herbal-gold rounded-2xl flex items-center justify-center text-2xl mx-auto mb-4 shadow-md">
                        <i class="fa-solid fa-circle-down"></i>
                    </div>
                    <h3 class="font-semibold text-lg text-herbal-800 mb-2">দ্রুত চুল পড়া বন্ধ করে</h3>
                    <p class="text-gray-600 text-sm leading-relaxed">
                        চুলের গোড়া শক্ত করে মাত্র ৭ দিনের মধ্যে অতিরিক্ত চুল পড়া বন্ধ করতে সাহায্য করে।
                    </p>
                </div>

                <!-- Benefit 2 -->
                <div class="bg-herbal-50/70 p-6 rounded-2xl border border-herbal-100 hover:border-herbal-600/30 transition shadow-sm hover:shadow-md text-center">
                    <div class="w-14 h-14 bg-herbal-700 text-herbal-gold rounded-2xl flex items-center justify-center text-2xl mx-auto mb-4 shadow-md">
                        <i class="fa-solid fa-seedling"></i>
                    </div>
                    <h3 class="font-semibold text-lg text-herbal-800 mb-2">নতুন চুল গজায়</h3>
                    <p class="text-gray-600 text-sm leading-relaxed">
                        স্ক্যাল্পের নিস্তেজ হেয়ার ফলিকল সক্রিয় করে নতুন চুল গজাতে সহায়তা করে।
                    </p>
                </div>

                <!-- Benefit 3 -->
                <div class="bg-herbal-50/70 p-6 rounded-2xl border border-herbal-100 hover:border-herbal-600/30 transition shadow-sm hover:shadow-md text-center">
                    <div class="w-14 h-14 bg-herbal-700 text-herbal-gold rounded-2xl flex items-center justify-center text-2xl mx-auto mb-4 shadow-md">
                        <i class="fa-solid fa-snowflake"></i>
                    </div>
                    <h3 class="font-semibold text-lg text-herbal-800 mb-2">খুশকি ও স্ক্যাল্প চুলকানি মুক্ত</h3>
                    <p class="text-gray-600 text-sm leading-relaxed">
                        অ্যান্টি-ফাঙ্গাল উপাদান যা স্ক্যাল্পের খুশকি ও শুষ্কতা দ্রুত দূর করে।
                    </p>
                </div>

                <!-- Benefit 4 -->
                <div class="bg-herbal-50/70 p-6 rounded-2xl border border-herbal-100 hover:border-herbal-600/30 transition shadow-sm hover:shadow-md text-center">
                    <div class="w-14 h-14 bg-herbal-700 text-herbal-gold rounded-2xl flex items-center justify-center text-2xl mx-auto mb-4 shadow-md">
                        <i class="fa-solid fa-wand-magic-sparkles"></i>
                    </div>
                    <h3 class="font-semibold text-lg text-herbal-800 mb-2">ঘন ও ঝলমলে সিল্কি চুল</h3>
                    <p class="text-gray-600 text-sm leading-relaxed">
                        রুক্ষ ও প্রাণহীন চুলকে করে তোলে স্বাভাবিক সিল্কি, সফট এবং আকর্ষণীয় শাইনি।
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-14 px-4 bg-gradient-to-b from-gray-50 via-herbal-50/30 to-white border-y border-gray-200">
        <div class="max-w-6xl mx-auto">
            <div class="text-center max-w-2xl mx-auto mb-10">
                <span class="text-herbal-600 font-semibold text-sm tracking-wider uppercase">প্রাকৃতিক সিলেকশন</span>
                <h2 class="text-2xl md:text-3xl font-semibold text-herbal-800 mt-1">
                    আমাদের ফর্মুলায় ব্যবহৃত প্রধান ভেষজ উপাদানসমূহ
                </h2>
                <div class="w-16 h-1 bg-herbal-gold mx-auto mt-3 rounded-full"></div>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4 text-center">
                <!-- Ingredient 1 -->
                <div class="bg-white p-4 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition flex flex-col items-center">
                    <img src="https://images.unsplash.com/photo-1615485290382-441e4d049cb5?auto=format&fit=crop&w=300&q=80" alt="Amla" class="w-20 h-20 object-cover rounded-full mb-3 border-2 border-herbal-600/30">
                    <h4 class="font-semibold text-herbal-800 text-base">আমলকী (Amla)</h4>
                    <p class="text-xs text-gray-500 mt-1 font-medium">ভিটামিন-সি সমৃদ্ধ যা গোড়া মজবুত করে।</p>
                </div>

                <!-- Ingredient 2 -->
                <div class="bg-white p-4 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition flex flex-col items-center">
                    <img src="https://images.unsplash.com/photo-1540420773420-3366772f4999?auto=format&fit=crop&w=300&q=80" alt="Bhringraj" class="w-20 h-20 object-cover rounded-full mb-3 border-2 border-herbal-600/30">
                    <h4 class="font-semibold text-herbal-800 text-base">ভ্রিঙ্গরাজ</h4>
                    <p class="text-xs text-gray-500 mt-1 font-medium">নতুন চুল গজাতে আয়ুর্বেদিক ভেষজ।</p>
                </div>

                <!-- Ingredient 3 -->
                <div class="bg-white p-4 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition flex flex-col items-center">
                    <img src="https://images.unsplash.com/photo-1618512496248-a07fe83aa8cb?auto=format&fit=crop&w=300&q=80" alt="Onion Seed" class="w-20 h-20 object-cover rounded-full mb-3 border-2 border-herbal-600/30">
                    <h4 class="font-semibold text-herbal-800 text-base">পেঁয়াজ বীজ</h4>
                    <p class="text-xs text-gray-500 mt-1 font-medium">সালফার সমৃদ্ধ যা রক্ত সঞ্চালন বাড়ায়।</p>
                </div>

                <!-- Ingredient 4 -->
                <div class="bg-white p-4 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition flex flex-col items-center">
                    <img src="https://images.unsplash.com/photo-1546554137-f86b9593a222?auto=format&fit=crop&w=300&q=80" alt="Coconut Oil" class="w-20 h-20 object-cover rounded-full mb-3 border-2 border-herbal-600/30">
                    <h4 class="font-semibold text-herbal-800 text-base">নারিকেল তেল</h4>
                    <p class="text-xs text-gray-500 mt-1 font-medium">কোল্ড প্রেস উপায়ে সংগৃহীত বিশুদ্ধ নির্যাস।</p>
                </div>

                <!-- Ingredient 5 -->
                <div class="bg-white p-4 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition flex flex-col items-center">
                    <img src="https://images.unsplash.com/photo-1608248597260-24903332463e?auto=format&fit=crop&w=300&q=80" alt="Neem" class="w-20 h-20 object-cover rounded-full mb-3 border-2 border-herbal-600/30">
                    <h4 class="font-semibold text-herbal-800 text-base">নিম ও মেথি</h4>
                    <p class="text-xs text-gray-500 mt-1 font-medium">খুশকি ও ইনফেকশন দূর করতে সেরা।</p>
                </div>

                <!-- Ingredient 6 -->
                <div class="bg-white p-4 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition flex flex-col items-center">
                    <img src="https://images.unsplash.com/photo-1508061252966-f7200787a746?auto=format&fit=crop&w=300&q=80" alt="Almond Oil" class="w-20 h-20 object-cover rounded-full mb-3 border-2 border-herbal-600/30">
                    <h4 class="font-semibold text-herbal-800 text-base">কাঠবাদাম তেল</h4>
                    <p class="text-xs text-gray-500 mt-1 font-medium">ভিটামিন-ই এর সমৃদ্ধ উৎস ও সফটনেস প্রদানকারী।</p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-14 px-4 bg-white">
        <div class="max-w-6xl mx-auto">
            <div class="text-center max-w-2xl mx-auto mb-10">
                <span class="text-herbal-600 font-semibold text-sm tracking-wider uppercase">গ্রাহক সন্তুষ্টি</span>
                <h2 class="text-2xl md:text-3xl font-semibold text-herbal-800 mt-1">
                    আমাদের সম্মানিত গ্রাহকদের মতামত ও রিভিউ
                </h2>
                <div class="w-16 h-1 bg-herbal-gold mx-auto mt-3 rounded-full"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Review Card 1 -->
                <div class="bg-gray-50 rounded-2xl p-5 border border-gray-200 shadow-sm flex flex-col justify-between">
                    <div>
                        <div class="flex items-center gap-1 text-yellow-500 mb-3 text-sm">
                            <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                        </div>
                        <p class="text-gray-700 text-sm leading-relaxed mb-4 font-medium">
                            "আমি প্রায় ২ সপ্তাহ ব্যবহার করছি। আগে শ্যাম্পু করার সময় অনেক চুল পড়ত, এখন মাশাল্লাহ অনেক কমে এসেছে। বিশেষ করে তেলের সুবাসটাও খুব সুন্দর।"
                        </p>
                    </div>
                    <div class="flex items-center gap-3 pt-3 border-t border-gray-200">
                        <div class="w-10 h-10 bg-herbal-700 text-white rounded-full flex items-center justify-center font-semibold text-sm">
                            এস
                        </div>
                        <div>
                            <h4 class="font-semibold text-sm text-herbal-800">সাবরিনা পারভীন</h4>
                            <span class="text-xs text-gray-500 font-medium"><i class="fa-solid fa-circle-check text-green-600"></i> ভেরিফাইড ক্রেতা (ঢাকা)</span>
                        </div>
                    </div>
                </div>

                <!-- Review Card 2 -->
                <div class="bg-gray-50 rounded-2xl p-5 border border-gray-200 shadow-sm flex flex-col justify-between">
                    <div>
                        <div class="flex items-center gap-1 text-yellow-500 mb-3 text-sm">
                            <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                        </div>
                        <p class="text-gray-700 text-sm leading-relaxed mb-4 font-medium">
                            "ঢাকার বাইরে ২ দিনেই ডেলিভারি পেয়েছি। তেলটা একদম স্টিকি নয় এবং মাথায় দিলে বেশ রিফ্রেশিং লাগে। নতুন চুল ওঠার লক্ষণ দেখতে পাচ্ছি।"
                        </p>
                    </div>
                    <div class="flex items-center gap-3 pt-3 border-t border-gray-200">
                        <div class="w-10 h-10 bg-herbal-700 text-white rounded-full flex items-center justify-center font-semibold text-sm">
                            এম
                        </div>
                        <div>
                            <h4 class="font-semibold text-sm text-herbal-800">মহসিন রেজা</h4>
                            <span class="text-xs text-gray-500 font-medium"><i class="fa-solid fa-circle-check text-green-600"></i> ভেরিফাইড ক্রেতা (চট্টগ্রাম)</span>
                        </div>
                    </div>
                </div>

                <!-- Review Card 3 -->
                <div class="bg-gray-50 rounded-2xl p-5 border border-gray-200 shadow-sm flex flex-col justify-between">
                    <div>
                        <div class="flex items-center gap-1 text-yellow-500 mb-3 text-sm">
                            <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                        </div>
                        <p class="text-gray-700 text-sm leading-relaxed mb-4 font-medium">
                            "খুশকির জন্য অনেক কিছু ট্রাই করেছি কিন্তু কাজ হয়নি। এই হারবাল তেলটি ব্যবহারের পর স্ক্যাল্পের চুলকানি ও খুশকি একদম ভ্যানিশ হয়ে গেছে!"
                        </p>
                    </div>
                    <div class="flex items-center gap-3 pt-3 border-t border-gray-200">
                        <div class="w-10 h-10 bg-herbal-700 text-white rounded-full flex items-center justify-center font-semibold text-sm">
                            এফ
                        </div>
                        <div>
                            <h4 class="font-semibold text-sm text-herbal-800">ফারিহা সুলতানা</h4>
                            <span class="text-xs text-gray-500 font-medium"><i class="fa-solid fa-circle-check text-green-600"></i> ভেরিফাইড ক্রেতা (সিলেট)</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-12 px-4 bg-herbal-50/60 border-t border-gray-200">
        <div class="max-w-5xl mx-auto">
            <div class="text-center max-w-2xl mx-auto mb-10">
                <span class="text-herbal-600 font-semibold text-sm tracking-wider uppercase">প্যাকেজ ও অফার</span>
                <h2 class="text-2xl md:text-3xl font-semibold text-herbal-800 mt-1">
                    আপনার পছন্দের প্যাকেজটি বেছে নিন
                </h2>
                <div class="w-16 h-1 bg-herbal-gold mx-auto mt-3 rounded-full"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 max-w-3xl mx-auto">
                <!-- Package 1: Single Bottle -->
                <div id="pkg-1" onclick="selectPackage(1, 850)" class="bg-white rounded-2xl p-6 border-2 border-gray-200 cursor-pointer transition transform hover:scale-102 shadow-sm relative">
                    <div class="flex justify-between items-start mb-3">
                        <div>
                            <span class="text-xs font-semibold bg-gray-100 text-gray-700 px-2.5 py-1 rounded-md">একক প্যাক</span>
                            <h3 class="text-xl font-semibold text-herbal-800 mt-2">১ বোতল (২০০ মি.লি.)</h3>
                        </div>
                        <input type="radio" name="pkg_radio" id="radio-1" checked class="w-5 h-5 text-herbal-600 mt-1">
                    </div>
                    <div class="flex items-baseline gap-2 mb-4">
                        <span class="text-2xl font-semibold text-herbal-700">৳৮৫০</span>
                        <span class="text-sm text-gray-400 line-through">৳১,৭০০</span>
                    </div>
                    <ul class="text-sm text-gray-600 space-y-2 mb-4 font-medium">
                        <li><i class="fa-solid fa-check text-green-600 mr-2"></i> ৭ দিনের মানি-ব্যাক সাপোর্ট</li>
                        <li><i class="fa-solid fa-check text-green-600 mr-2"></i> ক্যাশ অন ডেলিভারি</li>
                    </ul>
                </div>

                <!-- Package 2: Double Bottle (Popular) -->
                <div id="pkg-2" onclick="selectPackage(2, 1500)" class="bg-white rounded-2xl p-6 border-2 border-herbal-gold cursor-pointer transition transform hover:scale-102 shadow-md relative">
                    <div class="absolute -top-3 right-6 bg-gradient-to-r from-herbal-gold to-yellow-500 text-herbal-800 text-xs font-semibold px-3 py-1 rounded-full shadow">
                        সেরা অফার (ফ্রি ডেলিভারি)
                    </div>
                    <div class="flex justify-between items-start mb-3">
                        <div>
                            <span class="text-xs font-semibold bg-herbal-100 text-herbal-800 px-2.5 py-1 rounded-md">কম্বো প্যাক</span>
                            <h3 class="text-xl font-semibold text-herbal-800 mt-2">২ বোতল (৪০০ মি.লি.)</h3>
                        </div>
                        <input type="radio" name="pkg_radio" id="radio-2" class="w-5 h-5 text-herbal-600 mt-1">
                    </div>
                    <div class="flex items-baseline gap-2 mb-4">
                        <span class="text-2xl font-semibold text-herbal-700">৳১,৫০০</span>
                        <span class="text-sm text-gray-400 line-through">৳৩,৪০০</span>
                        <span class="text-xs text-red-600 font-semibold">(৳২০০ সাশ্রয়)</span>
                    </div>
                    <ul class="text-sm text-gray-600 space-y-2 mb-4 font-medium">
                        <li><i class="fa-solid fa-check text-green-600 mr-2"></i> সারাদেশব্যাপী ফ্রি ডেলিভারি</li>
                        <li><i class="fa-solid fa-check text-green-600 mr-2"></i> ৭ দিনের মানি-ব্যাক সাপোর্ট</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section id="order-form" class="py-14 px-4 bg-gray-100">
        <div class="max-w-4xl mx-auto bg-white rounded-3xl shadow-2xl border border-herbal-600/20 overflow-hidden">
            
            <div class="bg-gradient-to-r from-herbal-800 to-herbal-700 text-white p-6 md:p-8 text-center space-y-2 border-b-4 border-herbal-gold">
                <span class="bg-herbal-gold text-herbal-800 text-xs font-semibold px-3 py-1 rounded-full uppercase tracking-wide">
                    ক্যাশ অন ডেলিভারি (পণ্য দেখে টাকা দিন)
                </span>
                <h2 class="text-2xl md:text-3xl font-semibold text-white">
                    অর্ডার করতে নিচের তথ্যগুলো পূরণ করুন
                </h2>
                <p class="text-gray-200 text-sm font-medium">
                    কোন অগ্রিম পেমেন্টের প্রয়োজন নেই। ডেলিভারিম্যানের নিকট থেকে পণ্য বুঝে পেয়ে মূল্য পরিশোধ করুন।
                </p>
            </div>

            <div class="p-6 md:p-10">
                <!-- <form id="checkoutForm" method="post" onsubmit="handleOrderSubmit(event)" action="submit-order.php" class="grid grid-cols-1 md:grid-cols-2 gap-8"> -->
                <form id="checkoutForm" method="post" action="submit-order.php" class="grid grid-cols-1 md:grid-cols-2 gap-8">

                    <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($csrf_token, ENT_QUOTES, 'UTF-8') ?>" />
                    <input type="hidden" name="order_token" value="<?= htmlspecialchars($order_token) ?>">

                    <!-- Customer Details Inputs -->
                    <div class="space-y-4">
                        <h3 class="text-lg font-semibold text-herbal-800 border-b pb-2 flex items-center gap-2">
                            <i class="fa-solid fa-user-pen text-herbal-600"></i> ডেলিভারি তথ্য
                        </h3>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">
                                আপনার নাম <span class="text-red-500">*</span>
                            </label>
                            <input name="billing_first_name" type="text" id="customerName" required placeholder="আপনার পূর্ণ নাম লিখুন" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-herbal-600 focus:border-herbal-600 outline-none text-base transition font-medium">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">
                                মোবাইল নম্বর <span class="text-red-500">*</span>
                            </label>
                            <input name="billing_phone" type="tel" id="customerPhone" required pattern="[0-9]{11}" placeholder="১১ ডিজিটের মোবাইল নম্বর" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-herbal-600 focus:border-herbal-600 outline-none text-base transition font-medium">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">
                                পূর্ণাঙ্গ ঠিকানা <span class="text-red-500">*</span>
                            </label>
                            <textarea name="billing_address_1" id="customerAddress" required rows="3" placeholder="জেলা, থানা, এলাকা ও বাড়ীর নম্বর লিখুন" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-herbal-600 focus:border-herbal-600 outline-none text-base transition font-medium"></textarea>
                        </div>

                        <input type="hidden" name="quantity" id="formQuantity" value="1">
                        <input type="hidden" name="unit_price" id="formUnitPrice" value="900">
                        <input type="hidden" name="total" id="formTotal" value="900">

                        <!-- <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                ডেলিভারি এলাকা নির্বাচন করুন <span class="text-red-500">*</span>
                            </label>
                            <div class="space-y-2">
                                <label class="flex items-center justify-between p-3 border rounded-xl cursor-pointer hover:bg-herbal-50 border-herbal-600 bg-herbal-50/50">
                                    <div class="flex items-center gap-2">
                                        <input type="radio" name="delivery" value="70" checked onclick="calculateTotal()" class="w-4 h-4 text-herbal-600">
                                        <span class="text-sm font-medium text-gray-800">ঢাকার ভিতরে (৳৭০)</span>
                                    </div>
                                    <span class="font-semibold text-sm text-herbal-800">৳৭০</span>
                                </label>
                                <label class="flex items-center justify-between p-3 border rounded-xl cursor-pointer hover:bg-herbal-50">
                                    <div class="flex items-center gap-2">
                                        <input type="radio" name="delivery" value="130" onclick="calculateTotal()" class="w-4 h-4 text-herbal-600">
                                        <span class="text-sm font-medium text-gray-800">ঢাকার বাইরে (৳১৩০)</span>
                                    </div>
                                    <span class="font-semibold text-sm text-herbal-800">৳১৩০</span>
                                </label>
                            </div>
                        </div> -->
                    </div>

                    <!-- Summary Column -->
                    <div class="space-y-4 flex flex-col justify-between">
                        <div>
                            <h3 class="text-lg font-semibold text-herbal-800 border-b pb-2 flex items-center gap-2">
                                <i class="fa-solid fa-box-archive text-herbal-600"></i> অর্ডারের বিবরণ
                            </h3>

                            <div class="mt-4 space-y-3">
                                <div class="p-3.5 bg-herbal-50 rounded-2xl border border-herbal-200">
                                    <div class="flex items-center justify-between mb-2">
                                        <span class="font-medium text-sm text-herbal-800">বোতলের সংখ্যা:</span>
                                        <div class="flex items-center border border-gray-300 rounded-lg bg-white">
                                            <button type="button" onclick="updateQty(-1)" class="px-3 py-1 text-lg font-semibold text-gray-600 hover:bg-gray-100 rounded-l-lg">-</button>
                                            <span id="qtyDisplay" class="px-4 font-semibold text-gray-800">1</span>
                                            <button type="button" onclick="updateQty(1)" class="px-3 py-1 text-lg font-semibold text-gray-600 hover:bg-gray-100 rounded-r-lg">+</button>
                                        </div>
                                    </div>
                                    <p class="text-xs text-gray-500 font-medium">* ২ বোতল অর্ডার করলে পাবেন সম্পূর্ণ ফ্রি ডেলিভারি!</p>
                                </div>

                                <!-- Summary calculation table -->
                                <div class="p-4 bg-gray-50 rounded-2xl border border-gray-200 space-y-3 mt-4">
                                    <div class="flex items-center gap-3 border-b pb-3">
                                        <img src="images/main-img.webp" alt="Thumbnail" class="w-12 h-12 object-cover rounded-lg border">
                                        <div class="flex-1">
                                            <h4 class="font-semibold text-sm text-gray-900">Pritha Herbal Hair Oil</h4>
                                            <span class="text-xs text-gray-500 font-medium">২০০ মি.লি. প্যাক</span>
                                        </div>
                                        <div class="text-right">
                                            <span id="itemPriceDisplay" class="font-semibold text-base text-gray-900">৳৮৫০</span>
                                        </div>
                                    </div>

                                    <div class="flex justify-between text-sm text-gray-600">
                                        <span>প্রোডাক্ট মূল্য:</span>
                                        <span id="subtotal" class="font-medium text-gray-800">৳৮৫০</span>
                                    </div>
                                    <div class="flex justify-between text-sm text-gray-600">
                                        <span>ডেলিভারি চার্জ:</span>
                                        <span id="delivery-charge" class="font-medium text-gray-800">৳৭০</span>
                                    </div>

                                    <div class="border-t pt-2 flex justify-between text-base md:text-lg font-semibold text-herbal-800">
                                        <span>সর্বমোট প্রদেয় মূল্য:</span>
                                        <span id="grand-total" class="text-herbal-700">৳৯২০</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="w-full bg-gradient-to-r from-herbal-700 to-herbal-600 hover:from-herbal-800 hover:to-herbal-700 text-white font-semibold text-lg py-3.5 rounded-xl shadow-xl transform hover:scale-[1.02] transition duration-200 mt-4 flex items-center justify-center gap-2">
                            <i class="fa-solid fa-check-circle text-herbal-gold"></i> অর্ডার কনফার্ম করুন
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </section>

    <footer class="bg-herbal-800 text-white pt-10 pb-6 border-t border-herbal-gold/30">
        <div class="max-w-6xl mx-auto px-4 grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="space-y-3">
                <div class="flex items-center gap-2">
                    <div class="w-8 h-8 rounded-full bg-herbal-700 flex items-center justify-center text-herbal-gold font-bold">
                        <i class="fa-solid fa-leaf"></i>
                    </div>
                    <span class="font-semibold text-xl">Pritha Enterprise</span>
                </div>
                <p class="text-gray-300 text-sm leading-relaxed font-medium">
                    আমরা প্রাকৃতিক উপাদানে প্রস্তুত ১০০% বিশ্বস্ত ও পার্শ্বপ্রতিক্রিয়ামুক্ত ভেষজ স্কিন ও হেয়ার কেয়ার প্রোডাক্ট সরবরাহ করে থাকি।
                </p>
            </div>

            <div>
                <h4 class="font-semibold text-herbal-gold text-base mb-3">যোগাযোগ</h4>
                <div class="text-sm text-gray-300 space-y-2 font-medium">
                    <p><i class="fa-solid fa-phone text-herbal-gold mr-2"></i> হটলাইন: +88 01343494183</p>
                    <p><i class="fa-solid fa-location-dot text-herbal-gold mr-2"></i> ভাদ্রা, চাটমোহর, পাবনা-৬৬৩০</p>
                    <p><i class="fa-solid fa-globe text-herbal-gold mr-2"></i> www.prithaenterrise.com</p>
                </div>
            </div>

            <div>
                <h4 class="font-semibold text-herbal-gold text-base mb-3">গুরুত্বপূর্ণ লিংক</h4>
                <ul class="text-sm text-gray-300 space-y-2 font-medium">
                    <li><a target="_blank" href="https://prithaenterprise.com/privacy-policy/" class="hover:text-herbal-gold transition">প্রাইভেসি পলিসি</a></li>
                    <li><a target="_blank" href="https://prithaenterprise.com/return-policy/" class="hover:text-herbal-gold transition">রিটার্ন ও রিফান্ড পলিসি</a></li>
                    <li><a target="_blank" href="https://prithaenterprise.com/terms-conditions/" class="hover:text-herbal-gold transition">টার্মস এবং কন্ডিশনস</a></li>
                </ul>
            </div>
        </div>

        <div class="border-t border-herbal-700 mt-8 pt-4 text-center text-xs text-gray-400 font-medium">
            © 2026 Developed by <a target="_blank" href="https://www.facebook.com/digitalwavetechint/">Digital Wave Tech</a>
        </div>
    </footer>

    <!-- showing whats app button -->
    <!-- <div class="fixed bottom-4 right-4 z-40 flex flex-col gap-2">
        <a href="https://wa.me/8801819396959" target="_blank" class="w-12 h-12 bg-green-500 hover:bg-green-600 text-white rounded-full flex items-center justify-center shadow-2xl text-2xl transition transform hover:scale-110">
            <i class="fa-brands fa-whatsapp"></i>
        </a>
    </div> -->

    <!-- Mobile Sticky Footer CTA -->
    <div class="md:hidden fixed bottom-0 left-0 w-full bg-white border-t border-gray-200 p-3 z-40 shadow-2xl flex items-center justify-between gap-3">
        <a href="tel:01819396959" class="bg-herbal-100 text-herbal-800 p-3 rounded-xl font-semibold flex items-center justify-center">
            <i class="fa-solid fa-phone text-lg"></i>
        </a>
        <a href="#order-form" class="flex-1 bg-gradient-to-r from-herbal-700 to-herbal-600 text-white font-semibold py-3 rounded-xl text-center shadow-md text-base">
            অর্ডার করুন (৳৮৫০)
        </a>
    </div>

    <div id="successModal" class="fixed inset-0 bg-black/70 hidden items-center justify-center z-50 p-4">
        <div class="bg-white rounded-3xl max-w-md w-full p-6 text-center space-y-4">
            <div class="w-16 h-16 bg-green-100 text-green-600 rounded-full flex items-center justify-center text-3xl mx-auto">
                <i class="fa-solid fa-circle-check"></i>
            </div>
            <h3 class="text-2xl font-semibold text-herbal-800">অর্ডারটি সফল হয়েছে!</h3>
            <p class="text-gray-600 text-sm font-medium">
                ধন্যবাদ! আমাদের কাস্টমার প্রতিনিধি অতি শীঘ্রই কল দিয়ে আপনার অর্ডারটি কনফার্ম করবেন।
            </p>
            <div class="bg-herbal-50 p-4 rounded-xl text-left text-sm space-y-1.5 border border-herbal-200 font-medium">
                <p><strong>নাম:</strong> <span id="modalName"></span></p>
                <p><strong>মোবাইল:</strong> <span id="modalPhone"></span></p>
                <p><strong>প্যাকেজ পরিমাণ:</strong> <span id="modalQty"></span> বোতল</p>
                <p><strong>সর্বমোট প্রদেয়:</strong> <span id="modalTotal" class="text-herbal-700 font-semibold"></span></p>
            </div>
            <button onclick="closeModal()" class="w-full bg-herbal-700 text-white font-semibold py-3 rounded-xl hover:bg-herbal-800 transition text-base">
                ঠিক আছে
            </button>
        </div>
    </div>

    <script>
        // State variables
        let unitPrice = 850;
        let currentQty = 1;

        // Video Player Toggle Functionality
        const video = document.getElementById('herbalVideo');
        const overlay = document.getElementById('videoOverlay');
        const playIcon = document.getElementById('playIcon');
        const bottomPlayIcon = document.getElementById('bottomPlayIcon');
        const muteIcon = document.getElementById('muteIcon');

        function togglePlay() {
            if (video.paused || video.ended) {
                video.play();
                overlay.classList.add('opacity-0', 'pointer-events-none');
                playIcon.classList.remove('fa-play');
                playIcon.classList.add('fa-pause');
                bottomPlayIcon.classList.remove('fa-play');
                bottomPlayIcon.classList.add('fa-pause');
            } else {
                video.pause();
                overlay.classList.remove('opacity-0', 'pointer-events-none');
                playIcon.classList.remove('fa-pause');
                playIcon.classList.add('fa-play');
                bottomPlayIcon.classList.remove('fa-pause');
                bottomPlayIcon.classList.add('fa-play');
            }
        }

        function toggleMute() {
            video.muted = !video.muted;
            if(video.muted) {
                muteIcon.classList.remove('fa-volume-high');
                muteIcon.classList.add('fa-volume-xmark');
            } else {
                muteIcon.classList.remove('fa-volume-xmark');
                muteIcon.classList.add('fa-volume-high');
            }
        }

        // Package Selection logic
        function selectPackage(qty, price) {
            currentQty = qty;
            unitPrice = price / qty;
            document.getElementById('qtyDisplay').innerText = qty;
            
            document.getElementById('radio-1').checked = (qty === 1);
            document.getElementById('radio-2').checked = (qty === 2);

            const pkg1 = document.getElementById('pkg-1');
            const pkg2 = document.getElementById('pkg-2');

            if(qty === 1) {
                pkg1.classList.add('border-herbal-gold');
                pkg2.classList.remove('border-herbal-gold');
            } else {
                pkg2.classList.add('border-herbal-gold');
                pkg1.classList.remove('border-herbal-gold');
            }

            calculateTotal();
        }

        // Countdown Timer
        function startTimer(duration, display) {
            let timer = duration, hours, minutes, seconds;
            setInterval(function () {
                hours = parseInt(timer / 3600, 10);
                minutes = parseInt((timer % 3600) / 60, 10);
                seconds = parseInt(timer % 60, 10);

                hours = hours < 10 ? "0" + hours : hours;
                minutes = minutes < 10 ? "0" + minutes : minutes;
                seconds = seconds < 10 ? "0" + seconds : seconds;

                display.textContent = hours + ":" + minutes + ":" + seconds;

                if (--timer < 0) {
                    timer = duration;
                }
            }, 1000);
        }

        window.onload = function () {
            let timerSeconds = 4 * 3600 + 35 * 60 + 12;
            let display = document.querySelector('#countdown');
            startTimer(timerSeconds, display);
        };

        // Quantity Selector
        function updateQty(change) {
            currentQty += change;
            if (currentQty < 1) currentQty = 1;
            document.getElementById('qtyDisplay').innerText = currentQty;
            calculateTotal();
        }

        // Calculation
        function calculateTotal() {
            const deliveryRadios = document.getElementsByName('delivery');
            let deliveryCharge = 70;

            for (let radio of deliveryRadios) {
                if (radio.checked) {
                    deliveryCharge = parseInt(radio.value);
                    break;
                }
            }

            // Free delivery for 2 or more bottles
            if (currentQty >= 2) {
                deliveryCharge = 0;
            }

            const subtotal = Math.round(unitPrice * currentQty);
            const grandTotal = subtotal + deliveryCharge;

            document.getElementById('itemPriceDisplay').innerText = '৳' + subtotal.toLocaleString('bn-BD');
            document.getElementById('subtotal').innerText = '৳' + subtotal.toLocaleString('bn-BD');
            document.getElementById('delivery-charge').innerText = deliveryCharge === 0 ? 'ফ্রি' : '৳' + deliveryCharge.toLocaleString('bn-BD');
            document.getElementById('grand-total').innerText = '৳' + grandTotal.toLocaleString('bn-BD');
        }

        // Form Submit handler
        function handleOrderSubmit(e) {
            e.preventDefault();

            const name = document.getElementById('customerName').value;
            const phone = document.getElementById('customerPhone').value;
            const grandTotalText = document.getElementById('grand-total').innerText;

            document.getElementById('modalName').innerText = name;
            document.getElementById('modalPhone').innerText = phone;
            document.getElementById('modalQty').innerText = currentQty;
            document.getElementById('modalTotal').innerText = grandTotalText;

            const modal = document.getElementById('successModal');
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }

        function closeModal() {
            const modal = document.getElementById('successModal');
            modal.classList.add('hidden');
            modal.classList.remove('flex');
            document.getElementById('checkoutForm').reset();
            currentQty = 1;
            unitPrice = 850;
            document.getElementById('qtyDisplay').innerText = 1;
            calculateTotal();
        }
    </script>
</body>
</html>