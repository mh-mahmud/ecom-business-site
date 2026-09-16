<?php require_once('header.php'); ?>

<body class="bg-gray-50">

    <!-- Header -->
    <?php require_once('menu.php'); ?>


<div class="h-16 lg:h-20"></div>


    <main>
    <section id="hero"
        class="relative text-white bg-gradient-to-br from-slate-900 via-blue-900 to-slate-800 py-10 scroll-mt-24 lg:scroll-mt-28 overflow-hidden">

        <!-- Geometric background accents (lighter + professional) -->
        <div class="absolute inset-0 overflow-hidden">
            <div class="absolute top-0 left-0 w-full h-full">
                <!-- subtle lines -->
                <div class="absolute top-20 left-10 w-32 h-32 border border-blue-400/20 rotate-45"></div>
                <div class="absolute top-40 right-20 w-24 h-24 border border-white/10 rotate-12"></div>
                <div class="absolute bottom-20 left-1/4 w-16 h-16 border border-blue-300/15 rotate-45"></div>
                <div class="absolute bottom-32 right-1/3 w-20 h-20 border border-white/10 -rotate-12"></div>

                <!-- dotted team motif -->
                <div class="absolute inset-0 flex items-center justify-center opacity-10">
                    <div class="grid grid-cols-5 gap-8">
                        <div class="w-16 h-16 bg-white/20 rounded-full"></div>
                        <div class="w-16 h-16 bg-blue-300/30 rounded-full"></div>
                        <div class="w-16 h-16 bg-white/25 rounded-full"></div>
                        <div class="w-16 h-16 bg-blue-200/20 rounded-full"></div>
                        <div class="w-16 h-16 bg-white/20 rounded-full"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container mx-auto px-4 text-center relative z-10">
            <div class="mx-auto">
                <h1 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-extrabold tracking-tight mb-4 sm:mb-6">
                    ল্যান্ডিং পেজ কি?
                </h1>
                <p
                    class="text-base sm:text-lg md:text-xl text-blue-100 max-w-4xl mx-auto mb-8 sm:mb-10 leading-relaxed">
                    একটি কিংবা একদম সিমিলার ২-৩ টি প্রোডাক্ট যারা সেল করে থাকে তাদের জন্য ল্যান্ডিং পেজ গুরুত্বপূর্ণ।
                    খরচের পরিমাণ কম কিন্তু সেল অনেক বেশি।
                </p>




            </div>
        </div>
    </section>
    <!-- Compact Stat Section (Light Version — with CTA) -->
    <section class="relative bg-gray-50 py-12 sm:py-16 md:py-20 overflow-hidden">
        <!-- soft accents -->
        <div class="pointer-events-none absolute -top-24 -left-24 w-72 h-72 bg-emerald-300/20 rounded-full blur-3xl">
        </div>
        <div class="pointer-events-none absolute -bottom-28 -right-28 w-80 h-80 bg-cyan-300/20 rounded-full blur-3xl">
        </div>

        <div class="container mx-auto px-4 relative z-10 max-w-full">
            <div class="mx-auto max-w-4xl bg-white border border-gray-200 rounded-2xl shadow-lg p-6 sm:p-8">

                <!-- Text/KPI -->
                <div class="text-center mb-8">
                    <div class="flex justify-center gap-3 mb-4">
                        <div
                            class="w-12 h-12 sm:w-14 sm:h-14 rounded-lg bg-emerald-100 flex items-center justify-center">
                            <i class="fas fa-chart-line text-emerald-600 text-xl sm:text-2xl" aria-hidden="true"></i>
                        </div>
                        <span
                            class="inline-flex items-center text-xs font-semibold uppercase tracking-wide text-emerald-700 bg-emerald-50 border border-emerald-200 px-3 py-1 rounded-full">
                            CPA Improvement
                        </span>
                    </div>

                    <h3 class="text-lg sm:text-xl font-semibold text-gray-800 mb-2">
                        ছবিতে দেখুন — ১৪৪০ টাকা দামের প্রোডাক্ট সেল করতে খরচ হচ্ছে মাত্র ১০৫ টাকা
                    </h3>

                    <div class="mt-4">

                        <p class="mt-2 text-sm sm:text-base md:text-lg text-gray-600">
                            স্মার্ট ল্যান্ডিং + স্ট্র্যাটেজি = কম কস্টে সেল
                        </p>
                    </div>

                    <!-- small helper note -->
                    <p class="mt-4 text-xs text-gray-500">
                        *ডেটা উদাহরণস্বরূপ; ইন্ডাস্ট্রি/ক্যাম্পেইন ভেদে ভিন্ন হতে পারে।
                    </p>
                </div>

                <!-- Visual proof (image full row) -->
                <figure class="mb-8">
                    <img src="https://topperit.com/images/peacock.webp"
                        alt="ক্যাম্পেইন রিপোর্ট যেখানে ১৪৪০ টাকার প্রোডাক্ট সেল করতে কম খরচ (CPA) প্রদর্শিত"
                        class="w-full h-auto rounded-xl ring-1 ring-gray-200/60 shadow-sm" loading="lazy"
                        decoding="async" />
                    <figcaption class="mt-3 text-xs text-gray-700 text-center">
                        ক্যাম্পেইন রিপোর্টের স্ক্রিনশট (উদাহরণ)
                    </figcaption>
                </figure>

                <!-- CTA Button -->
                <div class="text-center">
                    <a href="#benifits"
                        class="inline-block bg-gradient-to-r from-emerald-500 to-cyan-500 hover:from-emerald-600 hover:to-cyan-600 text-white font-semibold px-8 py-4 rounded-lg shadow-md transition-all duration-300 transform hover:scale-105">
                        ল্যান্ডিং পেজে কি পাবেন দেখতে ক্লিক করুন
                    </a>
                </div>
            </div>
        </div>
    </section>


                    
        <section class="py-12 sm:py-16 bg-gradient-to-r from-blue-50 via-purple-50 to-pink-50">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="flex justify-center">
            
            <!-- Plan 1 -->
            <div class="bg-white rounded-xl shadow-lg p-6 sm:p-8 card-hover border-t-4 border-blue-500 max-w-md w-full">
                
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-4 sm:mb-6">
                    <h3 class="text-xl sm:text-2xl font-bold text-gray-800 mb-2 sm:mb-0">
                        ল্যান্ডিং পেজ প্যাকেজ
                    </h3>

                    <span class="bg-blue-100 text-blue-600 px-3 py-1 rounded-full text-xs sm:text-sm font-semibold self-start">
                        Basic
                    </span>
                </div>

                <div class="mb-4 sm:mb-6">
                    <div class="text-2xl sm:text-3xl font-bold text-blue-600 mb-2">
                        ৫,০০০ টাকা
                    </div>
                </div>


                   <ul class="space-y-3 mb-8">
                <li class="flex items-start space-x-3">
                    <i class="fas fa-check text-green-500 mt-1"></i>
                    <span>১ টি সুপারফাস্ট ই-কমার্স ল্যান্ডিং পেজ</span>
                </li>
                <li class="flex items-start space-x-3">
                    <i class="fas fa-check text-green-500 mt-1"></i>
                    <span>ওকমার্স সিএমএস</span>
                </li>
                <li class="flex items-start space-x-3">
                    <i class="fas fa-check text-green-500 mt-1"></i>
                    <span>১০ জিবি হোস্টিং + ডোমেইন ( ১ বছর মেয়াদী) , আপনার নামে কেনা হবে এবং একসেস আপনার কাছেই থাকবে।</span>
                </li>
                <li class="flex items-start space-x-3">
                    <i class="fas fa-check text-green-500 mt-1"></i>
                    <span>৩ মাস টেকনিক্যাল সাপোর্ট</span>
                </li>
            
                <!-- NEW LINE -->
                <li class="flex items-start space-x-3">
                    <i class="fas fa-star text-yellow-500 mt-1"></i>
                    <span class="font-bold text-red-400">
                        ল্যান্ডিং পেজ থেকে একটি প্রোডাক্ট সেল করা যায়, যাদের প্রোডাক্ট একটি তাদের জন্য ল্যান্ডিং পেজ
                    </span>
                </li>
</ul>

                    <div class="mb-4 sm:mb-6">
                        <h4 class="font-semibold mb-3 text-sm sm:text-base">Live Demos:</h4>
                        <div class="flex flex-wrap gap-2 demo-scroll">
                            <a href="https://landing.topperit.com.bd/step/modhu/"
                                class="bg-gray-100 hover:bg-blue-100 px-2 sm:px-3 py-1 sm:py-2 rounded-lg text-xs sm:text-sm transition whitespace-nowrap"
                                > মধু </a>
                            <a href="https://landing.topperit.com.bd/step/modhucombo/"
                                class="bg-gray-100 hover:bg-blue-100 px-2 sm:px-3 py-1 sm:py-2 rounded-lg text-xs sm:text-sm transition whitespace-nowrap">মধু কম্বো</a>
                            <a href="https://landing.topperit.com.bd/step/modhucombo/"
                                class="bg-gray-100 hover:bg-blue-100 px-2 sm:px-3 py-1 sm:py-2 rounded-lg text-xs sm:text-sm transition whitespace-nowrap"
                                > আম </a>
                            <a href="https://landing.topperit.com.bd/step/sukkari-khejur/"
                                class="bg-gray-100 hover:bg-blue-100 px-2 sm:px-3 py-1 sm:py-2 rounded-lg text-xs sm:text-sm transition whitespace-nowrap"
                                > খেজুর </a>
                            <a href="https://landing.topperit.com.bd/step/khejurgur/"
                                class="bg-gray-100 hover:bg-blue-100 px-2 sm:px-3 py-1 sm:py-2 rounded-lg text-xs sm:text-sm transition whitespace-nowrap"
                                > খেজুর গুড় </a>
                                
                            <a href="https://landing.topperit.com.bd/step/lalchaul/"
                                class="bg-gray-100 hover:bg-blue-100 px-2 sm:px-3 py-1 sm:py-2 rounded-lg text-xs sm:text-sm transition whitespace-nowrap"
                                > লাল চাউল </a>
                            <a href="https://landing.topperit.com.bd/step/ghee/"
                                class="bg-gray-100 hover:bg-blue-100 px-2 sm:px-3 py-1 sm:py-2 rounded-lg text-xs sm:text-sm transition whitespace-nowrap">খাঁটি ঘি </a>
                            <a href="https://landing.topperit.com.bd/step/t-shirt/"
                                class="bg-gray-100 hover:bg-blue-100 px-2 sm:px-3 py-1 sm:py-2 rounded-lg text-xs sm:text-sm transition whitespace-nowrap"
                                > টি শার্ট কম্বো </a>
                            <a href="https://landing.topperit.com.bd/step/premium-classic-polo/"
                                class="bg-gray-100 hover:bg-blue-100 px-2 sm:px-3 py-1 sm:py-2 rounded-lg text-xs sm:text-sm transition whitespace-nowrap"
                                > পলো শার্ট </a>
                            <a href="https://landing.topperit.com.bd/step/shirt/"
                                class="bg-gray-100 hover:bg-blue-100 px-2 sm:px-3 py-1 sm:py-2 rounded-lg text-xs sm:text-sm transition whitespace-nowrap"
                                > শার্ট </a>
                                
                                
                            <a href="https://landing.topperit.com.bd/step/trouserformen/"
                                class="bg-gray-100 hover:bg-blue-100 px-2 sm:px-3 py-1 sm:py-2 rounded-lg text-xs sm:text-sm transition whitespace-nowrap"
                                > ট্রাউজার (পুরুষ) </a>
                                
                            <a href="https://landing.topperit.com.bd/step/hoodiesformen/"
                                class="bg-gray-100 hover:bg-blue-100 px-2 sm:px-3 py-1 sm:py-2 rounded-lg text-xs sm:text-sm transition whitespace-nowrap"
                             > হুডি (পুরুষ) </a>
                                
                             <a href="https://landing.topperit.com.bd/step/jacketformen/"
                                class="bg-gray-100 hover:bg-blue-100 px-2 sm:px-3 py-1 sm:py-2 rounded-lg text-xs sm:text-sm transition whitespace-nowrap"
                                > জ্যাকেট (পুরুষ) </a>
                                
                            <a href="https://landing.topperit.com.bd/step/panjabi/"
                                class="bg-gray-100 hover:bg-blue-100 px-2 sm:px-3 py-1 sm:py-2 rounded-lg text-xs sm:text-sm transition whitespace-nowrap"
                                > পাঞ্জাবি </a>
                            <a href="https://landing.topperit.com.bd/step/three-piece/"
                                class="bg-gray-100 hover:bg-blue-100 px-2 sm:px-3 py-1 sm:py-2 rounded-lg text-xs sm:text-sm transition whitespace-nowrap"
                                > থ্রি-পিছ </a>
                            <a href="https://landing.topperit.com.bd/step/three-piece-2/"
                                class="bg-gray-100 hover:bg-blue-100 px-2 sm:px-3 py-1 sm:py-2 rounded-lg text-xs sm:text-sm transition whitespace-nowrap"
                                > থ্রি-পিছ ২ </a>
                                
                            <a href="https://landing.topperit.com.bd/step/premium-sari/"
                                class="bg-gray-100 hover:bg-blue-100 px-2 sm:px-3 py-1 sm:py-2 rounded-lg text-xs sm:text-sm transition whitespace-nowrap"
                               > শাড়ি </a>
                                
                            <a href="https://landing.topperit.com.bd/step/watch/"
                                class="bg-gray-100 hover:bg-blue-100 px-2 sm:px-3 py-1 sm:py-2 rounded-lg text-xs sm:text-sm transition whitespace-nowrap"
                                > ঘড়ি </a>
                                
                            <a href="https://landing.topperit.com.bd/step/casual-shoes/"
                                class="bg-gray-100 hover:bg-blue-100 px-2 sm:px-3 py-1 sm:py-2 rounded-lg text-xs sm:text-sm transition whitespace-nowrap"
                               > ক্যাজুয়াল জুতা </a>
                               
                               
                               <a href="https://landing.topperit.com.bd/step/intelligence-book/"
                                class="bg-gray-100 hover:bg-blue-100 px-2 sm:px-3 py-1 sm:py-2 rounded-lg text-xs sm:text-sm transition whitespace-nowrap"
                               > ইন্টেলিজেন্স বুক </a>
                               
                               <a href="https://landing.topperit.com.bd/step/organic-store-checkout/"
                                class="bg-gray-100 hover:bg-blue-100 px-2 sm:px-3 py-1 sm:py-2 rounded-lg text-xs sm:text-sm transition whitespace-nowrap"
                               > চায়না প্রোডাক্ট </a>
                               
                               
                              <a href="https://landing.topperit.com.bd/step/intelligence-book/"
                                class="bg-gray-100 hover:bg-blue-100 px-2 sm:px-3 py-1 sm:py-2 rounded-lg text-xs sm:text-sm transition whitespace-nowrap"
                               > চায়না প্রোডাক্ট -২ </a>
                               
                               <a href="https://landing.topperit.com.bd/step/intelligence-book/"
                                class="bg-gray-100 hover:bg-blue-100 px-2 sm:px-3 py-1 sm:py-2 rounded-lg text-xs sm:text-sm transition whitespace-nowrap"
                               > ইন্টেলিজেন্স বুক </a>
                               
                               <a href="https://landing.topperit.com.bd/step/flying-doll/"
                                class="bg-gray-100 hover:bg-blue-100 px-2 sm:px-3 py-1 sm:py-2 rounded-lg text-xs sm:text-sm transition whitespace-nowrap"
                             > বাচ্চাদের খেলনা </a>
                             
                              <a href="https://landing.topperit.com.bd/step/cosmetices/"
                                class="bg-gray-100 hover:bg-blue-100 px-2 sm:px-3 py-1 sm:py-2 rounded-lg text-xs sm:text-sm transition whitespace-nowrap"
                            > বিউটি প্রোডাক্ট </a>
                            
                             <a href="https://landing.topperit.com.bd/step/store-checkout-02-2/"
                                class="bg-gray-100 hover:bg-blue-100 px-2 sm:px-3 py-1 sm:py-2 rounded-lg text-xs sm:text-sm transition whitespace-nowrap"
                            > কসমেটিক্স </a>
                            
                                
                        </div>
                    </div>
                    <div class="space-y-3">

                        <a href="https://wa.link/saqf1s"
                            class="w-full bg-green-500 hover:bg-green-600 text-white py-3 rounded-lg font-semibold transition text-center block">
                            <i class="fab fa-whatsapp mr-2"></i> WhatsApp
                        </a>

                    </div>
                </div>
                
                
                
                
                
            </section>






    <!-- Why Landing Page Section (Exact Content) -->
    <section id="benifits"
        class="relative bg-gradient-to-br from-blue-50 via-cyan-50 to-blue-50 py-16 sm:py-20 lg:py-24 overflow-hidden">
        <!-- soft accents -->
        <div class="pointer-events-none absolute -top-24 -left-24 w-72 h-72 bg-blue-300/20 rounded-full blur-3xl"></div>
        <div class="pointer-events-none absolute -bottom-28 -right-28 w-80 h-80 bg-cyan-300/20 rounded-full blur-3xl">
        </div>

        <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <!-- Header -->
            <div class="max-w-4xl mx-auto text-center mb-10 sm:mb-14">
                <h2 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-gray-900 leading-tight">
                    কেন ল্যান্ডিং পেজ প্রয়োজন?
                </h2>
                <p class="mt-4 text-gray-700 text-base sm:text-lg leading-relaxed">
                    ফেসবুকের এলগোরিদম কিভাবে কাজ করে সেটা বুঝলেই কেবল বুঝতে পারবেন কেন ল্যান্ডিং পেজ প্রয়োজন? <br>
                    যেসব কাস্টোমার শুধু বিভিন্ন পেজের ইনবক্সে মেসেজ দিতে পছন্দ করে এটা সেটা জানার জন্য ফেসবুক তাদের
                    আলাদা করে রেখেছে।
                    প্রক্ষান্তরে যারা বিভিন্ন ল্যান্ডিং পেজ বা ওয়েবসাইট থেকে ডাইরেক্ট অর্ডার করে তাদেরকে নিয়ে আলাদা
                    অডিয়েন্স ক্রিয়েট করে রেখেছে। <br><br>
                    <span class="font-semibold text-emerald-600">সিদ্ধান্ত আপনার, মেসেজ এর রিপ্লাই দিবেন নাকি সেল
                        জেনারেট করবেন?</span>
                </p>
            </div>

            <!-- Benefits -->
            <div class="bg-white border border-gray-200 rounded-2xl shadow-lg p-6 sm:p-8 max-w-4xl mx-auto">
                <h3 class="text-xl font-bold text-gray-900 mb-6 text-center">
                    একটি ল্যান্ডিং পেজ থাকলে আপনি যে সুবিধাগুলো পাবেন:
                </h3>

                <ul class="space-y-4 text-gray-700">
                    
                                        <li class="flex gap-3">
                        <span class="flex-shrink-0 w-6 h-6 rounded-full bg-emerald-100 flex items-center justify-center">
                            <i class="fas fa-check text-emerald-600 text-xs"></i>
                        </span>
                        <p class="flex-1 leading-relaxed">সার্ভার সাইড ট্র্যাকিং সহ পিক্সেল সেটাপ করে এড রান করে প্রচুর সেল করতে পারবেন</p>
                    </li>
                                        <li class="flex gap-3">
                        <span class="flex-shrink-0 w-6 h-6 rounded-full bg-emerald-100 flex items-center justify-center">
                            <i class="fas fa-check text-emerald-600 text-xs"></i>
                        </span>
                        <p class="flex-1 leading-relaxed">যারা ওয়েবসাইটে এসে ফুট ‍প্রিন্ট রেখে চলে গেছে তাদের রিটাগেটিং করে আপনার সেলকে অনেক বাড়াতে পারবেন</p>
                    </li>
                                        <li class="flex gap-3">
                        <span class="flex-shrink-0 w-6 h-6 rounded-full bg-emerald-100 flex items-center justify-center">
                            <i class="fas fa-check text-emerald-600 text-xs"></i>
                        </span>
                        <p class="flex-1 leading-relaxed">অর্ডার সহজে ম্যানেজ করতে পারবেন</p>
                    </li>
                                        <li class="flex gap-3">
                        <span class="flex-shrink-0 w-6 h-6 rounded-full bg-emerald-100 flex items-center justify-center">
                            <i class="fas fa-check text-emerald-600 text-xs"></i>
                        </span>
                        <p class="flex-1 leading-relaxed">অটোম্যাটিক সেল হতে থাকবে</p>
                    </li>
                                        <li class="flex gap-3">
                        <span class="flex-shrink-0 w-6 h-6 rounded-full bg-emerald-100 flex items-center justify-center">
                            <i class="fas fa-check text-emerald-600 text-xs"></i>
                        </span>
                        <p class="flex-1 leading-relaxed">স্টিডফাস্ট, পাঠাও কুরিয়ারে এক ক্লিকে অর্ডার ডিটেইল অটোমেটিক এন্ট্রি</p>
                    </li>
                                        <li class="flex gap-3">
                        <span class="flex-shrink-0 w-6 h-6 rounded-full bg-emerald-100 flex items-center justify-center">
                            <i class="fas fa-check text-emerald-600 text-xs"></i>
                        </span>
                        <p class="flex-1 leading-relaxed">স্টক ম্যানেজ করার সুবিধাও থাকছে</p>
                    </li>
                                        <li class="flex gap-3">
                        <span class="flex-shrink-0 w-6 h-6 rounded-full bg-emerald-100 flex items-center justify-center">
                            <i class="fas fa-check text-emerald-600 text-xs"></i>
                        </span>
                        <p class="flex-1 leading-relaxed">ইনভয়েস প্রিন্ট / ডাউনলোড</p>
                    </li>
                                        <li class="flex gap-3">
                        <span class="flex-shrink-0 w-6 h-6 rounded-full bg-emerald-100 flex items-center justify-center">
                            <i class="fas fa-check text-emerald-600 text-xs"></i>
                        </span>
                        <p class="flex-1 leading-relaxed">তাছাড়া প্রয়োজনীয় সকল ফিচার ইনবিল্ট করা হয়ে থাকে</p>
                    </li>
                                    </ul>
            </div>

        </div>
    </section>

    <!-- Landing Page Pricing Section -->
    <section
        class="relative bg-gradient-to-br from-indigo-50 via-blue-50 to-cyan-50 py-16 sm:py-20 lg:py-24 overflow-hidden">
        <!-- soft accents -->
        <div class="pointer-events-none absolute -top-24 -left-24 w-72 h-72 bg-indigo-300/20 rounded-full blur-3xl">
        </div>
        <div class="pointer-events-none absolute -bottom-28 -right-28 w-80 h-80 bg-blue-300/20 rounded-full blur-3xl">
        </div>

        <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <!-- Heading -->
            <div class="max-w-3xl mx-auto text-center mb-12">
                <h2 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-gray-900">
                    ল্যান্ডিং পেজের খরচ কত হবে?
                </h2>
                <p class="mt-3 text-gray-600 text-base sm:text-lg">
                    সহজ, সাশ্রয়ী এবং কার্যকর প্রাইসিং
                </p>
            </div>

            <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
                <!-- Pricing Cards -->
                <div class="grid md:grid-cols-2 gap-6 max-w-4xl mx-auto">
                    <!-- ডোমেইন হোস্টিং না থাকলে -->
                    <div class="bg-white border border-gray-200 rounded-2xl shadow-md p-6 sm:p-8 text-center">
                        <h3 class="text-lg sm:text-xl font-semibold text-gray-800 mb-3">
                            ডোমেইন হোস্টিং না থাকলে খরচ হবে
                        </h3>
                        <div class="text-3xl sm:text-4xl font-extrabold text-blue-600 mb-2">
                         ৫,০০০ টাকা
                        </div>
                    </div>

                    <!-- ডোমেইন হোস্টিং থাকলে -->
                    <div class="bg-white border border-gray-200 rounded-2xl shadow-md p-6 sm:p-8 text-center">
                        <h3 class="text-lg sm:text-xl font-semibold text-gray-800 mb-3">
                            ডোমেইন হোস্টিং থাকলে খরচ হবে
                        </h3>
                        <div class="text-3xl sm:text-4xl font-extrabold text-emerald-600 mb-2">
                        ৩,০০০ টাকা
                        </div>
                    </div>
                </div>

                <!-- Product Limit Info -->
                

                <!-- CTAs -->
                <div class="mt-8 sm:mt-10 flex flex-col sm:flex-row items-center justify-center gap-3 sm:gap-4">
                    <!-- WhatsApp -->
                    <a href="https://wa.link/saqf1sাই।"
                        class="inline-flex items-center gap-2 bg-[#25D366] hover:bg-[#1fb457] active:bg-[#189246] text-white px-6 py-3 rounded-xl font-bold text-base sm:text-lg shadow-md focus:outline-none focus-visible:ring-2 focus-visible:ring-[#1fb457] transition"
                        aria-label="WhatsApp">
                        <i class="fab fa-whatsapp text-lg"></i>
                        <span>WhatsApp</span>
                    </a>

                    <!-- Call -->
                    <a href="tel:+8801730724300"
                        class="inline-flex items-center gap-2 bg-indigo-500 border border-gray-300 hover:bg-indigo-600 text-white px-6 py-3 rounded-xl font-semibold text-base sm:text-lg shadow-sm focus:outline-none focus-visible:ring-2 focus-visible:ring-blue-400 transition"
                        aria-label="Call 01730-724300">
                        <i class="fas fa-phone text-base"></i>
                        <span>কল করুন: 01730-724300</span>
                    </a>
                </div>
            </div>


        </div>
    </section>









    <!-- Why Choose Us Section (White Background) -->
    <section class="relative bg-white py-16 sm:py-20 lg:py-24">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Heading -->
            <div class="max-w-3xl mx-auto text-center mb-12">
                <h2 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-gray-900">
                    কেন আমাদের থেকে ল্যান্ডিং পেজ নিবেন ?
                </h2>
                <p class="mt-4 text-gray-700 text-base sm:text-lg">
                    বেশি সেল জেনারেট করতে পারে এমন ফাংশনাল ল্যান্ডিং পেজ ডিজাইন করে থাকে আমাদের টিম
                    <span class="font-semibold text-blue-600">টপার আইটি</span> !
                </p>
            </div>

            <!-- Features Grid -->
            <div class="grid md:grid-cols-3 gap-6 max-w-5xl mx-auto">
                <!-- Feature 1 -->
                <div
                    class="bg-gray-50 border border-gray-200 rounded-xl shadow-sm p-6 text-center hover:shadow-md transition">
                    <div class="w-12 h-12 mx-auto flex items-center justify-center rounded-full bg-blue-100 mb-4">
                        <i class="fas fa-shield-alt text-blue-600 text-xl"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">বেশি সেল ও সিকিউরিটি</h3>
                    <p class="text-gray-600 text-sm sm:text-base">
                        আমরা বেশি সেল করতে পারে এমন সব ওয়েবসাইট ও ল্যান্ডিং পেজ ডিজাইন করি যা শতভাগ হ্যাকিং থেকে মুক্ত
                        থাকে।
                    </p>
                </div>

                <!-- Feature 2 -->
                <div
                    class="bg-gray-50 border border-gray-200 rounded-xl shadow-sm p-6 text-center hover:shadow-md transition">
                    <div class="w-12 h-12 mx-auto flex items-center justify-center rounded-full bg-emerald-100 mb-4">
                        <i class="fas fa-headset text-emerald-600 text-xl"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">২৪ ঘন্টা সাপোর্ট</h3>
                    <p class="text-gray-600 text-sm sm:text-base">
                        ডেডিকেটেড হোয়াটসঅ্যাপ গ্রুপের মাধ্যমে সকাল থেকে মধ্য রাত পর্যন্ত আমাদের এক্সপার্ট টিম যেকোন
                        সমস্যা সমাধান করে থাকেন।
                    </p>
                </div>

                <!-- Feature 3 -->
                <div
                    class="bg-gray-50 border border-gray-200 rounded-xl shadow-sm p-6 text-center hover:shadow-md transition">
                    <div class="w-12 h-12 mx-auto flex items-center justify-center rounded-full bg-indigo-100 mb-4">
                        <i class="fas fa-box-open text-indigo-600 text-xl"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">প্যাকেজ ভিত্তিক</h3>
                    <p class="text-gray-600 text-sm sm:text-base">
                        আমাদের ৫০০০ টাকার ল্যান্ডিং পেজ থেকে শুরু করে ৫ লাখ টাকার কাষ্টোম ওয়েবসাইট ও সফটওয়্যার ডেভেলপমেন্ট সার্ভিস দিয়ে থাকি।
                    </p>
                </div>
            </div>
        </div>
    </section>


</main>

    <!-- Footer -->
    <?php require_once('footer.php'); ?>




</html>