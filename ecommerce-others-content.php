    <section class="relative py-20 lg:py-24 overflow-hidden bg-gradient-to-b from-gray-50 via-white to-gray-50">
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
        </div>
    </section>
    
    
    <section class="py-12 sm:py-16">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 xl:grid-cols-3 gap-6 sm:gap-8">

                <div class="bg-white rounded-xl shadow-lg p-6 sm:p-8 card-hover border-t-4 border-blue-500">
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-4 sm:mb-6">
                        <h3 class="text-xl sm:text-2xl font-bold text-gray-800 mb-2 sm:mb-0">ল্যান্ডিং পেজ প্যাকেজ</h3>
                        <span
                            class="bg-blue-100 text-blue-600 px-3 py-1 rounded-full text-xs sm:text-sm font-semibold self-start">Basic</span>
                    </div>

                    <div class="mb-4 sm:mb-6">
                        <div class="text-2xl sm:text-3xl font-bold text-blue-600 mb-2">৫,০০০ টাকা</div>
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
                            <a href="https://landing.topperit.com.bd/step/mango/"
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

                <div class="bg-white rounded-xl shadow-lg p-6 sm:p-8 card-hover border-t-4 border-green-500">
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-4 sm:mb-6">
                        <h3 class="text-xl sm:text-2xl font-bold text-gray-800 mb-2 sm:mb-0">ই-কমার্স প্লান-৩</h3>
                        <span
                            class="bg-green-100 text-green-600 px-3 py-1 rounded-full text-xs sm:text-sm font-semibold self-start">Popular</span>
                    </div>

                    <div class="mb-4 sm:mb-6">
                        <div class="text-2xl sm:text-3xl font-bold text-green-600 mb-2">৩০,০০০ টাকা</div>
                    </div>

                    <ul class="space-y-3 mb-8">
                        <li class="flex items-start space-x-3"><i class="fas fa-check text-green-500 mt-1"></i><span>১ টি
                                ফাংশনাল ওয়েবসাইট</span></li>
                        <li class="flex items-start space-x-3"><i class="fas fa-check text-green-500 mt-1"></i><span>ওকমার্স
                                সিএমএস</span></li>
                        <li class="flex items-start space-x-3"><i class="fas fa-check text-green-500 mt-1"></i><span>৩০ জিবি হোস্টিং + ডোমেইন ( ১ বছর মেয়াদী) , আপনার নামে কেনা হবে এবং একসেস আপনার কাছেই থাকবে। </span></li>
                        <li class="flex items-start space-x-3"><i
                                class="fas fa-check text-green-500 mt-1"></i><span>অপটিমাইজ ফেসবুক পেইজ, লোগো, কাভার
                                ফটো</span></li>
                        <li class="flex items-start space-x-3"><i class="fas fa-check text-green-500 mt-1"></i><span>১২ মাস
                                টেকনিক্যাল সাপোর্ট</span></li>
                    </ul>

                    <div class="mb-6">
                        <h4 class="font-semibold mb-3">Live Demos:</h4>
                        <div class="flex flex-wrap gap-2 demo-scroll">
                            <a href="https://ctlink.topperit.com.bd"
                                class="bg-gray-100 hover:bg-green-100 px-3 py-2 rounded-lg text-sm transition">গ্যাজেট</a>
                            <a href="https://gadget.topperit.com.bd"
                                class="bg-gray-100 hover:bg-green-100 px-3 py-2 rounded-lg text-sm transition">গ্যাজেট ২</a>
                            <a href="https://bdshop.topperit.com.bd"
                                class="bg-gray-100 hover:bg-green-100 px-3 py-2 rounded-lg text-sm transition">গ্যাজেট ৩</a>
                            <a href="https://food.topperit.com.bd"
                                class="bg-gray-100 hover:bg-green-100 px-3 py-2 rounded-lg text-sm transition">অর্গানিক
                                ফুড</a>
                            <a href="https://food1.topperit.com.bd"
                                class="bg-gray-100 hover:bg-green-100 px-3 py-2 rounded-lg text-sm transition">অর্গানিক ফুড
                                ২</a>
                                
                            <a href="https://fabri.topperit.com.bd/"
                                class="bg-gray-100 hover:bg-purple-100 px-3 py-2 rounded-lg text-sm transition">ফ্যাশন</a>
                            <a href="https://threepics.topperit.com.bd"
                                class="bg-gray-100 hover:bg-green-100 px-3 py-2 rounded-lg text-sm transition">ফ্যাশন</a>
                            <a href="https://winter.topperit.com.bd"
                                class="bg-gray-100 hover:bg-green-100 px-3 py-2 rounded-lg text-sm transition">ফ্যাশন ২</a>
                                
                                <a href="https://fashionari.topperit.com.bd/"
                                class="bg-gray-100 hover:bg-purple-100 px-3 py-2 rounded-lg text-sm transition">ফ্যাশন</a>
                            <a href="https://sailor.topperit.com.bd/"
                                class="bg-gray-100 hover:bg-purple-100 px-3 py-2 rounded-lg text-sm transition">ফ্যাশন
                                ২</a>
                            <a href="https://fashion3.topperit.com.bd/"
                                class="bg-gray-100 hover:bg-purple-100 px-3 py-2 rounded-lg text-sm transition">ফ্যাশন
                                ৩</a>
                            <a href="https://borka.topperit.com.bd"
                                class="bg-gray-100 hover:bg-purple-100 px-3 py-2 rounded-lg text-sm transition">ফ্যাশন
                                ৪</a>
                            <a href="https://fashion.topperit.com.bd/"
                                class="bg-gray-100 hover:bg-purple-100 px-3 py-2 rounded-lg text-sm transition">ফ্যাশন
                                ৫</a>
                            <a href="https://fashion1.topperit.com.bd"
                                class="bg-gray-100 hover:bg-purple-100 px-3 py-2 rounded-lg text-sm transition">ফ্যাশন
                                ৬</a>
                            <a href="https://fashion2.topperit.com.bd/"
                                class="bg-gray-100 hover:bg-purple-100 px-3 py-2 rounded-lg text-sm transition">ফ্যাশন
                                ৭</a>
                            <a href="https://gadget2.topperit.com.bd/"
                                class="bg-gray-100 hover:bg-purple-100 px-3 py-2 rounded-lg text-sm transition">গ্যাজেট</a>
                            <a href="https://gadget5.topperit.com.bd/"
                                class="bg-gray-100 hover:bg-purple-100 px-3 py-2 rounded-lg text-sm transition">গ্যাজেট
                                ২</a>
                        </div>
                    </div>

                    <div class="space-y-3">

                        <a href="https://wa.link/saqf1s"
                            class="w-full bg-green-500 hover:bg-green-600 text-white py-3 rounded-lg font-semibold transition text-center block">
                            <i class="fab fa-whatsapp mr-2"></i> WhatsApp
                        </a>

                    </div>
                </div>


                <div class="bg-white rounded-xl shadow-lg p-8 card-hover border-t-4 border-purple-500">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-2xl font-bold text-gray-800">লারাভেল প্যাকেজ  </h3>
                        <span
                            class="bg-purple-100 text-purple-600 px-3 py-1 rounded-full text-sm font-semibold">Advanced</span>
                    </div>

                    <div class="mb-6">
                        <div class="text-2xl font-bold text-purple-600 mb-2">৭৫,০০০ টাকা</div>
                    </div>

                <div class="mt-4 mb-5">
                <div class="inline-block bg-red-100 text-red-600 px-6 py-2 rounded-full text-xl font-bold animate-pulse">
                    🎉 অফার প্রাইস: ৬৫,০০০ টাকা
                </div>

                <div class="mt-3 text-base text-gray-700 font-semibold">
                    ⚡ প্রথম ২০ জনের জন্য এই অফার প্রযোজ্য
                </div>
            </div>

                    <ul class="space-y-3 mb-8">
                        <li class="flex items-start space-x-3"><i
                                class="fas fa-check text-green-500 mt-1"></i><span>ফাংশনাল ওয়েবসাইট</span></li>
                        <li class="flex items-start space-x-3"><i class="fas fa-check text-green-500 mt-1"></i><span>ফুল
                                কাস্টোম পেইজ ডিজাইন</span></li>
                        <li class="flex items-start space-x-3"><i
                                class="fas fa-check text-green-500 mt-1"></i><span>লারাভেল + Vue Js টেকনোলজির সুপার ফাস্ট ওয়েবসাইট, যা ০.৫ থেকে ১ সেকেন্ডে লোড নেওয়ার গ্যারান্টি সহ </span></li>
                        <li class="flex items-start space-x-3"><i class="fas fa-check text-green-500 mt-1"></i><span> ৫০ জিবি হোস্টিং + ডোমেইন ( ১ বছর মেয়াদী) , আপনার নামে কেনা হবে এবং একসেস আপনার কাছেই থাকবে। </span></li>
                        <li class="flex items-start space-x-3"><i class="fas fa-check text-green-500 mt-1"></i><span>
                                এডভান্সড সিকিউরিটি সিস্টেম ডেভেলপমেন্ট
                            </span></li>
                        <li class="flex items-start space-x-3"><i class="fas fa-check text-green-500 mt-1"></i><span>
                                অপটিমাইজ ফেসবুক পেইজ, লোগো, কাভার ফটো
                            </span></li>
                        <li class="flex items-start space-x-3"><i class="fas fa-check text-green-500 mt-1"></i><span>
                                ১২ মাসের টেকনিক্যাল সাপোর্ট
                            </span></li>
                    </ul>

                    <div class="mb-6">
                        <h4 class="font-semibold mb-3">Live Demos:</h4>
                        <div class="flex flex-wrap gap-2 demo-scroll">
                            <a href="https://orderfy.topperit.com.bd/"
                                class="bg-gray-100 hover:bg-purple-100 px-3 py-2 rounded-lg text-sm transition"> লারাভেল ডেমো </a>
                            
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





    <!-- Facebook Algorithm Section -->
    <section class="py-16 sm:py-20 lg:py-24 bg-gradient-to-br from-blue-900 via-blue-800 to-indigo-900 text-white">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-5xl mx-auto">
                <div class="text-center mb-12 sm:mb-16">
                    <h2 class="text-2xl sm:text-3xl lg:text-4xl font-bold mb-6 sm:mb-8 leading-tight">
                        ফেসবুকের এলগোরিদম কিভাবে কাজ করে সেটা বুঝলেই কেবল বুঝতে পারবেন কেন ওয়েবসাইট প্রয়োজন?
                    </h2>
                </div>

                <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-8 sm:p-10 lg:p-12 mb-12">
                    <div class="flex items-start space-x-4 mb-6">
                        <div class="w-12 h-12 bg-blue-500 rounded-full flex items-center justify-center flex-shrink-0">
                            <i class="fab fa-facebook-f text-xl"></i>
                        </div>
                        <div>
                            <h3 class="text-xl sm:text-2xl font-bold mb-4 text-blue-200">Facebook Algorithm Insight</h3>
                            <p class="text-lg sm:text-xl leading-relaxed text-blue-100">
                                যেসব কাস্টোমার শুধু বিভিন্ন পেজের ইনবক্সে মেসেজ দিতে পছন্দ করে এটা সেটা জানার জন্য ফেসবুক
                                তাদের আলাদা করে রেখেছে। প্রক্ষান্তরে যারা বিভিন্ন ওয়েবসাইট থেকে ডাইরেক্ট অর্ডার করে তাদেরকে
                                নিয়ে আলাদা অডিয়েন্স ক্রিয়েট করে রেখেছে।
                            </p>
                        </div>
                    </div>
                </div>

                <div class="grid md:grid-cols-2 gap-8 sm:gap-12 mb-12">
                    <div
                        class="bg-gradient-to-br from-red-500/20 to-orange-500/20 backdrop-blur-sm rounded-xl p-6 sm:p-8 border border-red-300/20">
                        <div class="w-16 h-16 bg-orange-600 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fab fa-facebook-messenger text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-bold mb-4 text-center">Messenger Audiences</h3>
                        <ul class="space-y-3">
                            <li class="flex items-center space-x-3">
                                <i class="fas fa-times text-red-400"></i>
                                <span>সীমিত রিচ ও এনগেজমেন্ট</span>
                            </li>
                            <li class="flex items-center space-x-3">
                                <i class="fas fa-times text-red-400"></i>
                                <span>ফেসবুক সম্পূর্ণ নিয়ন্ত্রণ করে</span>
                            </li>
                            <li class="flex items-center space-x-3">
                                <i class="fas fa-times text-red-400"></i>
                                <span>অ্যাড কস্ট অনেক বেশি</span>
                            </li>
                            <li class="flex items-center space-x-3">
                                <i class="fas fa-times text-red-400"></i>
                                <span>রিটার্গেটিং অপশন সীমিত</span>
                            </li>
                        </ul>
                    </div>

                    <div
                        class="bg-gradient-to-br from-green-500/20 to-emerald-500/20 backdrop-blur-sm rounded-xl p-6 sm:p-8 border border-green-300/20">
                        <div class="w-16 h-16 bg-green-600 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-globe text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-bold mb-4 text-center">Website Audiences</h3>
                        <ul class="space-y-3">
                            <li class="flex items-center space-x-3">
                                <i class="fas fa-check text-green-400"></i>
                                <span>আনলিমিটেড রিচ ও কন্ট্রোল</span>
                            </li>
                            <li class="flex items-center space-x-3">
                                <i class="fas fa-check text-green-400"></i>
                                <span>সম্পূর্ণ আপনার নিয়ন্ত্রণে</span>
                            </li>
                            <li class="flex items-center space-x-3">
                                <i class="fas fa-check text-green-400"></i>
                                <span>কম অ্যাড কস্টে বেশি রিচ</span>
                            </li>
                            <li class="flex items-center space-x-3">
                                <i class="fas fa-check text-green-400"></i>
                                <span>পাওয়ারফুল রিটার্গেটিং সিস্টেম</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="text-center">
                    <a href="https://wa.link/saqf1s"
                        class="bg-gradient-to-r from-green-600 to-emerald-600 hover:from-green-700 hover:to-emerald-700 text-white px-10 py-5 rounded-lg font-bold text-xl transition-all duration-300 transform hover:scale-105 shadow-lg">
                        Boost Your Sales
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Core Features Section -->
    

    <!-- Bad vs Good Websites Comparison -->
    <!-- Bad vs Good Websites Comparison -->
    <section class="py-16 sm:py-20 lg:py-24 bg-gray-50">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12 sm:mb-16">
                <h2 class="text-2xl sm:text-3xl lg:text-4xl font-bold text-gray-800 mb-4">
                    সাধারণ ওয়েবসাইট vs TOPPER IT ওয়েবসাইট
                </h2>
                <p class="text-lg sm:text-xl text-gray-600">পার্থক্য দেখুন এবং সঠিক সিদ্ধান্ত নিন</p>
            </div>

            <div class="grid lg:grid-cols-2 gap-8 sm:gap-12 mb-12">
                <!-- Bad Websites -->
                <!-- Bad Websites -->
                <div
                    class="rounded-2xl p-6 sm:p-8 text-white 
         bg-gradient-to-br from-rose-800 via-red-700 to-rose-600
         ring-1 ring-white/10 shadow-xl relative overflow-hidden">

                    <!-- subtle glowing overlay -->
                    <div class="absolute inset-0 bg-gradient-to-tr from-red-500/20 via-transparent to-rose-500/20"></div>

                    <div class="relative text-center mb-6">
                        <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-exclamation-triangle text-3xl"></i>
                        </div>
                        <h3 class="text-xl sm:text-2xl font-extrabold tracking-tight">⚠️ সাধারণ ওয়েবসাইট</h3>
                        <div class="w-14 h-[3px] bg-white/30 mx-auto mt-3 rounded"></div>
                    </div>

                    <ul class="relative space-y-3 sm:space-y-4">
                        <li class="flex items-start gap-3">
                            <i class="fas fa-times mt-1 text-orange-200"></i>
                            <span>সার্ভার ডাউন হয়ে যায়</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <i class="fas fa-times mt-1 text-orange-200"></i>
                            <span>এক্সেস লস হয়</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <i class="fas fa-times mt-1 text-orange-200"></i>
                            <span>কন্টেন্ট গায়েব হয়ে যায়</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <i class="fas fa-times mt-1 text-orange-200"></i>
                            <span>ডোমেইন ব্লক হয়ে যায়</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <i class="fas fa-times mt-1 text-orange-200"></i>
                            <span>লোডিং স্পিড খুবই ধীর</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <i class="fas fa-times mt-1 text-orange-200"></i>
                            <span>সিকিউরিটি সমস্যা</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <i class="fas fa-times mt-1 text-orange-200"></i>
                            <span>কাস্টমার সাপোর্ট নেই</span>
                        </li>
                    </ul>
                </div>


                <!-- Good Websites -->
                <div
                    class="rounded-2xl p-6 sm:p-8 text-white bg-gradient-to-br from-emerald-700 via-teal-700 to-cyan-700 ring-1 ring-white/10 shadow-xl">
                    <div class="text-center mb-6">
                        <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-crown text-3xl"></i>
                        </div>
                        <h3 class="text-xl sm:text-2xl font-extrabold tracking-tight">✅ TOPPER IT ওয়েবসাইট</h3>
                        <div class="w-14 h-[3px] bg-white/30 mx-auto mt-3 rounded"></div>
                    </div>

                    <ul class="space-y-3 sm:space-y-4">
                        <li class="flex items-start gap-3">
                            <i class="fas fa-check mt-1 text-white/90"></i>
                            <span class="text-white/95">সার্ভার-সাইড ট্র্যাকিং</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <i class="fas fa-check mt-1 text-white/90"></i>
                            <span class="text-white/95">ফাস্ট চেকআউট প্রসেস</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <i class="fas fa-check mt-1 text-white/90"></i>
                            <span class="text-white/95">অটোমেটিক সেল সিস্টেম</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <i class="fas fa-check mt-1 text-white/90"></i>
                            <span class="text-white/95">শতভাগ সিকিউরিটি</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <i class="fas fa-check mt-1 text-white/90"></i>
                            <span class="text-white/95">১ সেকেন্ড লোডিং স্পিড</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <i class="fas fa-check mt-1 text-white/90"></i>
                            <span class="text-white/95">৯৯.৯% আপটাইম গ্যারান্টি</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <i class="fas fa-check mt-1 text-white/90"></i>
                            <span class="text-white/95">২৪/৭ টেকনিক্যাল সাপোর্ট</span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="text-center">
                <a href="https://wa.link/saqf1s"
                    class="bg-gradient-to-r from-rose-600 via-red-600 to-rose-700 hover:from-rose-700 hover:via-red-700 hover:to-rose-800 text-white px-8 py-4 rounded-lg font-bold text-lg transition-all shadow-lg">
                    Switch to a Secure Website Today
                </a>
            </div>
        </div>
    </section>