<?php require_once('header.php'); ?>

<body class="bg-gray-50">



    <!-- Header -->
    <?php require_once('menu.php'); ?>


<div class="h-16 lg:h-20"></div>



    <style>
        .hero-slider {
            position: relative;
            width: 100%;
            height: 550px;
            overflow: hidden;
        }

        .slides,
        .slide {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
        }

        .slide {
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.6s ease;
        }

        .slide.active {
            opacity: 1;
            visibility: visible;
        }

        .slide img {
            display: block;
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
        }

        .slider-arrow {
            position: absolute;
            z-index: 2;
            top: 50%;
            transform: translateY(-50%);
            width: 44px;
            height: 44px;
            border: 0;
            border-radius: 50%;
            background: rgba(0, 0, 0, 0.4);
            color: white;
            font-size: 22px;
            cursor: pointer;
        }

        .slider-arrow.prev {
            left: 20px;
        }

        .slider-arrow.next {
            right: 20px;
        }

        .slider-dots {
            position: absolute;
            z-index: 2;
            bottom: 20px;
            left: 50%;
            display: flex;
            gap: 10px;
            transform: translateX(-50%);
        }

        .dot {
            width: 11px;
            height: 11px;
            border: none;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.5);
            cursor: pointer;
        }

        .dot.active {
            background: #fff;
        }

        @media (max-width: 768px) {
            .hero-slider {
                height: 300px;
            }
        }

        @media (max-width: 480px) {
            .hero-slider {
                height: 220px;
            }

            .slider-arrow {
                width: 34px;
                height: 34px;
            }
        }
    </style>

<!-- <style>
    /* Full-width responsive slider */
    .hero-slider {
        position: relative;
        width: 100%;
        height: clamp(220px, 35vw, 600px);
        overflow: hidden;
    }

    /* Slides container */
    .hero-slider .slides {
        position: relative;
        width: 100%;
        height: 100%;
    }

    /* Individual slide */
    .hero-slider .slide {
        position: absolute;
        inset: 0;
        width: 100%;
        height: 100%;
        opacity: 0;
        visibility: hidden;
        transition: opacity 0.6s ease;
    }

    /* Active slide */
    .hero-slider .slide.active {
        opacity: 1;
        visibility: visible;
        z-index: 1;
    }

    /* Responsive image */
    .hero-slider .slide img {
        display: block;
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
    }

    /* Tablet */
    @media (max-width: 768px) {
        .hero-slider {
            height: 300px;
        }
    }

    /* Mobile */
    @media (max-width: 480px) {
        .hero-slider {
            height: 200px;
        }
    }
</style> -->

    <section class="hero-slider" id="heroSlider">

        <div class="slides">

            <div class="slide active">
                <img src="images/banner-2.jpeg" alt="Digital Wave Tech Banner">
            </div>

            <div class="slide">
                <img src="images/banner-1.jpeg" alt="Digital Wave Tech Banner">
            </div>

            <div class="slide">
                <img src="images/banner-3.jpeg" alt="Digital Wave Tech Banner">
            </div>
        </div>

        <button class="slider-arrow prev" aria-label="Previous slide">&#10094;</button>
        <button class="slider-arrow next" aria-label="Next slide">&#10095;</button>

        <div class="slider-dots">
            <button class="dot active" aria-label="Slide 1"></button>
            <button class="dot" aria-label="Slide 2"></button>
            <button class="dot" aria-label="Slide 3"></button>
        </div>

    </section>




<section id="ecommerce" class="relative py-16 bg-gray-50 overflow-hidden">
    
    
    
    <!-- subtle corner accents -->
    <div
        class="pointer-events-none absolute -top-24 -left-24 w-72 h-72 bg-gradient-to-br from-teal-300 to-cyan-400 rounded-full blur-3xl opacity-20 max-w-full">
    </div>
    <div
        class="pointer-events-none absolute -bottom-28 -right-28 w-80 h-80 bg-gradient-to-br from-fuchsia-300 to-purple-400 rounded-full blur-3xl opacity-20">
    </div>

    <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative">
        <div class="grid lg:grid-cols-2 gap-8 lg:gap-12 items-center">
            <!-- Copy -->
            <div class="order-2 lg:order-1">
                <h2 class="text-2xl sm:text-3xl lg:text-4xl xl:text-5xl font-extrabold mb-4 sm:mb-6 leading-tight">
                    <span
                        class="leading-normal bg-clip-text text-transparent bg-gradient-to-r from-emerald-600 via-cyan-600 to-blue-600">
                        আমরাই দিচ্ছি সুপারফাস্ট ই-কমার্স ওয়েবসাইট এবং ল্যান্ডিং পেজ। যে কোন ধরনের ওয়েবসাইট এবং কাস্টম সফটওয়ারে আমরাই সেরা।
                    </span>
                </h2>

                <p class="text-base sm:text-lg text-gray-700 mb-6 sm:mb-8 leading-relaxed">
                    বেশি সেল জেনারেট করতে এমন একটি সুপারফাস্ট ওয়েবসাইট ডেভেলপ করে নিয়ে সেল করুন নিজের প্রোডাক্ট নিজের
                    ওয়েবসাইট থেকে
                </p>

                <a href="https://topperit.com/pricing"
                    class="inline-flex items-center justify-center gap-2 bg-gradient-to-br from-emerald-600 via-cyan-600 to-blue-600 text-white px-6 py-3 sm:px-8 sm:py-4 rounded-lg font-semibold text-base sm:text-lg shadow-lg shadow-cyan-600/20 hover:shadow-xl hover:opacity-95 active:opacity-90 transition-all focus:outline-none focus:ring-2 focus:ring-cyan-400">
                    Live Demo & Price
                    <i class="fas fa-arrow-right text-sm"></i>
                </a>
            </div>

            <!-- Feature card (hidden on mobile) -->
            <div class="relative order-1 lg:order-2 hidden lg:block max-w-full">

                <div
                    class="rounded-3xl p-6 sm:p-8 text-white shadow-2xl bg-gradient-to-br from-slate-950 via-indigo-950 to-violet-900/95 ring-1 ring-white/10 backdrop-blur [box-shadow:0_20px_60px_rgba(0,0,0,.35)] transition-all duration-300 hover:translate-y-[-2px] hover:shadow-[0_24px_80px_rgba(0,0,0,.45)]">

                    <!-- subtle gradient border -->
                    <div class="absolute inset-0 rounded-3xl pointer-events-none"
                        style="mask: linear-gradient(#000,transparent .75rem);">
                        <div
                            class="absolute inset-0 rounded-3xl bg-gradient-to-tr from-indigo-500/20 via-fuchsia-500/10 to-cyan-500/20 blur-xl">
                        </div>
                    </div>

                    <!-- header / badge -->
                    <div class="mb-6 flex items-center justify-between">
                        <div
                            class="inline-flex items-center gap-2 rounded-full bg-white/5 px-3 py-1 ring-1 ring-white/10">
                            <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                            <span class="text-xs tracking-wide text-white/90">Commerce Core</span>
                        </div>
                        <span class="text-xs text-white/60">Lightning stack</span>
                    </div>

                    <!-- icon tiles -->
                    <div class="grid grid-cols-2 gap-4 sm:gap-6">
                        <!-- E-commerce -->
                        <div
                            class="group relative overflow-hidden rounded-2xl bg-white/5 ring-1 ring-white/10 p-4 sm:p-5 text-center transition hover:bg-white/7.5">
                            <div
                                class="mx-auto mb-3 grid h-12 w-12 place-items-center rounded-xl bg-indigo-500/20 ring-1 ring-white/10">
                                <i class="fas fa-shopping-cart text-xl text-indigo-300"></i>
                            </div>
                            <h3 class="font-semibold text-sm sm:text-base text-indigo-100">E-commerce</h3>
                            <div
                                class="pointer-events-none absolute -right-6 -top-6 h-16 w-16 rounded-full bg-indigo-400/10 blur-xl">
                            </div>
                        </div>

                        <!-- Super Fast -->
                        <div
                            class="group relative overflow-hidden rounded-2xl bg-white/5 ring-1 ring-white/10 p-4 sm:p-5 text-center transition hover:bg-white/7.5">
                            <div
                                class="mx-auto mb-3 grid h-12 w-12 place-items-center rounded-xl bg-emerald-500/20 ring-1 ring-white/10">
                                <i class="fas fa-rocket text-xl text-emerald-300"></i>
                            </div>
                            <h3 class="font-semibold text-sm sm:text-base text-emerald-100">Super Fast</h3>
                            <div
                                class="pointer-events-none absolute -right-6 -top-6 h-16 w-16 rounded-full bg-emerald-400/10 blur-xl">
                            </div>
                        </div>

                        <!-- Mobile Ready -->
                        <div
                            class="group relative overflow-hidden rounded-2xl bg-white/5 ring-1 ring-white/10 p-4 sm:p-5 text-center transition hover:bg-white/7.5">
                            <div
                                class="mx-auto mb-3 grid h-12 w-12 place-items-center rounded-xl bg-fuchsia-500/20 ring-1 ring-white/10">
                                <i class="fas fa-mobile-alt text-xl text-fuchsia-300"></i>
                            </div>
                            <h3 class="font-semibold text-sm sm:text-base text-fuchsia-100">Mobile Ready</h3>
                            <div
                                class="pointer-events-none absolute -right-6 -top-6 h-16 w-16 rounded-full bg-fuchsia-400/10 blur-xl">
                            </div>
                        </div>

                        <!-- Payment Gateway -->
                        <div
                            class="group relative overflow-hidden rounded-2xl bg-white/5 ring-1 ring-white/10 p-4 sm:p-5 text-center transition hover:bg-white/7.5">
                            <div
                                class="mx-auto mb-3 grid h-12 w-12 place-items-center rounded-xl bg-amber-500/20 ring-1 ring-white/10">
                                <i class="fas fa-credit-card text-xl text-amber-300"></i>
                            </div>
                            <h3 class="font-semibold text-sm sm:text-base text-amber-100">Payment Gateway</h3>
                            <div
                                class="pointer-events-none absolute -right-6 -top-6 h-16 w-16 rounded-full bg-amber-400/10 blur-xl">
                            </div>
                        </div>
                    </div>

                    <!-- divider -->
                    <div
                        class="mt-6 sm:mt-7 border-t border-white/10 pt-6 sm:pt-7 grid grid-cols-2 gap-3 text-xs sm:text-sm">
                        <div
                            class="flex items-center justify-center gap-2 rounded-xl bg-white/5 px-3 py-2 ring-1 ring-white/10">
                            <i class="fas fa-shield-alt text-emerald-300"></i>
                            <span class="text-white/90">SSL & Security</span>
                        </div>
                        <div
                            class="flex items-center justify-center gap-2 rounded-xl bg-white/5 px-3 py-2 ring-1 ring-white/10">
                            <i class="fas fa-search text-cyan-300"></i>
                            <span class="text-white/90">SEO Ready</span>
                        </div>
                    </div>

                    <!-- tiny footer note -->
                    <p class="mt-4 text-center text-[11px] text-white/60">
                        Optimized for speed • Progressive features • Modern DX
                    </p>
                </div>
            </div>
            <!-- /Feature card -->
        </div>
    </div>
</section>


<style>
    /* Common card settings */
    .effect-card {
        position: relative;
        isolation: isolate;
        transition:
            transform 0.4s ease,
            box-shadow 0.4s ease,
            border-color 0.4s ease;
    }

    /* 1. Lift up */
    .effect-1:hover {
        transform: translateY(-12px);
        box-shadow: 0 25px 45px -15px rgba(16, 185, 129, .3);
    }

    /* 2. 3D tilt */
    .effect-2 {
        transform-style: preserve-3d;
    }
    .effect-2:hover {
        transform: perspective(900px) rotateX(5deg) rotateY(-6deg)
                   translateY(-6px);
    }

    /* 3. Glowing border */
    .effect-3:hover {
        border-color: #34d399;
        box-shadow: 0 0 0 2px rgba(52, 211, 153, .35),
                    0 0 30px rgba(20, 184, 166, .25);
    }

    /* 4. Shine sweep */
    .effect-4 {
        overflow: hidden;
    }
    .effect-4::after {
        content: "";
        position: absolute;
        top: -50%;
        left: -75%;
        width: 45%;
        height: 200%;
        transform: rotate(25deg);
        background: linear-gradient(
            90deg, transparent, rgba(255,255,255,.75), transparent
        );
        transition: left .7s ease;
        pointer-events: none;
        z-index: 2;
    }
    .effect-4:hover::after {
        left: 140%;
    }

    /* 5. Border draws attention */
    .effect-5:hover {
        border-color: #8b5cf6;
        box-shadow: inset 0 0 0 1px #8b5cf6,
                    0 12px 30px rgba(139, 92, 246, .15);
    }

    /* 6. Icon bounce */
    .effect-6:hover .card-icon {
        animation: iconBounce .65s ease;
    }
    @keyframes iconBounce {
        0%, 100% { transform: translateY(0); }
        35% { transform: translateY(-10px) rotate(-5deg); }
        65% { transform: translateY(-3px) rotate(5deg); }
    }

    /* 7. Gradient background reveal */
    .effect-7 {
        background: linear-gradient(135deg, #ecfdf5, #fff, #cffafe);
        background-size: 200% 200%;
        transition: background-position .5s ease, transform .4s ease;
    }
    .effect-7:hover {
        background-position: 100% 100%;
        transform: translateY(-7px);
    }

    /* 8. Soft zoom */
    .effect-8:hover {
        transform: scale(1.035);
        box-shadow: 0 18px 40px rgba(15, 23, 42, .12);
    }

    /* 9. Side slide */
    .effect-9:hover {
        transform: translateX(8px);
        border-color: #06b6d4;
    }

    /* 10. Icon rotation */
    .effect-10:hover .card-icon {
        transform: rotate(12deg) scale(1.12);
    }
    .effect-10 .card-icon {
        transition: transform .4s ease;
    }

    /* 11. Animated top accent */
    .effect-11::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 0;
        height: 4px;
        background: linear-gradient(90deg, #8b5cf6, #ec4899, #f59e0b);
        transition: width .5s ease;
        z-index: 3;
    }
    .effect-11:hover::before {
        width: 100%;
    }

    /* 12. Floating card */
    .effect-12:hover {
        transform: translateY(-7px);
        animation: cardFloat 2s ease-in-out .4s infinite alternate;
        box-shadow: 0 20px 40px rgba(59, 130, 246, .17);
    }
    @keyframes cardFloat {
        from { transform: translateY(-7px); }
        to   { transform: translateY(-13px); }
    }

    /* Accessibility */
    @media (prefers-reduced-motion: reduce) {
        .effect-card,
        .effect-card::before,
        .effect-card::after,
        .effect-card .card-icon {
            animation: none !important;
            transition: none !important;
        }

        .effect-card:hover {
            transform: none !important;
        }
    }


    /*********************/
    /* Common setup */
    .color-card {
        position: relative;
        isolation: isolate;
        transition: background 0.4s ease, box-shadow 0.4s ease,
                    border-color 0.4s ease, transform 0.4s ease;
    }

    /* 1. Emerald color glow */
    .color-1:hover {
        background: linear-gradient(135deg, #ecfdf5, #ccfbf1, #ffffff);
        border-color: #34d399;
        box-shadow: 0 15px 40px rgba(16, 185, 129, 0.25);
    }

    /* 2. Blue ocean */
    .color-2:hover {
        background: linear-gradient(135deg, #eff6ff, #bfdbfe, #e0f2fe);
        border-color: #60a5fa;
        box-shadow: 0 15px 40px rgba(59, 130, 246, 0.25);
    }

    /* 3. Purple aura */
    .color-3:hover {
        background: linear-gradient(135deg, #f5f3ff, #ddd6fe, #fae8ff);
        border-color: #a78bfa;
        box-shadow: 0 15px 40px rgba(139, 92, 246, 0.25);
    }

    /* 4. Sunset */
    .color-4:hover {
        background: linear-gradient(135deg, #fff7ed, #fed7aa, #ffe4e6);
        border-color: #fb923c;
        box-shadow: 0 15px 40px rgba(249, 115, 22, 0.25);
    }

    /* 5. Rose pink */
    .color-5:hover {
        background: linear-gradient(135deg, #fff1f2, #fecdd3, #fce7f3);
        border-color: #fb7185;
        box-shadow: 0 15px 40px rgba(244, 63, 94, 0.22);
    }

    /* 6. Neon cyan */
    .color-6:hover {
        background: linear-gradient(135deg, #ecfeff, #a5f3fc, #cffafe);
        border-color: #22d3ee;
        box-shadow: 0 0 12px rgba(34, 211, 238, 0.25),
                    0 0 30px rgba(34, 211, 238, 0.2);
    }

    /* 7. Golden shine */
    .color-7:hover {
        background: linear-gradient(120deg, #fffbeb, #fde68a, #fef3c7);
        border-color: #fbbf24;
        box-shadow: 0 15px 35px rgba(245, 158, 11, 0.25);
    }

    /* 8. Lime freshness */
    .color-8:hover {
        background: linear-gradient(135deg, #f7fee7, #d9f99d, #ecfccb);
        border-color: #a3e635;
        box-shadow: 0 15px 35px rgba(132, 204, 22, 0.22);
    }

    /* 9. Indigo night */
    .color-9:hover {
        background: linear-gradient(135deg, #eef2ff, #c7d2fe, #e0e7ff);
        border-color: #818cf8;
        box-shadow: 0 15px 40px rgba(99, 102, 241, 0.25);
    }

    /* 10. Rose-red glow */
    .color-10:hover {
        background: linear-gradient(135deg, #fff1f2, #fecaca, #ffe4e6);
        border-color: #f87171;
        box-shadow: 0 0 25px rgba(239, 68, 68, 0.22);
    }

    /* 11. Animated rainbow border */
    .color-11::before {
        content: "";
        position: absolute;
        inset: -2px;
        border-radius: inherit;
        background: linear-gradient(
            90deg,
            #10b981, #06b6d4, #6366f1, #d946ef, #f59e0b, #10b981
        );
        background-size: 300% 100%;
        z-index: -1;
        opacity: 0;
        transition: opacity 0.35s ease;
        animation: rainbowMove 4s linear infinite;
    }

    .color-11:hover::before {
        opacity: 1;
    }

    @keyframes rainbowMove {
        to {
            background-position: 300% 0;
        }
    }

    /* 12. Animated gradient */
    .color-12:hover {
        background: linear-gradient(
            120deg, #dbeafe, #f3e8ff, #fce7f3, #d1fae5
        );
        background-size: 250% 250%;
        animation: colorWave 4s ease infinite;
        border-color: #a78bfa;
        box-shadow: 0 15px 40px rgba(124, 58, 237, 0.2);
    }

    @keyframes colorWave {
        0%   { background-position: 0% 50%; }
        50%  { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }

    /* Respect accessibility preferences */
    @media (prefers-reduced-motion: reduce) {
        .color-card,
        .color-card::before {
            animation: none !important;
            transition: none !important;
        }
    }
</style>

    <section class="relative py-20 lg:py-24 overflow-hidden bg-gradient-to-b from-gray-50 via-white to-gray-50">
        <!-- Background layers -->
        <div class="absolute inset-0 pointer-events-none">
            <!-- Gradient blobs -->
            <div
                class="absolute -top-24 -left-24 w-80 h-80 bg-gradient-to-tr from-emerald-300/40 to-cyan-300/40 blur-3xl rounded-full">
            </div>
            <div
                class="absolute -bottom-28 -right-28 w-96 h-96 bg-gradient-to-tr from-indigo-300/40 to-fuchsia-300/40 blur-3xl rounded-full">
            </div>

            <!-- Subtle grid overlay -->
            <div class="absolute inset-0 opacity-[0.06]"
                style="
            background-image: 
                linear-gradient(to right, #000 1px, transparent 1px),
                linear-gradient(to bottom, #000 1px, transparent 1px);
            background-size: 32px 32px;">
            </div>
        </div>

        <!-- Your content goes here -->
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
      <!-- Header -->
      <div class="text-center mb-12 sm:mb-16">
          <h2 class="text-2xl sm:text-3xl lg:text-4xl font-bold text-gray-800 mb-3 sm:mb-4">Key Features</h2>
      </div>

    <!-- Cards Grid -->
    <div class="mt-12 grid md:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8">
        <!-- Card 1 -->
        <article
            class="color-card color-1 effect-card effect-1 group relative rounded-2xl bg-white/70 backdrop-blur-xl border border-gray-200/80 shadow-[0_10px_30px_-10px_rgba(0,0,0,0.15)] hover:shadow-[0_16px_40px_-12px_rgba(0,0,0,0.2)] transition-all duration-500 overflow-hidden">
            <div class="absolute inset-x-0 top-0 h-1.5 bg-gradient-to-r from-emerald-400 via-teal-400 to-cyan-400"></div>
            <div class="p-7">
                <div
                    class="w-14 h-14 rounded-2xl grid place-items-center bg-gradient-to-br from-emerald-500 to-teal-600 text-white shadow-lg mb-5 group-hover:scale-105 transition">
                    <i class="fas fa-shopping-cart text-2xl text-white"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Incomplete Order</h3>
                <p class="text-gray-600 leading-relaxed">
                    ইনকমপ্লিট অর্ডার ডাটা, যা সেল বাড়াবে 10x
                </p>
            </div>
        </article>

        <!-- Card 2 -->
        <article
            class="color-card color-2 effect-card effect-2 group relative rounded-2xl bg-white/70 backdrop-blur-xl border border-gray-200/80 shadow-[0_10px_30px_-10px_rgba(0,0,0,0.15)] hover:shadow-[0_16px_40px_-12px_rgba(0,0,0,0.2)] transition-all duration-500 overflow-hidden">
            <div class="absolute inset-x-0 top-0 h-1.5 bg-gradient-to-r from-sky-400 via-blue-500 to-indigo-500"></div>
            <div class="p-7">
                <div
                    class="w-14 h-14 rounded-2xl grid place-items-center bg-gradient-to-br from-sky-500 to-indigo-600 text-white shadow-lg mb-5 group-hover:scale-105 transition">
                    <i class="fas fa-user-shield text-2xl text-white"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Fraud Checker</h3>
                <p class="text-gray-600 leading-relaxed">
                    কোন কাস্টোমার প্রোডাক্ট পাঠানোর পর রিসিভ করবে না তা আগেই জেনে যাবেন
                </p>
            </div>
        </article>

        <!-- Card 3 -->
        <article
            class="color-card color-3 effect-card effect-3 group relative rounded-2xl bg-white/70 backdrop-blur-xl border border-gray-200/80 shadow-[0_10px_30px_-10px_rgba(0,0,0,0.15)] hover:shadow-[0_16px_40px_-12px_rgba(0,0,0,0.2)] transition-all duration-500 overflow-hidden">
            <div class="absolute inset-x-0 top-0 h-1.5 bg-gradient-to-r from-rose-400 via-pink-500 to-fuchsia-500"></div>
            <div class="p-7">
                <div
                    class="w-14 h-14 rounded-2xl grid place-items-center bg-gradient-to-br from-rose-500 to-fuchsia-600 text-white shadow-lg mb-5 group-hover:scale-105 transition">
                    <i class="fas fa-ban text-2xl text-white"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">IP Ban</h3>
                <p class="text-gray-600 leading-relaxed">
                    ফ্রড কাস্টোমারের আইপি ব্যান করার সুবিধা
                </p>
            </div>
        </article>

        <!-- Card 4 -->
        <article
            class="color-card color-4 effect-card effect-4 group relative rounded-2xl bg-white/70 backdrop-blur-xl border border-gray-200/80 shadow-[0_10px_30px_-10px_rgba(0,0,0,0.15)] hover:shadow-[0_16px_40px_-12px_rgba(0,0,0,0.2)] transition-all duration-500 overflow-hidden">
            <div class="absolute inset-x-0 top-0 h-1.5 bg-gradient-to-r from-indigo-400 via-purple-500 to-pink-500"></div>
            <div class="p-7">
                <div
                    class="w-14 h-14 rounded-2xl grid place-items-center bg-gradient-to-br from-indigo-500 to-purple-600 text-white shadow-lg mb-5 group-hover:scale-105 transition">
                    <i class="fas fa-file-alt text-2xl text-white"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Stylist Landing Page</h3>
                <p class="text-gray-600 leading-relaxed">
                    ইকমার্স ওয়েবসাইটে বিশেষ প্রোডাক্টের মার্কেটিংয়ের জন্য স্পেশাল ল্যান্ডিং পেজ
                </p>
            </div>
        </article>

        <!-- Card 5 -->
        <article
            class="color-card color-5 effect-card effect-5 group relative rounded-2xl bg-white/70 backdrop-blur-xl border border-gray-200/80 shadow-[0_10px_30px_-10px_rgba(0,0,0,0.15)] hover:shadow-[0_16px_40px_-12px_rgba(0,0,0,0.2)] transition-all duration-500 overflow-hidden">
            <div class="absolute inset-x-0 top-0 h-1.5 bg-gradient-to-r from-yellow-400 via-orange-500 to-red-500"></div>
            <div class="p-7">
                <div
                    class="w-14 h-14 rounded-2xl grid place-items-center bg-gradient-to-br from-yellow-500 to-orange-600 text-white shadow-lg mb-5 group-hover:scale-105 transition">
                    <i class="fas fa-truck text-2xl text-white"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Courier API Integration</h3>
                <p class="text-gray-600 leading-relaxed">
                    স্টিডফাস্ট, পাঠাও এবং রেডেক্স কুরিয়ারে এক ক্লিকে অর্ডার ডিটেইল এন্ট্রি
                </p>
            </div>
        </article>

        <!-- Card 6 -->
        <article
            class="color-card color-6 effect-card effect-6 group relative rounded-2xl bg-white/70 backdrop-blur-xl border border-gray-200/80 shadow-[0_10px_30px_-10px_rgba(0,0,0,0.15)] hover:shadow-[0_16px_40px_-12px_rgba(0,0,0,0.2)] transition-all duration-500 overflow-hidden">
            <div class="absolute inset-x-0 top-0 h-1.5 bg-gradient-to-r from-green-400 via-lime-500 to-yellow-400"></div>
            <div class="p-7">
                <div
                    class="w-14 h-14 rounded-2xl grid place-items-center bg-gradient-to-br from-green-500 to-lime-600 text-white shadow-lg mb-5 group-hover:scale-105 transition">
                    <i class="fas fa-calculator text-2xl text-white"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Amount Adjust</h3>
                <p class="text-gray-600 leading-relaxed">
                    কুরিয়ারে এন্ট্রির আগে অর্ডার অ্যামাউন্ট এডজাস্ট করা যায়
                </p>
            </div>
        </article>

        <!-- Card 7 -->
        <article
            class="color-card color-7 effect-card effect-7 group relative rounded-2xl bg-white/70 backdrop-blur-xl border border-gray-200/80 shadow-[0_10px_30px_-10px_rgba(0,0,0,0.15)] hover:shadow-[0_16px_40px_-12px_rgba(0,0,0,0.2)] transition-all duration-500 overflow-hidden">
            <div class="absolute inset-x-0 top-0 h-1.5 bg-gradient-to-r from-cyan-400 via-sky-500 to-indigo-500"></div>
            <div class="p-7">
                <div
                    class="w-14 h-14 rounded-2xl grid place-items-center bg-gradient-to-br from-cyan-500 to-sky-600 text-white shadow-lg mb-5 group-hover:scale-105 transition">
                    <i class="fas fa-shoe-prints text-2xl text-white"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Foot Print / SEO</h3>
                <p class="text-gray-600 leading-relaxed">
                    যারা ওয়েবসাইটে ফুট ‍প্রিন্ট রেখে যাবে তাদের রিটাগেটিং করে আপনার সেলস বাড়াতে পারবেন
                </p>
            </div>
        </article>

        <!-- Card 8 -->
        <article
            class="color-card color-8 effect-card effect-8 group relative rounded-2xl bg-white/70 backdrop-blur-xl border border-gray-200/80 shadow-[0_10px_30px_-10px_rgba(0,0,0,0.15)] hover:shadow-[0_16px_40px_-12px_rgba(0,0,0,0.2)] transition-all duration-500 overflow-hidden">
            <div class="absolute inset-x-0 top-0 h-1.5 bg-gradient-to-r from-fuchsia-400 via-purple-500 to-indigo-500"></div>
            <div class="p-7">
                <div
                    class="w-14 h-14 rounded-2xl grid place-items-center bg-gradient-to-br from-fuchsia-500 to-purple-600 text-white shadow-lg mb-5 group-hover:scale-105 transition">
                    <i class="fas fa-tasks text-2xl text-white"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Easy Order Management</h3>
                <p class="text-gray-600 leading-relaxed">
                    অর্ডার সহজে ম্যানেজ করতে পারবেন
                </p>
            </div>
        </article>

        <!-- Card 9 -->
        <article
            class="color-card color-9 effect-card effect-9 group relative rounded-2xl bg-white/70 backdrop-blur-xl border border-gray-200/80 shadow-[0_10px_30px_-10px_rgba(0,0,0,0.15)] hover:shadow-[0_16px_40px_-12px_rgba(0,0,0,0.2)] transition-all duration-500 overflow-hidden">
            <div class="absolute inset-x-0 top-0 h-1.5 bg-gradient-to-r from-teal-400 via-emerald-500 to-green-500"></div>
            <div class="p-7">
                <div
                    class="w-14 h-14 rounded-2xl grid place-items-center bg-gradient-to-br from-teal-500 to-emerald-600 text-white shadow-lg mb-5 group-hover:scale-105 transition">
                    <i class="fas fa-chart-line text-2xl text-white"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Pixel/GTM Setup</h3>
                <p class="text-gray-600 leading-relaxed">
                    সার্ভার সাইড ট্র্যাকিং সহ পিক্সেল সেটাপ করে এড রান করে প্রচুর সেল করতে পারবেন
                </p>
            </div>
        </article>

        <!-- Card 10 -->
        <article
            class="color-card color-10 effect-card effect-10 group relative rounded-2xl bg-white/70 backdrop-blur-xl border border-gray-200/80 shadow-[0_10px_30px_-10px_rgba(0,0,0,0.15)] hover:shadow-[0_16px_40px_-12px_rgba(0,0,0,0.2)] transition-all duration-500 overflow-hidden">
            <div class="absolute inset-x-0 top-0 h-1.5 bg-gradient-to-r from-orange-400 via-amber-500 to-yellow-500"></div>
            <div class="p-7">
                <div
                    class="w-14 h-14 rounded-2xl grid place-items-center bg-gradient-to-br from-orange-500 to-amber-600 text-white shadow-lg mb-5 group-hover:scale-105 transition">
                    <i class="fas fa-warehouse text-2xl text-white"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Stock Management</h3>
                <p class="text-gray-600 leading-relaxed">
                    স্টক ম্যানেজ করার সুবিধাও থাকছে
                </p>
            </div>
        </article>

        <!-- Card 11 -->
        <article
            class="color-card color-6 effect-card effect-11 group relative rounded-2xl bg-white/70 backdrop-blur-xl border border-gray-200/80 shadow-[0_10px_30px_-10px_rgba(0,0,0,0.15)] hover:shadow-[0_16px_40px_-12px_rgba(0,0,0,0.2)] transition-all duration-500 overflow-hidden">
            <div class="absolute inset-x-0 top-0 h-1.5 bg-gradient-to-r from-red-400 via-pink-500 to-rose-500"></div>
            <div class="p-7">
                <div
                    class="w-14 h-14 rounded-2xl grid place-items-center bg-gradient-to-br from-red-500 to-pink-600 text-white shadow-lg mb-5 group-hover:scale-105 transition">
                    <i class="fas fa-file-invoice text-2xl text-white"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Invoice Management</h3>
                <p class="text-gray-600 leading-relaxed">
                    ইনভয়েস প্রিন্ট / ডাউনলোড
                </p>
            </div>
        </article>

        <!-- Card 12 -->
        <article
            class="color-card color-12 effect-card effect-12 group relative rounded-2xl bg-white/70 backdrop-blur-xl border border-gray-200/80 shadow-[0_10px_30px_-10px_rgba(0,0,0,0.15)] hover:shadow-[0_16px_40px_-12px_rgba(0,0,0,0.2)] transition-all duration-500 overflow-hidden">
            <div class="absolute inset-x-0 top-0 h-1.5 bg-gradient-to-r from-green-400 via-teal-500 to-cyan-500"></div>
            <div class="p-7">
                <div
                    class="w-14 h-14 rounded-2xl grid place-items-center bg-gradient-to-br from-green-500 to-teal-600 text-white shadow-lg mb-5 group-hover:scale-105 transition">
                    <i class="fas fa-star text-2xl text-white"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Updated Features</h3>
                <p class="text-gray-600 leading-relaxed">
                    তাছাড়া প্রয়োজনীয় ৪১ টি কি-ফিচার ইনবিল্ট করা হয়ে থাকে
                </p>
            </div>
        </article>
    </div>

 
      <div class="mt-10 sm:mt-12 text-center">
          <a href="https://wa.me/message/S2B2PMXA3COGB1"
              class="inline-flex items-center gap-2 rounded-full bg-green-500 px-6 py-3 font-semibold text-white shadow-lg hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2"
              aria-label="Chat with us on WhatsApp" target="_blank" rel="noopener">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="currentColor"
                  aria-hidden="true">
                  <path
                      d="M20.52 3.48A11.94 11.94 0 0 0 12.01 0C5.4 0 .05 5.35.05 11.95c0 2.1.55 4.14 1.6 5.94L0 24l6.28-1.64a12 12 0 0 0 5.72 1.46h.01c6.61 0 11.96-5.35 11.96-11.95 0-3.2-1.25-6.2-3.45-8.39ZM12 21.3a9.33 9.33 0 0 1-4.76-1.3l-.34-.2-3.73.97.99-3.63-.22-.37A9.29 9.29 0 0 1 2.7 11.95C2.7 6.28 7.33 1.66 13 1.66c2.48 0 4.81.97 6.56 2.72A9.23 9.23 0 0 1 21.3 12c0 5.67-4.63 9.3-9.3 9.3Zm5.08-6.98c-.28-.14-1.66-.82-1.92-.91-.26-.1-.45-.14-.64.14-.19.28-.74.91-.91 1.1-.17.18-.34.2-.62.07-.28-.14-1.19-.44-2.27-1.41-.84-.75-1.41-1.68-1.58-1.96-.17-.28-.02-.44.12-.58.13-.13.28-.34.42-.51.14-.17.19-.28.28-.47.09-.19.05-.35-.02-.49-.07-.14-.64-1.54-.88-2.11-.23-.55-.47-.48-.64-.49l-.55-.01c-.19 0-.49.07-.75.35s-.99.97-.99 2.36 1.02 2.73 1.16 2.92c.14.19 2.01 3.08 4.87 4.2.68.29 1.21.46 1.63.59.69.22 1.31.19 1.8.11.55-.08 1.66-.68 1.89-1.33.23-.65.23-1.2.16-1.33-.07-.14-.26-.22-.54-.36Z">
                  </path>
              </svg>
              WhatsApp Live Chat
          </a>
          
      </div>

  </div>
    </section>



    <section class="py-16 sm:py-20 lg:py-18 bg-gradient-to-r from-purple-50 to-blue-50 relative overflow-hidden">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Section Header -->
            <div class="text-center mb-12 sm:mb-16 relative z-10">
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-gray-800 mb-3 sm:mb-4 animate-bounce">
                    Special for You!</h2>
                <p class="text-base sm:text-lg lg:text-xl text-gray-600 max-w-3xl mx-auto px-4">
                    আমাদের বিশেষ পরিষেবাসমূহ যা আপনার ব্যবসাকে দ্রুত এগিয়ে নেবে
                </p>
            </div>

            <!-- Cards Grid -->
            <div class="grid sm:grid-cols-1 lg:grid-cols-3 gap-8 sm:gap-10 relative z-10">
                <!-- Card 1: Fully Secured -->
                <div class="bg-white rounded-3xl p-6 sm:p-8 shadow-xl border border-gray-200 transform hover:-translate-y-3 hover:scale-105 transition-all duration-500 hover:shadow-2xl fade-in"
                    style="animation-delay: 0.1s;">
                    <div
                        class="w-24 h-24 sm:w-28 sm:h-28 bg-gradient-to-r from-green-400 via-teal-400 to-green-500 rounded-full flex items-center justify-center mb-6 animate-pulse mx-auto">
                        <i class="fas fa-shield-alt text-white text-4xl sm:text-5xl"></i>
                    </div>
                    <h3 class="text-xl sm:text-2xl font-extrabold text-gray-800 mb-4 text-center">Fully Secured</h3>
                    <p class="text-base sm:text-lg text-gray-600 leading-relaxed mb-4 text-center">
                        কাস্টোমারদের ওয়েবসাইটকে নিরাপদ রাখার জন্য আমরা সবচেয়ে সেইফ টেকনোলজি ইউজ করি
                    </p>
                    <div class="text-center">
                        <a href="https://wa.me/message/S2B2PMXA3COGB1" target="_blank" rel="noopener"
                            class="inline-flex items-center gap-2 bg-[#25D366] hover:bg-[#1fb457] active:bg-[#189246] text-white px-6 py-3 rounded-xl font-bold text-[16px] shadow-lg focus:outline-none focus-visible:ring-2 focus-visible:ring-[#1fb457] transition">
                            <i class="fab fa-whatsapp"></i>
                            <span>WhatsApp</span>
                        </a>
                    </div>
                </div>

                <!-- Card 2: Easy to Edit -->
                <div class="bg-white rounded-3xl p-6 sm:p-8 shadow-xl border border-gray-200 transform hover:-translate-y-3 hover:scale-105 transition-all duration-500 hover:shadow-2xl fade-in"
                    style="animation-delay: 0.2s;">
                    <div
                        class="w-24 h-24 sm:w-28 sm:h-28 bg-gradient-to-r from-purple-500 via-pink-500 to-pink-600 rounded-full flex items-center justify-center mb-6 animate-pulse mx-auto">
                        <i class="fas fa-edit text-white text-4xl sm:text-5xl"></i>
                    </div>
                    <h3 class="text-xl sm:text-2xl font-extrabold text-gray-800 mb-4 text-center">Easy to Edit</h3>
                    <p class="text-base sm:text-lg text-gray-600 leading-relaxed mb-4 text-center">
                        আপনি নিজের ওয়েবসাইটকে প্রয়োজন অনুযায়ী ইডিট করে নিতে পারবেন। আমরা শতভাগ ডায়নামিক ওয়েবসাইট তৈরী করি
                    </p>
                    <div class="text-center">
                        <a href="https://wa.me/message/S2B2PMXA3COGB1" target="_blank" rel="noopener"
                            class="inline-flex items-center gap-2 bg-[#25D366] hover:bg-[#1fb457] active:bg-[#189246] text-white px-6 py-3 rounded-xl font-bold text-[16px] shadow-lg focus:outline-none focus-visible:ring-2 focus-visible:ring-[#1fb457] transition">
                            <i class="fab fa-whatsapp"></i>
                            <span>WhatsApp</span>
                        </a>
                    </div>
                </div>

                <!-- Card 3: Technical Support -->
                <div class="bg-white rounded-3xl p-6 sm:p-8 shadow-xl border border-gray-200 transform hover:-translate-y-3 hover:scale-105 transition-all duration-500 hover:shadow-2xl fade-in"
                    style="animation-delay: 0.3s;">
                    <div
                        class="w-24 h-24 sm:w-28 sm:h-28 bg-gradient-to-r from-blue-400 via-indigo-400 to-blue-500 rounded-full flex items-center justify-center mb-6 animate-pulse mx-auto">
                        <i class="fas fa-headset text-white text-4xl sm:text-5xl"></i>
                    </div>
                    <h3 class="text-xl sm:text-2xl font-extrabold text-gray-800 mb-4 text-center">Technical Support</h3>
                    <p class="text-base sm:text-lg text-gray-600 leading-relaxed mb-4 text-center">
                        ইউজার ফ্রেন্ডলি ডিজাইনের ওয়েবসাইট ও অ্যাপ ডেভেলপ করার পরবর্তী ১২ মাস টেকনিক্যাল সাপোর্ট ফ্রি
                    </p>
                    <div class="text-center">
                        <a href="https://wa.me/message/S2B2PMXA3COGB1" target="_blank" rel="noopener"
                            class="inline-flex items-center gap-2 bg-[#25D366] hover:bg-[#1fb457] active:bg-[#189246] text-white px-6 py-3 rounded-xl font-bold text-[16px] shadow-lg focus:outline-none focus-visible:ring-2 focus-visible:ring-[#1fb457] transition">
                            <i class="fab fa-whatsapp"></i>
                            <span>WhatsApp</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>


<style>

    .clients-section {
        width: 100%;
        padding: 95px 0 55px;
        border-bottom: 8px solid #edf0f1;
        overflow: hidden;
    }

    .clients-container {
        width: 85%;
        max-width: 1650px;
        margin: 0 auto;
    }

    .section-heading {
        margin-bottom: 40px;
    }

    .section-heading h2 {
        font-size: clamp(28px, 3vw, 40px);
        font-weight: 800;
        line-height: 1.2;
        letter-spacing: -1px;
        margin-bottom: 5px;
    }

    .section-heading p {
        color: #a0b1bc;
        font-size: 16px;
        line-height: 1.6;
    }

    .clients-grid {
        display: grid;
        grid-template-columns: repeat(6, minmax(0, 1fr));
        gap: 30px;
        transition: opacity 0.3s ease;
    }

    .client-card {
        height: 160px;
        padding: 25px;
        background: #fff;
        box-shadow: 0 5px 35px rgba(0, 0, 0, 0.09);
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .client-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 35px rgba(0, 0, 0, 0.14);
    }

    .client-card img {
        display: block;
        max-width: 100%;
        max-height: 85px;
        width: auto;
        height: auto;
        object-fit: contain;
    }

    .client-name-fallback {
        display: none;
        color: #333;
        font-size: 17px;
        font-weight: 700;
        text-align: center;
    }

    .slider-pagination {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 12px;
        margin-top: 65px;
    }

    .pagination-dot {
        width: 8px;
        height: 8px;
        padding: 0;
        border: none;
        border-radius: 50%;
        background: #d1d1d1;
        cursor: pointer;
        transition: width 0.25s ease, background 0.25s ease;
    }

    .pagination-dot.active {
        width: 20px;
        border-radius: 10px;
        background: #009f7a;
    }

    .pagination-dot:focus-visible {
        outline: 2px solid #009f7a;
        outline-offset: 4px;
    }

    /* Laptop */
    @media (max-width: 1200px) {
        .clients-container {
            width: 90%;
        }

        .clients-grid {
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 24px;
        }

        .client-card {
            height: 145px;
        }
    }

    /* Tablet */
    @media (max-width: 768px) {
        .clients-section {
            padding: 60px 0 40px;
        }

        .clients-grid {
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 18px;
        }

        .client-card {
            height: 125px;
            padding: 15px;
        }

        .client-card img {
            max-height: 65px;
        }

        .section-heading {
            margin-bottom: 28px;
        }

        .slider-pagination {
            margin-top: 40px;
        }
    }

    /* Mobile */
    @media (max-width: 480px) {
        .clients-container {
            width: 90%;
        }

        .clients-section {
            padding: 45px 0 35px;
        }

        .clients-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 15px;
        }

        .client-card {
            height: 115px;
            padding: 12px;
        }

        .section-heading p {
            font-size: 14px;
        }

        .slider-pagination {
            margin-top: 32px;
        }
    }

</style>
<section class="clients-section">
    <div class="clients-container">

        <div class="section-heading">
            <h2>OUR CLIENTS</h2>
            <p>Our reputation branches across different industries and far beyond the borders</p>
        </div>

        <div class="clients-grid" id="clientsGrid"></div>

        <div class="slider-pagination" id="sliderPagination"></div>

    </div>
</section>

    <section id="services" class="section-padding bg-white">
        <div class="container mx-auto px-6 py-12">

            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">Ready for your digital success ?</h2>

            </div>

            <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3">

                <article class="color-card color-1 bg-gray-50 rounded-2xl p-8 shadow-md hover:shadow-lg transition-shadow">
                    <div
                        class="w-16 h-16 bg-gradient-to-br from-fuchsia-500 to-rose-500 rounded-xl flex items-center justify-center mb-6">
                        <i class="fas fa-store text-white text-2xl" aria-hidden="true"></i>
                    </div>
                    <h3 class="text-2xl font-semibold text-gray-900 mb-3">eCommerce Solution</h3>
                    <p class="text-gray-700 leading-relaxed">
                        আপনার ব্যবসাকে অনলাইনে নতুন উচ্চতায় নিয়ে যেতে আমরা তৈরি করি আধুনিক, দ্রুতগতির ও সম্পূর্ণ কাস্টমাইজড ই-কমার্স ওয়েবসাইট। মাল্টি-ভেন্ডর মার্কেটপ্লেস থেকে শুরু করে নিজস্ব অনলাইন স্টোর—প্রতিটি প্ল্যাটফর্মে থাকে স্মার্ট প্রোডাক্ট ম্যানেজমেন্ট, নিরাপদ পেমেন্ট গেটওয়ে, অটোমেটেড অর্ডার প্রসেসিং, ইনভেন্টরি ম্যানেজমেন্ট এবং উন্নত রিপোর্টিং সুবিধা। আমাদের অভিজ্ঞ ডেভেলপমেন্ট টিম আপনার ব্যবসার চাহিদা অনুযায়ী তৈরি করে স্কেলেবল ও ব্যবহারবান্ধব ই-কমার্স সলিউশন, যা কাস্টমারদের কেনাকাটার অভিজ্ঞতা উন্নত করে এবং ব্যবসার প্রবৃদ্ধিতে সহায়তা করে।
                    </p>
                </article>

                <article class="color-card color-2 bg-gray-50 rounded-2xl p-8 shadow-md hover:shadow-lg transition-shadow">
                    <div
                        class="w-16 h-16 bg-gradient-to-br from-blue-500 to-cyan-400 rounded-xl flex items-center justify-center mb-6">
                        <i class="fas fa-globe text-white text-2xl" aria-hidden="true"></i>
                    </div>
                    <h3 class="text-2xl font-semibold text-gray-900 mb-3">Web Development</h3>
                    <p class="text-gray-700 leading-relaxed">
                        আপনার ব্যবসার ডিজিটাল পরিচিতিকে আরও শক্তিশালী করতে আমরা তৈরি করি আধুনিক, নিরাপদ, দ্রুতগতির ও ব্যবহারবান্ধব ওয়েবসাইট। কর্পোরেট ওয়েবসাইট, বিজনেস পোর্টাল থেকে শুরু করে কাস্টম ওয়েব অ্যাপ্লিকেশন—প্রতিটি সলিউশন তৈরি করা হয় প্রতিষ্ঠানের নির্দিষ্ট চাহিদা, উন্নত প্রযুক্তি এবং সর্বোত্তম পারফরম্যান্সের কথা মাথায় রেখে। আমাদের লক্ষ্য হলো এমন ওয়েবসাইট তৈরি করা, যা শুধু আপনার ব্র্যান্ডের পরিচিতি বাড়াবে না, বরং গ্রাহকদের আস্থা অর্জন, ব্যবসায়িক কার্যক্রম সহজ করা এবং দীর্ঘমেয়াদি প্রবৃদ্ধিতেও ভূমিকা রাখবে।
                    </p>
                </article>

                <article class="color-card color-3 bg-gray-50 rounded-2xl p-8 shadow-md hover:shadow-lg transition-shadow">
                    <div
                        class="w-16 h-16 bg-gradient-to-br from-green-400 to-emerald-600 rounded-xl flex items-center justify-center mb-6">
                        <i class="fas fa-mobile-alt text-white text-2xl" aria-hidden="true"></i>
                    </div>
                    <h3 class="text-2xl font-semibold text-gray-900 mb-3">Software Development</h3>
                    <p class="text-gray-700 leading-relaxed">
                        আপনার প্রতিষ্ঠানের কাজকে আরও সহজ, দ্রুত ও দক্ষ করে তুলতে আমরা তৈরি করি আধুনিক, নিরাপদ এবং কাস্টমাইজড সফটওয়্যার সলিউশন। বিজনেস ম্যানেজমেন্ট সফটওয়্যার, ERP, CRM, ইনভেন্টরি ও অ্যাকাউন্টিং সিস্টেম থেকে শুরু করে HRM, POS, অটোমেশন টুলস এবং জটিল এন্টারপ্রাইজ অ্যাপ্লিকেশন—আপনার ব্যবসার নির্দিষ্ট চাহিদা অনুযায়ী আমরা ডেভেলপ করি কার্যকর প্রযুক্তিনির্ভর সমাধান।

                        আমাদের লক্ষ্য শুধু সফটওয়্যার তৈরি করা নয়, বরং আপনার প্রতিষ্ঠানের দৈনন্দিন কার্যক্রমকে আরও সুশৃঙ্খল করা, ম্যানুয়াল কাজ কমানো, তথ্য ব্যবস্থাপনায় নির্ভুলতা বাড়ানো এবং উৎপাদনশীলতা উন্নত করা। আধুনিক প্রযুক্তি, ব্যবহারবান্ধব ইন্টারফেস ও ভবিষ্যতে সম্প্রসারণযোগ্য আর্কিটেকচারের সমন্বয়ে আমরা তৈরি করি আপনার ব্যবসার দীর্ঘমেয়াদি প্রযুক্তিগত ভিত্তি।
                    </p>
                </article>

                <article class="color-card color-4 bg-gray-50 rounded-2xl p-8 shadow-md hover:shadow-lg transition-shadow">
                    <div
                        class="w-16 h-16 bg-gradient-to-br from-amber-400 to-orange-500 rounded-xl flex items-center justify-center mb-6">
                        <i class="fas fa-bullhorn text-white text-2xl" aria-hidden="true"></i>
                    </div>
                    <h3 class="text-2xl font-semibold text-gray-900 mb-3">Digital Marketing</h3>
                    <p class="text-gray-700 leading-relaxed">
                        শুধু প্রচার নয়, চাই সঠিক কৌশলে ব্যবসার প্রসার! ডিজিটাল মার্কেটিংয়ে সফল হতে হলে প্রয়োজন সঠিক অডিয়েন্স নির্বাচন, বাজার বিশ্লেষণ এবং কার্যকর মার্কেটিং স্ট্র্যাটেজি। আমাদের দক্ষ ডিজিটাল মার্কেটিং টিম আপনার ব্যবসা, পণ্য ও সার্ভিস নিয়ে বিস্তারিত রিসার্চ করে সম্ভাব্য গ্রাহকদের কাছে পৌঁছানোর উপযুক্ত পরিকল্পনা তৈরি করে। Facebook ও Instagram Ads, Google Ads, কনটেন্ট মার্কেটিং এবং ডেটা-ভিত্তিক ক্যাম্পেইনের মাধ্যমে আমরা ব্র্যান্ডের পরিচিতি বৃদ্ধি, সম্ভাব্য কাস্টমার সংগ্রহ এবং বিক্রয় বৃদ্ধিতে সহায়তা করি। প্রতিটি ক্যাম্পেইনের পারফরম্যান্স বিশ্লেষণ করে মার্কেটিং বাজেটের সর্বোত্তম ব্যবহার ও আরও ভালো ফলাফলের জন্য কাজ করি।
                    </p>
                </article>


                <article class="color-card color-5 bg-gray-50 rounded-2xl p-8 shadow-md hover:shadow-lg transition-shadow">
                    <div
                        class="w-16 h-16 bg-gradient-to-br from-violet-500 to-purple-600 rounded-xl flex items-center justify-center mb-6">
                        <i class="fas fa-server text-white text-2xl" aria-hidden="true"></i>
                    </div>
                    <h3 class="text-2xl font-semibold text-gray-900 mb-3">AI Video Content</h3>
                    <p class="text-gray-700 leading-relaxed">
                        আপনার ব্যবসার প্রচারকে আরও আকর্ষণীয় ও কার্যকর করতে আমরা তৈরি করি আধুনিক AI-নির্ভর ভিডিও কনটেন্ট। প্রোডাক্ট প্রমোশন, ব্র্যান্ড অ্যাডভার্টাইজমেন্ট, সোশ্যাল মিডিয়া রিলস, কর্পোরেট প্রেজেন্টেশন কিংবা প্রমোশনাল ভিডিও—আপনার প্রয়োজন অনুযায়ী তৈরি করা হয় সৃজনশীল ও দৃষ্টিনন্দন ভিডিও। AI প্রযুক্তির সহায়তায় আকর্ষণীয় ভিজ্যুয়াল, বাস্তবসম্মত ভয়েসওভার, অ্যানিমেশন ও স্টোরিটেলিংয়ের সমন্বয়ে আপনার ব্র্যান্ডের বার্তা পৌঁছে দিই দর্শকদের কাছে আরও সহজ ও আকর্ষণীয়ভাবে। Facebook, YouTube, TikTok এবং অন্যান্য ডিজিটাল প্ল্যাটফর্মের উপযোগী ভিডিও কনটেন্টের মাধ্যমে ব্র্যান্ডের পরিচিতি বৃদ্ধি ও মার্কেটিং কার্যক্রমকে আরও গতিশীল করতে আমরা সহায়তা করি।
                    </p>
                </article>


                <article class="color-card color-6 bg-gray-50 rounded-2xl p-8 shadow-md hover:shadow-lg transition-shadow">
                    <div
                        class="w-16 h-16 bg-gradient-to-br from-sky-500 to-indigo-600 rounded-xl flex items-center justify-center mb-6">
                        <i class="fas fa-palette text-white text-2xl" aria-hidden="true"></i>
                    </div>
                    <h3 class="text-2xl font-semibold text-gray-900 mb-3">Facebook Sales Support</h3>
                    <p class="text-gray-700 leading-relaxed">
                        Facebook-এ শুধু পেজ পরিচালনা নয়, সঠিক কৌশলে গ্রাহকদের সঙ্গে যোগাযোগ তৈরি করে বিক্রয় বাড়ানোই আমাদের লক্ষ্য। আপনার ব্যবসার Facebook Page-এর ইনবক্স ম্যানেজমেন্ট, কাস্টমারের প্রশ্নের উত্তর, পণ্য ও সার্ভিস সম্পর্কে বিস্তারিত তথ্য প্রদান, অর্ডার সংগ্রহ এবং কাস্টমার ফলোআপসহ বিক্রয় কার্যক্রমে আমরা দিই প্রফেশনাল সাপোর্ট। দ্রুত সাড়া প্রদান, আন্তরিক কাস্টমার সার্ভিস এবং সুশৃঙ্খল অর্ডার ম্যানেজমেন্টের মাধ্যমে গ্রাহকদের আস্থা অর্জন ও কেনাকাটার অভিজ্ঞতা উন্নত করতে আমরা কাজ করি।

                        আপনি অনলাইন শপ, ই-কমার্স ব্যবসা কিংবা যেকোনো সার্ভিস-ভিত্তিক প্রতিষ্ঠান পরিচালনা করুন—আমাদের Facebook Sales Support টিম আপনার ব্যবসার বিক্রয় কার্যক্রমকে আরও সহজ ও গতিশীল করতে সহায়তা করবে।
                    </p>
                </article>

            </div>
        </div>
    </section>


    <!-- Accessibility & Small Enhancements -->
    <style>
        /* Optional card hover lift */
        .service-card:hover {
            transform: translateY(-2px);
        }
    </style>




    <!-- Why Choose Us Banner -->
    <section class="black-yellow-banner py-16 bg-black relative overflow-hidden">
        <!-- Gradient overlay -->
        <div class="absolute inset-0 bg-gradient-to-br from-gray-900 via-black to-gray-900 opacity-95"></div>

        <!-- Yellow glow accents -->
        <div class="absolute -top-24 -left-24 w-72 h-72 bg-yellow-500 rounded-full blur-3xl opacity-20"></div>
        <div class="absolute -bottom-24 -right-24 w-80 h-80 bg-yellow-400 rounded-full blur-3xl opacity-20"></div>

        <div class="container mx-auto px-6 text-center relative z-10">
            <h2 class="text-3xl md:text-4xl font-bold mb-6 text-white drop-shadow-lg">
                <span class="text-red-400">Recognized</span> as Bangladesh's
                <span class="text-red-300">Best IT Company</span>
            </h2>
            <p class="text-xl text-gray-100 drop-shadow-md">
                ১২+ বছরের অভিজ্ঞতা এবং
                <span class="text-green-400 font-extrabold">৬৫০০+</span> সফল প্রোজেক্টের সাথে বাংলাদেশের শীর্ষ আইটি কোম্পানী
            </p>
        </div>
    </section>


    

    <!-- Footer -->
    <?php require_once('footer.php'); ?>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const slider = document.querySelector('#heroSlider');
    const slides = slider.querySelectorAll('.slide');
    const dots = slider.querySelectorAll('.dot');

    let current = 0;
    let timer;

    function showSlide(index) {
        current = (index + slides.length) % slides.length;

        slides.forEach((slide, i) => {
            slide.classList.toggle('active', i === current);
        });

        dots.forEach((dot, i) => {
            dot.classList.toggle('active', i === current);
        });
    }

    function startAutoSlide() {
        clearInterval(timer);
        timer = setInterval(() => showSlide(current + 1), 5000);
    }

    slider.querySelector('.next').addEventListener('click', () => {
        showSlide(current + 1);
        startAutoSlide();
    });

    slider.querySelector('.prev').addEventListener('click', () => {
        showSlide(current - 1);
        startAutoSlide();
    });

    dots.forEach((dot, i) => {
        dot.addEventListener('click', () => {
            showSlide(i);
            startAutoSlide();
        });
    });

    showSlide(0);
    startAutoSlide();
});


const clients = [
    { name: "Bangladesh Government", logo: "images/clients/bangladesh-gov.png" },
    { name: "United Group", logo: "images/clients/united-group.png" },
    { name: "Shanta Holdings", logo: "images/clients/shanta.png" },
    { name: "United Hospital", logo: "images/clients/united-hospital.png" },
    { name: "Partex Group", logo: "images/clients/partex.png" },
    { name: "Spectra Group", logo: "images/clients/spectra.png" },
    { name: "Pickaboo", logo: "images/clients/pickaboo.png" },
    { name: "A2i", logo: "images/clients/a2i.png" },
    { name: "Mobil", logo: "images/clients/mobil.png" },
    { name: "Concord", logo: "images/clients/concord.png" },
    { name: "Rangs Properties", logo: "images/clients/rangs.png" },
    { name: "Plan International", logo: "images/clients/plan.png" },

    { name: "Client 13", logo: "images/clients/client-13.png" },
    { name: "Client 14", logo: "images/clients/client-14.png" },
    { name: "Client 15", logo: "images/clients/client-15.png" },
    { name: "Client 16", logo: "images/clients/client-16.png" },
    { name: "Client 17", logo: "images/clients/client-17.png" },
    { name: "Client 18", logo: "images/clients/client-18.png" },
    { name: "Client 19", logo: "images/clients/client-19.png" },
    { name: "Client 20", logo: "images/clients/client-20.png" },
    { name: "Client 21", logo: "images/clients/client-21.png" },
    { name: "Client 22", logo: "images/clients/client-22.png" },
    { name: "Client 23", logo: "images/clients/client-23.png" },
    { name: "Client 24", logo: "images/clients/client-24.png" }
];

const clientsGrid = document.getElementById("clientsGrid");
const pagination = document.getElementById("sliderPagination");

let currentPage = 0;
let itemsPerPage = getItemsPerPage();

function getItemsPerPage() {
    if (window.innerWidth <= 480) return 6;
    if (window.innerWidth <= 768) return 6;
    if (window.innerWidth <= 1200) return 8;
    return 12;
}

function renderClients() {
    itemsPerPage = getItemsPerPage();

    const totalPages = Math.ceil(clients.length / itemsPerPage);

    if (currentPage >= totalPages) {
        currentPage = totalPages - 1;
    }

    const start = currentPage * itemsPerPage;
    const visibleClients = clients.slice(start, start + itemsPerPage);

    clientsGrid.style.opacity = "0";

    setTimeout(() => {
        clientsGrid.innerHTML = visibleClients.map(client => `
            <div class="client-card">
                <img
                    src="${client.logo}"
                    alt="${client.name}"
                    loading="lazy"
                >
                <span class="client-name-fallback">
                    ${client.name}
                </span>
            </div>
        `).join("");

        clientsGrid.querySelectorAll("img").forEach(img => {
            img.addEventListener("error", () => {
                img.style.display = "none";
                const fallback = img.nextElementSibling;
                fallback.style.display = "block";
            });
        });

        clientsGrid.style.opacity = "1";
    }, 150);

    renderPagination(totalPages);
}

function renderPagination(totalPages) {
    pagination.innerHTML = "";

    for (let i = 0; i < totalPages; i++) {
        const dot = document.createElement("button");

        dot.type = "button";
        dot.className = "pagination-dot";
        dot.setAttribute("aria-label", `Show client page ${i + 1}`);

        if (i === currentPage) {
            dot.classList.add("active");
            dot.setAttribute("aria-current", "page");
        }

        dot.addEventListener("click", () => {
            currentPage = i;
            renderClients();
        });

        pagination.appendChild(dot);
    }
}

let resizeTimer;

window.addEventListener("resize", () => {
    clearTimeout(resizeTimer);

    resizeTimer = setTimeout(() => {
        currentPage = 0;
        renderClients();
    }, 200);
});

renderClients();

</script>



</html>