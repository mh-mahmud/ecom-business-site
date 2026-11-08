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
                    ল্যান্ডিং পেজ হলো এমন একটি নির্দিষ্ট ওয়েব পেজ, যেখানে কোনো বিজ্ঞাপন, প্রচারণা বা মার্কেটিং লিংকে ক্লিক করার পর একজন ভিজিটরকে নিয়ে আসা হয়।
                    একটি কিংবা একদম সিমিলার ২-৩ টি প্রোডাক্ট যারা সেল করে থাকে তাদের জন্য ল্যান্ডিং পেজ গুরুত্বপূর্ণ।
                    খরচের পরিমাণ কম কিন্তু সেল অনেক বেশি।
                </p>




            </div>
        </div>
    </section>
    <!-- Compact Stat Section (Light Version — with CTA) -->

<style>
    .portfolio {
      width: min(1150px, calc(100% - 40px));
      margin: 26px auto;
    }

    .project-grid {
      display: grid;
      grid-template-columns: repeat(4, minmax(0, 1fr));
      column-gap: 34px;
      row-gap: 58px;
    }

    .project-card {
      min-width: 0;
      overflow: hidden;
      background: var(--card-bg);
      border-radius: 9px;
      box-shadow: 0 5px 12px rgba(24, 34, 50, 0.13);
      transition: transform .2s ease, box-shadow .2s ease;
    }

    .project-card:hover {
      transform: translateY(-4px);
      box-shadow: 0 9px 20px rgba(24, 34, 50, 0.17);
    }

    .preview {
      display: block;
      height: 282px;
      overflow: hidden;
      background: #fff;
    }

    .preview img {
      display: block;
      width: 100%;
      height: 100%;
      object-fit: cover;
      object-position: top center;
      transition: transform .35s ease;
    }

    .project-card:hover .preview img {
      transform: scale(1.025);
    }

    .card-footer {
      min-height: 94px;
      padding: 12px 8px 15px;
      text-align: center;
      /*background: #1E3A89;*/
      background: #bbd;
    }

    .card-footer h2 {
      margin: 0 0 14px;
      color: #111;
      font-size: 16px;
      font-weight: 800;
    }

    .card-actions {
      display: flex;
      justify-content: center;
      align-items: center;
      flex-wrap: wrap;
      gap: 5px;
    }

    .action-btn {
      display: inline-flex;
      justify-content: center;
      align-items: center;
      min-height: 28px;
      padding: 5px 9px;
      border: 0;
      border-radius: 4px;
      background: var(--blue);
      color: #111;
      font: 600 12px Arial, sans-serif;
      text-decoration: none;
      cursor: pointer;
      white-space: nowrap;
      transition: background .2s ease;
    }

    .action-btn:hover {
      background: var(--blue-hover);
    }

    /* Features popup */
    .modal {
      position: fixed;
      inset: 0;
      z-index: 1000;
      display: none;
      align-items: center;
      justify-content: center;
      padding: 20px;
    }

    .modal.open {
      display: flex;
    }

    .modal-backdrop {
      position: absolute;
      inset: 0;
      background: rgba(12, 22, 38, .58);
    }

    .modal-panel {
      position: relative;
      z-index: 1;
      width: min(430px, 100%);
      padding: 28px;
      border-radius: 10px;
      background: #fff;
      box-shadow: 0 15px 45px rgba(0, 0, 0, .2);
    }

    .modal-panel h2 {
      margin: 0 35px 18px 0;
      color: #26364a;
      font-size: 21px;
    }

    .modal-panel ul {
      margin: 0;
      padding-left: 21px;
      color: #526176;
      line-height: 1.9;
    }

    .modal-close {
      position: absolute;
      top: 10px;
      right: 14px;
      border: 0;
      background: transparent;
      color: #53677f;
      font-size: 29px;
      cursor: pointer;
    }

    /* Tablet */
    @media (max-width: 1050px) {
      .project-grid {
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 34px 24px;
      }
    }

    /* Mobile */
    @media (max-width: 720px) {
      .portfolio {
        width: min(100% - 28px, 520px);
        margin: 18px auto;
      }

      .project-grid {
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 22px 16px;
      }

      .preview {
        height: 235px;
      }

      .card-footer {
        min-height: 100px;
      }

      .card-footer h2 {
        font-size: 14px;
      }

      .action-btn {
        padding: 5px 7px;
        font-size: 11px;
      }
    }

    @media (max-width: 430px) {
      .project-grid {
        grid-template-columns: 1fr;
        gap: 22px;
      }

      .preview {
        height: auto;
        aspect-ratio: 1 / 1.05;
      }

      .card-footer {
        min-height: 94px;
      }
    }
</style>

<section>
  <main class="portfolio">
    <section class="project-grid" id="projectGrid" aria-label="Website projects">
      <!-- Replace each preview image and demo URL with your own. -->

      <article class="project-card">
        <a class="preview" href="https://priyodairy.com/" target="_blank" rel="noopener">
          <img src="images/demo/ghee-1.png" alt="Ghee website preview" loading="lazy">
        </a>
        <div class="card-footer">
          <h2>Ghee</h2>
          <div class="card-actions">
            <button class="action-btn features-btn" type="button"
              data-title="Tooth Paste" data-features="সুপারফাস্ট ই-কমার্স ল্যান্ডিং পেজ|লারাভেল ফ্রেম ওয়ার্ক|মোবাইল
              রেস্পন্সিভ|১ টি অর্ডার প্যানেল|কুরিয়ারে এক ক্লিকে অর্ডার ডিটেইল অটোমেটিক এন্ট্রি">🔗 Features</button>
            <a class="action-btn" href="https://priyodairy.com/" target="_blank" rel="noopener">◉ Live Demo</a>
          </div>
        </div>
      </article>

      <article class="project-card">
        <a class="preview" href="https://puredentbd.com/" target="_blank" rel="noopener">
          <img src="images/demo/s_16.png" alt="Tooth Paste website preview" loading="lazy">
        </a>
        <div class="card-footer">
          <h2>Tooth Paste</h2>
          <div class="card-actions">
            <button class="action-btn features-btn" type="button"
              data-title="Tooth Paste" data-features="সুপারফাস্ট ই-কমার্স ল্যান্ডিং পেজ|লারাভেল ফ্রেম ওয়ার্ক|মোবাইল
              রেস্পন্সিভ|১ টি অর্ডার প্যানেল|কুরিয়ারে এক ক্লিকে অর্ডার ডিটেইল অটোমেটিক এন্ট্রি">🔗 Features</button>
            <a class="action-btn" href="https://puredentbd.com/" target="_blank" rel="noopener">◉ Live Demo</a>
          </div>
        </div>
      </article>

      <article class="project-card">
        <a class="preview" href="https://hairoil.prithaenterprise.io/" target="_blank" rel="noopener">
          <img src="images/demo/s_18.png" alt="Hair Oil website preview" loading="lazy">
        </a>
        <div class="card-footer">
          <h2>Hair Oil</h2>
          <div class="card-actions">
            <button class="action-btn features-btn" type="button"
              data-title="Tooth Paste" data-features="সুপারফাস্ট ই-কমার্স ল্যান্ডিং পেজ|লারাভেল ফ্রেম ওয়ার্ক|মোবাইল
              রেস্পন্সিভ|১ টি অর্ডার প্যানেল|কুরিয়ারে এক ক্লিকে অর্ডার ডিটেইল অটোমেটিক এন্ট্রি">🔗 Features</button>
            <a class="action-btn" href="https://hairoil.prithaenterprise.io/" target="_blank" rel="noopener">◉ Live Demo</a>
          </div>
        </div>
      </article>

      <article class="project-card">
        <a class="preview" href="https://baghabari.com/" target="_blank" rel="noopener">
          <img src="images/demo/ghee-2.png" alt="Ghee website preview" loading="lazy">
        </a>
        <div class="card-footer">
          <h2>Ghee - 2</h2>
          <div class="card-actions">
            <button class="action-btn features-btn" type="button"
              data-title="Tooth Paste" data-features="সুপারফাস্ট ই-কমার্স ল্যান্ডিং পেজ|লারাভেল ফ্রেম ওয়ার্ক|মোবাইল
              রেস্পন্সিভ|১ টি অর্ডার প্যানেল|কুরিয়ারে এক ক্লিকে অর্ডার ডিটেইল অটোমেটিক এন্ট্রি">🔗 Features</button>
            <a class="action-btn" href="https://baghabari.com/" target="_blank" rel="noopener">◉ Live Demo</a>
          </div>
        </div>
      </article>

      <article class="project-card">
        <a class="preview" href="https://greenfarmbd.io/" target="_blank" rel="noopener">
          <img src="images/demo/gur-1.png" alt="Shahiraj Gur website preview" loading="lazy">
        </a>
        <div class="card-footer">
          <h2>Shahiraj Gur</h2>
          <div class="card-actions">
            <button class="action-btn features-btn" type="button"
              data-title="Shahiraj Gur" data-features="Modern ecommerce homepage|Category-based product discovery|Promotional banners and offers">🔗 Features</button>
            <a class="action-btn" href="https://greenfarmbd.io/" target="_blank" rel="noopener">◉ Live Demo</a>
          </div>
        </div>
      </article>

      <article class="project-card">
        <a class="preview" href="https://www.kiammart.com/landing/step/prestige-kettle/" target="_blank" rel="noopener">
          <img src="images/demo/ketli.png" alt="Ketli website preview" loading="lazy">
        </a>
        <div class="card-footer">
          <h2>Ketli</h2>
          <div class="card-actions">
            <button class="action-btn features-btn" type="button"
              data-title="Ketli" data-features="Electronics product catalog|Featured brands and categories|Responsive product browsing">🔗 Features</button>
            <a class="action-btn" href="https://www.kiammart.com/landing/step/prestige-kettle/" target="_blank" rel="noopener">◉ Live Demo</a>
          </div>
        </div>
      </article>

      <article class="project-card">
        <a class="preview" href="https://supremefoodbd.com/step/honey-combo/" target="_blank" rel="noopener">
          <img src="images/demo/honey-1.png" alt="Honey Combo website preview" loading="lazy">
        </a>
        <div class="card-footer">
          <h2>Honey Combo</h2>
          <div class="card-actions">
            <button class="action-btn features-btn" type="button"
              data-title="Honey Combo" data-features="Multi-category product layout|Category navigation|Promotional product sections">🔗 Features</button>
            <a class="action-btn" href="https://supremefoodbd.com/step/honey-combo/" target="_blank" rel="noopener">◉ Live Demo</a>
          </div>
        </div>
      </article>

      <article class="project-card">
        <a class="preview" href="https://khejur.rajshahiraamwala.com/step/3-kg-liquid-combo/" target="_blank" rel="noopener">
          <img src="images/demo/gur-combo.png" alt="Gur Combo website preview" loading="lazy">
        </a>
        <div class="card-footer">
          <h2>Gur Combo</h2>
          <div class="card-actions">
            <button class="action-btn features-btn" type="button"
              data-title="Gur Combo" data-features="Beauty and skincare storefront|Discount and campaign banners|Product discovery sections">🔗 Features</button>
            <a class="action-btn" href="https://khejur.rajshahiraamwala.com/step/3-kg-liquid-combo/" target="_blank" rel="noopener">◉ Live Demo</a>
          </div>
        </div>
      </article>

      <article class="project-card">
        <a class="preview" href="demo/beauti-product/" target="_blank" rel="noopener">
          <img src="images/demo/beauti-product.png" alt="Beauti Product website preview" loading="lazy">
        </a>
        <div class="card-footer">
          <h2>Beauti Product</h2>
          <div class="card-actions">
            <button class="action-btn features-btn" type="button"
              data-title="Beauti Product" data-features="Furniture and interior showcase|Room and product galleries|Clean editorial layout">🔗 Features</button>
            <a class="action-btn" href="demo/beauti-product/" target="_blank" rel="noopener">◉ Live Demo</a>
          </div>
        </div>
      </article>

      <article class="project-card">
        <a class="preview" href="demo/cosmatics/" target="_blank" rel="noopener">
          <img src="images/demo/cosmatics.png" alt="Cosmatics website preview" loading="lazy">
        </a>
        <div class="card-footer">
          <h2>Cosmatics</h2>
          <div class="card-actions">
            <button class="action-btn features-btn" type="button"
              data-title="Cosmatics" data-features="Furniture and interior showcase|Room and product galleries|Clean editorial layout">🔗 Features</button>
            <a class="action-btn" href="demo/cosmatics/" target="_blank" rel="noopener">◉ Live Demo</a>
          </div>
        </div>
      </article>

      <article class="project-card">
        <a class="preview" href="demo/honey-combo/" target="_blank" rel="noopener">
          <img src="images/demo/honey.png" alt="Honey website preview" loading="lazy">
        </a>
        <div class="card-footer">
          <h2>Honey</h2>
          <div class="card-actions">
            <button class="action-btn features-btn" type="button"
              data-title="Honey" data-features="Art and craft supplies catalog|Product category grid|Featured products and promotions">🔗 Features</button>
            <a class="action-btn" href="demo/honey-combo/" target="_blank" rel="noopener">◉ Live Demo</a>
          </div>
        </div>
      </article>

      <article class="project-card">
        <a class="preview" href="https://purnotabd.com/products/chest-binder" target="_blank" rel="noopener">
          <img src="images/demo/chest-binder.png" alt="Chest Binder website preview" loading="lazy">
        </a>
        <div class="card-footer">
          <h2>Chest Binder</h2>
          <div class="card-actions">
            <button class="action-btn features-btn" type="button"
              data-title="Sf Fabignstyle" data-features="Fashion and clothing storefront|Collection and discount sections|Product listing layout">🔗 Features</button>
            <a class="action-btn" href="https://purnotabd.com/products/chest-binder" target="_blank" rel="noopener">◉ Live Demo</a>
          </div>
        </div>
      </article>

      <article class="project-card">
        <a class="preview" href="demo/smart-watch/" target="_blank" rel="noopener">
          <img src="images/demo/smart-watch.png" alt="Smart Watch website preview" loading="lazy">
        </a>
        <div class="card-footer">
          <h2>Smart Watch</h2>
          <div class="card-actions">
            <button class="action-btn features-btn" type="button"
              data-title="Smart Watch" data-features="Art and craft supplies catalog|Product category grid|Featured products and promotions">🔗 Features</button>
            <a class="action-btn" href="demo/smart-watch/" target="_blank" rel="noopener">◉ Live Demo</a>
          </div>
        </div>
      </article>

      <article class="project-card">
        <a class="preview" href="demo/tooth-paste/" target="_blank" rel="noopener">
          <img src="images/demo/tooth-paste.png" alt="Tooth Paste website preview" loading="lazy">
        </a>
        <div class="card-footer">
          <h2>Tooth Paste</h2>
          <div class="card-actions">
            <button class="action-btn features-btn" type="button"
              data-title="Tooth Paste" data-features="Art and craft supplies catalog|Product category grid|Featured products and promotions">🔗 Features</button>
            <a class="action-btn" href="demo/tooth-paste/" target="_blank" rel="noopener">◉ Live Demo</a>
          </div>
        </div>
      </article>

      <article class="project-card">
        <a class="preview" href="demo/oral-care/" target="_blank" rel="noopener">
          <img src="images/demo/oral-care.png" alt="Oral Care website preview" loading="lazy">
        </a>
        <div class="card-footer">
          <h2>Oral Care</h2>
          <div class="card-actions">
            <button class="action-btn features-btn" type="button"
              data-title="Oral Care" data-features="Art and craft supplies catalog|Product category grid|Featured products and promotions">🔗 Features</button>
            <a class="action-btn" href="demo/oral-care/" target="_blank" rel="noopener">◉ Live Demo</a>
          </div>
        </div>
      </article>

      <article class="project-card">
        <a class="preview" href="https://chainadeal.com/products/wd-959-1257184" target="_blank" rel="noopener">
          <img src="images/demo/china-product.png" alt="China Product website preview" loading="lazy">
        </a>
        <div class="card-footer">
          <h2>China Product</h2>
          <div class="card-actions">
            <button class="action-btn features-btn" type="button"
              data-title="China Product" data-features="Art and craft supplies catalog|Product category grid|Featured products and promotions">🔗 Features</button>
            <a class="action-btn" href="https://chainadeal.com/products/wd-959-1257184" target="_blank" rel="noopener">◉ Live Demo</a>
          </div>
        </div>
      </article>
    </section>
  </main>

  <div class="modal" id="featuresModal" aria-hidden="true">
    <div class="modal-backdrop" data-close></div>
    <section class="modal-panel" role="dialog" aria-modal="true" aria-labelledby="modalTitle">
      <button class="modal-close" type="button" aria-label="Close" data-close>&times;</button>
      <h2 id="modalTitle">Project Features</h2>
      <ul id="modalFeatures"></ul>
    </section>
  </div>
  <script>
        const modal = document.getElementById("featuresModal");
        const modalTitle = document.getElementById("modalTitle");
        const modalFeatures = document.getElementById("modalFeatures");

        document.querySelectorAll(".features-btn").forEach((button) => {
          button.addEventListener("click", () => {
            modalTitle.textContent = `${button.dataset.title} - Features`;
            modalFeatures.replaceChildren();

            (button.dataset.features || "")
              .split("|")
              .filter(Boolean)
              .forEach((feature) => {
                const item = document.createElement("li");
                item.textContent = feature;
                modalFeatures.appendChild(item);
              });

            modal.classList.add("open");
            modal.setAttribute("aria-hidden", "false");
          });
        });

        function closeModal() {
          modal.classList.remove("open");
          modal.setAttribute("aria-hidden", "true");
        }

        modal.querySelectorAll("[data-close]").forEach((element) => {
          element.addEventListener("click", closeModal);
        });

        document.addEventListener("keydown", (event) => {
          if (event.key === "Escape" && modal.classList.contains("open")) {
            closeModal();
          }
        });
  </script> 
</section>




                    
    <section class="py-12 sm:py-16 bg-gradient-to-r from-blue-50 via-purple-50 to-pink-50">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-center">
                
                <!-- Plan 1 -->
                <div style="margin-right:10px;" class="bg-white rounded-xl shadow-lg p-6 sm:p-8 card-hover border-t-4 border-blue-500 max-w-md w-full">
                    
                        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-4 sm:mb-6">
                            <h3 class="text-xl sm:text-2xl font-bold text-gray-800 mb-2 sm:mb-0">
                                ল্যান্ডিং পেজ ডোমেইন হোস্টিং সহ
                            </h3>

                            <!-- <span class="bg-red-100 text-blue-600 px-3 py-1 rounded-full text-xs sm:text-sm font-semibold self-start">
                                Advanced
                            </span> -->
                        </div>

                        <div class="mb-4 sm:mb-6">
                            <div class="text-2xl sm:text-3xl font-bold text-green-600 mb-2">
                                ৪,০০০ টাকা
                            </div>
                        </div>


                        <ul class="space-y-3 mb-8">
                            <li class="flex items-start space-x-3">
                                <i class="fas fa-check text-green-500 mt-1"></i>
                                <span>১ টি সুপারফাস্ট ই-কমার্স ল্যান্ডিং পেজ</span>
                            </li>
                            <li class="flex items-start space-x-3">
                                <i class="fas fa-check text-green-500 mt-1"></i>
                                <span>লারাভেল ফ্রেম ওয়ার্ক</span>
                            </li>

                            <li class="flex items-start space-x-3">
                                <i class="fas fa-check text-green-500 mt-1"></i>
                                <span>১ টি অর্ডার প্যানেল</span>
                            </li>
                            <li class="flex items-start space-x-3">
                                <i class="fas fa-check text-green-500 mt-1"></i>
                                <span>কাস্টমার এর অর্ডার সরাসরি ইমেইল করা হবে</span>
                            </li>

                            <li class="flex items-start space-x-3">
                                <i class="fas fa-check text-green-500 mt-1"></i>
                                <span>কুরিয়ারে এক ক্লিকে অর্ডার ডিটেইল অটোমেটিক এন্ট্রি</span>
                            </li>
                            
                            <li class="flex items-start space-x-3">
                                <i class="fas fa-check text-green-500 mt-1"></i>
                                <span>হোস্টিং + .xyz ডোমেইন ( ১ বছর মেয়াদী)</span>
                            </li>
                            <!-- <li class="flex items-start space-x-3">
                                <i class="fas fa-check text-green-500 mt-1"></i>
                                <span>১ মাস টেকনিক্যাল সাপোর্ট</span>
                            </li> -->
                            <li class="flex items-start space-x-3">
                                <i class="fas fa-check text-green-500 mt-1"></i>
                                <span>কাস্টম ফিচার অ্যাড করার সুযোগ রয়েছে। (চার্জ প্রযোজ্য)</span>
                            </li>
                        
                            <!-- NEW LINE -->
                            <!-- <li class="flex items-start space-x-3">
                                <i class="fas fa-star text-yellow-500 mt-1"></i>
                                <span class="font-bold text-red-400">
                                    ল্যান্ডিং পেজ থেকে একটি প্রোডাক্ট সেল করা যায়, যাদের প্রোডাক্ট একটি তাদের জন্য ল্যান্ডিং পেজ
                                </span>
                            </li> -->
                        </ul>

                        <!-- <div class="space-y-3">

                            <a href="https://wa.me/message/S2B2PMXA3COGB1"
                                class="w-full bg-green-500 hover:bg-green-600 text-white py-3 rounded-lg font-semibold transition text-center block">
                                <i class="fab fa-whatsapp mr-2"></i> WhatsApp
                            </a>

                        </div> -->
                </div>

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
                                ২,০০০ টাকা
                            </div>
                        </div>


                        <ul class="space-y-3 mb-8">
                            <li class="flex items-start space-x-3">
                                <i class="fas fa-check text-green-500 mt-1"></i>
                                <span>১ টি সুপারফাস্ট ই-কমার্স ল্যান্ডিং পেজ</span>
                            </li>
                            <li class="flex items-start space-x-3">
                                <i class="fas fa-check text-green-500 mt-1"></i>
                                <span>লারাভেল ফ্রেম ওয়ার্ক</span>
                            </li>

                            <li class="flex items-start space-x-3">
                                <i class="fas fa-check text-green-500 mt-1"></i>
                                <span>১ টি অর্ডার প্যানেল</span>
                            </li>
                            <!-- <li class="flex items-start space-x-3">
                                <i class="fas fa-check text-green-500 mt-1"></i>
                                <span>৩ মাস টেকনিক্যাল সাপোর্ট</span>
                            </li> -->
                            <li class="flex items-start space-x-3">
                                <i class="fas fa-check text-green-500 mt-1"></i>
                                <span>কাস্টম ফিচার অ্যাড করার সুযোগ রয়েছে। (চার্জ প্রযোজ্য)</span>
                            </li>
                        
                            <!-- NEW LINE -->
                            <!-- <li class="flex items-start space-x-3">
                                <i class="fas fa-star text-yellow-500 mt-1"></i>
                                <span class="font-bold text-red-400">
                                    ল্যান্ডিং পেজ থেকে একটি প্রোডাক্ট সেল করা যায়, যাদের প্রোডাক্ট একটি তাদের জন্য ল্যান্ডিং পেজ
                                </span>
                            </li> -->
                        </ul>

                        <!-- <div class="space-y-3">
                            <a href="https://wa.me/message/S2B2PMXA3COGB1"
                                class="w-full bg-green-500 hover:bg-green-600 text-white py-3 rounded-lg font-semibold transition text-center block">
                                <i class="fab fa-whatsapp mr-2"></i> WhatsApp
                            </a>
                        </div> -->
                </div>

            </div>
        </div>

        <div class="container mt-10 mx-auto px-4 relative z-10 max-w-full">
            <div class="mx-auto max-w-4xl bg-white border border-gray-200 rounded-2xl shadow-lg p-6 sm:p-8">
                <!-- <div class="bg-white rounded-3xl shadow-lg p-6 sm:p-8 card-hover border-t-4 border-blue-500 max-w-md w-full"> -->
                        <style>
                            .lama{
                                padding: 15px;
                                border: 1px solid #ccc;
                                color: #111;
                            }
                        </style>
                        <div class="mb-4 sm:mb-6">
                            <h4 class="font-semibold mb-3 text-sm sm:text-base">Live Demos:</h4>
                            <div class="flex flex-wrap gap-2 demo-scroll">
                                <a target="_blank" href="https://priyodairy.com/"
                                    class="lama bg-gray-100 hover:bg-blue-100 px-2 sm:px-3 py-1 sm:py-2 rounded-lg text-xs sm:text-sm transition whitespace-nowrap"
                                    > ঘি ১ </a>
                                <a target="_blank" href="https://baghabari.com/"
                                    class="lama bg-gray-100 hover:bg-blue-100 px-2 sm:px-3 py-1 sm:py-2 rounded-lg text-xs sm:text-sm transition whitespace-nowrap"
                                    > ঘি ২ </a>
                                <a target="_blank" href="https://landing.topperit.com.bd/step/modhu/"
                                    class="lama bg-gray-100 hover:bg-blue-100 px-2 sm:px-3 py-1 sm:py-2 rounded-lg text-xs sm:text-sm transition whitespace-nowrap"
                                    > মধু </a>
                                <a target="_blank" href="https://supremefoodbd.com/step/honey-combo/"
                                    class="lama bg-gray-100 hover:bg-blue-100 px-2 sm:px-3 py-1 sm:py-2 rounded-lg text-xs sm:text-sm transition whitespace-nowrap">মধু কম্বো</a>
                                <a target="_blank" href="https://supremefoodbd.com/step/honey-combo/"
                                    class="lama bg-gray-100 hover:bg-blue-100 px-2 sm:px-3 py-1 sm:py-2 rounded-lg text-xs sm:text-sm transition whitespace-nowrap"
                                    > আম </a>
                                <a target="_blank" href="https://landing.topperit.com.bd/step/sukkari-khejur/"
                                    class="lama bg-gray-100 hover:bg-blue-100 px-2 sm:px-3 py-1 sm:py-2 rounded-lg text-xs sm:text-sm transition whitespace-nowrap"
                                    > খেজুর ১</a>
                                <a target="_blank" href="https://misadmart.com/mabrum-khejur/"
                                    class="lama bg-gray-100 hover:bg-blue-100 px-2 sm:px-3 py-1 sm:py-2 rounded-lg text-xs sm:text-sm transition whitespace-nowrap"
                                    > খেজুর ২</a>
                                <a target="_blank" href="https://landing.topperit.com.bd/step/khejurgur/"
                                    class="lama bg-gray-100 hover:bg-blue-100 px-2 sm:px-3 py-1 sm:py-2 rounded-lg text-xs sm:text-sm transition whitespace-nowrap"
                                    > খেজুর গুড় </a>
                                    
                                <a target="_blank" href="https://landing.topperit.com.bd/step/lalchaul/"
                                    class="lama bg-gray-100 hover:bg-blue-100 px-2 sm:px-3 py-1 sm:py-2 rounded-lg text-xs sm:text-sm transition whitespace-nowrap"
                                    > লাল চাউল </a>
                                <a target="_blank" href="https://landing.topperit.com.bd/step/ghee/"
                                    class="lama bg-gray-100 hover:bg-blue-100 px-2 sm:px-3 py-1 sm:py-2 rounded-lg text-xs sm:text-sm transition whitespace-nowrap">খাঁটি ঘি </a>
                                <a target="_blank" href="https://landing.topperit.com.bd/step/t-shirt/"
                                    class="lama bg-gray-100 hover:bg-blue-100 px-2 sm:px-3 py-1 sm:py-2 rounded-lg text-xs sm:text-sm transition whitespace-nowrap"
                                    > টি শার্ট কম্বো </a>
                                <a target="_blank" href="https://landing.topperit.com.bd/step/premium-classic-polo/"
                                    class="lama bg-gray-100 hover:bg-blue-100 px-2 sm:px-3 py-1 sm:py-2 rounded-lg text-xs sm:text-sm transition whitespace-nowrap"
                                    > পলো শার্ট </a>
                                <a target="_blank" href="https://landing.topperit.com.bd/step/shirt/"
                                    class="lama bg-gray-100 hover:bg-blue-100 px-2 sm:px-3 py-1 sm:py-2 rounded-lg text-xs sm:text-sm transition whitespace-nowrap"
                                    > শার্ট </a>
                                    
                                    
                                <a target="_blank" href="https://landing.topperit.com.bd/step/trouserformen/"
                                    class="lama bg-gray-100 hover:bg-blue-100 px-2 sm:px-3 py-1 sm:py-2 rounded-lg text-xs sm:text-sm transition whitespace-nowrap"
                                    > ট্রাউজার (পুরুষ) </a>
                                    
                                <a target="_blank" href="https://landing.topperit.com.bd/step/hoodiesformen/"
                                    class="lama bg-gray-100 hover:bg-blue-100 px-2 sm:px-3 py-1 sm:py-2 rounded-lg text-xs sm:text-sm transition whitespace-nowrap"
                                 > হুডি (পুরুষ) </a>
                                    
                                 <a target="_blank" href="https://landing.topperit.com.bd/step/jacketformen/"
                                    class="lama bg-gray-100 hover:bg-blue-100 px-2 sm:px-3 py-1 sm:py-2 rounded-lg text-xs sm:text-sm transition whitespace-nowrap"
                                    > জ্যাকেট (পুরুষ) </a>
                                    
                                <a target="_blank" href="https://landing.topperit.com.bd/step/panjabi/"
                                    class="lama bg-gray-100 hover:bg-blue-100 px-2 sm:px-3 py-1 sm:py-2 rounded-lg text-xs sm:text-sm transition whitespace-nowrap"
                                    > পাঞ্জাবি </a>
                                <a target="_blank" href="https://landing.topperit.com.bd/step/three-piece/"
                                    class="lama bg-gray-100 hover:bg-blue-100 px-2 sm:px-3 py-1 sm:py-2 rounded-lg text-xs sm:text-sm transition whitespace-nowrap"
                                    > থ্রি-পিছ </a>
                                <a target="_blank" href="https://landing.topperit.com.bd/step/three-piece-2/"
                                    class="lama bg-gray-100 hover:bg-blue-100 px-2 sm:px-3 py-1 sm:py-2 rounded-lg text-xs sm:text-sm transition whitespace-nowrap"
                                    > থ্রি-পিছ ২ </a>
                                    
                                <a target="_blank" href="https://landing.topperit.com.bd/step/premium-sari/"
                                    class="lama bg-gray-100 hover:bg-blue-100 px-2 sm:px-3 py-1 sm:py-2 rounded-lg text-xs sm:text-sm transition whitespace-nowrap"
                                   > শাড়ি </a>
                                    
                                <a target="_blank" href="https://landing.topperit.com.bd/step/watch/"
                                    class="lama bg-gray-100 hover:bg-blue-100 px-2 sm:px-3 py-1 sm:py-2 rounded-lg text-xs sm:text-sm transition whitespace-nowrap"
                                    > ঘড়ি </a>
                                    
                                <a target="_blank" href="https://landing.topperit.com.bd/step/casual-shoes/"
                                    class="lama bg-gray-100 hover:bg-blue-100 px-2 sm:px-3 py-1 sm:py-2 rounded-lg text-xs sm:text-sm transition whitespace-nowrap"
                                   > ক্যাজুয়াল জুতা </a>
                                   
                                   
                                   <a target="_blank" href="https://landing.topperit.com.bd/step/intelligence-book/"
                                    class="lama bg-gray-100 hover:bg-blue-100 px-2 sm:px-3 py-1 sm:py-2 rounded-lg text-xs sm:text-sm transition whitespace-nowrap"
                                   > ইন্টেলিজেন্স বুক </a>
                                   
                                   <a target="_blank" href="https://landing.topperit.com.bd/step/organic-store-checkout/"
                                    class="lama bg-gray-100 hover:bg-blue-100 px-2 sm:px-3 py-1 sm:py-2 rounded-lg text-xs sm:text-sm transition whitespace-nowrap"
                                   > চায়না প্রোডাক্ট </a>
                                   
                                   
                                  <a target="_blank" href="https://landing.topperit.com.bd/step/intelligence-book/"
                                    class="lama bg-gray-100 hover:bg-blue-100 px-2 sm:px-3 py-1 sm:py-2 rounded-lg text-xs sm:text-sm transition whitespace-nowrap"
                                   > চায়না প্রোডাক্ট -২ </a>
                                   
                                   <a target="_blank" href="https://landing.topperit.com.bd/step/intelligence-book/"
                                    class="lama bg-gray-100 hover:bg-blue-100 px-2 sm:px-3 py-1 sm:py-2 rounded-lg text-xs sm:text-sm transition whitespace-nowrap"
                                   > ইন্টেলিজেন্স বুক </a>
                                   
                                   <a target="_blank" href="https://landing.topperit.com.bd/step/flying-doll/"
                                    class="lama bg-gray-100 hover:bg-blue-100 px-2 sm:px-3 py-1 sm:py-2 rounded-lg text-xs sm:text-sm transition whitespace-nowrap"
                                 > বাচ্চাদের খেলনা </a>
                                 
                                  <a target="_blank" href="demo/beauti-product/"
                                    class="lama bg-gray-100 hover:bg-blue-100 px-2 sm:px-3 py-1 sm:py-2 rounded-lg text-xs sm:text-sm transition whitespace-nowrap"
                                > বিউটি প্রোডাক্ট </a>
                                
                                 <a target="_blank" href="demo/cosmatics/"
                                    class="lama bg-gray-100 hover:bg-blue-100 px-2 sm:px-3 py-1 sm:py-2 rounded-lg text-xs sm:text-sm transition whitespace-nowrap"
                                > কসমেটিক্স </a>
                                
                                    
                            </div>
                        </div>
                <!-- </div> -->
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
                    <a href="https://wa.me/message/S2B2PMXA3COGB1"
                        class="inline-flex items-center gap-2 bg-[#25D366] hover:bg-[#1fb457] active:bg-[#189246] text-white px-6 py-3 rounded-xl font-bold text-base sm:text-lg shadow-md focus:outline-none focus-visible:ring-2 focus-visible:ring-[#1fb457] transition"
                        aria-label="WhatsApp">
                        <i class="fab fa-whatsapp text-lg"></i>
                        <span>WhatsApp</span>
                    </a>

                    <!-- Call -->
                    <a href="tel:+8801730724300"
                        class="inline-flex items-center gap-2 bg-indigo-500 border border-gray-300 hover:bg-indigo-600 text-white px-6 py-3 rounded-xl font-semibold text-base sm:text-lg shadow-sm focus:outline-none focus-visible:ring-2 focus-visible:ring-blue-400 transition"
                        aria-label="Call 01819-396959">
                        <i class="fas fa-phone text-base"></i>
                        <span>কল করুন: 01819-396959</span>
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